<!-- Service Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_date', 'Service Date:') !!}
    {!! Form::date('service_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Id Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>-->
<div class="form-group col-sm-6">
    <label for="client_id">Employee:</label>
    <select class="form-control" name="client_id" id="client_id">
        @foreach($client as $row)
        <option value="{!! $row->id !!}" 
            @if(isset($calendarService->client_id) && $calendarService->client_id==$row->id)
                selected="selected"
            @endif                
                >{!! $row ->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Employee Id Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    {!! Form::number('employee_id', null, ['class' => 'form-control']) !!}
</div>-->
<div class="form-group col-sm-6">
    <label for="employee_id">Employee:</label>
    <select class="form-control" name="employee_id" id="employee_id">
        @foreach($employee as $row)
        <option value="{!! $row->id !!}" 
            @if(isset($calendarService->employee_id) && $calendarService->employee_id==$row->id)
                selected="selected"
            @endif                
                >{!! $row ->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Service Id Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('service_id', 'Service Id:') !!}
    {!! Form::number('service_id', null, ['class' => 'form-control']) !!}
</div>-->
<div class="form-group col-sm-6">
    <label for="service_id">Service:</label>
    <select class="form-control" name="service_id" id="service_id">
        @foreach($service as $row)
        <option value="{!! $row->id !!}" 
            @if(isset($calendarService->service_id) && $calendarService->service_id==$row->id)
                selected="selected"
            @endif                
                >{!! $row ->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Payment Method Id Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('payment_method_id', 'Payment Method Id:') !!}
    {!! Form::number('payment_method_id', null, ['class' => 'form-control']) !!}
</div>-->

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('calendarServices.index') !!}" class="btn btn-default">Cancel</a>
</div>
