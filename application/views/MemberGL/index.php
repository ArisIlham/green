<!DOCTYPE html>
<html lang="en">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Selamat Datang</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Hai, <?= $nama ?> <br>
                    Selamat Datang Di Aplikasi Green laundry. Cucian anda akan beres hanya dalam waktu 3 jam, Kami siap mejemput dan mengantar cucian anda.</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Pesanan Berlangsung</div>
                        <table id="recent" width="100%" cellspacing="0">
                            <tbody>
                                <?php $count = 0;
                                foreach ($order as $row) {
                                    if ($row->status == 2) {
                                ?>
                                        <tr class="card-footer d-flex align-items-center justify-content-between" onclick="location.href = `<?= base_url('Member/detail/' . $row->id_order) ?>`">
                                            <td><?= $row->jenis_barang ?><br><?= "(" . $row->waktu_jemput . ")" ?></td>
                                            <td>
                                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                            </td>
                                        </tr>
                                    <?php $count++;
                                    }
                                }
                                if ($count == 0) {
                                    ?>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="small text-white stretched-link" style="margin-bottom:1px;">Tidak Ada Pesanan</p>
                                        </div>
                                    </div>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <h1>Promo Khusus Untuk Anda</h1>


            <?php $count = 0;
            date_default_timezone_set("Asia/Jakarta");
            foreach ($kupon as $row) {
                if ($count % 2 == 0) { ?>
                    <div style="display: flex;">
                    <?php
                } ?>
                    <?php if ($row->masa_berlaku >= date("Y-m-d") && $row->tier_kupon == $tier_member || $row->masa_berlaku >= date("Y-m-d") && $row->id_member == $id_member || $row->masa_berlaku >= date("Y-m-d") && $row->tier_kupon == 4) { ?>
                        <form id="kupon" action="<?= base_url('Member/addKupon') ?>" method="POST">
                            <input id="gg" type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="id_kupon" id="id_kupon" value="<?= $row->id_kupon ?>">
                            <div class="Kupon" style="background: #43A047; width: 400px; height: auto; display:flex; margin-top: 5px; margin-left: 10px;">
                                <img src="<?php echo base_url('/asset/assets/'); ?>assets/img/kupon.png" style=" margin: auto; background: #43A047; width:100px; height: 90px; float: left;">
                                <div style="margin-top: 13px; padding: 7px;">
                                    <h5 style="color:#eeeeee;"><?= $row->judul_kupon ?></h5>
                                    <h2 style="color:#f0c70a;">Diskon <?= $row->persentase_diskon ?>%</h2>
                                    <h6 style="color:wheat;">Minimal Laundry <?= $row->min_laundry ?>kg</h6>
                                    <p class="expire" style="color:yellow">Expired: <?= $row->masa_berlaku ?></p>
                                </div>
                                <div style="display: flex; padding-left: 10px; padding-right: 10px; justify-content: center; align-items: center; border-left: 2px dashed; border-color: white; width:30%;">
                                    <div>
                                        <center><button style="background: orange; border-color: white; color: white; border: 1px solid;" id="<?= $row->id_kupon ?>" type="submit">Klaim</button></center>
                                        <?php if ($row->jumlah_klaim >= 0) { ?>
                                            <p style="color:white; font-size:small; text-align:center;">Sisa: <?= $row->jumlah_klaim ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                    <?php if ($count % 2 != 0) { ?>
                    </div>
            <?php }
                    $count += 1;
                } ?>
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
</div>


<script>
    $(document).ready(function() {
        <?php foreach ($kupon as $row) {
            foreach ($kupon_member as $row2) {
                if ($row->id_kupon === $row2->id_kupon) {
        ?>

                    $('#'.concat('<?= $row->id_kupon ?>')).prop('disabled', true);
                    $('#'.concat('<?= $row->id_kupon; ?>')).css('background-color', 'grey');
                <?php }
            }
            if ($row->jumlah_klaim == 0) {
                ?>
                $('#'.concat('<?= $row->id_kupon ?>')).prop('disabled', true);
                $('#'.concat('<?= $row->id_kupon; ?>')).css('background-color', 'grey');
        <?php }
        } ?>
    })
</script>
</body>

</html>