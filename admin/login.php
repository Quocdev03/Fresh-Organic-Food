<?php
session_start();
if (isset($_POST['submit'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   // Kiểm tra email và mật khẩu với tài khoản mặc định
   $defaultEmail = "admin@example.com";
   $defaultPassword = "admin123";
   if ($email == $defaultEmail && $password == $defaultPassword) {
      // Lưu thông tin đăng nhập vào session
      $_SESSION['admin'] = true;

      // Chuyển hướng đến trang quản trị
      header("Location: admin.php");
      exit();
   } else {
      // Thông báo lỗi đăng nhập
      echo "Email hoặc mật khẩu không đúng";
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin login</title>
</head>

<body>
   <div class="wrapper">
      <section class="admin">
         <div class="container">
            <div class="admin-main">
               <h1>Đăng nhập quản trị viên</h1>
               <form method="POST" action="login.php">
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email" required><br>
                  <label for="password">Mật khẩu:</label>
                  <input type="password" id="password" name="password" required><br>
                  <input type="submit" name="submit" value="Đăng nhập">
               </form>
            </div>
         </div>
      </section>
   </div>
</body>

</html>