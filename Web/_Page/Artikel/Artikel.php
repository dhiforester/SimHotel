<?php
    if(empty($_GET['Sub'])){
        include "_Page/Artikel/ArtikelHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="Detail"){
            include "_Page/Artikel/ArtikelDetail.php";
        }
    }
?>