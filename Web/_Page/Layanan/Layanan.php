<?php
    if(empty($_GET['Sub'])){
        include "_Page/Layanan/LayananHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="Detail"){
            include "_Page/Layanan/DetailLayanan.php";
        }
    }
?>