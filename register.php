<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบัญชี</title>

    <link rel="stylesheet" href="style.css">   
</head>
<body>

<div class="header">
        <h2>สร้างบัญชี</h2>
    </div>

    <div class="container">
        <form action="register_db.php" method="post">
        <?php include('errors.php') ?>

            <!-- ข้อความแจ้งเตือน -->
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="error">
                    <h3>
                        <?php 
                            echo $_SESSION['error'];
                            unset ($_SESSION['error']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <!-- ฟอร์มการสร้างบัญชี -->
            <input type="text" name="username" placeholder="กรอกชื่อผู้ใช้">
            <input type="email" name="email" placeholder="กรอกอีเมล" >
            <input type="password" name="password1" placeholder="กรอกรหัสผ่าน">
            <input type="password" name="password2" placeholder="ยืนยันรหัสผ่าน" >


            <button type="submit" name="register_user" class="btn">สร้างบัญชี</button>
            <p>หากมีบัญชีแล้ว : <a href="login.php">เข้าสู่ระบบ</a></p>
        </form>
    </div>
</body>
</html>