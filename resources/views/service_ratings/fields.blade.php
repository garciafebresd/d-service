<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Json Info Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('json_info', 'Json Info:') !!}
    {!! Form::textarea('json_info', null, ['class' => 'form-control']) !!}
</div>

<!-- Calendar Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('calendar_service_id', 'Calendar Service Id:') !!}
    {!! Form::number('calendar_service_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('serviceRatings.index') !!}" class="btn btn-default">Cancel</a>
</div>
