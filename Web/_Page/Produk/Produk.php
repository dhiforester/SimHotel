<?php
    if(empty($_GET['Sub'])){
        include "_Page/Produk/ProdukHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="Detail"){
            include "_Page/Produk/DetailProduk.php";
        }
    }
?>