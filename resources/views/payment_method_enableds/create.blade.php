@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Payment Method Enabled
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'paymentMethodEnableds.store']) !!}

                        @include('payment_method_enableds.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
