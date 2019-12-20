@extends('layouts.app')

@section('content')


<!-- Button trigger modal -->

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="{{ route('temarios.store') }}">
      @csrf

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva tema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <label>Siglas</label>
            <input type="text" class="form-control" required="" name="siglas">
            <br><br>
            <label>Nombre de materia</label>
            <input type="text" class="form-control" required="" name="materia">

            <br><br>
            <label>Descripción</label>
            <textarea class="form-control" name="des"></textarea>
         </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i></button>
        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i></button>
      </div>
    </div>
    </form>
  </div>
</div>




          




  <div class="container">
      @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
          <br>
          <h3>Temario de: <strong>{{$unidad->titulo}}</strong></h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('materias.index') }}">Materias</a></li>
              <li class="breadcrumb-item"><a href="{{ route('materias.show', $materia->id) }}">{{$materia->titulo}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">Temarios</li>
            </ol>
          </nav>
          
        </div>
        <div class="col-md-6 text-right">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-plus"></i>
        </button>

        </div>
        <hr>

        <div class="col-md-12">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Materia</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Consultar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($temarios as $key => $value)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$value->titulo}}</td>
                  <td>{{$value->descripcion}}</td>
                  <td><a href="{{ route('materias.show', $value->id) }}" class="btn btn-info"><i class="far fa-eye"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
        </div>

    </div>
</div>
@endsection
