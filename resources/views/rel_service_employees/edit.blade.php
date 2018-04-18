@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rel Service Employee
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($relServiceEmployee, ['route' => ['relServiceEmployees.update', $relServiceEmployee->id], 'method' => 'patch']) !!}

                        @include('rel_service_employees.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection