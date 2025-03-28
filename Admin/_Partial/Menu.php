<?php
    if(empty($_GET['Page'])){
        $PageMenu="";
    }else{
        $PageMenu=$_GET['Page'];
    }
    if(empty($_GET['Sub'])){
        $SubMenu="";
    }else{
        $SubMenu=$_GET['Sub'];
    }
    // if($SessionAkses=="Admin"){
    //     include "_Partial/MenuAdmin.php";
    // }
    if($SessionAkses=="Manajer"){
        include "_Partial/MenuManajer.php";
    }
    if($SessionAkses=="Customer Service"){
        include "_Partial/MenuCs.php";
    }
?>