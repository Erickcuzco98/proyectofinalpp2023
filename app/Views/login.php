<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        
        .custom-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .custom-card {
            max-width: 300px;
            padding: 20px;
            background-color: #cccdcd;
        }

        .custom-card-content {
            color: #2a79e4;
        }

        .custom-button {
            background-color: #2a79e4;
            color: white;
        }

        .custom-title {
            text-align: center;
            padding: 20px 0;
            width: 100%;
        }

        .welcome-text {
            color: #b55f07;
            font-size: 46px;
        }

        .main-title {
            color: #2a79e4;
            font-size: 48px;
            margin-top: 20px;
        }

        .btn-creditos {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: #2a79e4;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        body {
            background-color: #b6d6a9;
        }

    </style>
</head>

<body>

    <div class="custom-title">
        <h1 class="main-title text-center" style="color: #2a79e4; margin-top: 20px;">Explora y Descubre: Biblioteca Escolar en Línea</h1>
        <p class="welcome-text">Bienvenidos</p>
    </div>

    <div class="custom-container">
        <div class="card custom-card text-center">
            <div class="card-body custom-card-content">
                <h2 class="card-title">Iniciar Sesión</h2>
                <form method="post" action="<?php echo base_url('login'); ?>">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="nombre_usuario" class="form-label">Nombre de Usuario:</label>
                            <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="contrasena" id="contrasena" required>
                                <span class="input-group-text" style="cursor: pointer;">
                                    <i class="fas fa-eye" id="showPassword"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn custom-button">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
    <a href="<?php echo base_url('creditos'); ?>" class="btn-creditos" id="creditos-button">
        Créditos
    </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/33337d547b.js" crossorigin="anonymous"></script>
    <script>
        const showPasswordIcon = document.getElementById('showPassword');
        const passwordInput = document.getElementById('contrasena');

        showPasswordIcon.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showPasswordIcon.classList.remove('fa-eye');
                showPasswordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                showPasswordIcon.classList.remove('fa-eye-slash');
                showPasswordIcon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>