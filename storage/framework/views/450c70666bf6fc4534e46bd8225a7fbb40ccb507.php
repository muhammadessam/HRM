<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.users.title'); ?></h3>
    <a class="btn btn-success" role="button" href="<?php echo e(route('admin.users.pointings.index', $user->id)); ?>">
        <?php echo app('translator')->getFromJson('quickadmin.pointings.title'); ?>
    </a>
    <a class="btn btn-success" role="button" href="<?php echo e(route('admin.users.usedVacations.index', $user->id)); ?>">
        <?php echo app('translator')->getFromJson('quickadmin.usedVacations.title'); ?>
    </a>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?>
        </div>

        <div class="panel-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#basic" data-toggle="tab"
                           aria-expanded="true"><?php echo app('translator')->getFromJson('quickadmin.users.infos.basic'); ?></a>
                    </li>
                    <li>
                        <a href="#skills" data-toggle="tab"
                           aria-expanded="true"><?php echo app('translator')->getFromJson('quickadmin.users.infos.skills'); ?></a>
                    </li>
                    <li>
                        <a href="#hiring" data-toggle="tab"
                           aria-expanded="true"><?php echo app('translator')->getFromJson('quickadmin.users.infos.hiring'); ?></a>
                    </li>
                    <li>
                        <a href="#contract" data-toggle="tab"
                           aria-expanded="true"><?php echo app('translator')->getFromJson('quickadmin.users.infos.contract'); ?></a>
                    </li>
                    <li>
                        <a href="#attachment" data-toggle="tab"
                           aria-expanded="true"><?php echo app('translator')->getFromJson('quickadmin.users.infos.attachments'); ?></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="basic">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.matriculate'); ?></th>
                                <td field-key='matriculate'><?php echo e($user->matriculate); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.name'); ?></th>
                                <td field-key='name'><?php echo e($user->name); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.identity-number'); ?></th>
                                <td field-key='identity_number'><?php echo e($user->identity_number); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.birth-date-h'); ?></th>
                                <td field-key='birth_date_h'><?php echo e($user->birth_date_h); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.birth-date-m'); ?></th>
                                <td field-key='birth_date_m'><?php echo e($user->birth_date_m); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.sex'); ?></th>
                                <td field-key='sex'><?php echo app('translator')->getFromJson('quickadmin.users.sex.' . $user->sex); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.situation'); ?></th>
                                <td field-key='situation'><?php echo e($user->situation); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.nationality'); ?></th>
                                <td field-key='nationality'><?php echo e($user->nationality); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.address'); ?></th>
                                <td field-key='address'><?php echo e($user->address); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.phone'); ?></th>
                                <td field-key='phone'><?php echo e($user->phone); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.email'); ?></th>
                                <td field-key='email'><?php echo e($user->email); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.role'); ?></th>
                                <td field-key='role'><?php echo e($user->role->name); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane" id="skills">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.degrees.fields.title'); ?></th>
                                <td field-key='degree'><?php echo e($user->degree->name ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.specialties.fields.title'); ?></th>
                                <td field-key='specialty'><?php echo e($user->specialty->name ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.courses.title'); ?></th>
                                <td field-key='courses'><?php echo e($user->coursesStr); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.experiences.title'); ?></th>
                                <td field-key='experieces'><?php echo e($user->experiencesStr); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane" id="hiring">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.hire-date'); ?></th>
                                <td field-key='hire_date'><?php echo e($user->hire_date); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.salary'); ?></th>
                                <td field-key='salary'><?php echo e($user->salary); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.departments.fields.title'); ?></th>
                                <td field-key='departement'><?php echo e($user->department->name ?? ''); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.deservedVacations.title'); ?></th>
                                <td field-key='deservedVacations'><?php echo e($user->deservedVacationsStr); ?></td>
                            </tr>
                            <?php if($user->is_working): ?>
                                <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.remainingVacations.title'); ?></th>
                                <td field-key='usedVacations'>
                                    <table class="table table-bordered table-striped">
                                        <?php $__currentLoopData = $user->remainingDeservedVacations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remainingDeservedVacation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th><?php echo e($remainingDeservedVacation['vacation']->name); ?></th>
                                                <td field-key='vacation<?php echo e($loop->index); ?>'><?php echo e($remainingDeservedVacation['remaining']); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th>اجازة سنوية</th>
                                            <td field-key='vacation-1'><?php echo e($user->remainingDaysUntilThisMonth); ?></td>
                                        </tr>
                                    </table>
                                </td>
                                </tr>
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('quickadmin.vacation.remainingDaysUntilThisMonth'); ?></th>
                                    <td field-key='remainingDaysUntilThisMonth'><?php echo e($user->remainingDaysUntilThisMonth); ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.working-periods.title'); ?></th>
                                <td field-key='workingPeriods'><?php echo e($user->workingPeriodsStr); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.aids.title'); ?></th>
                                <td field-key='aids'><?php echo e($user->aidsStr); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.restDays.title'); ?></th>
                                <td field-key='restDays'><?php echo e($user->restDaysStr); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane" id="contract">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.hire-end'); ?></th>
                                <td field-key='hire_end'><?php echo e($user->hire_end); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.end-reason'); ?></th>
                                <td field-key='end_reason'><?php echo e($user->end_reason); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane" id="attachment">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th><?php echo app('translator')->getFromJson('quickadmin.attachments.fields.name'); ?></th>
                                <th><?php echo app('translator')->getFromJson('quickadmin.qa_download'); ?></th>
                            </tr>
                            <?php $__currentLoopData = $user->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($attachment->name); ?></td>
                                    <td>
                                        <a href="<?php echo e($attachment->link); ?>" class="btn btn-success" role="button" target="_blank"><?php echo app('translator')->getFromJson('quickadmin.qa_download'); ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                </div>
            </div>

            <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('quickadmin.qa_back_to_list'); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##

    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/moment-with-locales.min.js')); ?>"></script>
    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js')); ?>"></script>
    
    <script>
        $(function () {
            moment.updateLocale('<?php echo e(App::getLocale()); ?>', {
                week: {dow: 1} // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "<?php echo e(config('app.date_format_moment')); ?>",
                locale: "<?php echo e(App::getLocale()); ?>",
            });

        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/users/show.blade.php ENDPATH**/ ?>