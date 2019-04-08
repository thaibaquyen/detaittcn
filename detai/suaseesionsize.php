<?php
    session_start();
    $stt=$_POST["stt"];
    $size=$_POST["size"];
    foreach($_SESSION['cart'] as $key => $values){
        if($key==$stt){
            $_SESSION['cart'][$key]['size']=$size;
        }  
    }
?>