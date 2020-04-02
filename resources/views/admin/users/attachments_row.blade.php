<tr data-index="{{ $index }}">
    <td>
        {!! Form::text('attachmentNames['.$index.'][name]', null, ['class' => 'form-control', 'required' => '']) !!}
    </td>
    <td>
        {!! Form::file('attachmentFiles['.$index.'][name]', null, ['class' => 'form-control', 'required' => '']) !!}
    </td>
    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>