<table class="table table-responsive" id="surveyContacts-table">
    <thead>
        <tr>
            <th>Survey Id</th>
        <th>Contact Info</th>
        <th>Update At</th>
        <th>Json Info</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($surveyContacts as $surveyContact)
        <tr>
            <td>{!! $surveyContact->survey_id !!}</td>
            <td>{!! $surveyContact->contact_info !!}</td>
            <td>{!! $surveyContact->update_at !!}</td>
            <td>{!! $surveyContact->json_info !!}</td>
            <td>
                {!! Form::open(['route' => ['surveyContacts.destroy', $surveyContact->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('surveyContacts.show', [$surveyContact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('surveyContacts.edit', [$surveyContact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>