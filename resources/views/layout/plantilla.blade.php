<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">


    <title>@yield('titulo', 'Mi sitio web')</title>

  </head>
  <body>

    <!-- Para almacenar el contenido -->
    <div class="container">
        @yield('contenido')
    </div>
    
    <script>
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1500
})

    </script>
    
    <!--Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Jquery -->
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function() {

        $("#agregarUsuario").click(function(e) {
            e.preventDefault();

           // Obtener los valores del formulario
            var nombre = $('#nombre').val();
            var apellido = $('#apellido').val();
            var correoElectronico = $('#correoElectronico').val();
            var contra = $('#contra').val();


            // Validar el campo de Nombre
            if (nombre == '') {
                $('#error-nombre').show(); 
                $('#nombre').focus().focus();;
                return false; 
            } else {
                $('#error-nombre').hide(); // oculta el mensaje de error
            }

            if (apellido == '') {
                $('#error-apellido').show(); 
                $('#apellido').focus();
                return false; 
            } else {
                $('#error-apellido').hide(); // oculta el mensaje de error
            }

            if (!isValidEmail(correoElectronico)) {
                $('#error-correo').show(); 
                $('#correoElectronico').focus();
                return false; 
            }else {
                $('#error-correo').hide(); 
            }

            if (contra.length < 8) {
                $('#error-contra').show(); 
                $('#contra').focus();
                return false;
            }else {
                $('#error-contra').hide(); 
            }

           // Envía la solicitud AJAX si todos los campos son válidos
            $.ajax({
                method: 'POST',
                url: '{{ route("usuario.store") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    nombre: nombre,
                    apellido: apellido,
                    correoElectronico: correoElectronico,
                    contra: contra,
                },
                success: function(response) {
                    // Muestra un mensaje de éxito y redirige al usuario a la página principal
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 5000 
                    }).then(function() {
                        window.location.href = '{{ route("index") }}';
                    });
                },
                error: function(xhr, status, error) {
                    // Muestra un mensaje de error si hay un problema con la solicitud AJAX
                    alert('Ha ocurrido un error al guardar el usuario');
                }
            });


        });
    });

    // Validar el formato del correo electrónico
    function isValidEmail(email) {
        var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return pattern.test(email);
    }

    </script>
    


  </body>
</html>