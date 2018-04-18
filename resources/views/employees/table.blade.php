<table class="table table-responsive" id="employees-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Password</th>
        <th>Email</th>
        <th>Json Permission</th>
        <th>Dni Number</th>
        <th>Employee Type Id</th>
        <th>Company Id</th>
        <th>Json Info</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
        <tr>
            <td>{!! ($employee->status==1)?'Activo':'inactivo' !!}</td>
            <td>{!! $employee->name !!}</td>
            <td>{!! $employee->last_name !!}</td>
            <td>{!! $employee->password !!}</td>
            <td>{!! $employee->email !!}</td>
            <td>{!! $employee->json_permission !!}</td>
            <td>{!! $employee->dni_number !!}</td>
            <td>{!! $employee->employeeType->name !!}</td>
            <td>{!! $employee->company_id !!}</td>
            <td>{!! $employee->json_info !!}</td>
            <td>
                {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('employees.show', [$employee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('employees.edit', [$employee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>