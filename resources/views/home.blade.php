@extends('layouts.app')

@section('content')
    <style>
   .card {
        margin-bottom: 30px;
        border: 0px;
        border-radius: 0.625rem;
        box-shadow: 6px 11px 41px -28px #a99de7;
    } 

    .gradient-1 {
        color: #fff !important;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }

    .gradient-1, .dropdown-mega-menu .ext-link.link-1 a, .morris-hover, .datamaps-hoverover {
        background-image: linear-gradient(230deg, #759bff, #843cf6);
    }

    .card .card-body {
        padding: 1.88rem 1.81rem;
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1.25rem;
    }

    .card-title {
        font-size: 18px;
        font-weight: 500;
        line-height: 18px;
    }

    .d-inline-block {
          display: inline-block !important;
    }

    .opacity-5 {
        opacity: 0.5;
    }

    .display-5 {
         font-size: 3rem;
    }

    .float-left {
        float: left !important;
    }
    .list-group-item{
        width: 20%;
        margin: 8px;
        height: 50px;
    }
    .list-group-item form{
        width: fit-content;
        float: left;
    }
   .emp_section{
       width: 90%;
       margin: 0 auto;
       padding: 1%;
       font-family: adobe-arabic;
       font-size: 15px;
       font-weight: 600;
       letter-spacing: 1.3px;
       color: #4c4c4c;
   }
    .emp_section h3{
        margin: 20px 0 20px 20px;
        font-family: adobe-arabic;
        font-size: 30px;
        font-weight: 700;
        letter-spacing: 1.5px;
    }
   .emp_table{
       width: 60%;
       margin: 0 auto;
       background-color: #235e80;
       color: white;
       border: 2px solid black;
   }
    .work_table{
        max-height: 500px;
        overflow-y: auto;
        width: 60%;
        margin: 0 auto;
    }
    </style>
   @if(auth()->user()->hasRole(4))
       <div class="emp_section">
           <h3>{{$my_user->name}}</h3>
           <h5>الاقسام</h5>
           <ul class="list-group">
               @foreach($my_user->departments as $dep)
                   <li class="list-group-item">{{$dep->name}}</li>
               @endforeach
           </ul>
           <h5> طلبات الاجازة </h5>
           <table class="table emp_table">
               <thead class="thead-dark">
               <tr>
                   <th scope="col">نوع الاجازة</th>
                   <th scope="col">الحالة</th>
               </tr>
               </thead>
               <tbody>
               @foreach($my_user->vacationRequests as $item)
                   <tr>
                       <td>{{\App\Vacation::find($item->vac_id)->name}}</td>
                       <td>{{$item->status}}</td>
                   </tr>
               @endforeach
               </tbody>
           </table>
           <h5>الاجازات المتاحة</h5>
           <ul class="list-group">
               <?php $cc = 0 ?>
               @if($my_user->usedVacations->count() > 0)
                   @foreach($my_user->usedVacations as $vac)
                       @foreach($my_user->deservedVacations as $item)
                           @if($vac->vacation_id != $item->pivot->vacation_id)
                           <li class="list-group-item">
                               {{$item->name}}
                               <form method="post" action="{{route('admin.make_vac_request')}}">
                                   @csrf
                                   <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                   <input type="hidden" name="vac_id" value="{{$item->pivot->vacation_id}}">
                                   <button type="submit" class="btn btn-success">طلب اجازة</button>
                               </form>
                           </li>
                           @endif
                       @endforeach
                    @endforeach
               @else
                   @foreach($my_user->deservedVacations as $item)
                       <li class="list-group-item">
                           {{$item->name}}
                           <form method="post" action="{{route('admin.make_vac_request')}}">
                               @csrf
                               <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                               <input type="hidden" name="vac_id" value="{{$item->pivot->vacation_id}}">
                               <button type="submit" class="btn btn-success">طلب اجازة</button>
                           </form>
                       </li>
                   @endforeach
               @endif
           </ul>
           <h5>الاجازات المستخدمة</h5>
           <ul class="list-group">
               @foreach($my_user->usedVacations as $item)
                   <li class="list-group-item">{{$item->vacation->name}}</li>
               @endforeach
           </ul>
           <h5>فترات العمل</h5>
           <ul class="list-group">
               @foreach($my_user->workingPeriods as $item)
                   <li class="list-group-item">{{$item->name}}</li>
               @endforeach
           </ul>
           <h5> ايام الراحة</h5>
           <ul class="list-group">
               @foreach($my_user->restDays as $item)
                   <li class="list-group-item">{{$item->getDayNameAttribute()}}</li>
               @endforeach
           </ul>
           <h5> ايام العمل </h5>
           <div class="work_table">
               <table class="table emp_table" style="width: 100%;">
                   <thead>
                   <tr>
                       <th scope="col">التاريخ</th>
                       <th scope="col">الحضور</th>
                       <th scope="col">الانصراف</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($my_user->pointings as $item)
                       <tr>
                           <td>{{$item->day}}</td>
                           <td>{{$item->supposed_in}}</td>
                           <td>{{$item->supposed_out}}</td>
                       </tr>
                   @endforeach
                   </tbody>
               </table>
           </div>

       </div>
   @endif
    @if(auth()->user()->hasRole(1))
    <div class="row">
        <div class="col-lg-4">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">الموظفين</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$employeeCount}}</h2>
                </div>
                <span class="float-left display-5 opacity-5">
                <i class="fa fa-users" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        </div>
        <div class="col-lg-4">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">الموظفين الغائبين</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{$absentUsers->count()}}</h2>
                    </div>
                    <span class="float-left display-5 opacity-5">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">الموظفين المجازين</h3>
                    <div class="d-inline-block">
                    <h2 class="text-white">{{$vacatedUsers->count()}}</h2>
                    </div>
                    <span class="float-left display-5 opacity-5">
                    <i class="fa fa-user-times" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">الغياب اليومي</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{$attendance_ratio}}%</h2>
                    </div>
                    <span class="float-left display-5 opacity-5">
                        <i class="fa fa-building" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">الموظفين الحاضرين</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{$presents->count()}}</h2>
                    </div>
                    <span class="float-left display-5 opacity-5">
                        <i class="fa fa-building" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">الموظفون المتأخرون </h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{$lateUsers->count()}}</h2>
                    </div>
                    <span class="float-left display-5 opacity-5">
                        <i class="fa fa-building" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="vaction-reqs">
        <h3>طلبات الاجازة</h3>
        <table class="table">
            <thead>
                <th class="col">اسم الموظف</th>
                <th class="col">نوع الاجازو </th>
                <th class="col">الاستجابة</th>
            </thead>
            <tbody>
                @foreach($vac_reqs as $vac)
                    @if($vac->status == "pending")
                    <tr>
                        <td>{{$vac->user->name}}</td>
                        <td>{{$vac->vacation->name}}</td>
                        <td>
                            <form method="post" action="{{route('admin.accept_vac_request')}}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$vac->user_id}}">
                                <input type="hidden" name="vac_id" value="{{$vac->vac_id}}">
                                <input type="hidden" name="id" value="{{$vac->id}}">
                                <button type="submit" class="btn btn-success">قبول</button>
                            </form>
                            <form method="post" action="{{route('admin.refuse_vac_request')}}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$vac->user_id}}">
                                <input type="hidden" name="vac_id" value="{{$vac->vac_id}}">
                                <input type="hidden" name="id" value="{{$vac->id}}">
                                <button type="submit" class="btn btn-warning">رفض</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    <div class="row">
        @can("dashboard_absent_users")
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.absent_users')</div>

                <div class="panel-body">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <th>@lang('quickadmin.departments.fields.title')</th>
                            <th>@lang('quickadmin.pointings.fields.needed_working_hours')</th>
                         
                        </tr>
                        </thead>

                        <tbody>
                        @if ($absentUsers->count() > 0)
                            @foreach ($absentUsers as $pointing)
                                {{-- @if (auth()->user()->departmentUsers()->contains(function($user, $key) use($pointing) {
                                    return $user->id === $pointing->user->id;
                                })) --}}
                                @if( auth()->user()->hasRole(1))
                                <tr data-entry-id="{{ $pointing->id }}">
                                    <td field-key='day'>{{ $pointing->user->name }}</td>
                                    <td field-key='department'>{{ $pointing->user->department ? $pointing->user->department->name : '' }}</td>
                                    <td field-key='needed_working_hours'>{{ $pointing->needed_working_hours }}</td>
                              
                                </tr>
                                @elseif(in_array($pointing->user->department->id,$all_dept))
                                <tr data-entry-id="{{ $pointing->id }}">
                                    <td field-key='day'>{{ $pointing->user->name }}</td>
                                    <td field-key='department'>{{ $pointing->user->department ? $pointing->user->department->name : '' }}</td>
                                    <td field-key='needed_working_hours'>{{ $pointing->needed_working_hours }}</td>
                              
                                </tr>
                                @endif
                                {{-- @if( auth()->user()->hasRole(1) || auth()->user()->department_id==$pointing->user->department->id)
                                    
                                @endif --}}
                                {{-- @endif --}}
                            @endforeach
                        @else
                            <tr>
                                <td colspan="15">@lang('quickadmin.qa_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endcan
        @can("dashboard_late_users")
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.late_users')</div>

                <div class="panel-body">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <th>@lang('quickadmin.departments.fields.title')</th>
                            <th>@lang('quickadmin.pointings.fields.supposed_in')</th>
                            <th>@lang('quickadmin.pointings.fields.in')</th>
                            <th>@lang('quickadmin.pointings.fields.in_latency')</th>
                            <th>@lang('quickadmin.pointings.fields.in_plus')</th>
                            <th>@lang('quickadmin.pointings.fields.supposed_out')</th>
                            <th>@lang('quickadmin.pointings.fields.out')</th>
                            <th>@lang('quickadmin.pointings.fields.out_latency')</th>
                            <th>@lang('quickadmin.pointings.fields.out_plus')</th>
                            <th>@lang('quickadmin.pointings.fields.latency_sum')</th>
                            <th>@lang('quickadmin.pointings.fields.plus_sum')</th>
                            <th>@lang('quickadmin.pointings.fields.effective_working_hours')</th>
                            <th>@lang('quickadmin.pointings.fields.needed_working_hours')</th>
                            <th>@lang('quickadmin.pointings.fields.diff_working_hours')</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if ($lateUsers->count() > 0)
                            @foreach ($lateUsers as $pointing)
                                {{-- @if (auth()->user()->departmentUsers()->contains(function($user, $key) use($pointing) {
                                    return $user->id === $pointing->user->id;
                                })) --}}
                                @if( auth()->user()->hasRole(1))
                                <tr data-entry-id="{{ $pointing->id }}">
                                    <td field-key='day'>{{ $pointing->user->name }} {{$pointing->user->department->id}}</td>
                                    <td field-key='department'>{{ $pointing->user->department ? $pointing->user->department->name : '' }}</td>
                                    <td field-key='supposed_in'>{{ $pointing->supposed_in }}</td>
                                    <td field-key='in'>{{ $pointing->in }}</td>
                                    <td field-key='in_latency'>{{ $pointing->in_latency }}</td>
                                    <td field-key='in_plus'>{{ $pointing->in_plus }}</td>
                                    <td field-key='supposed_out'>{{ $pointing->supposed_out }}</td>
                                    <td field-key='out'>{{ $pointing->out }}</td>
                                    <td field-key='out_latency'>{{ $pointing->out_latency }}</td>
                                    <td field-key='out_plus'>{{ $pointing->out_plus }}</td>
                                    <td field-key='latency_sum'>{{ $pointing->latency_sum }}</td>
                                    <td field-key='plus_sum'>{{ $pointing->plus_sum }}</td>
                                    <td field-key='effective_working_hours'>{{ $pointing->effective_working_hours }}</td>
                                    <td field-key='needed_working_hours'>{{ $pointing->needed_working_hours }}</td>
                                    <td field-key='diff_working_hours'>{{ $pointing->diff_working_hours }}</td>
                                </tr>
                                @elseif(in_array($pointing->user->department->id,$all_dept))
                                      <tr data-entry-id="{{ $pointing->id }}">
                                    <td field-key='day'>{{ $pointing->user->name }}</td>
                                    <td field-key='department'>{{ $pointing->user->department ? $pointing->user->department->name : '' }}</td>
                                    <td field-key='supposed_in'>{{ $pointing->supposed_in }}</td>
                                    <td field-key='in'>{{ $pointing->in }}</td>
                                    <td field-key='in_latency'>{{ $pointing->in_latency }}</td>
                                    <td field-key='in_plus'>{{ $pointing->in_plus }}</td>
                                    <td field-key='supposed_out'>{{ $pointing->supposed_out }}</td>
                                    <td field-key='out'>{{ $pointing->out }}</td>
                                    <td field-key='out_latency'>{{ $pointing->out_latency }}</td>
                                    <td field-key='out_plus'>{{ $pointing->out_plus }}</td>
                                    <td field-key='latency_sum'>{{ $pointing->latency_sum }}</td>
                                    <td field-key='plus_sum'>{{ $pointing->plus_sum }}</td>
                                    <td field-key='effective_working_hours'>{{ $pointing->effective_working_hours }}</td>
                                    <td field-key='needed_working_hours'>{{ $pointing->needed_working_hours }}</td>
                                    <td field-key='diff_working_hours'>{{ $pointing->diff_working_hours }}</td>
                                </tr>
                                @endif
                                {{-- @endif --}}
                            @endforeach
                        @else
                            <tr>
                                <td colspan="15">@lang('quickadmin.qa_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endcan
        @can("dashboard_vacated_users")
            <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.vacated_users')</div>

                <div class="panel-body">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>@lang('quickadmin.users.fields.matriculate')</th>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <th>@lang('quickadmin.departments.fields.title')</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if (count($vacatedUsers) > 0)
                            @foreach ($vacatedUsers as $user)
                                {{-- @if (auth()->user()->departmentUsers()->contains(function($user, $key) use($pointing) {
                                    return $user->id === $pointing->user->id;
                                })) --}}
                                @if( auth()->user()->hasRole(1))
                                <tr data-entry-id="{{ $user->id }}">
                                    <td field-key='matriculate'>{{ $user->matriculate }}</td>
                                    <td field-key='name'>{{ $user->name }}</td>
                                    <td field-key='department'>{{ $user->department ? $user->department->name : '-' }}</td>
                                </tr>
                                @elseif(in_array($user->department->id,$all_dept))
                                <tr data-entry-id="{{ $user->id }}">
                                    <td field-key='matriculate'>{{ $user->matriculate }}</td>
                                    <td field-key='name'>{{ $user->name }}</td>
                                    <td field-key='department'>{{ $user->department ? $user->department->name : '-' }}</td>
                                </tr>
                                @endif


                                {{-- @endif --}}
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">@lang('quickadmin.qa_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endcan
        @can("dashboard_next_aids")
            <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.upcoming_aids')</div>

                <div class="panel-body">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>@lang('quickadmin.aids.fields.name')</th>
                            <th>@lang('quickadmin.aids.fields.starts_at')</th>
                            <th>@lang('quickadmin.aids.fields.ends_at')</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if (count($upcomingAids) > 0)
                            @foreach ($upcomingAids as $aid)

                                <tr data-entry-id="{{ $aid->id }}">
                                    <td field-key='name'>{{ $aid->name }}</td>
                                    <td field-key='starts_at'>{{ $aid->starts_at }}</td>
                                    <td field-key='ends_at'>{{ $aid->ends_at }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">@lang('quickadmin.qa_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endcan
    </div>
@endsection
