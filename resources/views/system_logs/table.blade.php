<table class="table table-responsive" id="systemLogs-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Description</th>
        <th>Log Type Id</th>
        <th>Employee Id</th>
        <th>Client Id</th>
        <th>User Id</th>
        <th>Json Info</th>
        <th>Ip Address</th>
        <th>Uuid</th>
        <th>Imei</th>
        <th>Latitude</th>
        <th>Longitude</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($systemLogs as $systemLog)
        <tr>
            <td>{!! $systemLog->status !!}</td>
            <td>{!! $systemLog->description !!}</td>
            <td>{!! $systemLog->log_type_id !!}</td>
            <td>{!! $systemLog->employee_id !!}</td>
            <td>{!! $systemLog->client_id !!}</td>
            <td>{!! $systemLog->user_id !!}</td>
            <td>{!! $systemLog->json_info !!}</td>
            <td>{!! $systemLog->ip_address !!}</td>
            <td>{!! $systemLog->uuid !!}</td>
            <td>{!! $systemLog->imei !!}</td>
            <td>{!! $systemLog->latitude !!}</td>
            <td>{!! $systemLog->longitude !!}</td>
            <td>
                {!! Form::open(['route' => ['systemLogs.destroy', $systemLog->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('systemLogs.show', [$systemLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('systemLogs.edit', [$systemLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>