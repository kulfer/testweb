<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register_account";

    //สร้างการเชื่อมต่อ ฐานข้อมูล
    $connect = mysqli_connect($servername, $username, $password, $dbname);

    // เช็คการเชื่อมต่อ 
    if (!$connect) {
        die ("ไม่สามารถเชื่อมต่อข้อมูลได้ " . mysqli_connect_error());
    }

?>