<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        label.form-label,
        h1 {
            color: #2a79e4;
        }
    </style>
</head>
<body style="background-color: #D0F95A;">
<div class="container">
        <br>
        <a href="<?= base_url('tablaAutores') ?>" class="btn btn-primary" style="float: right; margin-top: 10px; margin-right: 10px;"><i class="fas fa-arrow-left"></i> Regresar</a>
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Actualizar Categorias</h1>
                <form action="<?= base_url('actualizarAutor') ?>" method="post">
                    <input type="hidden" id="txt_id" name="txt_id" value="<?= $datos['autor_id'] ?>">
                    <div class="mb-3">
                        <label for="txt_nombre" class="form-label">Nombre de Autor</label>
                        <input type="text" class="form-control" id="txt_nombre" name="txt_nombre"  value="<?= $datos['nombre'] ?>">
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