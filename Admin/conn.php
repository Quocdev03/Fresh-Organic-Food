<?php
define('DB_HOST','localhost');
define('DB_USERNAME','root');
define('DB_PW','');
define('DB_DTB','banhang');
$conn  = mysqli_connect(DB_HOST,DB_USERNAME,DB_PW, DB_DTB);
if(!$conn)
{
    echo 'that bai';
}
?>
