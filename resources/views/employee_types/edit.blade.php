@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Employee Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($employeeType, ['route' => ['employeeTypes.update', $employeeType->id], 'method' => 'patch']) !!}

                        @include('employee_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection