<table class="table table-responsive" id="relServiceEmployees-table">
    <thead>
        <tr>
            <th>Service Id</th>
        <th>Employee Id</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($relServiceEmployees as $relServiceEmployee)
        <tr>
            <td>{!! $relServiceEmployee->service_id !!}</td>
            <td>{!! $relServiceEmployee->employee_id !!}</td>
            <td>{!! $relServiceEmployee->status !!}</td>
            <td>
                {!! Form::open(['route' => ['relServiceEmployees.destroy', $relServiceEmployee->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('relServiceEmployees.show', [$relServiceEmployee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('relServiceEmployees.edit', [$relServiceEmployee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>