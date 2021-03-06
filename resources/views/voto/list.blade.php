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
    <br />
    @endif
<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>PERIODO</td>
            <td>CASILLA</td>
            <td>CANDIDATOS</td>
            <td>VOTOS</td>
            <td>EVIDENCIA</td>
            <td colspan="2">ACTION</td>
        </tr>
    </thead>
    <tbody>
        @foreach($votos as $voto)
      
        
        <tr>
            <td>{{$voto->id}}</td>
            <td>{{$voto->eleccion->periodo}}</td>
            <td>{{$voto->casilla->ubicacion}}</td>
            <td>
          <table>
            @foreach($votocandidatos as $votoca)
         
            <tr>
            <td>{{$votoca->candidato->nombrecompleto}}</td>
            </tr>
            @endforeach
            </table>
            </td>
            <td>
          <table>
          @foreach($votocandidatos as $votoca)
         
            <tr>
            
            <td>{{$votoca->votos}}</td>
            </tr>
            @endforeach
            </table>
            </td>
            <td><a href="pdf/{{$voto->evidencia}}">Evidencia</td>
            <td><a href="{{ route('voto.edit', $voto->id)}}"
            class="btn btn-primary">Edit</a></td>
            <td>
            <form action="{{ route('voto.destroy', $voto->id)}}"
            method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"
            onclick="return confirm('Esta seguro de borrar {{$voto->id}}')" >Del</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
@endsection