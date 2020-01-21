@extends('layouts.app')

@section('content')



  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <br>
           <h3>Tema: <strong>{{$tema->titulo}} </strong><br>Unidad <strong>{{$unidad->titulo}}</strong></h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('temarios.show', $tema->unidad_id) }}">Temas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Editar tema: {{$unidad->tema}}</li>
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
          <center><h3><strong>Editar tema:</strong></h3></center>
          <hr>
          <form method="POST" action="{{ route('temarios.update', $tema->id) }}">
            @csrf
            <input type="hidden" name="_method" value="put" />
              

              <div class="form-group">
               <label>Tema:</label>
                <input type="text" class="form-control" required="" value="{{$tema->titulo}}" name="tema">
              </div>

              <label>Descripción</label>
               <textarea class="form-control" name="des">{{$tema->descripcion}}</textarea>

               <div class="form-group">
               <label>Orden:</label>
                <input type="text" class="form-control" required="" value="{{$tema->orden}}" name="orden">
              </div>

               <div class="form-group" >
                 <label>Unidad:</label>
                 <select name="unidad" class="form-control">
                   @foreach ($unidades as $element)
                    @if ($element->id == $unidad->id)
                      <option selected="" value="{{$element->id}}" >{{$element->titulo}}</option>
                    @else
                      <option value="{{$element->id}}" >{{$element->titulo}}</option>
                    @endif
                     
                   @endforeach
                 </select>
               </div>
               
              <br>
               <button type="submit" class="btn btn-success">Editar</button>
          </form>
        </div>

    </div>
</div>
@endsection
