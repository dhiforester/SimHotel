<?php
    if(empty($_GET['Sub'])){
        include "_Page/Mitra/MitraHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="Detail"){
            include "_Page/Mitra/DetailMitra.php";
        }
    }
?>