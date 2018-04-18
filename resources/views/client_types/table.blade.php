<table class="table table-responsive" id="clientTypes-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientTypes as $clientType)
        <tr>
            <td>{!! $clientType->name !!}</td>
            <td>{!! $clientType->description !!}</td>
            <td>{!! $clientType->status !!}</td>
            <td>
                {!! Form::open(['route' => ['clientTypes.destroy', $clientType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('clientTypes.show', [$clientType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('clientTypes.edit', [$clientType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>