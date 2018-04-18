<table class="table table-responsive" id="chats-table">
    <thead>
        <tr>
            <th>Viewed At</th>
        <th>Status</th>
        <th>Text</th>
        <th>Calendar Service Id</th>
        <th>Employee Id</th>
        <th>Client Id</th>
        <th>Json Info</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($chats as $chat)
        <tr>
            <td>{!! $chat->viewed_at !!}</td>
            <td>{!! $chat->status !!}</td>
            <td>{!! $chat->text !!}</td>
            <td>{!! $chat->calendar_service_id !!}</td>
            <td>{!! $chat->employee_id !!}</td>
            <td>{!! $chat->client_id !!}</td>
            <td>{!! $chat->json_info !!}</td>
            <td>
                {!! Form::open(['route' => ['chats.destroy', $chat->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('chats.show', [$chat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('chats.edit', [$chat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>