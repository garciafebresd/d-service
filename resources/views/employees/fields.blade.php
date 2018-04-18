<!-- Company Id Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::number('company_id', null, ['class' => 'form-control']) !!}
</div>-->
<!-- Company Id Field -->
<!--<div class="form-group col-sm-6">
    <label for="company_id">Company:</label>
    <select class="form-control" name="company_id" id="company_id">
        <option value="null">seleccione....</option>
        @foreach($company as $row)
        <option value="{!! $row->id !!}" 
            @if(isset($employee->company_id) && $employee->company_id==$row->id)
                selected="selected"
            @endif                
                >{!! $row ->legal_name !!}</option>
        @endforeach
    </select>
</div>-->

<!-- Service Type Id Field -->
<div class="form-group col-sm-6">
    <label for="employee_type_id">Employee Type:</label>
    <select class="form-control" name="employee_type_id" id="employee_type_id">
        @foreach($employeeType as $row)
        <option value="{!! $row->id !!}" 
            @if(isset($employee->employee_type_id) && $employee->employee_type_id==$row->id)
                selected="selected"
            @endif                
                >{!! $row ->name !!}</option>
        @endforeach
    </select>
</div>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Dni Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni_number', 'Dni Number:') !!}
    {!! Form::text('dni_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Json Info Field -->
<div class="form-group col-sm-6">
    {!! Form::label('json_info', 'Json Info:') !!}
    {!! Form::textarea('json_info', null, ['class' => 'form-control']) !!}
</div>

<!-- Json Permission Field -->
<div class="form-group col-sm-6">
    {!! Form::label('json_permission', 'Json Permission:') !!}
    {!! Form::textarea('json_permission', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('employees.index') !!}" class="btn btn-default">Cancel</a>
</div>
