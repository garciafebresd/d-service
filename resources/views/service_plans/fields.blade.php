<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_id', 'Service Id:') !!}
    {!! Form::number('service_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('servicePlans.index') !!}" class="btn btn-default">Cancel</a>
</div>
