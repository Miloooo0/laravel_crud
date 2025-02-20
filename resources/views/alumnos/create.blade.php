<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Alumno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @vite('resources/css/app.css')
</head>
<body>
    <x-mine.nav Titulo="Nuevo Alumno"/>
    <div class="container mt-4">
    <br>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('alumnos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" required placeholder="Ejemplo: 12345678A">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
            </div>

            <div class="mb-3">
                <label for="idiomas" class="form-label">Cantidad de Idiomas</label>
                <input type="text" class="form-control" id="idiomas" name="idiomas">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Alumno</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
