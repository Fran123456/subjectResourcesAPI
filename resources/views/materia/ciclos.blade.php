@extends('layouts.app')

@section('content')


<!-- Button trigger modal -->

<!-- Button trigger modal -->
  <div class="container">
    
    
    <div class="row justify-content-center">
        <div class="col-md-8">
           <br>
           <h3>Ciclos</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('carreras.index') }}">Carreras</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ciclos de {{$carrera->carrera}}</li>
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
          <div class="row">
              @for ($i = 0; $i <10 ; $i++)
                  <div class="col-md-3">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Ciclo {{$i+1}}</h5>
                            <a href="{{ route('materias-ciclo', ['id'=>$carrera->id, 'ciclo' =>$i+1]) }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                          </div>
                        </div>
                  </div> 
                @endfor
          </div> 
        </div>
    </div>
</div>
@endsection
