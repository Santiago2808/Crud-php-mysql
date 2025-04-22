<?php
include('connection.php');
$con = connection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);

// Cargar usuario a editar si viene por GET
$usuarioEditar = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idEditar = $_GET['id'];
    $sqlEditar = "SELECT * FROM users WHERE id = '$idEditar'";
    $queryEditar = mysqli_query($con, $sqlEditar);

    if (mysqli_num_rows($queryEditar) > 0) {
        $usuarioEditar = mysqli_fetch_array($queryEditar);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuarios CRUD</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>CRUD Usuarios</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarUsuarioModal">Agregar nuevo usuario</button>
</div>

<!-- Modal: Agregar -->
<div class="modal fade" id="agregarUsuarioModal" tabindex="-1" aria-labelledby="agregarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="insert_user.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- campos -->
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Apellido</label>
                        <input type="text" name="apellido" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Agregar Usuario" class="btn btn-success">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal: Editar -->
<?php if ($usuarioEditar): ?>
<div class="modal fade show" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioLabel" style="display:block;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <form action="edit_user.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $usuarioEditar['id'] ?>">
                    <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control" value="<?= $usuarioEditar['nombre'] ?>"></div>
                    <div class="mb-3"><label>Apellido</label><input type="text" name="apellido" class="form-control" value="<?= $usuarioEditar['apellido'] ?>"></div>
                    <div class="mb-3"><label>Username</label><input type="text" name="username" class="form-control" value="<?= $usuarioEditar['username'] ?>"></div>
                    <div class="mb-3"><label>Password</label><input type="text" name="password" class="form-control" value="<?= $usuarioEditar['password'] ?>"></div>
                    <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="<?= $usuarioEditar['email'] ?>"></div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal-backdrop fade show"></div>
<?php endif; ?>

<!-- Tabla -->
<div class="container mt-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Nombre</th><th>Apellido</th><th>Username</th><th>Password</th><th>Email</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['apellido'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['password'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <a href="index.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="delete_user.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
