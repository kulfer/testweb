<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเข้าสู่ระบบ</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="header">
        <h2>เข้าสู่ระบบ</h2>
    </div>

    <!-- Login Form -->
    <div class="container">
        <form action="login_db.php" method="post">

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

            <!-- ฟอร์มการเข้าสู่ระบบ -->
            <input type="text" name="username" placeholder="กรอกชื่อผู้ใช้">
            <input type="password" name="password" placeholder="กรอกรหัสผ่าน">

            <button type="submit" name="login_user" class="btn">เข้่าสู่ระบบ</button>

            <p>หากยังไม่มีบัญชี : <a href="register.php">สร้างบัญชี</a></p>
            <p>admin<a href="admin.php">admin</a></p>
        </form>
    </div>
    
</body>
</html>