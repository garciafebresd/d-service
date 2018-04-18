@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alerts
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($alerts, ['route' => ['alerts.update', $alerts->id], 'method' => 'patch']) !!}

                        @include('alerts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection