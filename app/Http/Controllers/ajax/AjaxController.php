<?php

namespace App\Http\Controllers\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Response;
use App\Pointing;
use PDF;
use App\User;
use App\WorkingPeriod;
use Carbon\Carbon;
use App\Model\Comleaving;
class AjaxController extends Controller
{
  public function search(Request $r)
  {
      $data = '<center>لا توجد اي توقيعات في هذه الفترة</center>';
      if($r->input('staff') && $r->input('from') && $r->input('to'))
      {
        $user  = User::find($r->input('staff'));
        if($user)
        {
          $dateS = new Carbon($r->input('from'));
          $dateE = new Carbon($r->input('to'));
          $data = Comleaving::whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])
                             ->where('user' , $r->input('staff'))
                             ->get();
          return view('admin.users.search-ajax' , compact('data'));
        }
     }
      return $data;
  }

  public function getScondTime($time)
  {
      $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $time);
      sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
      return $hours * 3600 + $minutes * 60 + $seconds;
  }

  public function getperiod($time)
  {
    $periods = WorkingPeriod::all();

    foreach($periods as $p)
    {
      if($time < $p->finishes_at_time && $time > $p->starts_at_time)
      {
        return $p->id;
      }
    }
    return -1;
  }
//

public function store($p , $user)
{

    $period = WorkingPeriod::findOrFail($p);

    $day = Carbon::now();
    $supposedIn = $period->starts_at_time;
    $supposedOut = $period->finishes_at_time;

    if (!$user->hasWorkingPeriod($period)) {
        return redirect()->back()
            ->withInput()
            ->with('error', trans('quickadmin.errors.doesntHaveWorkingPeriod'));
    }

    // check if the user has already a pointing in the same time
    if($user->hasAlreadyPointed($day, $supposedIn, $supposedOut)) {
        return redirect()->back()
            ->withInput()
            ->with('error', trans('quickadmin.errors.hasAlreadyPointed'));
    }

    Pointing::create([
        'user_id' => $user->id,
        'day' => $day,
        'supposed_in' => $supposedIn,
        'in' => date('H:m',time()+7000),
        'supposed_out' => $supposedOut,
        'out' => NULL,
        'admin_id' => NULL,
        'reason' => NULL,
    ]);

    //return redirect()->route('admin.pointings.create')->with('success', trans('quickadmin.success.pointingCreated'));
}

  public function leaving(Request $r)
  {
    $data = Array();
    $data[0] = 0;
    $data[1] = 'المعلومات التي ادخلت غير صحيحة أو مكان عملك نفسه المسجل لدينا';
    if($r->input('code'))
    {
      $user  = User::where('code' , $r->input('code'))->first();
      if($user != null)
      {

          $status = Comleaving::where('user' , $user->id)->orderBy('id', 'desc')->first();

          if($status != null)
          {

            if($status->status == 'l')
            {
              $data[0] = 0;
              $data[1] = 'انت مسجل خروجك من قبل';
            }
            else
            {
              $p = $this->getperiod($r->input('time'));
              $period = WorkingPeriod::find($p);
              $pointing = Pointing::all()
                    ->where('user_id',auth()->user()->id)
                    ->where('supposed_out',$period->finishes_at_time)
                    ->where('day',date('Y-m-d',time()))->last();
              if($p == -1)
              {
                $status->status = 'l';
                $status->save();
                $data[0] = 0;
                $data[1] = 'الفترة التي تم اختيارها لا تتناسب مع فترات الموظف';
              }else
              {
                if(strtotime($r->input('time')) - strtotime('TODAY') < $this->getScondTime($period->when_no_out_time))
                {
                  $data[0] = 0;
                  $data[1] = 'الفترة التي تم اختيارها  لا يحق لك تسجسل الخروج فيها';
                }
                else
                {
                $pointing->out =  $r->input("time");
                $pointing->save();
                  $status->status = 'l';
                  $status->save();
                  $data[0] = 1;
                  $data[1] = 'تم تسجيل خروجك بنجاح';
                }
            }
     }
   }
       else
       {
         $data[0] = 0;
         $data[1] = 'يجب عليك تسجيل حضورك أولا';
       }
     }
   }
    return $data;
  }

  public function coming(Request $r)
  {

    $data = Array();
    $data[0] = 0;
    $data[1] = 'المعلومات التي ادخلت غير صحيحة أو مكان عملك نفسه المسجل لدينا';
    if($r->input('code'))
    {
      $user  = User::where('code' , $r->input('code'))->first();
      if($user != null)
      {
        $status = Comleaving::where('user' , $user->id)->orderBy('id', 'desc')->first();
        if($status != null)
        {
          if($status->status == 'c')
          {
             $data[0] = 0;
             $data[1] = 'انت مسجل حضورك من قبل';
          }
          else
          {
            $p = $this->getperiod($r->input('time'));
              $period = WorkingPeriod::find($p);
            if($p == -1)
            {
              $data[0] = 0;
              $data[1] = 'الفترة التي تم اختيارهاغير موجودة';
            }else
            {

              if(strtotime($r->input('time')) - strtotime('TODAY')  < $this->getScondTime($period->when_no_in_time))
              {
                $data[0] = 0;
                $data[1] = 'الفترة التي تم اختيارها لا تتناسب مع فترات الموظف';
              }
              else
              {
                $pointing = Pointing::all()
                  ->where('user_id',auth()->user()->id)
                  ->where('supposed_out',$period->starts_at_time)
                  ->where('day',date('Y-m-d',time()))->last();
                if ($pointing){
                    $pointing->in =  $r->input("time");
                    $pointing->save();
                    $newstatus = new Comleaving();
                    $newstatus->user = $user->id;
                    $newstatus->status = 'c';
                    $data[0] = 1;
                    $data[1] = 'تم تسجيل حضورك بنجاح';
                }
                else{
                    $this->store($p , $user);
                    $newstatus = new Comleaving();
                    $newstatus->user = $user->id;
                    $newstatus->status = 'c';
                    $newstatus->save();
                    $data[0] = 1;
                    $data[1] = 'تم تسجيل حضورك بنجاح';
                }
              }
            }
          }
        }
        else
        {
          $p = $this->getperiod($r->input('time'));
            $period = WorkingPeriod::find($p);
          if($p == -1)
          {

            $data[0] = 0;
            $data[1] = 'الفترة التي تم اختيارهاغير موجودة لدي الموظف';
          }else
          {
            if($r->input('time') < $this->getScondTime($period->when_no_in_time))
            {
              $data[0] = 0;
              $data[1] = 'قد تجاوزت الفترة المسموحة لتسجيل الدخول';
            }
            else
            {
                $pointing = Pointing::all()
                    ->where('user_id',auth()->user()->id)
                    ->where('supposed_out',$period->starts_at_time)
                    ->where('day',date('Y-m-d',time()))->last();
                if ($pointing){
                    $pointing->in =  $r->input("time");
                    $pointing->save();
                    $newstatus = new Comleaving();
                    $newstatus->user = $user->id;
                    $newstatus->status = 'c';
                    $data[0] = 1;
                    $data[1] = 'تم تسجيل حضورك بنجاح';
                }
                else{
                    $this->store($p , $user);
                    $newstatus = new Comleaving();
                    $newstatus->user = $user->id;
                    $newstatus->status = 'c';
                    $newstatus->save();
                    $data[0] = 1;
                    $data[1] = 'تم تسجيل حضورك بنجاح';
                }
            }

        }
        }
       }
    }
    return $data;
  }


  public function br_generate(Request $r)
  {

    $data = Array();
    $data[0] = 0;
    $data[1] = '';
    if($r->input('code') && $r->input('staff')&& $r->ajax())
    {
      $code = $r->input('code');
      $staff = User::find($r->input('staff'));
      if($staff != null)
      {

         $staff->code = $code;
         $staff->save();
         $data[0] = 1;
         $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
         $data[1] = '<center><img src="data:image/png;base64,' . base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128, 4 ,100)) . '"><p style="font-size:20px;">'.$code.'</p></center>';

       }
    }
    return $data;
  }

  public function br_download(Request $r)
  {
    if($r->input('code') && $r->input('staff'))
    {
      $code = $r->input('code');
      $staff = User::find($r->input('staff'));
      if($staff != null)
      {

      $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
      $barecode =  base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128 , 4 ,100));
      $pdf = PDF::loadView('admin.users.barecode', compact('barecode' , 'code'));
      return $pdf->download('barecode.pdf');
    }
    }
  }

  public function lat_lng(Request $r)
  {
    $data  = 'المعطيات التي ادخلت غير صحيحة';
    if($r->input('lat') && $r->input('lng') && $r->input('staff') && $r->ajax())
    {
      $lat = $r->input('lat');
      $lng = $r->input('lng');
      $stf = $r->input('staff');
      $staff = User::find($stf);
      if($staff != null)
      {
        $staff->lat = $lat;
        $staff->lng = $lng;
        $staff->save();
        $data = 'تم حفظ المعطيات بنجاح';
      }
    }
    return $data;
  }
}
