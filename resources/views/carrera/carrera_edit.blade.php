@extends('layouts.app')

@section('content')



  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <br>
           <h3>Carrera: <strong>{{$carrera->carrera}}</strong></h3>
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
          <center><h3><strong>Editar carrera:</strong></h3></center>
          <hr>
          <form method="POST" action="{{ route('carreras.update', $carrera->id) }}">
            @csrf
            <input type="hidden" name="_method" value="put" />
              

              <div class="row"><!--inicio row-->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Carrera</label>
                  <input type="text" class="form-control" required="" value="{{$carrera->carrera}}" name="carrera">
                </div>
              </div>
              </div><!--fin row-->

              <div class="form-group">
               <label>Descripción</label>
               <textarea class="form-control" name="des">{{$carrera->descripcion}}</textarea>
              </div>
               
              
               <button type="submit" class="btn btn-success">Editar</button>
          </form>
        </div>

    </div>
</div>
@endsection
