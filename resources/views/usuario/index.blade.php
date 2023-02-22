<!-- Hereda la estructura basica -->
@extends('layout.plantilla')


<!-- TItulo de la pagina -->
@section('titulo', 'Pagina Principal')


<!-- Contenido de la pagina -->
@section('contenido')

<div class="title-box">
    <h1>Tabla de usuarios</h1>
</div>

<form class="d-flex mb-4" action="{{ route('index') }}" method="GET">
    <input name="buscar" class="form-control me-2 half-width" type="search" value="{{ $buscar }}" placeholder="Search" aria-label="Search">
    <button class="btn btn-primary" type="submit">Buscar</button>
</form>


  <!-- Boton del modal -->
<button type="button" class="btn btn-success btn-nueva" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  <b>+</b> Añadir usuarios
</button>

<table class="table table-bordered grocery-crud-table table-hover">

  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Correo electronico</th>
      <th>Contraseña</th>
    </tr>
  </thead>

  <tbody>
      <!-- Valida si coincide con la busqueda -->
      @if (count($usuarios)<=0)
      <tr>
        <td colspan="4">No hay datos!!!</td>
      </tr>

      @else
      @foreach ($usuarios as $usuario)

      <tr>
        <td>{{ $usuario->nombre }}</td>
        <td>{{ $usuario->apellido }}</td>
        <td>{{ $usuario->correoElectronico }}</td>
        <td>{{ $usuario->contra }}</td>
      </tr>

      @endforeach
      @endif
    </tbody>
  </table>
   <!-- Muestra los link a la paginacion -->
   {{$usuarios->links()}}
 

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form method="POST">
          <!-- Enviar los datos de forma segura -->
            @csrf 

          <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Usuario:</label>
                <input type="text" class="form-control" id="nombre">
                <span id="error-nombre" class="error-message" style="display:none">El campo Nombre es obligatorio</span>
          </div>
          <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido">
                <span id="error-apellido" class="error-message" style="display:none">El campo Apellido es obligatorio</span>
          </div>
          <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Correo electrónico:</label>
                <input type="text" class="form-control" id="correoElectronico">
                <span id="error-correo" class="error-message" style="display:none">El correo electrónico no es válido</span>
          </div>
          <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Contraseña:</label>
                <input type="text" class="form-control" id="contra">
                <span id="error-contra" class="error-message" style="display:none">La contraseña debe tener al menos 8 caracteres</span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success" id="agregarUsuario">Agregar</button>
      </div>
      </form>

    </div>
  </div>
</div>

</div>
</div>

@endsection