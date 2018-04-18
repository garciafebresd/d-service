@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Config Table
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($configTable, ['route' => ['configTables.update', $configTable->id], 'method' => 'patch']) !!}

                        @include('config_tables.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection