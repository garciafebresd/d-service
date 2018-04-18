@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Service Ratings
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($serviceRatings, ['route' => ['serviceRatings.update', $serviceRatings->id], 'method' => 'patch']) !!}

                        @include('service_ratings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection