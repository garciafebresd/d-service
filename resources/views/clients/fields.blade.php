<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', 'Dni:') !!}
    {!! Form::text('dni', null, ['class' => 'form-control']) !!}
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

<!-- Legal Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('legal_name', 'Legal Name:') !!}
    {!! Form::text('legal_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_address', 'Email Address:') !!}
    {!! Form::text('email_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Type Id Field -->
<div class="form-group col-sm-6">
    <label for="employee_type_id">Client Type:</label>
    <select class="form-control" name="client_type_id" id="client_type_id">
        @foreach($clientType as $row)
        <option value="{!! $row->id !!}" 
            @if(isset($client->client_type_id) && $client->client_type_id==$row->id)
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
    <a href="{!! route('clients.index') !!}" class="btn btn-default">Cancel</a>
</div>
