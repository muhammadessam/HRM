@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.roles.title')</h3>
    
    {!! Form::model($role, ['method' => 'PUT', 'route' => ['admin.roles.update', $role->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.roles.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    @foreach($permissionGroups as $permissionGroup)
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('quickadmin.' . $groupNames[$loop->index] . '.title')
            </div>

            <div class="panel-body">
                <div class="row">
                    @foreach($permissionGroup as $permission)
                        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 form-group">
                            {!! Form::label('permission-' . $permission->id, trans('quickadmin.permissions.types.' . $permission->name), ['class' => 'control-label']) !!}
                            {!! Form::checkbox('permissions[]', $permission->id, $role->hasPermissionTo($permission->name), ['id' => 'permission-' . $permission->id]) !!}
                            <p class="help-block"></p>
                            @if($errors->has('permission'))
                                <p class="help-block">
                                    {{ $errors->first('permission') }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

