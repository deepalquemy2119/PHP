<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS Local -->
    <link rel="stylesheet" href="./registro.css"> 
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="sitio m-2 navbar-brand" href="#">My C2B</a>
        <div class="container mt-4">
            <button class="m-3 btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#contactForm" aria-expanded="false" aria-controls="contactForm">
                Registrate aqui
            </button>
            <a href="../../../index.php" class="volver">Back</a>                    
            <!-- Formulario -->
            <div class="collapse mt-4" id="contactForm">
                <div class="card card-body">
                    <h2>Registrar nuevo usuario</h2>
                    <form action="/Controller/UsuarioController.php" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">UserName</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>    
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
                </div>
            </div>
        </div>

        <!-- Script Bootstrap -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </nav>
</body>
</html>
