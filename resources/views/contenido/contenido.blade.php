@extends('layouts.app')

@section('content')


<!-- Button trigger modal -->

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" method="post" action="{{ route('contenidos.store') }}">
      @csrf

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subir PDF </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <label>Nombre</label>
            <input type="text" class="form-control" required="" name="nombre">
            <br><br>

             <label>Descripción</label>
               <textarea class="form-control" name="des"></textarea>

                 <input type="hidden" value="{{$temario->id}}" name="temario">
                  <input type="hidden" value="pdf" name="op">

            
            <div class="form-group">
              <br>
              <label>Archivo PDF</label>
              <input type="file" class="form-control-file" required=""  name="file">
            </div>

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


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="{{ route('contenidos.store') }}">
      @csrf

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anexa un video youtube</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <label>Nombre</label>
            <input type="text" class="form-control" required="" name="nombre">
            <br><br>
            <label>Codigo embebido</label>
            <textarea  rows="4" required="" name="embebido" class="form-control"></textarea>

            <br><br>
            <label>Url directa</label>
            <input type="text" class="form-control" required="" name="url">

             <input type="hidden" value="{{$temario->id}}" name="temario">
              <input type="hidden" value="video" name="op">

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

      @if(session('delete'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{Session('delete')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
           <br>
           <h3>Contenido sobre: <strong>{{$temario->titulo}}</strong></h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('carreras.index') }}">Carreras</a></li>
              <li class="breadcrumb-item"><a href="{{ route('materias.show', $carrera->id) }}">Materias de {{$carrera->carrera}}</a></li>
              <li class="breadcrumb-item "><a href="{{ route('unidades.show', $materia->id) }}">{{$unidad->titulo}}</a></li>
              <li class="breadcrumb-item "><a href="{{ route('temarios.show', $unidad->id) }}">{{$temario->titulo}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contenido</li>
            </ol>
          </nav>
          
        </div>
        <div class="col-md-4 text-right">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          <i class="far fa-file-pdf fa-2x"></i>
        </button>


         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
          <i class="fab fa-youtube fa-2x"></i>
        </button>

        </div>
        <hr>


        <div class="col-md-12">

        </div>

        <div class="col-md-12">
          @if(count($contenidoPDF) > 0 || count($contenidoVideo) > 0)
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th width="40"  scope="col">#</th>
                  <th width="300" scope="col">Materia</th>
                  <th scope="col">Descripción</th>
                  <th width="40" scope="col">contenido</th>
                  <th width="40" scope="col">Editar</th>
                  <th width="40" scope="col">Borrar</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $n =0
                @endphp
                @foreach ($contenidoPDF as $key => $value)

                @php
                  $n++
                @endphp
                <tr>
                  <th scope="row">{{$n}}</th>
                  <td>{{$value->titulo}}</td>
                  <td>{{$value->descripcion}}</td>
                  <td> <a target="_blank" href="{{url('/')}}/pdf/{{$value->pdf}}"><i class="far fa-file-pdf fa-2x"></i></a></td>
                  
<td><a href="{{ route('contenidos.edit', $value->id) }}" class="btn btn-warning "><i class="far fa-edit"></i></a></td>
                  <td><form method="POST" action="{{ route('contenidos.destroy', $value->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                  </form></td>
                </tr>

                @endforeach

                @foreach ($contenidoVideo as $key=> $value)

                @php
                  $n++
                @endphp
                <tr>
                  <th scope="row">{{$n}}</th>
                  <td>{{$value->titulo}}</td>
                  <td>{{$value->descripcion}}</td>
                  <td><a target="_blank" href="{{$value->url}}"><i class="fab fa-youtube fa-2x"></i></a></td>

                  <td><a href="{{ route('contenidos.edit', $value->id) }}" class="btn btn-warning "><i class="far fa-edit"></i></a></td>
                  
                  <td><form method="POST" action="{{ route('contenidos.destroy', $value->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                  </form></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else

             <hr><h3>No hay contenido por el momento...</h3>
            @endif
        </div>

    </div>
</div>
@endsection
