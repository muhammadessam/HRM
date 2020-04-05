<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>

    <?php if(auth()->id() !== $user->id): ?>
        <?php $__env->startComponent('admin.usedVacations.user', ['user' => $user]); ?><?php echo $__env->renderComponent(); ?>
    <?php endif; ?>

    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.usedVacations.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usedVacation_create')): ?>
    <p>
        <a href="<?php echo e(route('admin.users.usedVacations.create', [$user->id])); ?>" class="btn btn-success">
            <?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?>
        </a>
    </p>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usedVacation_delete')): ?>
    <p>
        <ul class="list-inline">
            <li><a href="<?php echo e(route('admin.users.usedVacations.index', [$user->id])); ?>" style="<?php echo e(request('show_deleted') == 1 ? '' : 'font-weight: 700'); ?>"><?php echo app('translator')->getFromJson('quickadmin.qa_all'); ?></a></li> |
            <li><a href="<?php echo e(route('admin.users.usedVacations.index', [$user->id])); ?>?show_deleted=1" style="<?php echo e(request('show_deleted') == 1 ? 'font-weight: 700' : ''); ?>"><?php echo app('translator')->getFromJson('quickadmin.qa_trash'); ?></a></li>
        </ul>
    </p>
    <?php endif; ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($usedVacations) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usedVacation_delete')): ?> <?php if( request('show_deleted') != 1 ): ?> dt-select <?php endif; ?> <?php endif; ?>" id="dt">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usedVacation_delete')): ?>
                            <?php if( request('show_deleted') != 1 ): ?><th style="text-align:center;"><input type="checkbox" id="select-all" /></th><?php endif; ?>
                        <?php endif; ?>

                        <th><?php echo app('translator')->getFromJson('quickadmin.vacation.fields.title'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.usedVacations.fields.starts_at'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.usedVacations.fields.ends_at'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.usedVacations.fields.days'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.usedVacations.fields.note'); ?></th>
                        <?php if( request('show_deleted') == 1 ): ?>
                        <th>&nbsp;</th>
                        <?php else: ?>
                        <th>&nbsp;</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($usedVacations) > 0): ?>
                        <?php $__currentLoopData = $usedVacations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usedVacation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($usedVacation->id); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usedVacation_delete')): ?>
                                    <?php if( request('show_deleted') != 1 ): ?><td></td><?php endif; ?>
                                <?php endif; ?>

                                <td field-key='name'><?php echo e($usedVacation->vacation->name); ?></td>
                                <td field-key='starts_at'><?php echo e($usedVacation->starts_at); ?></td>
                                <td field-key='ends_at'><?php echo e($usedVacation->ends_at); ?></td>
                                <td field-key='days'><?php echo e($usedVacation->days); ?></td>
                                <td field-key='days'><?php echo e($usedVacation->note); ?></td>
                                <?php if( request('show_deleted') == 1 ): ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usedVacation_delete')): ?>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.usedVacations.restore', $user->id, $usedVacation->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')); ?>

                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usedVacation_delete')): ?>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.usedVacations.perma_del', $user->id, $usedVacation->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                                </td>
                                <?php else: ?>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usedVacation_edit')): ?>
                                    <a href="<?php echo e(route('admin.users.usedVacations.edit', [$user->id, $usedVacation->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usedVacation_delete')): ?>
<?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.usedVacations.destroy', $user->id, $usedVacation->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="11"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usedVacation_delete')): ?>
            <?php if( request('show_deleted') != 1 ): ?> window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.users.usedVacations.mass_destroy', $user->id)); ?>'; <?php endif; ?>
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/usedVacations/index.blade.php ENDPATH**/ ?>