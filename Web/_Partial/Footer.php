<!-- Footer Start -->
<div class="container-fluid bg-gelap text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-md-6 mb-3 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4"><?php echo "$judul"; ?></h5>
            <p class="mb-4"><?php echo "$deskripsi"; ?></p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i><?php echo "$alamat"; ?></p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><?php echo "$email"; ?></p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i><?php echo "$kontak"; ?></p>
        </div>
        <div class="col-md-6 mb-3 pr-3 pr-xl-5">
            <h6 class="text-secondary text-uppercase mb-3">Follow Us</h6>
            <div class="d-flex">
                <?php
                    if(!empty($FacebookUrl)){
                        echo '<a class="text-secondary mb-2 mr-2" href="'.$FacebookUrl.'"><img src="img/logo-facebook.png" width="40px"></a>';
                    }
                    if(!empty($InstagramUrl)){
                        echo '<a class="text-secondary mb-2 mr-2" href="'.$InstagramUrl.'"><img src="img/1600427.png" width="40px"></a>';
                    }
                    if(!empty($TweeterUrl)){
                        echo '<a class="text-secondary mb-2 mr-2" href="'.$TweeterUrl.'"><img src="img/580b57fcd9996e24bc43c53e.png" width="40px"></a>';
                    }
                    if(!empty($WhatsappUrl)){
                        echo '<a class="text-secondary mb-2 mr-2" href="'.$WhatsappUrl.'"><img src="img/whatsapp.png" width="40px"></a>';
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-secondary">
                &copy; <a class="text-primary" href=""><?php echo $author;?></a>. All Rights Reserved. Designed
                by
                <a class="text-primary" href=""><?php echo $organization;?></a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <?php
                //Menampilkan Data Akun Bank
                $QryBank = mysqli_query($Conn, "SELECT*FROM bank");
                while ($DataBank = mysqli_fetch_array($QryBank)) {
                    $logo= $DataBank['logo_bank'];
                    $nama_bank= $DataBank['nama_bank'];
                    echo '<img class="img-fluid mr-3" src="'.$base_url_admin.'/assets/img/Bank/'.$logo.'" alt="'.$nama_bank.'" width="60px">';
                }
            ?>
        </div>
    </div>
</div>
<!-- Footer End -->