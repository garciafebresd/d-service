<table class="table table-responsive" id="servicePlans-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Client Id</th>
        <th>Service Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($servicePlans as $servicePlan)
        <tr>
            <td>{!! $servicePlan->status !!}</td>
            <td>{!! $servicePlan->client_id !!}</td>
            <td>{!! $servicePlan->service_id !!}</td>
            <td>
                {!! Form::open(['route' => ['servicePlans.destroy', $servicePlan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('servicePlans.show', [$servicePlan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('servicePlans.edit', [$servicePlan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>