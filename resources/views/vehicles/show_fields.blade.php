<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $vehicles->id !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $vehicles->updated_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $vehicles->created_at !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $vehicles->status !!}</p>
</div>

<!-- Plate Code Field -->
<div class="form-group">
    {!! Form::label('plate_code', 'Plate Code:') !!}
    <p>{!! $vehicles->plate_code !!}</p>
</div>

<!-- Vehicle Type Id Field -->
<div class="form-group">
    {!! Form::label('vehicle_type_id', 'Vehicle Type Id:') !!}
    <p>{!! $vehicles->vehicle_type_id !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $vehicles->deleted_at !!}</p>
</div>

