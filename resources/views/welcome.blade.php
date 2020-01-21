@extends('layouts.app')

@section('content')
<div class="container">
    <h3>API</h3>
    <div class="row">
    <div class="col-md-12">
        <ul class="list-group">
          <li class="list-group-item active"><h5><STRONG>Consultas</STRONG></h5></li>
          <li class="list-group-item"><h5>{{$url}}/getMaterias/{key}</h5> <span>Obtener todas las materias</span></li>
          <li class="list-group-item"><h5>{{$url}}/unidadesByMateria/{id}/{key}</h5> <span>Obtener las unidades de una materia por su id tipo: entero</span></li>
          <li class="list-group-item"><h5>{{$url}}/temariosByUnidades/{id}/{key}</h5> <span>Obtener los temas de una unidad por su id tipo: entero</span></li>
          <li class="list-group-item"><h5>{{$url}}/contenidos/{id}/{key}</h5> <span>Obtener los contenidos (videos y pdf) de una tema por su id tipo: entero</span></li>
        </ul>
        </div>
    </div>
</div>



@endsection
