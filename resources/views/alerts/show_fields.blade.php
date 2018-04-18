<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $alerts->id !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $alerts->updated_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $alerts->created_at !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $alerts->status !!}</p>
</div>

<!-- Latitude Field -->
<div class="form-group">
    {!! Form::label('latitude', 'Latitude:') !!}
    <p>{!! $alerts->latitude !!}</p>
</div>

<!-- Longitude Field -->
<div class="form-group">
    {!! Form::label('longitude', 'Longitude:') !!}
    <p>{!! $alerts->longitude !!}</p>
</div>

<!-- Alert Type Id Field -->
<div class="form-group">
    {!! Form::label('alert_type_id', 'Alert Type Id:') !!}
    <p>{!! $alerts->alert_type_id !!}</p>
</div>

<!-- Json Info Field -->
<div class="form-group">
    {!! Form::label('json_info', 'Json Info:') !!}
    <p>{!! $alerts->json_info !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $alerts->deleted_at !!}</p>
</div>

