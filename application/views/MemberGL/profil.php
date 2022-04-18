<!DOCTYPE html>
<html lang="en">

<div id="layoutSidenav_content">
    <main>
        <!-- ini buat konten -->
        <div class="container">
            <div class="user_profile">
                <div class="user_photo_profile">
                    <img src="<?php echo base_url('/asset/assets/'); ?>assets/img/presensi_karyawan/employees.png" alt="" class="user_photo">
                    <div class="user_level">
                        <h3 class="user_level_text">silver</h3>
                    </div>
                </div>
                <div class="user_bio">
                    <h1 class="user_name"><?= $nama; ?></h1>
                    <h3 class="kontak">kontak</h3>
                    <p class="user_phone"><?= $no_hp; ?></p>
                    <h3 class="address_tittle"> Alamat</h3>
                    <p class="user_address"><?= $alamat; ?></p>
                </div>
                <div class="user_edit_button">
                    <button class="edit_profile_btn"> Edit Profile</button>
                </div>
            </div><br>

            <div class="user_laundry_resume">
                <Div class="resume_div"></Div>
                <div class="order_total">
                    <div class="berat_barang">
                        <h1 class="berat"><?= $total_laundry; ?>kg</h1>
                    </div>
                    <div class="total_pesanan_div">
                        <div>
                            <h1>Total Pesanan</h1>
                            <h1 class="total_pesanan">Rp<?= $total_harga; ?> </h1>
                        </div>
                    </div>
                </div>
                <div class="kupon">
                    <div class="kupon_sum_div">
                        <h1 class="kupon_sum">10</h1>
                    </div>
                    <div class="total_pesanan_div">
                        <div>
                            <h1>Kupon</h1>
                            <h1 class="terpakai_kupon_text">Terpakai</h1>
                        </div>
                    </div>
                </div>
                <div class="membership_info">
                    <h1 class="kupon_info">Keuntungan Member Silver</h1>
                    <p>Bebas Ongkir selamanya untuk wilayah Kabupaten Pringsewu
                        Mendapatkan kupon promo setiap bulan
                        Berkesempatan mendapat hadiah menarik dalam event tahunan Green Laundry Express</p>
                </div>
            </div>

        </div>

    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted"></div>
                <div>
                    <a href="#">
                        &middot;
                        <a href="#"></a>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>

</html>