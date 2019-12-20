@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
          <br>
          <h3>{{$materia->titulo}}</h3>

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('materias.index') }}">Materias</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$materia->titulo}}</li>
            </ol>
          </nav>
          
        </div>
        <div class="col-md-6 text-right">
            <a href="" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        </div>
           <hr>
        <div class="col-md-12">
            
             <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th width="50" scope="col">#</th>
                  <th scope="col">Materia</th>
                  <th scope="col">Descripción</th>
                  <th width="50" scope="col">Consultar</th>
                  <th width="50" scope="col">Agregar</th>
                  <th width="50" scope="col">Editar</th>
                  <th width="50" scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($unidades as $key => $value)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$value->titulo}}</td>
                  <td>{{$value->descripcion}}</td>
                  <td><a href="{{ route('temarios.show', $value->id) }}" class="btn btn-info"><i class="far fa-eye"></i></a></td>
                  <td><a href="" class="btn btn-success"><i class="fas fa-plus"></i></a></td>
                  <td><a href="" class="btn btn-warning "><i class="far fa-edit"></i></a></td>
                  <td><a href="" class="btn btn-danger "><i class="far fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>

        </div>

    </div>
</div>
@endsection
