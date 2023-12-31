<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar Prestamo</title>
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
        <a href="<?= base_url('tablaPrestamos') ?>" class="btn btn-primary" style="float: right; margin-top: 10px; margin-right: 10px;"><i class="fas fa-arrow-left"></i> Regresar</a>
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Actualizar Prestamo</h1>
                <form action="<?= base_url('actualizarPrestamo') ?>" method="post">
                    <input type="hidden" id="txt_prestamoid" name="txt_prestamoid" value="<?= $datos['prestamo_id'] ?>">
                    <div class="mb-3">
                        <label for="txt_usuarioid" class="form-label">Nombre de usuario</label>
                        <select name="txt_usuarioid" id="txt_usuarioid" class="form-control">
                            <option value=""><?= $nombreUsuario ?></option>
                            <?php foreach ($usuarios as $usuario) : ?>
                                <option value="<?= $usuario['usuario_id'] ?>"><?= $usuario['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="txt_libroid" class="form-label">Nombre de libro</label>
                            <select name="txt_libroid" id="txt_libroid" class="form-control">
                                <option value=""><?= $nombreLibro ?></option>
                                <?php foreach ($libros as $libro) : ?>
                                    <option value="<?= $libro['libro_id'] ?>"><?= $libro['titulo'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="txt_fechaprestamo" class="form-label">Fecha de prestamo</label>
                            <input type="date" class="form-control" id="txt_fechaprestamo" name="txt_fechaprestamo" placeholder="Ingrese fecha de prestamo" value="<?= $datos['fecha_prestamo'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="txt_fechadevolucion" class="form-label">Fecha de devolución</label>
                            <input type="date" class="form-control" id="txt_fechadevolucion" name="txt_fechadevolucion" placeholder="Ingrese fecha de devolución" value="<?= $datos['fecha_devolucion'] ?>">
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