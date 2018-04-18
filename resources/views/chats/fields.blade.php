<!-- Viewed At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('viewed_at', 'Viewed At:') !!}
    {!! Form::date('viewed_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('text', 'Text:') !!}
    {!! Form::text('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Calendar Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('calendar_service_id', 'Calendar Service Id:') !!}
    {!! Form::number('calendar_service_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    {!! Form::number('employee_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Json Info Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('json_info', 'Json Info:') !!}
    {!! Form::textarea('json_info', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('chats.index') !!}" class="btn btn-default">Cancel</a>
</div>
