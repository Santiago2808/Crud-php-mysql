<?php 
include('connection.php');

$con = connection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Usuarios CRUD</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div style="text-align: left; margin: 20px 0px 20px 20px">
        <h2>CRUD Usuarios</h2>
        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarUsuarioModal">
            Agregar nuevo usuario
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="agregarUsuarioModal" tabindex="-1" aria-labelledby="agregarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="insert_user.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarUsuarioLabel">Agregar Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="column">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Apellido</label>
                            <input type="text" name="apellido" placeholder="Apellido">
                        </div>
                    </div>
                    <div class="column">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Username</label>
                            <input type="text" name="username" placeholder="Username">
                        </div>
                        <div class="mb-3" style="max-width: 100%;">
                            <label for="Password" class="form-label">Password</label>
                            <input type="text" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="mb-3">
                    <label for="correo" class="form-label">Email</label>
                        <input type="text" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Agregar Usuario">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
    </div>

<!-- Bootstrap JS (necesario para los modals) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 

    <div class="users-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Username</th>
                    <th>Passoword</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <th> <?= $row ['id'] ?> </th>
                    <th> <?= $row ['nombre'] ?> </th>
                    <th> <?= $row ['apellido'] ?> </th>
                    <th> <?= $row ['username'] ?> </th>
                    <th> <?= $row ['password'] ?> </th>
                    <th> <?= $row ['email'] ?> </th>

                    <th><a href="update.php?id=<?= $row ['id'] ?>" class="users-table--edit">Editar</a></th>
                    <th><a href="delete_user.php?id=<?= $row ['id'] ?>" class="users-table--delete">Eliminar</a></th>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>