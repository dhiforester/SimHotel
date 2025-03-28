<?php
    if(!empty($_GET['id_mitra'])){
        $GetIdMitra=$_GET['id_mitra'];
    }else{
        if(!empty($SessionIdMitra)){
            $GetIdMitra=$SessionIdMitra;
        }else{
            $GetIdMitra="";
        }
    }
    if(empty($_GET['Sub'])){
        include "_Page/Booking/BookingHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="Detail"){
            include "_Page/Booking/DetailBooking.php";
        }else{
            if($Sub=="TambahBooking"){
                include "_Page/Booking/FormTambahBooking.php";
            }else{
                if($Sub=="EditBooking"){
                    include "_Page/Booking/EditBooking.php";
                }else{
                    include "_Page/Booking/BookingHome.php";
                }
            }
        }
    }
?>