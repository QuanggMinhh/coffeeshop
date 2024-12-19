<?php
    $severname="localhost:3307";
    $username="root";
    $password="";
    $database="bancaphe";

    //$connect= new mysqli($severname,$username,$password,$database);
    $connect = mysqli_connect($severname,$username,$password);
    echo "kết nối thành công";
    if(mysqli_connect_errno()){
        echo "loi ket noi".mysqli_connect_error();
        exit();
    }
?>