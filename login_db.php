<?php
    session_start();
    include('server.php');

    $errors = array();

    //ถ้ามีการกดปุ่ม login 
    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);

        // เช็คว่าผู้ใช้กรอกข้อมูลลงในช่อง 
        if ( empty($username)) {
            array_push($errors, "กรุณากรอกชื่อผู้ใช้");
        
        }
        if ( empty($password)) {
            array_push($errors, "กรุณากรอกรหัสผ่าน");
        
        }

        // เช็ค error หาก error เป็น 0 จะเข้ารหัส และเช็คกับใน database 
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($connect, $query);

            // หากข้อมูลที่ผู้ใช้กรอกเข้ามาตรงกับใน database จะทำการเก็บ session ของผู้ใช้
            if( mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION ['success'] = "เข้าสู่ระบบสำเร็จ";
                header('location: index.php');
                exit();

            }else{
                 // ส่งข้อผิดพลาดกลับไปยังหน้า login.php
                array_push($errors, "ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง");
                $_SESSION['error'] = "ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง";
                header('location: login.php');
                exit();
            }
        
        }else {
            // กรณีมี error ให้ส่งข้อผิดพลาดกลับไปยังหน้า login.php
            // ส่งข้อผิดพลาดกลับไปยังหน้า login.php
            $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
            header('location: login.php');
            exit();
        }
    }
?>