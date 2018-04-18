<table class="table table-responsive" id="notifications-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Type</th>
        <th>Name</th>
        <th>Employee Id</th>
        <th>Client Id</th>
        <th>Json Info</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($notifications as $notification)
        <tr>
            <td>{!! $notification->status !!}</td>
            <td>{!! $notification->type !!}</td>
            <td>{!! $notification->name !!}</td>
            <td>{!! $notification->employee_id !!}</td>
            <td>{!! $notification->client_id !!}</td>
            <td>{!! $notification->json_info !!}</td>
            <td>
                {!! Form::open(['route' => ['notifications.destroy', $notification->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('notifications.show', [$notification->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('notifications.edit', [$notification->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>