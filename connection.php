<?php

function connection(){
    $host = "localhost";
    $user = "root";
    $pass = "superadmin2808";

    $bd = "users_crud";

    $connect = mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;
};

?>