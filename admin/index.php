<?php
if (!isset($_GET["url"])) {
   header("Location: admin.php");
   exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/reset.css">
   <link rel="stylesheet" href="../css/variables.css">
   <link rel="stylesheet" href="../css/global.css">
   <link rel="stylesheet" href="../css/component.css">
   <title>Admin</title>
</head>

<body>

   <div class="wrapper">

      <main>

         <?php
         if (isset($_GET["url"])) {
            $admin = $_GET["url"];
         }
         ?>

      </main>

   </div>

   <script src="../script/app.js"></script>
</body>

</html>