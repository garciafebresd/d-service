<table class="table table-responsive" id="vehicles-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Plate Code</th>
        <th>Vehicle Type Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($vehicles as $vehicles)
        <tr>
            <td>{!! $vehicles->status !!}</td>
            <td>{!! $vehicles->plate_code !!}</td>
            <td>{!! $vehicles->vehicle_type_id !!}</td>
            <td>
                {!! Form::open(['route' => ['vehicles.destroy', $vehicles->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vehicles.show', [$vehicles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('vehicles.edit', [$vehicles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>