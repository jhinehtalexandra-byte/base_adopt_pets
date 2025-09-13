<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Adopción</title>
</head>
<body>
    <h1>Adoptar a {{ $mascota->nombre }}</h1>

    <form action="{{ route('adopcion.enviar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_mascota" value="{{ $mascota->id_mascota }}">

        <label>Motivo de adopción:</label><br>
        <textarea name="motivo" required maxlength="1000"></textarea><br><br>

        <label>¿Tenés experiencia con mascotas?</label><br>
        <select name="experiencia" required>
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select><br><br>

        <label>Subí el formulario en PDF:</label><br>
        <input type="file" name="pdf_formulario" required accept="application/pdf"><br><br>

        <button type="submit">Enviar solicitud</button>
    </form>
</body>
</html>