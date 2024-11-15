<!-- เช็คการเข้าสู่ระบบชองผู้ใช้งา่น -->
 <?php 
    session_start();

    // หากผู้ใช้ไม่ได้ ล็อกอิน จะบังคับให้ไปหน้า เข้าสู่ระบบ เพื่อล็อกอินก่อน
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "ต้องเข้าสู่ระบบก่อนเพื่อใช้งาน";
        header('location: login.php');  // ส่งผู้ใช้ไปยังหน้า เข้าสู่ระบบ
        exit();
    }

    // หากผู้ใช้ ออกจากระบบ จะส่งให้ไปหน้า เข้าสู่ระบบ เพื่อล็อกอิน
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
        exit();
    }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
        <h2>ยินดีต้อนรับสู่ My Web</h2>
        
        <div class="content">

            <!-- ข้อความแจ้งเตือนเมื่อเข้าสู่ระบบได้ -->
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="success">
                    <h3>
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <!-- ส่วนของการแสดงข้อมูลเมื่อผู้ใช้ล็อกอิน -->
            <?php if (isset($_SESSION['username'])) : ?>
                <p>ยินดีต้อนรับ <strong><?php echo $_SESSION['username']; ?></strong></p>
                <p class="logout_btn"><a href="index.php?logout=true" class="alogout">ออกจากระบบ</a></p>
            <?php else : ?>
                <p>หากมีบัญชีแล้ว <a href="login.php">เข้าสู่ระบบ</a></p>
                <p>หากยังไม่มีบัญชี <a href="register.php">สร้างบัญชี</a></p>
            <?php endif ?>
        </div>
    </div>

</body>
</html>