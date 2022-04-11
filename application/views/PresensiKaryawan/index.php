<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?php echo base_url('/asset/assets/'); ?>assets/css/style_presensi_karyawan.css" rel="stylesheet">
</head>

<body>
    <div id="backGround">
        <div class="kotakPresensi">
            <h1 class="title">Presensi Karyawan Green Laundry</h1>
            <img src="<?php echo base_url('/asset/assets/'); ?>assets/img/presensi_karyawan/employees.png" alt="" class="employeeImage">
            <!-- <img src="../asset/assets/img/presensi_karyawan/employees.png" class="employeeImage"><br></br> -->
            <form id="login" action="<?= base_url('Karyawan/login') ?>" method="POST">
                <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="text" id="inputId" name="idKaryawan" placeholder="Masukkan Id Karyawan"><br><br>
                <Button class="checkId">Login</Button>
            </form>
        </div>

    </div>

</body>

</html>