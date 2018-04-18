<!-- Survey Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('survey_id', 'Survey Id:') !!}
    {!! Form::number('survey_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Info Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('contact_info', 'Contact Info:') !!}
    {!! Form::textarea('contact_info', null, ['class' => 'form-control']) !!}
</div>

<!-- Update At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('update_at', 'Update At:') !!}
    {!! Form::date('update_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Json Info Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('json_info', 'Json Info:') !!}
    {!! Form::textarea('json_info', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('surveyContacts.index') !!}" class="btn btn-default">Cancel</a>
</div>
