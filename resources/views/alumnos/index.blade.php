<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @vite('resources/css/app.css')

</head>
<x-mine.nav Titulo="Gestor de Alumnos"/>
<body>
    <div class="container mt-4">
        <a href="{{ route('alumnos.create') }}" class="btn btn-primary">Agregar Alumno</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Email</th>
                    <th>Fecha Nacimiento</th>
                    <th>Idiomas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alumnos as $alumno): ?>
                    <tr>
                        <td><?= $alumno->id ?></td>
                        <td><?= $alumno->nombre ?></td>
                        <td><?= $alumno->dni ?></td>
                        <td><?= $alumno->email ?></td>
                        <td><?= \Carbon\Carbon::parse(time: $alumno->fechaNacimiento)->format('d/m/Y') ?></td>
                        <td><?= $alumno->idiomas ?></td>
                        <td>
                            <a href="<?= route('alumnos.edit', $alumno->id) ?>" class="btn btn-warning">Editar</a>
                            <form action="<?= route('alumnos.destroy', $alumno->id) ?>" method="POST" style="display:inline;">
                                <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este alumno?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <x-mine.footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
