
<!-- Service Type Id Field -->
<div class="form-group col-sm-6">
    <label for="service_type_id">Service Type:</label>
    <select class="form-control" name="service_type_id" id="service_type_id">
        @foreach($serviceTypes as $serviceType)
        <option value="{!! $serviceType->id !!}" 
            @if(isset($service->service_type_id) && $service->service_type_id==$serviceType->id)
                selected="selected"
            @endif                
                >{!! $serviceType ->name !!}</option>
        @endforeach
    </select>
</div>



<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Json Info Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('json_info', 'Json Info:') !!}
    {!! Form::textarea('json_info', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('services.index') !!}" class="btn btn-default">Cancel</a>
</div>
