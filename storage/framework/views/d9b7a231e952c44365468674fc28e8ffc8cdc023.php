<?php $__env->startSection('content'); ?>
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
   <?php if(auth()->user()->hasRole(4)): ?>
       <div class="emp_section">
           <h3><?php echo e($my_user->name); ?></h3>
           <h5>الاقسام</h5>
           <ul class="list-group">
               <?php $__currentLoopData = $my_user->departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li class="list-group-item"><?php echo e($dep->name); ?></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
               <?php $__currentLoopData = $my_user->vacationRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <tr>
                       <td><?php echo e(\App\Vacation::find($item->vac_id)->name); ?></td>
                       <td><?php echo e($item->status); ?></td>
                   </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
           </table>
           <h5>الاجازات المتاحة</h5>
           <ul class="list-group">
               <?php $cc = 0 ?>
               <?php if($my_user->usedVacations->count() > 0): ?>
                   <?php $__currentLoopData = $my_user->usedVacations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php $__currentLoopData = $my_user->deservedVacations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($vac->vacation_id != $item->pivot->vacation_id): ?>
                           <li class="list-group-item">
                               <?php echo e($item->name); ?>

                               <form method="post" action="<?php echo e(route('admin.make_vac_request')); ?>">
                                   <?php echo csrf_field(); ?>
                                   <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                                   <input type="hidden" name="vac_id" value="<?php echo e($item->pivot->vacation_id); ?>">
                                   <button type="submit" class="btn btn-success">طلب اجازة</button>
                               </form>
                           </li>
                           <?php endif; ?>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php else: ?>
                   <?php $__currentLoopData = $my_user->deservedVacations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <li class="list-group-item">
                           <?php echo e($item->name); ?>

                           <form method="post" action="<?php echo e(route('admin.make_vac_request')); ?>">
                               <?php echo csrf_field(); ?>
                               <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                               <input type="hidden" name="vac_id" value="<?php echo e($item->pivot->vacation_id); ?>">
                               <button type="submit" class="btn btn-success">طلب اجازة</button>
                           </form>
                       </li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>
           </ul>
           <h5>الاجازات المستخدمة</h5>
           <ul class="list-group">
               <?php $__currentLoopData = $my_user->usedVacations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li class="list-group-item"><?php echo e($item->vacation->name); ?></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </ul>
           <h5>فترات العمل</h5>
           <ul class="list-group">
               <?php $__currentLoopData = $my_user->workingPeriods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li class="list-group-item"><?php echo e($item->name); ?></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </ul>
           <h5> ايام الراحة</h5>
           <ul class="list-group">
               <?php $__currentLoopData = $my_user->restDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li class="list-group-item"><?php echo e($item->getDayNameAttribute()); ?></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                   <?php $__currentLoopData = $my_user->pointings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                           <td><?php echo e($item->day); ?></td>
                           <td><?php echo e($item->supposed_in); ?></td>
                           <td><?php echo e($item->supposed_out); ?></td>
                       </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </tbody>
               </table>
           </div>

       </div>
   <?php endif; ?>
    <?php if(auth()->user()->hasRole(1)): ?>
    <div class="row">
        <div class="col-lg-4">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">الموظفين</h3>
                <div class="d-inline-block">
                    <h2 class="text-white"><?php echo e($employeeCount); ?></h2>
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
                        <h2 class="text-white"><?php echo e($absentUsers->count()); ?></h2>
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
                    <h2 class="text-white"><?php echo e($vacatedUsers->count()); ?></h2>
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
                        <h2 class="text-white"><?php echo e($attendance_ratio); ?>%</h2>
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
                        <h2 class="text-white"><?php echo e($presents->count()); ?></h2>
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
                        <h2 class="text-white"><?php echo e($lateUsers->count()); ?></h2>
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
                <?php $__currentLoopData = $vac_reqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($vac->status == "pending"): ?>
                    <tr>
                        <td><?php echo e($vac->user->name); ?></td>
                        <td><?php echo e($vac->vacation->name); ?></td>
                        <td>
                            <form method="post" action="<?php echo e(route('admin.accept_vac_request')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="user_id" value="<?php echo e($vac->user_id); ?>">
                                <input type="hidden" name="vac_id" value="<?php echo e($vac->vac_id); ?>">
                                <input type="hidden" name="id" value="<?php echo e($vac->id); ?>">
                                <button type="submit" class="btn btn-success">قبول</button>
                            </form>
                            <form method="post" action="<?php echo e(route('admin.refuse_vac_request')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="user_id" value="<?php echo e($vac->user_id); ?>">
                                <input type="hidden" name="vac_id" value="<?php echo e($vac->vac_id); ?>">
                                <input type="hidden" name="id" value="<?php echo e($vac->id); ?>">
                                <button type="submit" class="btn btn-warning">رفض</button>
                            </form>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
    <div class="row">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("dashboard_absent_users")): ?>
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('quickadmin.absent_users'); ?></div>

                <div class="panel-body">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.departments.fields.title'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.needed_working_hours'); ?></th>
                         
                        </tr>
                        </thead>

                        <tbody>
                        <?php if($absentUsers->count() > 0): ?>
                            <?php $__currentLoopData = $absentUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pointing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php if( auth()->user()->hasRole(1)): ?>
                                <tr data-entry-id="<?php echo e($pointing->id); ?>">
                                    <td field-key='day'><?php echo e($pointing->user->name); ?></td>
                                    <td field-key='department'><?php echo e($pointing->user->department ? $pointing->user->department->name : ''); ?></td>
                                    <td field-key='needed_working_hours'><?php echo e($pointing->needed_working_hours); ?></td>
                              
                                </tr>
                                <?php elseif(in_array($pointing->user->department->id,$all_dept)): ?>
                                <tr data-entry-id="<?php echo e($pointing->id); ?>">
                                    <td field-key='day'><?php echo e($pointing->user->name); ?></td>
                                    <td field-key='department'><?php echo e($pointing->user->department ? $pointing->user->department->name : ''); ?></td>
                                    <td field-key='needed_working_hours'><?php echo e($pointing->needed_working_hours); ?></td>
                              
                                </tr>
                                <?php endif; ?>
                                
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="15"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("dashboard_late_users")): ?>
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('quickadmin.late_users'); ?></div>

                <div class="panel-body">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.departments.fields.title'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.supposed_in'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.in'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.in_latency'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.in_plus'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.supposed_out'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.out'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.out_latency'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.out_plus'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.latency_sum'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.plus_sum'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.effective_working_hours'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.needed_working_hours'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.diff_working_hours'); ?></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php if($lateUsers->count() > 0): ?>
                            <?php $__currentLoopData = $lateUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pointing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php if( auth()->user()->hasRole(1)): ?>
                                <tr data-entry-id="<?php echo e($pointing->id); ?>">
                                    <td field-key='day'><?php echo e($pointing->user->name); ?> <?php echo e($pointing->user->department->id); ?></td>
                                    <td field-key='department'><?php echo e($pointing->user->department ? $pointing->user->department->name : ''); ?></td>
                                    <td field-key='supposed_in'><?php echo e($pointing->supposed_in); ?></td>
                                    <td field-key='in'><?php echo e($pointing->in); ?></td>
                                    <td field-key='in_latency'><?php echo e($pointing->in_latency); ?></td>
                                    <td field-key='in_plus'><?php echo e($pointing->in_plus); ?></td>
                                    <td field-key='supposed_out'><?php echo e($pointing->supposed_out); ?></td>
                                    <td field-key='out'><?php echo e($pointing->out); ?></td>
                                    <td field-key='out_latency'><?php echo e($pointing->out_latency); ?></td>
                                    <td field-key='out_plus'><?php echo e($pointing->out_plus); ?></td>
                                    <td field-key='latency_sum'><?php echo e($pointing->latency_sum); ?></td>
                                    <td field-key='plus_sum'><?php echo e($pointing->plus_sum); ?></td>
                                    <td field-key='effective_working_hours'><?php echo e($pointing->effective_working_hours); ?></td>
                                    <td field-key='needed_working_hours'><?php echo e($pointing->needed_working_hours); ?></td>
                                    <td field-key='diff_working_hours'><?php echo e($pointing->diff_working_hours); ?></td>
                                </tr>
                                <?php elseif(in_array($pointing->user->department->id,$all_dept)): ?>
                                      <tr data-entry-id="<?php echo e($pointing->id); ?>">
                                    <td field-key='day'><?php echo e($pointing->user->name); ?></td>
                                    <td field-key='department'><?php echo e($pointing->user->department ? $pointing->user->department->name : ''); ?></td>
                                    <td field-key='supposed_in'><?php echo e($pointing->supposed_in); ?></td>
                                    <td field-key='in'><?php echo e($pointing->in); ?></td>
                                    <td field-key='in_latency'><?php echo e($pointing->in_latency); ?></td>
                                    <td field-key='in_plus'><?php echo e($pointing->in_plus); ?></td>
                                    <td field-key='supposed_out'><?php echo e($pointing->supposed_out); ?></td>
                                    <td field-key='out'><?php echo e($pointing->out); ?></td>
                                    <td field-key='out_latency'><?php echo e($pointing->out_latency); ?></td>
                                    <td field-key='out_plus'><?php echo e($pointing->out_plus); ?></td>
                                    <td field-key='latency_sum'><?php echo e($pointing->latency_sum); ?></td>
                                    <td field-key='plus_sum'><?php echo e($pointing->plus_sum); ?></td>
                                    <td field-key='effective_working_hours'><?php echo e($pointing->effective_working_hours); ?></td>
                                    <td field-key='needed_working_hours'><?php echo e($pointing->needed_working_hours); ?></td>
                                    <td field-key='diff_working_hours'><?php echo e($pointing->diff_working_hours); ?></td>
                                </tr>
                                <?php endif; ?>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="15"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("dashboard_vacated_users")): ?>
            <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('quickadmin.vacated_users'); ?></div>

                <div class="panel-body">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.matriculate'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.departments.fields.title'); ?></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php if(count($vacatedUsers) > 0): ?>
                            <?php $__currentLoopData = $vacatedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php if( auth()->user()->hasRole(1)): ?>
                                <tr data-entry-id="<?php echo e($user->id); ?>">
                                    <td field-key='matriculate'><?php echo e($user->matriculate); ?></td>
                                    <td field-key='name'><?php echo e($user->name); ?></td>
                                    <td field-key='department'><?php echo e($user->department ? $user->department->name : '-'); ?></td>
                                </tr>
                                <?php elseif(in_array($user->department->id,$all_dept)): ?>
                                <tr data-entry-id="<?php echo e($user->id); ?>">
                                    <td field-key='matriculate'><?php echo e($user->matriculate); ?></td>
                                    <td field-key='name'><?php echo e($user->name); ?></td>
                                    <td field-key='department'><?php echo e($user->department ? $user->department->name : '-'); ?></td>
                                </tr>
                                <?php endif; ?>


                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("dashboard_next_aids")): ?>
            <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('quickadmin.upcoming_aids'); ?></div>

                <div class="panel-body">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.aids.fields.name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.aids.fields.starts_at'); ?></th>
                            <th><?php echo app('translator')->getFromJson('quickadmin.aids.fields.ends_at'); ?></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php if(count($upcomingAids) > 0): ?>
                            <?php $__currentLoopData = $upcomingAids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr data-entry-id="<?php echo e($aid->id); ?>">
                                    <td field-key='name'><?php echo e($aid->name); ?></td>
                                    <td field-key='starts_at'><?php echo e($aid->starts_at); ?></td>
                                    <td field-key='ends_at'><?php echo e($aid->ends_at); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/home.blade.php ENDPATH**/ ?>