<table class="table table-responsive" id="employeeTypes-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($employeeTypes as $employeeType)
        <tr>
            <td>{!! $employeeType->name !!}</td>
            <td>{!! $employeeType->description !!}</td>
            <td>{!! ($employeeType->status==1)?'Activo':'inactivo' !!}</td>
            <td>
                {!! Form::open(['route' => ['employeeTypes.destroy', $employeeType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('employeeTypes.show', [$employeeType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('employeeTypes.edit', [$employeeType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>