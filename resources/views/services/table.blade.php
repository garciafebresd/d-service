<table class="table table-responsive" id="services-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Name</th>
        <th>Descripcion</th>
        <th>Price</th>
        <th>Json Info</th>
        <th>Service Type</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($services as $service)
        <tr>
            <td>{!! ($service->status==1)?'Activo':'inactivo' !!}</td>
            <td>{!! $service->name !!}</td>
            <td>{!! $service->descripcion !!}</td>
            <td>{!! $service->price !!}</td>
            <td>{!! $service->json_info !!}</td>
            <td>{!! $service->ServiceType->name !!}</td>
            <td>
                {!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('services.show', [$service->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('services.edit', [$service->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>