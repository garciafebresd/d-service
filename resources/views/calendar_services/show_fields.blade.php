<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $calendarService->id !!}</p>
</div>

<!-- Updated At Field -->
<!--<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $calendarService->updated_at !!}</p>
</div>-->

<!-- Created At Field -->
<!--<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $calendarService->created_at !!}</p>
</div>-->

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! ($calendarService->status==1)?'Activo':'inactivo' !!}</p>
</div>

<!-- Service Date Field -->
<div class="form-group">
    {!! Form::label('service_date', 'Service Date:') !!}
    <p>{!! $calendarService->service_date !!}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client:') !!}
    <p>{!! $calendarService->clients->name.' '.$calendarService->clients->last_name !!}</p>
</div>



<!-- Employee Id Field -->
<div class="form-group">
    {!! Form::label('employee_id', 'Employee:') !!}
    <p>{!! $calendarService->employee->name.' '.$calendarService->employee->last_name !!}</p>
</div>

<!-- Service Id Field -->
<div class="form-group">
    {!! Form::label('service_id', 'Service:') !!}
    <p>{!! $calendarService->service->name !!}</p>
</div>

<!-- Payment Method Id Field -->
<!--<div class="form-group">
    {!! Form::label('payment_method_id', 'Payment Method Id:') !!}
    <p>{!! $calendarService->payment_method_id !!}</p>
</div>-->

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $calendarService->description !!}</p>
</div>

<!-- Json Info Field -->
<div class="form-group">
    {!! Form::label('json_info', 'Json Info:') !!}
    <p>{!! $calendarService->json_info !!}</p>
</div>

<!-- Deleted At Field -->
<!--<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $calendarService->deleted_at !!}</p>
</div>-->

