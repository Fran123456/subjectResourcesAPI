@extends('layouts.app')

@section('content')



  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <br>
           <h3>Materia: <strong>{{$materia->titulo}}</strong></h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('materias.index') }}">Materias</a></li>
              <li class="breadcrumb-item active" aria-current="page">Editar {{$materia->titulo}}</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-4 text-right">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-plus"></i>
        </button>

        </div>
        <hr>

        <div class="col-md-12">
          <center><h3><strong>Editar materia:</strong></h3></center>
          <hr>
          <form method="POST" action="{{ route('materias.update', $materia->id) }}">
            @csrf
            <input type="hidden" name="_method" value="put" />
              <div class="form-group">
               <label>Siglas</label>
                <input type="text" class="form-control" value="{{$materia->siglas}}" required="" name="siglas">
              </div>

              <div class="form-group">
               <label>Nombre de materia</label>
                <input type="text" class="form-control" required="" value="{{$materia->titulo}}" name="materia">
              </div>

              <label>Descripción</label>
               <textarea class="form-control" name="des">{{$materia->descripcion}}</textarea>
               
              <br>
               <button type="submit" class="btn btn-success">Editar</button>
          </form>
        </div>

    </div>
</div>
@endsection
