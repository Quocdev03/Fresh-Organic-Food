<?php
require 'conn.php';
require 'function.php';
require 'session.php';

// Nut Chinh Gia
if(isset($_POST["chinh"]))
{
    if(isset($_POST["checkg"]))
    {
        if($_POST["gia"] >0) 
        {
            $gia_m =$_POST["gia"];
            foreach($_POST["checkg"] as $value)
            {
                $k =ChinhGiaMoi($conn,$value,$gia_m,2);
                if($k ===true)
                {
                    header("Location: index.php?url=quanlygia");
                }
            }
        }
        else{
            header("Location: index.php?url=quanlygia");
        }
    }
    else{
        header("Location: index.php?url=quanlygia");
    }
}

//Nut Xoa Gia
if(isset($_POST["xoag"]))
{
    if(isset($_POST["checkg"]))
     {
        foreach($_POST["checkg"] as $value)
        {
            $k =ChinhGiaMoi($conn,$value,0,1);
            if($k ===true)
            {
                header("Location: index.php?url=quanlygia");
            }
        }
    }
    else
    {
        header("Location: index.php?url=quanlygia");
    }
}
?>