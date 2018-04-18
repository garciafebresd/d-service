@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Route Points
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'routePoints.store']) !!}

                        @include('route_points.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
