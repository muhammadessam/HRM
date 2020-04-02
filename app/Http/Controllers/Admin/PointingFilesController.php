<?php

namespace App\Http\Controllers\Admin;

use App\Data\PointingRecord;
use App\Data\TimePeriod;
use App\Http\Controllers\Controller;
use App\Pointing;
use App\PointingFile;
use App\Services\PointingService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;


class PointingFilesController extends Controller
{
    public $inserted = 0;

    public function index()
    {
        $this->authorize('index', PointingFile::class);

        $pointingFiles = PointingFile::all();

        return view('admin.pointing_files.index', compact('pointingFiles'));
    }

    public function create()
    {
        $this->authorize('create', PointingFile::class);

        return view('admin.pointing_files.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', PointingFile::class);

        $request->validate([
            'file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        // $fileName = time() .'-'. $name;
        
        // echo Storage::disk("public")->put('pointing_files/'.$fileName, $file);
                // $file->storeAs('storage/pointing_files/', $fileName);

            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('file')->storeAs('public/pointing_files',$fileNameToStore);
            echo $path;
        

        PointingFile::create([
            'name' => $name,
            'file' => $fileNameToStore,
        ]);

        $records = $this->parseCsv($fileNameToStore);
        $this->getCleanValues($records);

        return redirect()->route('admin.pointing_files.index');
    }

    private function parseCsv($fileName)
    {
        $csv = Reader::createFromPath('storage/pointing_files/' . $fileName, 'r');
        $records = $csv->getRecords();

        return $records;
    }

    /**
     * @param $records[]
     */
//    private function getCleanValues($records)
//    {
//        foreach ($records as $key => $record) {
//            // skip header
//            if ($key == 0) continue;
//            $record = new PointingRecord($record[0], $record[3], $record[4]);
//
//            try {
//                $user = User::where('matriculate', $record->getUserId())->firstOrFail();
//
//                // insert all working periods for this user
//                $workingPeriods = $user->workingPeriods;
//                //  dd($workingPeriods);
//
//                $pointings = [];
//                foreach ($workingPeriods as $workingPeriod) {
//                    if ($workingPeriod->filledToday($user, $record->getDate()->toDateString())) continue;
//
//                    $pointings[] = Pointing::create([
//                        'user_id' => $user->id,
//                        'day' => $record->getDate()->toDateString(),
//                        'supposed_in' => $workingPeriod->starts_at_time,
//                        'supposed_out' => $workingPeriod->finishes_at_time,
//                    ]);
//                }
//
//                if (count($pointings) === 0) {
//                    $pointings = $user->pointings()->where('day', $record->getDate()->toDateString())->get();
//                }
//
//                $record->getTimes()->each(function (TimePeriod $period, $pKey) use ($record, $user, $pointings) {
//                    $tolerance = 59;
//                    $workingPeriod = $user->getPointingWorkingPeriod($period, $tolerance);
//
//                    if(!$workingPeriod)
//                        throw new \Exception("No working period");
//
//                    foreach ($pointings as $pointing) {
//                        if ($pointing->supposed_in === $workingPeriod->starts_at_time) {
//                            if ($workingPeriod->filled($user, $pointing->day)) continue;
//
//                            if ($period->getStartsAt()) {
//                                $pointing->in = $period->getStartsAt();
//                            }
//                            if ($period->getFinishesAt()) {
//                                $pointing->out = $period->getFinishesAt();
//                            }
//                            $pointing->save();
//
//                            ++$this->inserted;
//                        }
//                    }
//                });
//            } catch (\Exception $e) {
//                Log::error($e->getMessage());
//            }
//        }
//
//        $ps = new PointingService();
//        $ps->fillNoInOrNoOutEntries();
//    }
    private function getCleanValues($records)
    {
        $ps = new PointingService();
//        $ps->addAbsenceDays();
        $hdor = [];
        foreach ($records as $key => $record) {
            // skip header
            if ($key == 0) continue;
            $record = new PointingRecord($record[0], $record[3], $record[4]);


            try {
                $user = User::where('matriculate', $record->getUserId())->firstOrFail();


                $hdor[$user->id][] =$record->getDate()->toDateString();

                $userDepartment = $user->department->workingPeriods;
                // insert all working periods for this user
                $workingPeriods = $user->workingPeriods;

                if ($workingPeriods->count() == 0){
                    $workingPeriods = $userDepartment;
                }


                $pointings = [];
                foreach ($workingPeriods as $workingPeriod) {
                    if ($workingPeriod->filledToday($user, $record->getDate()->toDateString())) continue;
                    $pointings[] = Pointing::create([
                        'user_id' => $user->id,
                        'day' => $record->getDate()->toDateString(),
                        'supposed_in' => $workingPeriod->starts_at_time,
                        'supposed_out' => $workingPeriod->finishes_at_time,
                    ]);
                }

                if (count($pointings) === 0) {
                    $pointings = $user->pointings()->where('day', $record->getDate()->toDateString())->get();
                }

                $record->getTimes()->each(function (TimePeriod $period, $pKey) use ($record, $user, $pointings) {
                    $tolerance = 180;
                    $workingPeriod = $user->getPointingWorkingPeriod($period, $tolerance);


                    if(!$workingPeriod)
                        throw new \Exception("No working period");


                    foreach ($pointings as $pointing) {
                        if ($pointing->supposed_in === $workingPeriod->starts_at_time) {
                            if ($workingPeriod->filled($user, $pointing->day)) continue;


                            if ($period->getStartsAt()) {
                                $pointing->in = $period->getStartsAt();
                            }
                            if ($period->getFinishesAt()) {
                                $pointing->out = $period->getFinishesAt();
                            }
                            $pointing->save();

                            ++$this->inserted;
                        }
                    }
                });
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }
        $ps->fillNoInOrNoOutEntries();
        $ps->addAbsenceDays($hdor);

    }
}
