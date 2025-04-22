<?php 
include('connection.php');
$con = connection();

$id = null;
$name = $_POST['nombre'];
$lastname = $_POST['apellido'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql = "INSERT INTO users (id, nombre, apellido, username, password, email) 
        VALUES (NULL, '$name', '$lastname', '$username', '$password', '$email')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
};

?>