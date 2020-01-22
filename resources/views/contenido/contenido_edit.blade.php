@extends('layouts.app')

@section('content')



  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           <br>
           <h3>Contenido: <strong>{{$contenido->titulo}}</strong> <br> Tema: <strong>{{$tema->titulo}}</strong></h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url()->previous()}}">Atras</a></li>
              <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
          </nav>
        </div>
        
        <hr>

        <div class="col-md-12">
          <center><h3><strong>Editar contenido:</strong></h3></center>
          <hr>
          <form enctype="multipart/form-data" method="POST" action="{{ route('contenidos.update', $contenido->id) }}">
            @csrf
            <input type="hidden" name="_method" value="put" />
              

              <div class="form-group">
               <label>Contenido:</label>
                <input type="text" class="form-control" required="" value="{{$contenido->titulo}}" name="tema">
              </div>

              <label>Descripción</label>
               <textarea class="form-control" name="des" rows="5">{{$contenido->descripcion}}</textarea>

              
              @if ( is_null($contenido->pdf ) ) <!--pregunta si es null, al ser cierto retorna true pero si es dalso retorna false;-->
                <div class="form-group">
                   <label>Url directa</label>
                    <input type="text" value="{{$contenido->url}}" class="form-control" required="" name="url">
                </div>
                <div class="form-group">
                   <label>Codigo embebido</label>
                   <textarea  rows="4" required=""  name="embebido" class="form-control">{{$contenido->video}}</textarea>
                </div>
                <input type="hidden" name="oculto"  value="youtube">
              @else
               <div class="form-group">
                  <br>
                  <label>Archivo PDF</label>
                  <input type="file" class="form-control-file"   name="file">
                  <input type="hidden" name="oculto"  value="pdf">
                </div>
              @endif

              <input type="hidden" name="materia" value="{{$materia->id}}">

               <div class="form-group" >
                 <label>Temas:</label>
                 <select name="temasxd" class="form-control">
                   @foreach ($temas as $element)
                    @if ($element->id == $tema->id)
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
