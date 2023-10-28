<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        label.form-label,
        h1 {
            color: #2a79e4;
        }
    </style>
</head>
<body style="background-color: #b6d7a8;">
    <div class="container">
        <br>
        <a href="<?= base_url('tablaUsuarios') ?>" class="btn btn-primary" style="float: right; margin-top: 10px; margin-right: 10px;"><i class="fas fa-arrow-left"></i> Regresar</a>
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Actualizar Cliente</h1>
                <form action="<?= base_url('actualizarusuario') ?>" method="post">
                    <input type="hidden" id="txt_id" name="txt_id" value="<?= $datos['id'] ?>">
                    <div class="mb-3">
                        <label for="txt_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Ingrese Nombre" value="<?= $datos['nombre'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txt_apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="txt_apellido" name="txt_apellido" placeholder="Ingrese Apellido" value="<?= $datos['apellido'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for "txt_nombre_usuario" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="txt_nombre_usuario" name="txt_nombre_usuario" placeholder="Ingrese nombre de usuario" value="<?= $datos['nombre_usuario'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txt_correo" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="txt_correo" name "txt_correo" placeholder="Ingrese correo electrónico" value="<?= $datos['correo'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txt_contra" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="txt_contra" name="txt_contra" placeholder="Ingrese contraseña" value="<?= $datos['contrasena'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txt_rol" class="form-label">Rol</label>
                        <select class="form-control" id="txt_rol" name="txt_rol">
                            <option value="estudiante" <?= ($datos['rol'] === 'estudiante') ? 'selected' : '' ?>>estudiante</option>
                            <option value="bibliotecario" <?= ($datos['rol'] === 'bibliotecario') ? 'selected' : '' ?>>bibliotecario</option>
                            <option value="administrador" <?= ($datos['rol'] === 'administrador') ? 'selected' : '' ?>>administrador</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control btn btn-primary" id="btn_guardar" name="btn_guardar" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/33337d547b.js" crossorigin="anonymous"></script>
</body>
</html>