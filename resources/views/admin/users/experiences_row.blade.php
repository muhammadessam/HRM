<tr data-index="{{ $index }}">
    <td>{!! Form::text('experiences['.$index.'][name]', old('experiences['.$index.'][name]', isset($field) ? $field->name: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>