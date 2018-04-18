<table class="table table-responsive" id="companies-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Identifier</th>
        <th>Legal Name</th>
        <th>Logo Url</th>
        <th>Life</th>
        <th>Register At</th>
        <th>Json Info</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>{!! $company->status !!}</td>
            <td>{!! $company->identifier !!}</td>
            <td>{!! $company->legal_name !!}</td>
            <td>{!! $company->logo_url !!}</td>
            <td>{!! $company->life !!}</td>
            <td>{!! $company->register_at !!}</td>
            <td>{!! $company->json_info !!}</td>
            <td>
                {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('companies.show', [$company->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('companies.edit', [$company->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>