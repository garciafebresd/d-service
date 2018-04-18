<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Plate Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plate_code', 'Plate Code:') !!}
    {!! Form::text('plate_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Vehicle Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehicle_type_id', 'Vehicle Type Id:') !!}
    {!! Form::number('vehicle_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('vehicles.index') !!}" class="btn btn-default">Cancel</a>
</div>
