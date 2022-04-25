
@extends('plantilla')
@section('content')
<style>
    .uper {
    margin-top: 40px;
    }
</style>

<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    <br>
    @endif
<table class="table table-striped">
    <thead>
        <tr align="center">
            <td>ID</td>
            <td>Perido</td>
            <td>Fecha</td>
            <td>Fecha de Apertura</td>
            <td>Hora de Apertura</td>
            <td>Fecha de Cierre</td>
            <td>Hora de Cierre</td>
            <td>Observaciones</td>
            <td colspan="2">ACTION</td>
        </tr>
    </thead>
    <tbody>
        @foreach($elecciones as $eleccion)
        <tr align="center">
            <td>{{$eleccion->id}}</td>
            <td>{{$eleccion->periodo}}</td>
            <td>{{$eleccion->fecha->format('Y-m-d')}}</td>
            <td>{{$eleccion->fechaapertura->format('Y-m-d')}}</td>
            <td>{{$eleccion->horaapertura->format('H:i')}}</td>
            <td>{{$eleccion->fechacierre->format('Y-m-d')}}</td>
            <td>{{$eleccion->horacierre->format('H:i')}}</td>
            <td>{{$eleccion->observaciones}}</td>
            <td><a href="{{ route('eleccion.edit', $eleccion->id)}}"
            class="btn btn-primary">Edit</a></td>
            <td>
            <form action="{{ route('eleccion.destroy', $eleccion->id)}}"
            method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"
            onclick="return confirm('Esta seguro de borrar {{$eleccion->id}}')" >Del</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
@endsection