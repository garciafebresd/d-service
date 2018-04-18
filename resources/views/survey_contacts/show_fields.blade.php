<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $surveyContact->id !!}</p>
</div>

<!-- Survey Id Field -->
<div class="form-group">
    {!! Form::label('survey_id', 'Survey Id:') !!}
    <p>{!! $surveyContact->survey_id !!}</p>
</div>

<!-- Contact Info Field -->
<div class="form-group">
    {!! Form::label('contact_info', 'Contact Info:') !!}
    <p>{!! $surveyContact->contact_info !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $surveyContact->created_at !!}</p>
</div>

<!-- Update At Field -->
<div class="form-group">
    {!! Form::label('update_at', 'Update At:') !!}
    <p>{!! $surveyContact->update_at !!}</p>
</div>

<!-- Json Info Field -->
<div class="form-group">
    {!! Form::label('json_info', 'Json Info:') !!}
    <p>{!! $surveyContact->json_info !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $surveyContact->deleted_at !!}</p>
</div>

