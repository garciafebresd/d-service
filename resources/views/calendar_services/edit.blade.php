@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Calendar Service
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($calendarService, ['route' => ['calendarServices.update', $calendarService->id], 'method' => 'patch']) !!}

                        @include('calendar_services.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection