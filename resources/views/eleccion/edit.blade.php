
@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
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
        <form method="post" action="{{ route('eleccion.update', $eleccion->id) }}"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
                <div class="form-group">
                    <label for="periodo">Periodo:</label>
                    <input type="text" id="periodo"
                    value= "{{$eleccion->periodo}}"
                    class="form-control" name="periodo" />
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha"
                    value= "{{$eleccion->fecha->format('Y-m-d')}}"
                    class="form-control" name="fecha"> 
                </div>
                <div class="form-group">
                    <label for="apertura">Fecha de Apertura:</label>
                    <input type="date" id="apertura"
                    value= "{{$eleccion->fechaapertura->format('Y-m-d')}}"
                    class="form-control" name="apertura"> 
                </div>
                <div class="form-group">
                    <label for="horaApertura">Hora de Apertura:</label>
                    <input type="time" id="horaApertura"
                    value= "{{$eleccion->horaapertura->format('H:i')}}"
                    class="form-control" name="horaApertura"> 
                </div>
                <div class="form-group">
                    <label for="cierre">Fecha de Cierre:</label>
                    <input type="date" id="cierre"
                    value= "{{$eleccion->fechacierre->format('Y-m-d')}}"
                    class="form-control" name="cierre"> 
                </div>
                <div class="form-group">
                    <label for="horaCierre">Hora de Cierre:</label>
                    <input type="time" id="horaCierre"
                    value= "{{$eleccion->horacierre->format('H:i')}}"
                    class="form-control" name="horaCierre"> 
                </div>
                <div class="form-group">
                    <label for="observaciones">Observaciones:</label>
                    <input type="text" id="observaciones"
                    value= "{{$eleccion->observaciones}}"
                    class="form-control" name="observaciones" />
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection