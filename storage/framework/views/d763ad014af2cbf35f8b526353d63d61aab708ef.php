<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.users.title'); ?></h3>

    <?php echo Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id], 'files' => true]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?>
        </div>

        <div class="panel-body">
            <div class="nav-tabs-custom">











































                <div class="tab-content">
                    <div class="tab-pane active" id="basic">
                        <h3>
                            <?php echo app('translator')->getFromJson('quickadmin.users.infos.basic'); ?>
                        </h3>
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
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('birth_date_m', trans('quickadmin.users.fields.birth-date-m').'', ['class' => 'control-label']); ?>

                                <?php echo Form::text('birth_date_m', old('birth_date_m'), ['class' => 'form-control date', 'placeholder' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('birth_date_m')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('birth_date_m')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
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

                                        ذكر
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <?php echo Form::radio('sex', 'f', false, ['required' => '']); ?>

                                        انثي
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
                        </div>
                        <div class="row">
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
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('address', trans('quickadmin.users.fields.address').'', ['class' => 'control-label']); ?>

                                <?php echo Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('address')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('address')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
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
                                <?php echo Form::label('password', trans('quickadmin.users.fields.password').'', ['class' => 'control-label']); ?>

                                <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('password')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('password')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('role_id', trans('quickadmin.users.fields.role').'*', ['class' => 'control-label']); ?>

                                <?php echo Form::select('role_id', $roles, $user->role->id ?? old('role_id'), ['class' => 'form-control select2', 'required' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('role_id')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('role_id')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <h4 class="col-3">
                                ارسال الاشعارت للادارة عند
                            </h4>
                            <div class="notifi col-3">
                                <label>
                                    الحضور
                                </label>
                                <label class="switch">
                                    <?php if($user->in_not): ?>
                                    <input type="checkbox" name="in_not" checked value="1">
                                    <?php else: ?>
                                    <input type="checkbox" name="in_not" value="1">
                                    <?php endif; ?>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="notifi col-3">
                                <label>
                                    اذن الدخول
                                </label>
                                <label class="switch">
                                    <?php if($user->in_req_not): ?>
                                        <input type="checkbox" name="in_req_not" checked value="1">
                                    <?php else: ?>
                                        <input type="checkbox" name="in_req_not" value="1">
                                    <?php endif; ?>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="notifi col-3">
                                <label>
                                    اذن الخروج
                                </label>
                                <label class="switch">
                                    <?php if($user->out_req_not): ?>
                                        <input type="checkbox" name="out_req_not" checked value="1">
                                    <?php else: ?>
                                        <input type="checkbox" name="out_req_not" value="1">
                                    <?php endif; ?>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="notifi col-3">
                                <label>
                                    الانصراف
                                </label>
                                <label class="switch">
                                    <?php if($user->out_not): ?>
                                        <input type="checkbox" name="out_not" checked value="1">
                                    <?php else: ?>
                                        <input type="checkbox" name="out_not" value="1">
                                    <?php endif; ?>
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>
                        <center>
                            <a class="btn next-button" href="#skills" data-toggle="tab" >التالي</a>
                        </center>
                    </div>
                    <div class="tab-pane" id="skills">
                        <h3>
                            <?php echo app('translator')->getFromJson('quickadmin.users.infos.skills'); ?>
                        </h3>
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
                                    <?php $__empty_1 = true; $__currentLoopData = old('courses', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php echo $__env->make('admin.users.courses_row', [
                                            'index' => $index
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php $__currentLoopData = $user->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $__env->make('admin.users.courses_row', [
                                                'index' => 'id-' . $item->id,
                                                'field' => $item
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                                <a href="#"
                                   class="btn btn-success pull-right add-new"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>
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
                                    <?php $__empty_1 = true; $__currentLoopData = old('experiences', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php echo $__env->make('admin.users.experiences_row', [
                                            'index' => $index
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php $__currentLoopData = $user->experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $__env->make('admin.users.experiences_row', [
                                                'index' => 'id-' . $item->id,
                                                'field' => $item
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                                <a href="#"
                                   class="btn btn-success pull-right add-new"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>
                            </div>
                        </div>
                        <center>
                            <a class="btn next-button" href="#hiring" data-toggle="tab" >التالي</a>
                            <a class="btn prev-button" href="#basic" data-toggle="tab">السابق</a>
                        </center>
                    </div>
                    <div class="tab-pane" id="hiring">
                        <h3>
                            <?php echo app('translator')->getFromJson('quickadmin.users.infos.hiring'); ?>
                        </h3>
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
                                <?php echo Form::label('department_id', trans('quickadmin.departments.fields.title').'*', ['class' => 'control-label']); ?>

                                <?php echo Form::select('department_id', $departments, old('department_id'), ['class' => 'form-control select2', 'required' => '']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('department_id')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('department_id')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                <?php echo Form::label('vacation_id', trans('quickadmin.deservedVacations.title').'', ['class' => 'control-label']); ?>

                                <?php echo Form::select('vacation_id[]', $vacations, old('vacation_id') ? old('vacation_id') : $user->deservedVacations, ['class' => 'form-control select2', 'multiple'=>'multiple']); ?>

                                <p class="help-block"></p>
                                <?php if($errors->has('vacation_id')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('vacation_id')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <center>
                            <a class="btn next-button" href="#contract" data-toggle="tab"  >التالي</a>
                            <a class="btn prev-button" href="#skills" data-toggle="tab"  >السابق</a>
                        </center>
                    </div>
                    <div class="tab-pane" id="contract">
                        <h3>
                            <?php echo app('translator')->getFromJson('quickadmin.users.infos.contract'); ?>
                        </h3>
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
                        <center>
                            <a class="btn next-button" href="#attachment" data-toggle="tab" >التالي</a>
                            <a class="btn prev-button" href="#hiring" data-toggle="tab"  >السابق</a>
                        </center>
                    </div>
                    <div class="tab-pane" id="attachment">
                        <h3>
                            <?php echo app('translator')->getFromJson('quickadmin.users.infos.attachments'); ?>
                        </h3>
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
                                        <?php echo $__env->make('admin.users.attachments_row_edit', [
                                            'attachments' => $user->attachments
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </tbody>
                                </table>
                                <a href="#"
                                   class="btn btn-success pull-right add-new"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>
                            </div>
                        </div>
                        <center>
                            <a class="btn next-button" href="#position" data-toggle="tab" class="" >التالي</a>
                            <a class="btn prev-button" href="#contract" data-toggle="tab"  >السابق</a>
                        </center>
                    </div>
                    <div class="tab-pane" id="position">
                        <h3>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            تحديد موقع العمل
                        </h3>
                        <label>اختر مكان العمل:</label>
                        <div class="col-md-12">
                            <br><br>
                            <select  name="position" class="form-control">
                              <?php
                              $ps = \App\Position::all();
                               ?>
                                <?php $__currentLoopData = $ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($p->id); ?>"><?php echo e($p->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                              <br><br>
                        </div>
                        <center>
                            <a class="btn prev-button" href="#attachment" data-toggle="tab" >السابق</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
        <?php echo Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger save-button']); ?>

    </center>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##

    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/moment-with-locales.min.js')); ?>"></script>
    <script src="<?php echo e(url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js')); ?>"></script>
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
    <script type="text/javascript">
        var hijriInput =  $("[name=\"birth_date_h\"]");
        var $date

        $(function () {
            hijriInput.hijriDatePicker({
                hijri: true,
                showSwitcher:false,
            });
        });
        // hijriInput.on("dp.change", function(e) {
        //     $date =  $(this).val();
        //     console.log(moment($date, 'iYYYY-iM-iD').format('YYYY-M-D'));
        // });
        $('[name="isDate"]').click(function () {
            if ($(this).val() == 'm'){
                $('[name="birth_date_m"]').removeAttr('disabled')
                $('[name="birth_date_h"]').attr('disabled',true)
            }else{
                $('[name="birth_date_h"]').removeAttr('disabled')
                $('[name="birth_date_m"]').attr('disabled',true)
            }
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>