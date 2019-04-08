<?php
    session_start();
    $stt=$_POST["stt"];
    $sl=$_POST["sl"];
    $array=array();
    foreach($_SESSION['cart'] as $key => $values){
        if($key==$stt){
            $_SESSION['cart'][$key]['sl']=$sl;
        }  
        //$array[$key]=$values;
    }
   // unset($_SESSION['cart']);
   /* foreach($array as $key => $values){
             if($key==$stt){
                 $array[$key]['sl']=$sl;
             }   
    }
    foreach($array as $key => $values){
        echo "<br />";
        print_r($values);
        echo "<br />";
}*/
?>