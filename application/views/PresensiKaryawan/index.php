<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?php echo base_url('/asset/assets/'); ?>assets/css/style_presensi_karyawan.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head>

<body>
    <div id="backGround">
        <div class="kotakPresensi">
            <?php
            if (isset($success)) {
                echo "<p>Berhasil Presensi</p>";
            }
            ?>
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
<script>
    $(document).ready(function() {
        let csrfName = $('.txt_csrfname').attr('name');
        let csrfHash = $('.txt_csrfname').val();

        $.validator.addMethod("login", function(value, element) {
            let res = false;
            $.ajax({
                url: "<?= base_url('Karyawan/checkKaryawan') ?>",
                type: "post",
                async: false,
                data: {
                    idKaryawan: function() {
                        return $("#inputId").val();
                    },
                    [csrfName]: csrfHash
                },
                dataType: 'json',
                success: function(data) {

                    csrfHash = data.csrfHash;
                    $('.txt_csrfname').val(data.csrfHash);

                    if (data.id == "false") {
                        res = false;
                    } else {
                        res = true;
                    }
                }
            })
            return res;
        }, "");

        $("#login").validate({
            rules: {
                idKaryawan: {
                    required: true,
                    login: true
                },

            },
            messages: {
                idKaryawan: {
                    required: "Mohon Masukan ID Anda",
                    login: "ID Anda tidak Terdaftar"
                },
            }
        });
    });
</script>

</html>