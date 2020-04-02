@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id], 'files' => true]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#basic" data-toggle="tab"
                           aria-expanded="true">@lang('quickadmin.users.infos.basic')</a>
                    </li>
                    <li>
                        <a href="#skills" data-toggle="tab"
                           aria-expanded="true">@lang('quickadmin.users.infos.skills')</a>
                    </li>
                    <li>
                        <a href="#hiring" data-toggle="tab"
                           aria-expanded="true">@lang('quickadmin.users.infos.hiring')</a>
                    </li>
                    <li>
                        <a href="#contract" data-toggle="tab"
                           aria-expanded="true">@lang('quickadmin.users.infos.contract')</a>
                    </li>
                    <li>
                        <a href="#attachment" data-toggle="tab"
                           aria-expanded="true">@lang('quickadmin.users.infos.attachments')</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="basic">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('matriculate', trans('quickadmin.users.fields.matriculate').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('matriculate', old('matriculate'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                            <div class="col-md-12">
                                <input type="radio" name="isDate" value="h">{{ trans('quickadmin.users.fields.birth-date-h') }}<br>
                                <input type="radio" name="isDate" value="m">{{ trans('quickadmin.users.fields.birth-date-m') }}<br>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                {!! Form::label('birth_date_h', trans('quickadmin.users.fields.birth-date-h').'', ['class' => 'control-label']) !!}
                                {!! Form::text('birth_date_h', old('birth_date_h'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('birth_date_h'))
                                    <p class="help-block">
                                        {{ $errors->first('birth_date_h') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                {!! Form::label('birth_date_m', trans('quickadmin.users.fields.birth-date-m').'', ['class' => 'control-label']) !!}
                                {!! Form::text('birth_date_m', old('birth_date_m'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('birth_date_m'))
                                    <p class="help-block">
                                        {{ $errors->first('birth_date_m') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
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
                                        {!! Form::radio('sex', 'm', false, ['required' => '']) !!}
                                        Male
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        {!! Form::radio('sex', 'f', false, ['required' => '']) !!}
                                        Female
                                    </label>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('situation', trans('quickadmin.users.fields.situation').'', ['class' => 'control-label']) !!}
                                {!! Form::text('situation', old('situation'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('situation'))
                                    <p class="help-block">
                                        {{ $errors->first('situation') }}
                                    </p>
                                @endif
                            </div>
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
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                {!! Form::label('address', trans('quickadmin.users.fields.address').'', ['class' => 'control-label']) !!}
                                {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('address'))
                                    <p class="help-block">
                                        {{ $errors->first('address') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
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
                                {!! Form::label('password', trans('quickadmin.users.fields.password').'', ['class' => 'control-label']) !!}
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('password'))
                                    <p class="help-block">
                                        {{ $errors->first('password') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12 form-group">
                                {!! Form::label('role_id', trans('quickadmin.users.fields.role').'*', ['class' => 'control-label']) !!}
                                {!! Form::select('role_id', $roles, $user->role->id ?? old('role_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('role_id'))
                                    <p class="help-block">
                                        {{ $errors->first('role_id') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="skills">
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

                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="courses">
                                    @forelse(old('courses', []) as $index => $data)
                                        @include('admin.users.courses_row', [
                                            'index' => $index
                                        ])
                                    @empty
                                        @foreach($user->courses as $item)
                                            @include('admin.users.courses_row', [
                                                'index' => 'id-' . $item->id,
                                                'field' => $item
                                            ])
                                        @endforeach
                                    @endforelse
                                    </tbody>
                                </table>
                                <a href="#"
                                   class="btn btn-success pull-right add-new">@lang('quickadmin.qa_add_new')</a>
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

                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="experiences">
                                    @forelse(old('experiences', []) as $index => $data)
                                        @include('admin.users.experiences_row', [
                                            'index' => $index
                                        ])
                                    @empty
                                        @foreach($user->experiences as $item)
                                            @include('admin.users.experiences_row', [
                                                'index' => 'id-' . $item->id,
                                                'field' => $item
                                            ])
                                        @endforeach
                                    @endforelse
                                    </tbody>
                                </table>
                                <a href="#"
                                   class="btn btn-success pull-right add-new">@lang('quickadmin.qa_add_new')</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="hiring">
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
                                {!! Form::label('department_id', trans('quickadmin.departments.fields.title').'*', ['class' => 'control-label']) !!}
                                {!! Form::select('department_id', $departments, old('department_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('department_id'))
                                    <p class="help-block">
                                        {{ $errors->first('department_id') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12 form-group">
                                {!! Form::label('vacation_id', trans('quickadmin.deservedVacations.title').'', ['class' => 'control-label']) !!}
                                {!! Form::select('vacation_id[]', $vacations, old('vacation_id') ? old('vacation_id') : $user->deservedVacations, ['class' => 'form-control select2', 'multiple'=>'multiple']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('vacation_id'))
                                    <p class="help-block">
                                        {{ $errors->first('vacation_id') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="contract">
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
                    </div>
                    <div class="tab-pane" id="attachment">

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
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="attachments">
                                        @include('admin.users.attachments_row_edit', [
                                            'attachments' => $user->attachments
                                        ])
                                    </tbody>
                                </table>
                                <a href="#"
                                   class="btn btn-success pull-right add-new">@lang('quickadmin.qa_add_new')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
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
                format: "{{ config('app.date_format_moment') }}",
                locale: "en",
            });

        });
    </script>



@stop