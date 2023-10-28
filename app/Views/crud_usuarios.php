<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@6.3.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>"> <!-- Agrega tu propio archivo de estilos CSS -->
</head>
<body style="background-color: #b6d7a8;">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-4">Dashboard del Administrador - Usuarios</h1>
            <a href="<?= base_url('dashboard_administrador') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Regresar</a>
        </div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#usuarioModal">
            <i class="fas fa-user-plus"></i> Agregar Usuario
        </button>
        <div class="modal fade" id="usuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('guardarUsuario') ?>" method="post">
                            <div class="mb-3">
                                <label for="txt_nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Ingrese Nombre">
                            </div>
                            <div class="mb-3">
                                <label for="txt_apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="txt_apellido" name="txt_apellido" placeholder="Ingrese Apellido">
                            </div>
                            <div class="mb-3">
                                <label for="txt_nombre_usuario" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="txt_nombre_usuario" name="txt_nombre_usuario" placeholder="Ingrese nombre de usuario">
                            </div>
                            <div class="mb-3">
                                <label for="txt_correo" class="form-label">Correo electronico</label>
                                <input type="email" class="form-control" id="txt_correo" name="txt_correo" placeholder="Ingrese correo electronico">
                            </div>
                            <div class="mb-3">
                                <label for="txt_contra" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="txt_contra" name="txt_contra" placeholder="Ingrese contraseña">
                            </div>
                            <div class="mb-3">
                                <label for="txt_rol" class="form-label">Rol</label>
                                <select class="form-control" id="txt_rol" name="txt_rol">
                                    <option value="estudiante">estudiante</option>
                                    <option value="bibliotecario">bibliotecario</option>
                                    <option value="administrador">administrador</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" id="btn_guardar" name="btn_guardar" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-dark mt-4">
            <thead>
                <tr>
                    <th>Id de cliente</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nombre de Usuario</th>
                    <th>Correo electrónico</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $fila) {
                ?>
                    <tr>
                        <td><?= $fila['usuario_id'] ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['apellido'] ?></td>
                        <td><?= $fila['nombre_usuario'] ?></td>
                        <td><?= $fila['correo'] ?></td>
                        <td><?= $fila['contrasena'] ?></td>
                        <td><?= $fila['rol'] ?></td>
                        <td>
                            <a href="<?= base_url("verusuario/" . $fila['usuario_id']) ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                            <a onclick="return confirm('¿Está seguro de eliminar?');" href="<?= base_url("eliminar_usuario/" . $fila['usuario_id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('js/configuracionDataTables.js') ?>"></script>
    <script src="https://kit.fontawesome.com/33337d547b.js" crossorigin="anonymous"></script>
</body>
</html>



