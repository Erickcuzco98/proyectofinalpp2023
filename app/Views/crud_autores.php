<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Actores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@6.3.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>"> <!-- Agrega tu propio archivo de estilos CSS -->
</head>
<body style="background-color: #D56B8D;">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-4">Dashboard del Administrador - Autores </h1>
            <a href="<?= base_url('dashboard_administrador') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Regresar</a>
        </div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#prestamoModal">
            <i class="fas fa-user-plus"></i> Agregar Autor
        </button>
        <div class="modal fade" id="autorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Actor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('guardarautor1') ?>" method="post">
                            <div class="mb-3">
                                <label for="txt_usuarioid" class="form-label">Id de Actor</label>
                                <input type="number" class="form-control" id="txt_idactor" name="txt_idactor" placeholder="Ingrese id de Actor">
                            </div>
                            <div class="mb-3">
                                <label for="txt_libroid" class="form-label">Nombre de Actor</label>
                                <input type="number" class="form-control" id="txt_nombreactor" name="txt_nombreactor" placeholder="Ingrese el Nomnre del Actor>
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
                    <th>Id de Autor</th>
                    <th>Nombre de Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $fila) {
                ?>
                    <tr>
                        <td><?= $fila['id'] ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td>
                            <a href="<?= base_url("verautores/" . $fila['id']) ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                            <a onclick="return confirm('¿Está seguro de eliminar?');" href="<?= base_url("eliminarautores/" . $fila['id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
