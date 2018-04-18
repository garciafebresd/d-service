@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Client Type
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'clientTypes.store']) !!}

                        @include('client_types.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
