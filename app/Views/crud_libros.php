<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Libros</title>
    <link rel="stylesheet" href="<?= base_url('css/jquery.dataTables.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@6.3.0/css/all.min.css">
    <style>
        @media print {
            .acciones {
                display: none;
            }
        }
    </style>
</head>

<body style="background-color: #b6d7a8;">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-4">Dashboard del Administrador - Libros</h1>
            <a href="<?= base_url('dashboard_administrador') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Regresar</a>
        </div>
        <button class="btn btn-success" id="btnImprimir"><i class="fas fa-print"></i> Imprimir Tabla</button>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#libroModal">
            <i class="fas fa-user-plus"></i> Agregar Libro
        </button>
        <div class="modal fade" id="libroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Libro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('guardarLibro') ?>" method="post">
                            <div class="mb-3">
                                <label for="txt_titulolibro" class="form-label">Titulo de libro</label>
                                <input type="text" class="form-control" id="txt_titulolibro" name="txt_titulolibro" placeholder="Ingrese Titulo de libro">
                            </div>
                            <div class="mb-3">
                                <label for="txt_autor" class="form-label">Nombre de autor</label>
                                <select name="txt_autor" id="txt_autor" class="form-control">
                                    <option value="">Seleccione un autor</option>
                                    <?php foreach ($autores as $autor) : ?>
                                        <option value="<?= $autor['autor_id'] ?>"><?= $autor['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="txt_categoria" class="form-label">Categoría</label>
                                <select name="txt_categoria" id="txt_categoria" class="form-control">
                                    <option value="">Seleccione una categoría</option>
                                    <?php foreach ($categorias as $categoria) : ?>
                                        <option value="<?= $categoria['categoria_id'] ?>"><?= $categoria['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="txt_descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="txt_descripcion" name="txt_descripcion" placeholder="Ingrese descripción">
                            </div>
                            <div class="mb-3">
                                <label for="txt_anopublicacion" class="form-label">Año publicado</label>
                                <input type="date" class="form-control" id="txt_anopublicacion" name="txt_anopublicacion" placeholder="Ingrese Año de publicación">
                            </div>
                            <div class="mb-3">
                                <label for="txt_cadisponible" class="form-label">Cantidad disponible</label>
                                <input type="number" class="form-control" id="txt_cadisponible" name="txt_cadisponible" placeholder="Ingrese cantidad disponible">
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
                    <th>Id de libro</th>
                    <th>Titulo de libro</th>
                    <th>Autor</th>
                    <th>Categoria</th>
                    <th>Descripción</th>
                    <th>Año de publicación</th>
                    <th>Cantidad disponible</th>
                    <th class="acciones">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $fila) {
                    $autorNombre = '';
                    foreach ($autores as $autor) {
                        if ($autor['autor_id'] == $fila['autor_id']) {
                            $autorNombre = $autor['nombre'];
                            break;
                        }
                    }
                    $categoriaNombre = '';
                    foreach ($categorias as $categoria) {
                        if ($categoria['categoria_id'] == $fila['categoria_id']) {
                            $categoriaNombre = $categoria['nombre'];
                            break;
                        }
                    }
                ?>
                    <tr>
                        <td><?= $fila['libro_id'] ?></td>
                        <td><?= $fila['titulo'] ?></td>
                        <td><?= $autorNombre ?></td>
                        <td><?= $categoriaNombre ?></td>
                        <td><?= $fila['descripcion'] ?></td>
                        <td><?= $fila['anio_publicacion'] ?></td>
                        <td><?= $fila['cantidad_disponible'] ?></td>
                        <td class="acciones">
                            <a href="<?= base_url("verLibro/" . $fila['libro_id']) ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                            <a onclick="return confirm('¿Está seguro de eliminar?');" href="<?= base_url("eliminarLibro/" . $fila['libro_id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
