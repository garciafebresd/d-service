<table class="table table-responsive" id="vehiclesTypes-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Name</th>
        <th>Description</th>
        <th>Json Data</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($vehiclesTypes as $vehiclesType)
        <tr>
            <td>{!! $vehiclesType->status !!}</td>
            <td>{!! $vehiclesType->name !!}</td>
            <td>{!! $vehiclesType->description !!}</td>
            <td>{!! $vehiclesType->json_data !!}</td>
            <td>
                {!! Form::open(['route' => ['vehiclesTypes.destroy', $vehiclesType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vehiclesTypes.show', [$vehiclesType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('vehiclesTypes.edit', [$vehiclesType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>