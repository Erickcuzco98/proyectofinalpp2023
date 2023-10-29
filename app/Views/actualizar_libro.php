<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        label.form-label, h1 {
            color: #2a79e4;
        }
    </style>
</head>
<body style="background-color: #b6d7a8;">
    <div class="container">
        <br>
        <a href="<?= base_url('tablaLibros') ?>" class="btn btn-primary" style="float: right; margin-top: 10px; margin-right: 10px;"><i class="fas fa-arrow-left"></i> Regresar</a>
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Actualizar Libro</h1>
                <form action="<?= base_url('actualizarLibro') ?>" method="post">
                    <input type="hidden" id="txt_libroid" name="txt_libroid" value="<?= $datos['libro_id'] ?>">
                    <div class="mb-3">
                        <label for="txt_titulolibro" class="form-label">Título de libro</label>
                        <input type="text" class="form-control" id="txt_titulolibro" name="txt_titulolibro" placeholder="Ingrese Título de libro" value="<?= $datos['titulo'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txt_autor" class="form-label">Autor</label>
                        <select name="txt_autor" id="txt_autor" class="form-control">
                                    <option value=""><?= $nombreAutor ?></option>
                                    <?php foreach ($autores as $autor) : ?>
                                        <option value="<?= $autor['autor_id'] ?>"><?= $autor['nombre'] ?></option>
                                    <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txt_categoria" class="form-label">Categoría</label>
                        <select name="txt_categoria" id="txt_categoria" class="form-control">
                                    <option value=""><?= $nombreCategoria ?></option>
                                    <?php foreach ($categorias as $categoria) : ?>
                                        <option value="<?= $categoria['categoria_id'] ?>"><?= $categoria['nombre'] ?></option>
                                    <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txt_descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="txt_descripcion" name="txt_descripcion" rows="3" placeholder="Ingrese Descripción"><?= $datos['descripcion'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="txt_anopublicacion" class="form-label">Año de Publicación</label>
                        <input type="number" class="form-control" id="txt_anopublicacion" name="txt_anopublicacion" placeholder="Ingrese Año de Publicación" value="<?= $datos['anio_publicacion'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txt_cadisponible" class="form-label">Cantidad Disponible</label>
                        <input type="number" class="form-control" id="txt_cadisponible" name="txt_cadisponible" placeholder="Ingrese Cantidad Disponible" value="<?= $datos['cantidad_disponible'] ?>">
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
