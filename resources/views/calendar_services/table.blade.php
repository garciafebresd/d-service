<table class="table table-responsive" id="calendarServices-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Service Date</th>
        <th>Client Id</th>
        <th>Employee Id</th>
        <th>Service Id</th>
        <th>Payment Method Id</th>
        <th>Description</th>
        <th>Json Info</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($calendarServices as $calendarService)
        <tr>
            <td>{!! $calendarService->status !!}</td>
            <td>{!! $calendarService->service_date !!}</td>
            <td>{!! $calendarService->client_id !!}</td>
            <td>{!! $calendarService->employee_id !!}</td>
            <td>{!! $calendarService->service_id !!}</td>
            <td>{!! $calendarService->payment_method_id !!}</td>
            <td>{!! $calendarService->description !!}</td>
            <td>{!! $calendarService->json_info !!}</td>
            <td>
                {!! Form::open(['route' => ['calendarServices.destroy', $calendarService->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('calendarServices.show', [$calendarService->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('calendarServices.edit', [$calendarService->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>