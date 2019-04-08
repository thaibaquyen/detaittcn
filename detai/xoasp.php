<?php
    session_start();
    $stt=$_POST["stt"];
    foreach($_SESSION['cart'] as $key => $values){
        if($key==$stt){
            unset($_SESSION['cart'][$stt]);
        }  
    }
?>