@foreach($attachments as $attachment)
    <tr data-index="{{ $attachment->id }}">
        {!! Form::hidden('attachment_ids[]', $attachment->id) !!}

        <td>{{ $attachment->name }}</td>
        <td>
            <a href="{{ $attachment->link }}" class="btn btn-success" role="button" target="_blank">@lang('quickadmin.qa_download')</a>
        </td>
        <td>
            <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
        </td>
    </tr>
@endforeach