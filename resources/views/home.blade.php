@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="card">
              <div class="card-body text-center">
               <a href="{{ route('carreras.index') }}"> <h5 class="card-title"><i class="fas fa-book fa-2x"></i> Carreras</h5></a>
              </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
              <div class="card-body text-center">
               <a href=""> <h5 class="card-title"><i class="fas fa-users fa-2x"></i> Usuarios</h5></a>
              </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
              <div class="card-body text-center">
               <a href="{{ route('keys.index') }}"> <h5 class="card-title"><i class="fas fa-key fa-2x"></i> Keys</h5></a>
              </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
           <br><br>
          <h3>Contenido API</h3>
          <hr>


              <div class="col-md-12">
              <ul class="list-group">
                <li class="list-group-item active"><h5><STRONG>Consultas</STRONG></h5></li>
                <li class="list-group-item"><h5>{{$url}}/getCarreras/{key}</h5> <span>Obtener todas las carreras <br><strong>tipo de retorno: json</strong></span></li>

                <li class="list-group-item"><h5>{{$url}}/getMaterias/{id}/{key}</h5> <span>Obtener las materias de una carrera, por su id <br><strong>tipo de retorno: json</strong></span></li>

                <li class="list-group-item"><h5>{{$url}}/unidadesByMateria/{id}/{key}</h5> <span>Obtener las unidades de una materia por su id  <br><strong>tipo de retorno: json</strong></span></li>

                <li class="list-group-item"><h5>{{$url}}/temariosByUnidades/{id}/{key}</h5> <span>Obtener los temas de una unidad por su id <br><strong>tipo de retorno: json</strong></span></li>

                <li class="list-group-item"><h5>{{$url}}/contenidos/{id}/{key}</h5> <span>Obtener los contenidos (videos y pdf) de una tema por su id <br><strong>tipo de retorno: json</strong></span></li>
              </ul>
              </div> 





        </div>

    </div>
</div>
@endsection
