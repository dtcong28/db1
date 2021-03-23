<?php
    $connect = mysqli_connect('localhost','root','','db1'); // tao ket noi database 
    if($connect){
        mysqli_query($connect, "SET NAMES 'UTF8'"); // cho phep php luu unicode (utf8) - database 
        //echo "Ket noi thanh cong";
    }else{
        echo "Ket noi that bai";
    }

?>