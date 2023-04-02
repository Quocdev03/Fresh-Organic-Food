<?php
session_start();
if (!isset($_SESSION['admin'])) {
   header("Location: login.php");
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin</title>
</head>

<body>
   <h1>Trang quản trị</h1>
   <p>Xin chào, admin!</p>
   <a href="logout.php">Đăng xuất</a>
</body>

</html>