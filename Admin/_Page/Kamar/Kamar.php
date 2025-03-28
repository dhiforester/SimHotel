<?php
    if(empty($_GET['Sub'])){
        include "_Page/Kamar/KamarHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="DetailKamar"){
            include "_Page/Kamar/DetailKamar.php";
        }else{
            include "_Page/Kamar/KamarHome.php";
        }
    }
?>