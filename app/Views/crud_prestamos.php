<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@6.3.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/jquery.dataTables.min.css') ?>">
</head>

<body style="background-color: #b6d7a8;">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-4">Dashboard del Administrador - Prestamos </h1>
            <a href="<?= base_url('dashboard_administrador') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Regresar</a>
        </div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#prestamoModal">
            <i class="fas fa-user-plus"></i> Agregar Prestamo
        </button>
        <div class="modal fade" id="prestamoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Prestamo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('guardarPrestamo') ?>" method="post">
                            <div class="mb-3">
                                <label for="txt_usuarioid" class="form-label">Nombre de Usuario</label>
                                <select name="txt_usuarioid" id="txt_usuarioid" class="form-control">
                                    <option value="">Seleccione un Usuario</option>
                                    <?php foreach ($usuarios as $usuario) : ?>
                                        <option value="<?= $usuario['usuario_id'] ?>"><?= $usuario['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="txt_libroid" class="form-label">Nombre de libro</label>
                                <select name="txt_libroid" id="txt_libroid" class="form-control">
                                    <option value="">Seleccione un Libro</option>
                                    <?php foreach ($libros as $libro) : ?>
                                        <option value="<?= $libro['libro_id'] ?>"><?= $libro['titulo'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="txt_fechaprestamo" class="form-label">Fecha de prestamo</label>
                                <input type="date" class="form-control" id="txt_fechaprestamo" name="txt_fechaprestamo" placeholder="Ingrese fecha de prestamo">
                            </div>
                            <div class="mb-3">
                                <label for="txt_fechadevolucion" class="form-label">Fecha de devolución</label>
                                <input type="date" class="form-control" id="txt_fechadevolucion" name="txt_fechadevolucion" placeholder="Ingrese fecha de devolución">
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
                    <th>Id de Prestamo</th>
                    <th>Nombre de usuario</th>
                    <th>Nombre de libro</th>
                    <th>Fecha de prestamo</th>
                    <th>Fecha de devolución</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $fila) {
                    $usuarioNombre = '';
                    foreach ($usuarios as $usuario) {
                        if ($usuario['usuario_id'] == $fila['usuario_id']) {
                            $usuarioNombre = $usuario['nombre'];
                            break;
                        }
                    }
                    $libroNombre = '';
                    foreach ($libros as $libro) {
                        if ($libro['libro_id'] == $fila['libro_id']) {
                            $libroNombre = $libro['titulo'];
                            break;
                        }
                    }
                ?>
                    <tr>
                        <td><?= $fila['prestamo_id'] ?></td>
                        <td><?= $usuarioNombre ?></td>
                        <td><?= $libroNombre ?></td>
                        <td><?= $fila['fecha_prestamo'] ?></td>
                        <td><?= $fila['fecha_devolucion'] ?></td>
                        <td>
                            <a href="<?= base_url("verPrestamo/" . $fila['prestamo_id']) ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                            <a onclick="return confirm('¿Está seguro de eliminar?');" href="<?= base_url("eliminarprestamo/" . $fila['prestamo_id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
    <script src="<?= base_url('js/jquery-3.5.1.js') ?>"></script>
    <script src="<?= base_url('js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('js/configuracionDataTables.js') ?>"></script>
    <script src="https://kit.fontawesome.com/33337d547b.js" crossorigin="anonymous"></script>
</body>

</html>