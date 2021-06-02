@extends('layouts.app')

@section('content')



  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <br>
           <h3>Unidad: <strong>{{$unidad->titulo}}</strong></h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url()->previous()}}">Atras</a></li>
              <li class="breadcrumb-item active" aria-current="page">Editar</li>
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
          <center><h3><strong>Editar unidad:</strong></h3></center>
          <hr>
          <form method="POST" action="{{ route('unidades.update', $unidad->id) }}">
            @csrf
            <input type="hidden" name="_method" value="put" />
              <div class="form-group">
               <label>Nombre de unidad</label>
                <input type="text" class="form-control" value="{{$unidad->titulo}}" required="" name="titulo">
              </div>

              <label>Descripción</label>
              <textarea class="form-control" name="des">{{$unidad->descripcion}}</textarea>
               <input type="hidden" name="materiaid" value="{{$materia->id}}">
              <div class="form-group">
               <label>Orden</label>
                <input type="text" class="form-control" required="" value="{{$unidad->orden_u}}" name="orden">
              </div>

              <br>
               <button type="submit" class="btn btn-success">Editar</button>
          </form>
        </div>

        

    </div>
</div>
@endsection
