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
          <center><h3><strong>Editar materia:</strong></h3></center>
          <hr>
          <form method="POST" action="{{ route('materias.update', $materia->id) }}">
            @csrf
            <input type="hidden" name="_method" value="put" />
              <div class="form-group">
               <label>Siglas</label>
                <input type="text" class="form-control" readonly="" value="{{$materia->siglas}}" required="" name="siglas">
              </div>

              <div class="row"><!--inicio row-->
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nombre de materia</label>
                  <input type="text" class="form-control" required="" value="{{$materia->titulo}}" name="materia">
                </div>
              </div>


              <div class="col-md-6">
                 <div class="form-group">
                   <label>Ciclo</label>
                    <select name="ciclo" class="form-control">
                       @for ($i = 0; $i <10 ; $i++)
                         @if($materia->ciclo == ($i+1))
                           <option selected="" value="{{$i+1}}">ciclo {{$i+1}}</option>
                         @else
                           <option value="{{$i+1}}">ciclo {{$i+1}}</option>
                         @endif
                       @endfor
                     </select>
                  </div>
              </div>

               <div class="col-md-6">
                  <div class="form-group">
                   <label>Ciclo</label>
                    <select name="carrera" class="form-control">
                       @foreach ($carreras as $element)
                         @if($element->id == $materia->carrera_id)
                           <option selected="" value="{{$element->id}}">{{$element->carrera}}</option>
                         @else
                           <option value="{{$element->id}}">{{$element->carrera}}</option>
                         @endif
                       @endforeach
                     </select>
                  </div>
              </div>
              </div><!--fin row-->

              <div class="form-group">
               <label>Descripción</label>
               <textarea class="form-control" name="des">{{$materia->descripcion}}</textarea>
              </div>
               
              
               <button type="submit" class="btn btn-success">Editar</button>
          </form>
        </div>

    </div>
</div>
@endsection
