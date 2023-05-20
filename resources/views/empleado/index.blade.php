@extends('adminlte::page')



@section('content_header')
    <h1 class="m-0 text-dark">Empleados</h1>
@stop

@section('content')

@if (session('mensaje'))
    <div class="alert alert-success">
        <strong>{{session('mensaje')}}</strong>
    </div>
@endif
<div class = "card">

    <div class = "card-body">

        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="dark" with-buttons>
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id}}</td>
                    <td>{{$empleado->nombre}}</td>
                    <td>{{$empleado->apellido}}</td>
                    <td>{{ $empleado->cedula}}</td>
                    <td>{{$empleado->telefono}}</td>
                    <td>{{$especialidades->where('id', $empleado->especialidad_id)->first()->nombre}}</td>
                   
                    {{-- <a href="{{route('empleado.edit',$empleado)}}" class="btn btn-primary btn-sm">editar</a>  
                    //este es codigo de un boton normalito--}}
                    
                     <td width="15px">  {{--esto es como una columna mas  --}}
                         <div class="d-flex">  {{-- esto es lo que hace que los datos esten uno al lado del otro --}}
                            <a href="{{route('empleado.edit',$empleado)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" ><i class="fa fa-lg fa-fw fa-pen"></i></a>  
                            {{-- boton de eliminar  --}}
                            <form action="{{route('empleado.destroy',$empleado)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                {{-- <input type="submit" value = "eliminar" class="btn btn-danger btn-sm">  codigo basura pero lo guardo por si me sirve--}}
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </form>
                            {{-- boton de show para poder ver los datos de un empleado --}}
                            <a href="{{route('empleado.show',$empleado)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                        </div>

                    </td>

                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>

</div>
@stop
