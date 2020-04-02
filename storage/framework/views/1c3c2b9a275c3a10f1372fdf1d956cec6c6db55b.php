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
    </style>
    <div class="row">
        <div class="col-lg-4">
        <div class="card gradient-1">
                                <div class="card-body">
                                    <h3 class="card-title text-white">الموظفين</h3>
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
    </div>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ensraf\resources\views/home.blade.php ENDPATH**/ ?>