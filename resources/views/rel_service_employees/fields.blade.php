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
            @if(isset($relServiceEmployee->service_id) && $relServiceEmployee->service_id==$row->id)
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
    <label for="service_id">Employee:</label>
    <select class="form-control" name="employee_id" id="employee_id">
        @foreach($employee as $row)
        <option value="{!! $row->id !!}" 
            @if(isset($relServiceEmployee->employee_id) && $relServiceEmployee->employee_id==$row->id)
                selected="selected"
            @endif                
                >{!! $row ->name !!}</option>
        @endforeach
    </select>
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
    <a href="{!! route('relServiceEmployees.index') !!}" class="btn btn-default">Cancel</a>
</div>
