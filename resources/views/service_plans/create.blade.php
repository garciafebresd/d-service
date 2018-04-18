@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Service Plan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'servicePlans.store']) !!}

                        @include('service_plans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
