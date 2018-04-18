@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rel Client Payment Method
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'relClientPaymentMethods.store']) !!}

                        @include('rel_client_payment_methods.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
