<?php
    //เริ่ม session และเชื่อมต่อ database
    session_start();
    include('server.php');

    $errors = array();

    // ถ้ามีการกดปุ่ม register
    if (isset($_POST['register_user'])) {

        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password1 = mysqli_real_escape_string($connect, $_POST['password1']);
        $password2 = mysqli_real_escape_string($connect, $_POST['password2']);

        // เช็คว่าผู้ใช้กรอกข้อมูลลงในช่อง 
        if (empty($username)) {
            array_push($errors, "กรุณากรอกชื่อผู้ใช้");
        }
        if (empty($email)) {
            array_push($errors, "กรุณากรอกอีเมล");
        }
        if (empty($password1)) {
            array_push($errors, "กรุณากรอกรหัสผ่าน");
        }
        if ($password1 != $password2) {
            array_push($errors, "รหัสผ่านไม่ตรงกัน");
        }

        // เช็คว่ามี ชื่อ หรือ อีเมล นีในระบบ
        $user_check_ac = "SELECT * FROM user WHERE username = '$username' OR email = '$email' ";
        $query = mysqli_query($connect, $user_check_ac);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            if ($result ['username'] === $username) {
                array_push($errors, "มีชื่อผู้ใช้นี้แล้วในระบบ");
            }

            if ($result ['email'] === $email) {
                array_push($errors, "มีอีเมลนี้แล้วในระบบ");
            }
        }
        
        if (count($errors) == 0) {
            $password = md5($password1);
            $sql = "INSERT INTO user (username, email, password) VALUES ('$username' , '$email' , '$password')";
            mysqli_query($connect, $sql);

            $_SESSION ['username'] = $username;
            $_SESSION ['success'] = "เข้าสู่ระบบสำเร็จ";
            header('location: index.php');

        } else{
            array_push($errors, "ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง");
            $_SESSION['error'] = "ลองใส่ชื่อผู้ใช้ หรือ รหัสผ่านใหม่อีกครั้ง";
            header('location: register.php');
        }

    }

?>