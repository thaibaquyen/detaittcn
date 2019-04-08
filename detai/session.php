<?php
    session_start();
    $masp=$_POST["masp"];
    $sl=1;
    $gia=$_POST["gia"];
    $ten=$_POST["ten"];
    $size=40;
    $_SESSION['cart'][]=array('masp'=>$masp,
    'ten'=>$ten,
    'size'=>$size,
    'gia'=>$gia,
    'sl'=>$sl);
    //unset($_SESSION['cart']);
    foreach($_SESSION['cart'] as $key => $values){
        echo"<br />";
        print_r($values);
        echo"<br />";
    }
?>