<table class="table table-responsive" id="surveys-table">
    <thead>
        <tr>
            <th>Questions</th>
        <th>Status</th>
        <th>Description</th>
        <th>Employee Id</th>
        <th>Client Id</th>
        <th>Json Info</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($surveys as $survey)
        <tr>
            <td>{!! $survey->questions !!}</td>
            <td>{!! $survey->status !!}</td>
            <td>{!! $survey->description !!}</td>
            <td>{!! $survey->employee_id !!}</td>
            <td>{!! $survey->client_id !!}</td>
            <td>{!! $survey->json_info !!}</td>
            <td>
                {!! Form::open(['route' => ['surveys.destroy', $survey->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('surveys.show', [$survey->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('surveys.edit', [$survey->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>