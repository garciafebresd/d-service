<table class="table table-responsive" id="clients-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Dni</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Legal Name</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>Address</th>
        <th>Client Type Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $clients)
        <tr>
            <td>{!! $clients->status !!}</td>
            <td>{!! $clients->dni !!}</td>
            <td>{!! $clients->name !!}</td>
            <td>{!! $clients->last_name !!}</td>
            <td>{!! $clients->legal_name !!}</td>
            <td>{!! $clients->phone_number !!}</td>
            <td>{!! $clients->email_address !!}</td>
            <td>{!! $clients->address !!}</td>
            <td>{!! $clients->client_type_id !!}</td>
            <td>
                {!! Form::open(['route' => ['clients.destroy', $clients->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('clients.show', [$clients->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('clients.edit', [$clients->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>