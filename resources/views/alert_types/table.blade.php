<table class="table table-responsive" id="alertTypes-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Name</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($alertTypes as $alertType)
        <tr>
            <td>{!! $alertType->status !!}</td>
            <td>{!! $alertType->name !!}</td>
            <td>{!! $alertType->description !!}</td>
            <td>
                {!! Form::open(['route' => ['alertTypes.destroy', $alertType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('alertTypes.show', [$alertType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('alertTypes.edit', [$alertType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>