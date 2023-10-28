<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoI... crossorigin="anonymous">
    <style>
        body {
            background-color: #b6d7a8;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            text-align: center;
            color: #2a79e4;
            margin-bottom: 40px;
        }
        .dashboard-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .dashboard-item {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin: 10px;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            display: inline-block;
            width: 650px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: background-color 0.3s;
        }
        .dashboard-item:hover {
            background-color: #0056b3;
        }
        .dashboard-item:active {
            background-color: #004290;
        }
        .logout-button {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
    <a href="<?php echo base_url('logout'); ?>" class="btn btn-danger logout-button">Cerrar Sesión</a>
    <h1>Dashboard de Administrador</h1>
    <div class="dashboard-container">
        <a href="administrar-libros.html" class="dashboard-item">
            <h2>Administrar Libros</h2>
            <p>Agregar, editar y eliminar libros en el sistema.</p>
        </a>
        <a href="registrar-prestamos.html" class="dashboard-item">
            <h2>Gestionar Préstamos</h2>
            <p>Gestionar préstamos de libros a estudiantes.</p>
        </a>
        <a href="<?= base_url('tablaUsuarios') ?>" class="dashboard-item">
            <h2>Gestionar Usuarios</h2>
            <p>Agregar, editar y eliminar usuarios (bibliotecarios, estudiantes).</p>
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>