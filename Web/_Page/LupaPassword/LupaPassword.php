<?php
    if(empty($_GET['Sub'])){
        include "_Page/LupaPassword/FormLupaPassword.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="ResetPassword"){
            include "_Page/LupaPassword/FormResetPassword.php";
        }
    }
?>