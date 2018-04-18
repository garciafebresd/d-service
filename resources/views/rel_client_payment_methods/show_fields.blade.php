<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $relClientPaymentMethod->id !!}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{!! $relClientPaymentMethod->client_id !!}</p>
</div>

<!-- Payment Method Id Field -->
<div class="form-group">
    {!! Form::label('payment_method_id', 'Payment Method Id:') !!}
    <p>{!! $relClientPaymentMethod->payment_method_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $relClientPaymentMethod->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $relClientPaymentMethod->updated_at !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $relClientPaymentMethod->status !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $relClientPaymentMethod->deleted_at !!}</p>
</div>

