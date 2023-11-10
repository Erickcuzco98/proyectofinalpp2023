<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Actores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@6.3.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>">
    <style>
        @media print {
            .acciones {
                display: none;
            }
        }
    </style>
</head>
<body style="background-color: #D56B8D;">
    
<div class="container mt-5">
<div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-4">Dashboard de Bibliotecario - Autores </h1>
            <a href="<?= base_url('dashboard_bibliotecario') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Regresar</a>
        </div>
        <button class="btn btn-success" id="btnImprimir"><i class="fas fa-print"></i> Imprimir Tabla</button>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categoriaModal">
            <i class="fas fa-user-plus"></i> Agregar Autor
        </button>
        <div class="modal fade" id="categoriaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Autor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('guardarAutor') ?>" method="post">
                            <div class="mb-3">
                                <label for="txt_nombre" class="form-label">Nombre de Autor</label>
                                <input type="text" name="txt_nombre" id="txt_nombre" placeholder="Ingrese nombre de categoria">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" id="btn_guardar" name="btn_guardar" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-dark mt-4" id="dataTable">
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
                        <td><?= $fila['autor_id'] ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td>
                            <a href="<?= base_url("verAutor/" . $fila['autor_id']) ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                            <a onclick="return confirm('¿Está seguro de eliminar?');" href="<?= base_url("eliminarAutor/" . $fila['autor_id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
    <script>
        document.getElementById('btnImprimir').addEventListener('click', function() {
            var printContents = document.getElementById('dataTable').outerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });
    </script>
</body>
</html>
