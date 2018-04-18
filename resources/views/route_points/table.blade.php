<table class="table table-responsive" id="routePoints-table">
    <thead>
        <tr>
            <th>Date Route</th>
        <th>Calendar Service Id</th>
        <th>Employee Id</th>
        <th>Gps Data</th>
        <th>Gps Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($routePoints as $routePoints)
        <tr>
            <td>{!! $routePoints->date_route !!}</td>
            <td>{!! $routePoints->calendar_service_id !!}</td>
            <td>{!! $routePoints->employee_id !!}</td>
            <td>{!! $routePoints->gps_data !!}</td>
            <td>{!! $routePoints->gps_status !!}</td>
            <td>
                {!! Form::open(['route' => ['routePoints.destroy', $routePoints->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('routePoints.show', [$routePoints->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('routePoints.edit', [$routePoints->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>