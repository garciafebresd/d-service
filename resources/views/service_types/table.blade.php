<table class="table table-responsive" id="serviceTypes-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Description</th>
        <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($serviceTypes as $serviceType)
        <tr>
            <td>{!! $serviceType->status !!}</td>
            <td>{!! $serviceType->description !!}</td>
            <td>{!! $serviceType->name !!}</td>
            <td>
                {!! Form::open(['route' => ['serviceTypes.destroy', $serviceType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('serviceTypes.show', [$serviceType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('serviceTypes.edit', [$serviceType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>