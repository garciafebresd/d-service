<!-- Date Route Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_route', 'Date Route:') !!}
    {!! Form::date('date_route', null, ['class' => 'form-control']) !!}
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

<!-- Gps Data Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('gps_data', 'Gps Data:') !!}
    {!! Form::textarea('gps_data', null, ['class' => 'form-control']) !!}
</div>

<!-- Gps Status Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('gps_status', 'Gps Status:') !!}
    {!! Form::textarea('gps_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('routePoints.index') !!}" class="btn btn-default">Cancel</a>
</div>
