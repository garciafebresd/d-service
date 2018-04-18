<table class="table table-responsive" id="configTables-table">
    <thead>
        <tr>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($configTables as $configTable)
        <tr>
            <td>{!! $configTable->status !!}</td>
            <td>
                {!! Form::open(['route' => ['configTables.destroy', $configTable->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('configTables.show', [$configTable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('configTables.edit', [$configTable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>