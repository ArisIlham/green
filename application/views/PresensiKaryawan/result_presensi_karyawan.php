<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?php echo base_url('/asset/assets/'); ?>assets/css/style_result_presensi_karyawan.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head>

<body>
    <div id="backGround">
        <div class="kotakPresensi">
            <img src="<?php echo base_url('/asset/assets/'); ?>assets/img/presensi_karyawan/employees.png" alt="" class="employeeImage">
            <p class="nama_karyawan"><?= $nama; ?></p>
            <p class="id_karyawan"><?= $id_karyawan; ?></p>
            <form action="<?= base_url('Karyawan/presensi') ?>" method="POST" id="presensi">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="id" value="<?= $id_karyawan; ?>">
                <input type="hidden" name="nama" value="<?= $nama; ?>">
                <div class="btn-group-toggle">
                    <input type="radio" name="hadir" id="hadir" value="Hadir" checked>
                    <label for="hadir">Hadir</label>
                    <br><br>
                    <input type="radio" name="hadir" id="izin" value="Izin">
                    <label for="izin" id="lizin">Izin</label>
                </div>
                <Button type="submit" class="checkId">Masuk</Button>
            </form>
        </div>

    </div>

</body>

<script>
    $("#izin").click(function() {
        if (!$("#ket").length) {
            $("#lizin").after('<div id="ketizin">' + '<label for="ket" id="lket">Keterangan</label><br>' + '<input type="text" name="ket" id="ket">' + '</div');
        }
    });

    $("#hadir").click(function() {
        if ($("#ketizin").length) {
            $("#ketizin").remove();
        }
    });
</script>

</html>