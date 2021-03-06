@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            System Log
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($systemLog, ['route' => ['systemLogs.update', $systemLog->id], 'method' => 'patch']) !!}

                        @include('system_logs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection