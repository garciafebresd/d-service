<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::number('latitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::number('longitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Alert Type Id Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('alert_type_id', 'Alert Type Id:') !!}
    {!! Form::number('alert_type_id', null, ['class' => 'form-control']) !!}
</div>-->

<!-- Employee Type Id Field -->
<div class="form-group col-sm-6">
    <label for="alert_type_id">alert Type:</label>
    <select class="form-control" name="alert_type_id" id="alert_type_id">
        @foreach($alertType as $row)
        <option value="{!! $row->id !!}" 
            @if(isset($alerts->alert_type_id) && $alerts->alert_type_id==$row->id)
                selected="selected"
            @endif                
                >{!! $row ->name !!}</option>
        @endforeach
    </select>
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
    <a href="{!! route('alerts.index') !!}" class="btn btn-default">Cancel</a>
</div>
