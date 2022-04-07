<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?php echo base_url('/asset/assets/');?>assets/css/style_result_presensi_karyawan.css" rel="stylesheet">
</head>

<body>
    <div id="backGround">
        <div class="kotakPresensi">
            <img src="<?php echo base_url('/asset/assets/');?>assets/img/presensi_karyawan/employees.png" alt="" class="employeeImage">
            <p class="nama_karyawan">nama Karyawan</p>
            <p class="id_karyawan">Id Karyawan</p>
            <div class="btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary active">
                <input type="checkbox" checked autocomplete="off"> Hadir
                </label>
            </div>
            <Button class="checkId">Masuk</Button>
        </div>
        
    </div>

</body>

</html>