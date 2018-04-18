<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Identifier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identifier', 'Identifier:') !!}
    {!! Form::text('identifier', null, ['class' => 'form-control']) !!}
</div>

<!-- Legal Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('legal_name', 'Legal Name:') !!}
    {!! Form::text('legal_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo_url', 'Logo Url:') !!}
    {!! Form::text('logo_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Life Field -->
<div class="form-group col-sm-6">
    {!! Form::label('life', 'Life:') !!}
    {!! Form::date('life', null, ['class' => 'form-control']) !!}
</div>

<!-- Register At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('register_at', 'Register At:') !!}
    {!! Form::date('register_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Json Info Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('json_info', 'Json Info:') !!}
    {!! Form::textarea('json_info', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('companies.index') !!}" class="btn btn-default">Cancel</a>
</div>
