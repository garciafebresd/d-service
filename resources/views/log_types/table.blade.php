<table class="table table-responsive" id="logTypes-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($logTypes as $logType)
        <tr>
            <td>{!! $logType->name !!}</td>
            <td>{!! $logType->description !!}</td>
            <td>{!! $logType->status !!}</td>
            <td>
                {!! Form::open(['route' => ['logTypes.destroy', $logType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('logTypes.show', [$logType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('logTypes.edit', [$logType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>