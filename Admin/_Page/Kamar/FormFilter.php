<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['KeywordBy'])){
        echo '<label for="FilterKeyword">Kata Kunci</label>';
        echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
    }else{
        $KeywordBy=$_POST['KeywordBy'];
        if($KeywordBy=="datetime"){
            echo '<label for="FilterKeyword">Kata Kunci</label>';
            echo '<input type="date" name="FilterKeyword" id="FilterKeyword" class="form-control">';
        }else{
            echo '<label for="FilterKeyword">Kata Kunci</label>';
            echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
        }
    }
?>