<!-- Dni Field -->
<div class="form-group">
    {!! Form::label('dni', 'Dni:') !!}
    <p>{!! $clients->dni !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $clients->name !!}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{!! $clients->last_name !!}</p>
</div>

<!-- Legal Name Field -->
<div class="form-group">
    {!! Form::label('legal_name', 'Legal Name:') !!}
    <p>{!! $clients->legal_name !!}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{!! $clients->phone_number !!}</p>
</div>

<!-- Email Address Field -->
<div class="form-group">
    {!! Form::label('email_address', 'Email Address:') !!}
    <p>{!! $clients->email_address !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $clients->address !!}</p>
</div>

<!-- Client Type Id Field -->
<div class="form-group">
    {!! Form::label('client_type_id', 'Client Type Id:') !!}
    <p>{!! $clients->client_type_id !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! ($clients->status==1)?'Activo':'inactivo' !!}</p>
</div>


<!-- Id Field -->
<!--<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $clients->id !!}</p>
</div>-->

<!-- Updated At Field -->
<!--<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $clients->updated_at !!}</p>
</div>-->

<!-- Created At Field -->
<!--<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $clients->created_at !!}</p>
</div>-->

<!-- Deleted At Field -->
<!--<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $clients->deleted_at !!}</p>
</div>-->

