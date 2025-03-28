<?php
    include "../../_Config/Connection.php";
?>
<div class="row mb-4">
    <div class="col-md-3">
        <label for="nama"><b>Nama Lengkap</b></label>
        
    </div>
    <div class="col-md-9">
        <input type="text" name="nama" id="nama" class="form-control">
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-3">
        <label for="kontak"><b>Nomor Kontak</b></label>
    </div>
    <div class="col-md-9">
        <input type="text" name="kontak" id="kontak" class="form-control" placeholder="+62">
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-3">
        <label for="akses"><b>Akses</b></label>
    </div>
    <div class="col-md-9">
        <select name="akses" id="akses" class="form-control">
            <!-- <option value="Admin">Admin</option> -->
            <option value="Customer Service">Customer Service</option>
            <option value="Manajer">Manajer</option>
        </select>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-3">
        <label for="foto"><b>Foto Profile</b></label>
    </div>
    <div class="col-md-9">
        <input type="file" name="foto" id="foto" class="form-control">
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-3">
        <label for="email"><b>Email</b></label>
    </div>
    <div class="col-md-9">
        <input type="email" name="email" id="email" class="form-control" placeholder="alamatemail@domain.com">
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-3">
        <label for="password1"><b>Password</b></label>
    </div>
    <div class="col-md-9">
        <input type="password" name="password1" id="password1" class="form-control">
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-3">
        <label for="password2"><b>Ulangi Password</b></label>
    </div>
    <div class="col-md-9">
        <input type="password" name="password2" id="password2" class="form-control">
        <small class="credit">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Tampilkan" id="TampilkanPassword" name="TampilkanPassword">
                <label class="form-check-label" for="TampilkanPassword">
                    Tampilkan Password
                </label>
            </div>
        </small>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-3" id="NotifikasiTambahAkses">
        <small class="text-primary">Pastkan data yang anda input sudah benar</small>
    </div>
</div>