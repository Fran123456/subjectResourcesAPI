@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="card">
              <div class="card-body text-center">
               <a href="{{ route('materias.index') }}"> <h5 class="card-title"><i class="fas fa-book fa-2x"></i> Materias</h5></a>
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
               <a href=""> <h5 class="card-title"><i class="fas fa-key fa-2x"></i> Keys</h5></a>
              </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
           <br><br>
          <h3>Contenido API</h3>
          <hr>
        </div>

    </div>
</div>
@endsection
