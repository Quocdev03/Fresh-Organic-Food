<?php
require 'conn.php';
require 'function.php';
require 'session.php';

//Nut Doc 1 Y Kien
if(isset($_POST["doc1"]))
{
    $d =$_POST["doc1"];
    docykien($conn,$d,1);
    header("Location: index.php?url=danhgia");
}

//Nut Doc Full Y Kien
if(isset($_POST["docfull"]))
{
    docykien($conn,"1",2);
    header("Location: index.php?url=danhgia");
}

?>