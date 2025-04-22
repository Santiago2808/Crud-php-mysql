<?php

include("connection.php");
$con = connection();

$id=$_POST["id"];
$name = $_POST['nombre'];
$lastname = $_POST['apellido'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql="UPDATE users SET nombre='$name', apellido='$lastname', username='$username', password='$password', email='$email' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}

header("Location: index.php");
exit();

?>