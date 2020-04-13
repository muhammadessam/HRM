@extends('layouts.app')

@section('content')
<?php
$ps = \App\Position::all();
 ?>
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store'], 'files' => true]) !!}

    <div class="panel panel-default make_emp">
        <div class="panel-heading hos-info" style="font-size:20px;color:#000;">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li id="1" class="active" style="width:15%;">
                      <center>
                        <a href="#basic" data-toggle="tab"
                           aria-expanded="true" style="font-size:20px;color:#000;">
                           @lang('quickadmin.users.infos.basic')
                         </a>
                       </center>
                    </li>
                    <li id="2" style="width:15%;">
                      <center>
                        <a href="#skills" data-toggle="tab" style="font-size:20px;color:#000;"
                           aria-expanded="true">@lang('quickadmin.users.infos.skills')</a>
                      </center>
                    </li>
                    <li id="3" style="width:15%;">
                      <center>
                        <a href="#hiring" data-toggle="tab" style="font-size:20px;color:#000;"
                           aria-expanded="true">@lang('quickadmin.users.infos.hiring')</a>
                           </center>
                    </li>
                    <li id="4" style="width:15%;">
                      <center>
                        <a href="#contract" data-toggle="tab" style="font-size:20px;color:#000;"
                           aria-expanded="true">@lang('quickadmin.users.infos.contract')</a>
                           </center>
                    </li>
                    <li id="5" style="width:15%;">
                      <center>
                        <a href="#attachment" data-toggle="tab" style="font-size:20px;color:#000;"
                           aria-expanded="true">@lang('quickadmin.users.infos.attachments')</a>
                           </center>
                    </li>
                    <li id="6" style="width:15%;">
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
                        <h3>
                            @lang('quickadmin.users.infos.basic')
                        </h3>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('matriculate', trans('quickadmin.users.fields.matriculate').'*', ['class' => 'control-label']) !!}
                                <input type="text"  id="matriculate" name="matriculate" value="{{time()}}" class="form-control">
                                <p class="help-block"></p>
                                @if($errors->has('matriculate'))
                                    <p class="help-block">
                                        {{ $errors->first('matriculate') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('name', trans('quickadmin.users.fields.name').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('identity_number', trans('quickadmin.users.fields.identity-number').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('identity_number', old('identity_number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('identity_number'))
                                    <p class="help-block">
                                        {{ $errors->first('identity_number') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('birth_date_m', trans('quickadmin.users.fields.birth-date-m').'', ['class' => 'control-label']) !!}
                                {!! Form::text('birth_date_m', old('birth_date_m'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('birth_date_m'))
                                    <p class="help-block">
                                        {{ $errors->first('birth_date_m') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('sex', trans('quickadmin.users.fields.sex').'*', ['class' => 'control-label']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('sex'))
                                    <p class="help-block">
                                        {{ $errors->first('sex') }}
                                    </p>
                                @endif
                                <div>
                                    <label>
                                        {!! Form::radio('sex', 'checked','m', false, ['required' => '']) !!}
                                        ذكر
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        {!! Form::radio('sex', 'f', false, ['required' => '']) !!}
                                        انثي
                                    </label>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('situation', trans('quickadmin.users.fields.situation').'', ['class' => 'control-label']) !!}
                                <select class="form-control" name="situation">
                                    <option value="اعزب">
                                        اعزب
                                    </option>
                                    <option value="متزوج">
                                        متزوج
                                    </option>
                                </select>
                                <p class="help-block"></p>
                                @if($errors->has('situation'))
                                    <p class="help-block">
                                        {{ $errors->first('situation') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('nationality', trans('quickadmin.users.fields.nationality').'', ['class' => 'control-label']) !!}
                                {!! Form::text('nationality', old('nationality'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('nationality'))
                                    <p class="help-block">
                                        {{ $errors->first('nationality') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('address', trans('quickadmin.users.fields.address').'', ['class' => 'control-label']) !!}
                                {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('address'))
                                    <p class="help-block">
                                        {{ $errors->first('address') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('phone', trans('quickadmin.users.fields.phone').'', ['class' => 'control-label']) !!}
                                {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('phone'))
                                    <p class="help-block">
                                        {{ $errors->first('phone') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('email', trans('quickadmin.users.fields.email').'*', ['class' => 'control-label']) !!}
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('email'))
                                    <p class="help-block">
                                        {{ $errors->first('email') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('password', trans('quickadmin.users.fields.password').'*', ['class' => 'control-label']) !!}
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('password'))
                                    <p class="help-block">
                                        {{ $errors->first('password') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('role_id', trans('quickadmin.users.fields.role').'*', ['class' => 'control-label']) !!}
                                {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('role_id'))
                                    <p class="help-block">
                                        {{ $errors->first('role_id') }}
                                    </p>
                                @endif
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
                                    <input type="checkbox" name="in_not" value="1">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="notifi col-3">
                                <label>
                                    اذن الدخول
                                </label>
                                <label class="switch">
                                    <input type="checkbox" name="in_req_not" value="1">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="notifi col-3">
                                <label>
                                    اذن الخروج
                                </label>
                                <label class="switch">
                                    <input type="checkbox" name="out_req_not" value="1">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="notifi col-3">
                                <label>
                                    الانصراف
                                </label>
                                <label class="switch">
                                    <input type="checkbox" name="out_not" value="1">
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>
                        <center>
                        <button class="btn next-button" href="#skills" data-toggle="tab" disabled="disabled" id="next-basic" >التالي</button>
                        </center>
                    </div>
                    <div class="tab-pane" id="skills">
                        <h3>
                            @lang('quickadmin.users.infos.skills')
                        </h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                {!! Form::label('degree_id', trans('quickadmin.degrees.fields.title').'*', ['class' => 'control-label']) !!}
                                {!! Form::select('degree_id', $degrees, old('degree_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('degree_id'))
                                    <p class="help-block">
                                        {{ $errors->first('degree_id') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                {!! Form::label('specialty_id', trans('quickadmin.specialties.fields.title').'*', ['class' => 'control-label']) !!}
                                {!! Form::select('specialty_id', $specialties, old('specialty_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('specialty_id'))
                                    <p class="help-block">
                                        {{ $errors->first('specialty_id') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @lang('quickadmin.courses.title')
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>@lang('quickadmin.courses.fields.name')</th>

                                        <th>اوامر</th>
                                    </tr>
                                    </thead>
                                    <tbody id="courses">
                                    @foreach(old('courses', []) as $index => $data)
                                        @include('admin.users.courses_row', [
                                            'index' => $index
                                        ])
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="#"
                                   class="btn hos-success pull-right add-new">
                                   <i class="fa fa-plus" aria-hidden="true"></i>
                                   @lang('quickadmin.qa_add_new')
                                 </a>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @lang('quickadmin.experiences.title')
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>@lang('quickadmin.experiences.fields.name')</th>

                                        <th>اوامر</th>
                                    </tr>
                                    </thead>
                                    <tbody id="experiences">
                                    @foreach(old('experiences', []) as $index => $data)
                                        @include('admin.users.experiences_row', [
                                            'index' => $index
                                        ])
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="#"
                                   class="btn hos-success pull-right add-new">
                                   <i class="fa fa-plus" aria-hidden="true"></i>
                                   @lang('quickadmin.qa_add_new')
                                 </a>
                            </div>
                        </div>
                        <center>
                        <a class="btn next-button" id="next-skills" href="#hiring" data-toggle="tab" >التالي</a>
                        <a class="btn prev-button" id="prev-skills" href="#basic" data-toggle="tab">السابق</a>
                        </center>
                    </div>
                    <div class="tab-pane" id="hiring">
                        <h3>
                            @lang('quickadmin.users.infos.hiring')
                        </h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                {!! Form::label('hire_date', trans('quickadmin.users.fields.hire-date').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('hire_date', old('hire_date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('hire_date'))
                                    <p class="help-block">
                                        {{ $errors->first('hire_date') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                {!! Form::label('salary', trans('quickadmin.users.fields.salary').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('salary', old('salary'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('salary'))
                                    <p class="help-block">
                                        {{ $errors->first('salary') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                {!! Form::label('department_id', trans('quickadmin.departments.fields.title').'', ['class' => 'control-label']) !!}
                                {!! Form::select('department_id', $departments, old('department_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('department_id'))
                                    <p class="help-block">
                                        {{ $errors->first('department_id') }}
                                    </p>
                                @endif
                            </div>
                            <div style="" class="col-lg-6 col-md-6 col-xs-12 form-group">
                                {!! Form::label('vacation_id', trans('quickadmin.deservedVacations.title').'', ['class' => 'control-label']) !!}
                                {!! Form::select('vacation_id[]', $vacations, old('vacation_id[]'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('vacation_id'))
                                    <p class="help-block">
                                        {{ $errors->first('vacation_id') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <center>
                        <a class="btn next-button" id="next-hiring" href="#contract" data-toggle="tab"  >التالي</a>
                        <a class="btn prev-button" id="prev-hiring" href="#skills" data-toggle="tab"  >السابق</a>
                        </center>
                    </div>
                    <div class="tab-pane" id="contract">
                        <h3>
                            @lang('quickadmin.users.infos.contract')
                        </h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                {!! Form::label('hire_end', trans('quickadmin.users.fields.hire-end'), ['class' => 'control-label']) !!}
                                {!! Form::text('hire_end', old('hire_end'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('hire_end'))
                                    <p class="help-block">
                                        {{ $errors->first('hire_end') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                {!! Form::label('end_reason', trans('quickadmin.users.fields.end-reason'), ['class' => 'control-label']) !!}
                                {!! Form::text('end_reason', old('end_reason'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('end_reason'))
                                    <p class="help-block">
                                        {{ $errors->first('end_reason') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <center>
                            <a class="btn next-button" id="next-contract" href="#attachment" data-toggle="tab" >التالي</a>
                            <a class="btn prev-button" id="prev-contract" href="#hiring" data-toggle="tab"  >السابق</a>
                        </center>
                    </div>
                    <div class="tab-pane" id="attachment">
                        <h3>
                            @lang('quickadmin.users.infos.attachments')
                        </h3>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @lang('quickadmin.attachments.title')
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>@lang('quickadmin.attachments.fields.name')</th>
                                        <th>@lang('quickadmin.attachments.fields.file')</th>
                                        <th>اوامر</th>
                                    </tr>
                                    </thead>
                                    <tbody id="attachments">
                                    </tbody>
                                </table>
                                <a href="#"
                                   class="btn hos-success pull-right add-new">
                                   <i class="fa fa-plus" aria-hidden="true"></i>
                                   @lang('quickadmin.qa_add_new')
                                 </a>
                            </div>
                        </div>
                        <center>
                            <a class="btn next-button" id="next-attachment" href="#position" data-toggle="tab" class="" >التالي</a>
                            <a class="btn prev-button" id="prev-attachment" href="#contract" data-toggle="tab"  >السابق</a>
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
                                @foreach($ps as $p)
                                    <option value="{{ $p->id }}">{{ $p->title }}</option>
                                @endforeach
                            </select>
                              <br><br>
                        </div>
                        <center>
                            <a class="btn prev-button" id="prev-position" href="#attachment" data-toggle="tab" >السابق</a>
                        </center>
                    </div>
                    <center><button type="submit" class="btn hos-success save-button" style="width:150px;">
                            <i class="fa fa-save" aria-hidden="true"></i>
                            {{trans('quickadmin.qa_save')}}
                        </button></center>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}





@stop

@section('javascript')
    @parent
    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ url('js') }}/select.js"></script>

    <script type="text/html" id="courses-template">
        @include('admin.users.courses_row',
            [
                'index' => '_INDEX_',
            ])
    </script>
    <script type="text/html" id="experiences-template">
        @include('admin.users.experiences_row',
            [
                'index' => '_INDEX_',
            ])
    </script>
    <script type="text/html" id="attachments-template">
        @include('admin.users.attachments_row',
            [
                'index' => '_INDEX_',
            ])
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
                format: "{{ config('app.date_format_moment') }}",
                locale: "en",
            });

        });
    </script>
    <script>
        (function() {
            $('#basic input').keyup(function() {

                var empty = false;
                $('#basic input').each(function() {
                    if ($(this).val() == '' || $(this).val() == null) {
                        empty = true;
                    }
                });

                if (empty) {
                    $('#next-basic').attr('disabled', 'disabled');
                } else {
                    $('#next-basic').removeAttr('disabled');
                }
            });
        })();
        (function() {
            $('#skills input').keyup(function() {

                var empty = false;
                $('#skills input').each(function() {
                    if ($(this).val() == '' || $(this).val() == null) {
                        empty = true;
                    }
                });

                if (empty) {
                    $('#next-skills').attr('disabled', 'disabled');
                } else {
                    $('#next-skills').removeAttr('disabled');
                }
            });
        })();
        (function() {
            $('#hiring input').keyup(function() {

                var empty = false;
                $('#hiring input').each(function() {
                    if ($(this).val() == '' || $(this).val() == null) {
                        empty = true;
                    }
                });

                if (empty) {
                    $('#next-hiring').attr('disabled', 'disabled');
                } else {
                    $('#next-hiring').removeAttr('disabled');
                }
            });
        })();
        (function() {
            $('#contract input').keyup(function() {

                var empty = false;
                $('#contract input').each(function() {
                    if ($(this).val() == '' || $(this).val() == null) {
                        empty = true;
                    }
                });

                if (empty) {
                    $('#next-contract').attr('disabled', 'disabled');
                } else {
                    $('#next-contract').removeAttr('disabled');
                }
            });
        })();
        (function() {
            $('#attachment input').keyup(function() {

                var empty = false;
                $('#attachment input').each(function() {
                    if ($(this).val() == '' || $(this).val() == null) {
                        empty = true;
                    }
                });

                if (empty) {
                    $('#next-attachment').attr('disabled', 'disabled');
                } else {
                    $('#next-attachment').removeAttr('disabled');
                }
            });
        })();

        $('#next-basic').on('click', function(e){

            $('#1')
                .removeClass('active');
            $('#2')
                .addClass('active');
        });
        $('#next-skills').on('click', function(e){

            $('#2')
                .removeClass('active');
            $('#3')
                .addClass('active');
        });
        $('#prev-skills').on('click', function(e){

            $('#2')
                .removeClass('active');
            $('#1')
                .addClass('active');
        });
        $('#next-hiring').on('click', function(e){

            $('#3')
                .removeClass('active');
            $('#4')
                .addClass('active');
        });
        $('#prev-hiring').on('click', function(e){

            $('#3')
                .removeClass('active');
            $('#2')
                .addClass('active');
        });
        $('#next-contract').on('click', function(e){

            $('#4')
                .removeClass('active');
            $('#5')
                .addClass('active');
        });
        $('#prev-contract').on('click', function(e){

            $('#4')
                .removeClass('active');
            $('#3')
                .addClass('active');
        });
        $('#next-attachment').on('click', function(e){

            $('#5')
                .removeClass('active');
            $('#6')
                .addClass('active');
        });
        $('#prev-attachment').on('click', function(e){

            $('#5')
                .removeClass('active');
            $('#4')
                .addClass('active');
        });
        $('#prev-position').on('click', function(e){

            $('#6')
                .removeClass('active');
            $('#5')
                .addClass('active');
        });
    </script>

@stop
