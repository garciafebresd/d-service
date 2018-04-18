<table class="table table-responsive" id="serviceRatings-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Json Info</th>
        <th>Calendar Service Id</th>
        <th>Client Id</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($serviceRatings as $serviceRatings)
        <tr>
            <td>{!! $serviceRatings->status !!}</td>
            <td>{!! $serviceRatings->json_info !!}</td>
            <td>{!! $serviceRatings->calendar_service_id !!}</td>
            <td>{!! $serviceRatings->client_id !!}</td>
            <td>{!! $serviceRatings->description !!}</td>
            <td>
                {!! Form::open(['route' => ['serviceRatings.destroy', $serviceRatings->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('serviceRatings.show', [$serviceRatings->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('serviceRatings.edit', [$serviceRatings->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>