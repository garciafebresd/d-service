<table class="table table-responsive" id="alerts-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Alert Type</th>
        <th>Json Info</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($alerts as $alerts)
        <tr>
            <td>{!! ($alerts->status==1)?'Activo':'inactivo' !!}</td>
            <td>{!! $alerts->latitude !!}</td>
            <td>{!! $alerts->longitude !!}</td>
            <td>{!! $alerts->alertType->name !!}</td>
            <td>{!! $alerts->json_info !!}</td>
            <td>
                {!! Form::open(['route' => ['alerts.destroy', $alerts->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('alerts.show', [$alerts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('alerts.edit', [$alerts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>