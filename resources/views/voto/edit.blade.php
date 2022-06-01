@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
    .wiht {with:10px;}
</style>
<div class="card uper">
    <div class="card-header">
        Editar Eleccion
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('voto.update', $votos->id) }}"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <table class="table table-striped">
    <thead>
        <tr>
          
            <td>PERIODO</td>
            <td>CASILLA</td>
            <td>CANDIDATOS</td>
            
            <td>VOTOS</td>
            <td>EVIDENCIA</td>
            
        </tr>
    </thead>
    <tbody>
       

        <tr>
            
            <td>
            <input type="text" id="periodo"
                    value= "{{$votos->eleccion->periodo}}"
                    class="form-control" name="periodo" />
            </td>
            <td>
            <select value="{{$votos->casilla_id}}" name="casilla_id" id="casilla">
                @foreach ($casillas as $casilla)

                 @php
                 $selected= $casilla->id==$votos->casilla->id?"selected":"";
                 @endphp

                    <option {{$selected}} value="{{$casilla->id}}">{{$casilla->ubicacion}}</option>
                @endforeach
                </select>
            </td>
            <td>
          <table>
            @foreach($votocandidatos as $votoca)
         
            <tr>
            <td>{{$votoca->candidato->nombrecompleto}}</td>
            </tr>
            @endforeach
            </table>

            </td>
            @foreach($votocandidatos as $votoca)
           
         <tr>
         
         <td>
          
         <input type="number" name="candidato_{{$votoca->votos}}" value="{{$votoca->votos}}"></td>
         </tr>
         @endforeach
          
        </tr>
        
    </tbody>
</table>
                
                <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection