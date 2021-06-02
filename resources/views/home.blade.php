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

        <div class="col-sm-4">
          <br>
            <div class="card">
              <div class="card-body text-center">
               <a href="{{ route('colaboradores.index') }}"> <h5 class="card-title"><i class="fas fa-users fa-2x"></i> Colaboradores</h5></a>
              </div>
            </div>
        </div>

        <div class="col-sm-4">
          <br>
            <div class="card">
              <div class="card-body text-center">
               <a href="{{ route('productos.index') }}"> <h5 class="card-title"><i class="fas fa-shopping-cart fa-2x"></i> Market Place</h5></a>
              </div>
            </div>
        </div>

        <div class="col-sm-4">
          <br>
            <div class="card">
              <div class="card-body text-center">
               <a href="{{ route('tutores.index') }}"> <h5 class="card-title"><i class="fas fa-chalkboard fa-2x"></i> Tutores</h5></a>
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

                <li class="list-group-item"><h5>Generalidad</h5> <span>El argumento {key}
                como su nombre lo dice, es una llave que permite el acceso a los datos que retorna la API,
                se debe poseer una key valida, de lo contrario no podra acceder a los datos.</span>
                </li>

                <li class="list-group-item"><h5>{{$url}}/getCarreras/{key}</h5> <span>Obtiene todas las carreras existentes.
                <br><strong>tipo de retorno: json</strong></span>
                </li>

                <li class="list-group-item"><h5>{{$url}}/getMaterias/{id}/{key}</h5> <span>Obtiene las materias de una carrera, por su id.
                  <br>
                  <strong>id:</strong> El argumento {id}, debe ser el id de la carrera.
                  <br><strong>tipo de retorno: json</strong></span>
                </li>

                <li class="list-group-item"><h5>{{$url}}/unidadesByMateria/{id}/{key}</h5> <span>Obtiene las unidades de una materia por su id.
                  <br>
                  <strong>id:</strong> El argumento {id}, debe ser el id de la materia.
                  <br><strong>tipo de retorno: json</strong></span></li>

                <li class="list-group-item"><h5>{{$url}}/temariosByUnidades/{id}/{key}</h5> <span>Obtiene los temas de una unidad por su id <br>
                  <strong>id:</strong> El argumento {id}, debe ser el id de la unidad.
                  <br><strong>tipo de retorno: json</strong></span></li>

                <li class="list-group-item"><h5>{{$url}}/contenidos/{id}/{key}</h5> <span>Obtiene los contenidos (videos y pdf) de una tema por su id
                  <br><strong>id:</strong> El argumento {id}, debe ser el id de del temario.
                  <br><strong>tipo de retorno: json</strong></span></li>


                  <li class="list-group-item"><h5>{{$url}}/buscarMateriaByCarrera/{id}/{arg}/{key}</h5> <span>Obtiene las materias o materia por busqueda, pero deben pertenecer a una carrera en especifica.
                  <br><strong>id:</strong> El argumento {id}, debe ser el id de de la carrera.
                  <br><strong>arg:</strong> El argumento {arg}, debe ser lo que el usuario escribe en la busqueda, debe ser las siglas de la materia.
                  <br><strong>tipo de retorno: json</strong></span></li>


                  <li class="list-group-item"><h5>{{$url}}/getProductos/{key}</h5> <span>Obtiene los productos que han sido aprovados.
                  <br><strong>tipo de retorno: json</strong></span></li>

                  <li class="list-group-item"><h5>{{$url}}/getPictures/{id}/{key}</h5> <span>Obtiene todas las imagenes asociadas a un producto en especifico.
                  <br><strong>id:</strong> El argumento {id}, debe ser el id del producto.
                  <br><strong>tipo de retorno: json</strong></span></li>

                  <li class="list-group-item"><h5>{{$url}}/getColaboradores/{key}</h5> <span>Obtiene todos los colaboradores.
                  <br><strong>tipo de retorno: json</strong></span></li>


              </ul>
              </div>





        </div>

    </div>
</div>
@endsection
