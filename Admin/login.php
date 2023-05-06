<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "conn.php";
require "function.php";

$xuat ='';


if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "select * from login  where User = '".$user."' and Pass ='". $pass."'" ;
    $resul = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($resul);
    if ($num > 0) {
        $result = mysqli_fetch_array($resul);
        $_SESSION['user'] = $result["User"];
        $_SESSION['quyen'] = $result["Quyen"];
        if($result["Quyen"] ==2)
        {
            header("location:../../FreshOrganicFood") ;
        }
    } else {
        $xuat = 'Tài khoản không tồn tại';
        
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/dangky.css">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="login">
        <div class="lodin_c">
            <h2 class="login_t">Login</h2>
            <form method="post" action="" autocomplete="off" >
                <div class="login_flex">
                    <label for="username">Username</label>
                    <div class="login_b">
                        <input type="text" name="user" placeholder="Username" class="form-control" required>
                    </div>
                </div>
                 <div class="login_flex">
                     <label for="password">Password</label>
                    <div class="login_b">
                        <input type="password" name="pass" placeholder="Password" class="form-control" required>
                    </div>
                </div>
                <div>
                    <input type="submit" name="login" value="Login" class="sub">
                </div>
                <div class="login_f"><?php echo $xuat;?></div>
            </form>
        </div>
    </div>
</body>

</html>

<?php



if (isset($_SESSION['user']))
{
    if( $_SESSION['quyen'] == 1)
    {
        header("location:index.php");
    }
}
?>