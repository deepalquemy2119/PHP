<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

<!-- ---------------------- CSS Bootstrap ---------------------- -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- ----------- CSS Local ----------- -->
<link rel="stylesheet" href="../RegistroView/registro.css"> 

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="sitio m-2 navbar-brand" href="#">My C2B</a>
    <div class="container mt-4">
        <button class="m-3 btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#contactForm" aria-expanded="false" aria-controls="contactForm">
            Login here!
        </button>
        <a href="../../../index.php" class="volver"><span class="puntos">...</span>Volver</a>
        
        <!-- ---------- Formulario --------- -->
        <div class="collapse mt-4" id="contactForm">
            <div class="card card-body">
                <h2>Login usuario</h2>
                
                <form action="login.php" method="POST" >

                    <!-- -------- USERNAME ----------- -->
                    <div class="mb-3">
                        <label for="username" class="form-label">UserName</label>
                        <input type="text" class="form-control" id="username" required>
                    </div>
                    <!-- ---------- CORREO ----------- -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>    

                    <!-- --------- PASSWORD ---------- -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <!-- ----------- MENSAJE ------------- -->
                    <!-- <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="mensaje" rows="3" required></textarea>
                    </div>   -->
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    
                </form>

            </div>
        </div>
    </div>

    <!-- ------------ Script Bootstrap ------------- -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>


