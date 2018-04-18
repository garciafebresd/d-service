<!-- Service Type Id Field -->
<div class="form-group">
    {!! Form::label('service_type_id', 'Service Type:') !!}
    <p>{!! $service->serviceType->name !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! ($service->status==1)?'Activo':'inactivo' !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $service->name !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $service->descripcion !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $service->price !!}</p>
</div>

<!-- Json Info Field -->
<div class="form-group">
    {!! Form::label('json_info', 'Json Info:') !!}
    <p>{!! $service->json_info !!}</p>
</div>

