<?php $__env->startSection('content'); ?>
<?php
$ps = \App\Position::all();
 ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.users.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.users.store'], 'files' => true]); ?>


    <div class="panel panel-default">
        <div class="panel-heading hos-info" style="font-size:20px;color:#000;">
            <?php echo app('translator')->getFromJson('quickadmin.qa_create'); ?>
        </div>

        <div class="panel-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active" style="width:15%;">
                      <center>
                        <a href="#basic" data-toggle="tab"
                           aria-expanded="true" style="font-size:20px;color:#000;">
                           <?php echo app('translator')->getFromJson('quickadmin.users.infos.basic'); ?>
                         </a>
                       </center>
                    </li>
                    <li style="width:15%;">
                      <center>
                        <a href="#skills" data-toggle="tab" style="font-size:20px;color:#000;"
                           aria-expanded="true"><?php echo app('translator')->getFromJson('quickadmin.users.infos.skills'); ?></a>
                      </center>
                    </li>
                    <li style="width:15%;">
                      <center>
                        <a href="#hiring" data-toggle="tab" style="font-size:20px;color:#000;"
                           aria-expanded="true"><?php echo app('translator')->getFromJson('quickadmin.users.infos.hiring'); ?></a>
                           </center>
                    </li>
                    <li style="width:15%;">
                      <center>
                        <a href="#contract" data-toggle="tab" style="font-size:20px;color:#000;"
                           aria-expanded="true"><?php echo app('translator')->getFromJson('quickadmin.users.infos.contract'); ?></a>
                           </center>
                    </li>
                    <li style="width:15%;">
                      <center>
                        <a href="#attachment" data-toggle="tab" style="font-size:20px;color:#000;"
                           aria-expanded="true"><?php echo app('translator')->getFromJson('quickadmin.users.infos.attachments'); ?></a>
                           </center>
                    </li>
                    <li style="width:15%;">
                      <center>
                        <a href="#position" data-toggle="tab" style="font-size:20px;color:#000;"
                           aria-expanded="true">
                           <i class="fa fa-map-marker" aria-hidden="true"></i>
                           تحديد موقع العمل
                         </a>
                           </center>
                    </li>
                </ul>
                <hr>
                <div class="tab-content">
                    <div class="tab-pane active" id="basic">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('matriculate', trans('quickadmin.users.fields.matriculate').'*', ['class' => 'control-label']); ?>

                                <?php echo Form::text('matriculate', old('matriculate'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('matriculate')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('matriculate')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('name', trans('quickadmin.users.fields.name').'*', ['class' => 'control-label']); ?>

                                <?php echo Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('name')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('name')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('identity_number', trans('quickadmin.users.fields.identity-number').'*', ['class' => 'control-label']); ?>

                                <?php echo Form::text('identity_number', old('identity_number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('identity_number')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('identity_number')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('birth_date_m', trans('quickadmin.users.fields.birth-date-m').'', ['class' => 'control-label']); ?>

                                <?php echo Form::text('birth_date_m', old('birth_date_m'), ['class' => 'form-control date', 'placeholder' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('birth_date_m')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('birth_date_m')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('sex', trans('quickadmin.users.fields.sex').'*', ['class' => 'control-label']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('sex')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('sex')); ?>

                                    </p>
                                <?php endif; ?>
                                <div>
                                    <label>
                                        <?php echo Form::radio('sex', 'm', false, ['required' => '']); ?>

                                        Male
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <?php echo Form::radio('sex', 'f', false, ['required' => '']); ?>

                                        Female
                                    </label>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('situation', trans('quickadmin.users.fields.situation').'', ['class' => 'control-label']); ?>

                                <?php echo Form::text('situation', old('situation'), ['class' => 'form-control', 'placeholder' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('situation')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('situation')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('nationality', trans('quickadmin.users.fields.nationality').'', ['class' => 'control-label']); ?>

                                <?php echo Form::text('nationality', old('nationality'), ['class' => 'form-control', 'placeholder' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('nationality')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('nationality')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('address', trans('quickadmin.users.fields.address').'', ['class' => 'control-label']); ?>

                                <?php echo Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('address')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('address')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('phone', trans('quickadmin.users.fields.phone').'', ['class' => 'control-label']); ?>

                                <?php echo Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('phone')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('phone')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('email', trans('quickadmin.users.fields.email').'*', ['class' => 'control-label']); ?>

                                <?php echo Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('email')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('email')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('password', trans('quickadmin.users.fields.password').'*', ['class' => 'control-label']); ?>

                                <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('password')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('password')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('role_id', trans('quickadmin.users.fields.role').'*', ['class' => 'control-label']); ?>

                                <?php echo Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control select2', 'required' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('role_id')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('role_id')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="skills">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('degree_id', trans('quickadmin.degrees.fields.title').'*', ['class' => 'control-label']); ?>

                                <?php echo Form::select('degree_id', $degrees, old('degree_id'), ['class' => 'form-control select2', 'required' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('degree_id')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('degree_id')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('specialty_id', trans('quickadmin.specialties.fields.title').'*', ['class' => 'control-label']); ?>

                                <?php echo Form::select('specialty_id', $specialties, old('specialty_id'), ['class' => 'form-control select2', 'required' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('specialty_id')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('specialty_id')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo app('translator')->getFromJson('quickadmin.courses.title'); ?>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><?php echo app('translator')->getFromJson('quickadmin.courses.fields.name'); ?></th>

                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="courses">
                                    <?php $__currentLoopData = old('courses', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $__env->make('admin.users.courses_row', [
                                            'index' => $index
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <a href="#"
                                   class="btn hos-success pull-right add-new">
                                   <i class="fa fa-plus" aria-hidden="true"></i>
                                   <?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?>
                                 </a>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo app('translator')->getFromJson('quickadmin.experiences.title'); ?>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><?php echo app('translator')->getFromJson('quickadmin.experiences.fields.name'); ?></th>

                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="experiences">
                                    <?php $__currentLoopData = old('experiences', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $__env->make('admin.users.experiences_row', [
                                            'index' => $index
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <a href="#"
                                   class="btn hos-success pull-right add-new">
                                   <i class="fa fa-plus" aria-hidden="true"></i>
                                   <?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?>
                                 </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="hiring">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('hire_date', trans('quickadmin.users.fields.hire-date').'*', ['class' => 'control-label']); ?>

                                <?php echo Form::text('hire_date', old('hire_date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('hire_date')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('hire_date')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('salary', trans('quickadmin.users.fields.salary').'*', ['class' => 'control-label']); ?>

                                <?php echo Form::text('salary', old('salary'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('salary')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('salary')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('department_id', trans('quickadmin.departments.fields.title').'', ['class' => 'control-label']); ?>

                                <?php echo Form::select('department_id', $departments, old('department_id'), ['class' => 'form-control select2']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('department_id')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('department_id')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div style="" class="col-lg-6 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('vacation_id', trans('quickadmin.deservedVacations.title').'', ['class' => 'control-label']); ?>

                                <?php echo Form::select('vacation_id[]', $vacations, old('vacation_id[]'), ['class' => 'form-control select2', 'multiple' => 'multiple']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('vacation_id')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('vacation_id')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="contract">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('hire_end', trans('quickadmin.users.fields.hire-end'), ['class' => 'control-label']); ?>

                                <?php echo Form::text('hire_end', old('hire_end'), ['class' => 'form-control date', 'placeholder' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('hire_end')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('hire_end')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('end_reason', trans('quickadmin.users.fields.end-reason'), ['class' => 'control-label']); ?>

                                <?php echo Form::text('end_reason', old('end_reason'), ['class' => 'form-control', 'placeholder' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('end_reason')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('end_reason')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="attachment">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo app('translator')->getFromJson('quickadmin.attachments.title'); ?>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><?php echo app('translator')->getFromJson('quickadmin.attachments.fields.name'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('quickadmin.attachments.fields.file'); ?></th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="attachments">
                                    </tbody>
                                </table>
                                <a href="#"
                                   class="btn hos-success pull-right add-new">
                                   <i class="fa fa-plus" aria-hidden="true"></i>
                                   <?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?>
                                 </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="position">
                                            <label>اختر مكان العمل:</label>
                                            <div class="col-md-12">
                                                <br><br>
                                                <select  name="position" class="form-control">
                                                    <?php $__currentLoopData = $ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($p->id); ?>"><?php echo e($p->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                  <br><br>
                                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<center>
  <button type="submit" class="btn hos-success" style="width:150px;">
    <i class="fa fa-save" aria-hidden="true"></i>
    <?php echo e(trans('quickadmin.qa_save')); ?>

   </button>
  </center>
    <?php echo Form::close(); ?>






<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##
    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/moment-with-locales.min.js')); ?>"></script>
    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script src="<?php echo e(url('js')); ?>/select.js"></script>

    <script type="text/html" id="courses-template">
        <?php echo $__env->make('admin.users.courses_row',
            [
                'index' => '_INDEX_',
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </script>
    <script type="text/html" id="experiences-template">
        <?php echo $__env->make('admin.users.experiences_row',
            [
                'index' => '_INDEX_',
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </script>
    <script type="text/html" id="attachments-template">
        <?php echo $__env->make('admin.users.attachments_row',
            [
                'index' => '_INDEX_',
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </script>
    <script>
    $('document').ready(function(){
      $('#pos').select2();
    });
        $('.add-new').click(function () {
            var tableBody = $(this).parent().find('tbody');
            var template = $('#' + tableBody.attr('id') + '-template').html();
            var lastIndex = parseInt(tableBody.find('tr').last().data('index'));
            if (isNaN(lastIndex)) {
                lastIndex = 0;
            }
            tableBody.append(template.replace(/_INDEX_/g, lastIndex + 1));
            return false;
        });
        $(document).on('click', '.remove', function () {
            var row = $(this).parentsUntil('tr').parent();
            row.remove();
            return false;
        });
    </script>
    <script>
        $(function () {
            moment.updateLocale('en', {
                week: {dow: 1} // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "<?php echo e(config('app.date_format_moment')); ?>",
                locale: "en",
            });

        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/users/create.blade.php ENDPATH**/ ?>