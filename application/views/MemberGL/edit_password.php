<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="<?php echo base_url('/asset/assets/'); ?>assets/css/validation.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <title>Join Member</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header  mb-0">
                        <h5 class="text-center">Ubah Password</h5>
                    </div>
                    <div class="card-body">
                        <form action=<?= base_url('Member/goEditPassword') ?> method="POST" id="join" enctype="multipart/form-data">
                            <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" placeholder="Masukkan No HP Anda" name="no_hp" value="<?= $no_hp; ?>">
                            </div>
                            <div class=" mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $tanggal_lahir; ?>">
                            </div>
                            <div class=" mb-3">
                                <label for="password" class="form-label">Kata Sandi Baru</label>
                                <div style="display:flex;">
                                    <div style="display: block; width:100%;">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Buat Kata Sandi Anda">
                                    </div>
                                    <i style="margin-left: -30px; margin-top: 5px; cursor:pointer;" class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label for="repassword" class="form-label">Ulangi Kata Sandi</label>
                                <div style="display:flex;">
                                    <div style="display: block; width:100%;">
                                        <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Konfirmasi Kata Sandi">
                                    </div>
                                    <i style="margin-left: -30px; margin-top: 5px; cursor:pointer;" class="bi bi-eye-slash" id="togglerePassword"></i>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit-btn">Simpan</button>
                            <a href="<?= base_url('member/profile') ?>" class="btn btn-danger" id="cancel-btn">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    const togglePassword = document.querySelector("#togglePassword");
    const togglerePassword = document.querySelector("#togglerePassword");
    const password = document.querySelector("#password");
    const repassword = document.querySelector("#repassword");


    togglePassword.addEventListener("click", function() {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    togglerePassword.addEventListener("click", function() {
        // toggle the type attribute
        const type = repassword.getAttribute("type") === "password" ? "text" : "password";
        repassword.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    $(document).ready(function() {
        let csrfName = $('.txt_csrfname').attr('name');
        let csrfHash = $('.txt_csrfname').val();

        $.validator.addMethod("uniqeHP", function(value, element) {
            let res = false;
            $.ajax({
                url: "<?= base_url('Member/checkHP') ?>",
                type: "post",
                async: false,
                data: {
                    no_hp: function() {
                        return $("#no_hp").val();
                    },
                    [csrfName]: csrfHash
                },
                dataType: 'json',
                success: function(data) {

                    csrfHash = data.csrfHash;
                    $('.txt_csrfname').val(data.csrfHash);

                    if (data.member == "true") {
                        res = true;
                    } else {
                        res = false;
                    }
                }
            })
            return res;
        }, "");

        $.validator.addMethod("tglLahir", function(value, element) {
            let res = false;
            $.ajax({
                url: "<?= base_url('Member/checkTgl') ?>",
                type: "post",
                async: false,
                data: {
                    no_hp: function() {
                        return $("#no_hp").val();
                    },
                    tanggal_lahir: function() {
                        return $("#tanggal_lahir").val();
                    },
                    [csrfName]: csrfHash
                },
                dataType: 'json',
                success: function(data) {

                    csrfHash = data.csrfHash;
                    $('.txt_csrfname').val(data.csrfHash);

                    if (data.member == "true") {
                        res = true;
                    } else {
                        res = false;
                    }
                }
            })
            return res;
        }, "");

        $("#join").validate({
            rules: {
                no_hp: {
                    required: true,
                    number: true,
                    minlength: 12,
                    uniqeHP: true
                },
                tanggal_lahir: {
                    required: true,
                    date: true,
                    tglLahir: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 16
                },
                repassword: {
                    required: true,
                    equalTo: "#password"
                },
            },
            messages: {
                no_hp: {
                    required: "Mohon Masukan Nomor HP Anda",
                    number: "Mohon Masukan Nomor HP dengan Benar",
                    minlength: "Nomor HP Minimal 12 Angka",
                    uniqeHP: "Nomor HP Tidak Terdaftar"
                },
                tanggal_lahir: {
                    required: "Mohon Masukan Tanggal Lahir Anda",
                    date: "Format Tanggal Lahir Tanggal/Bulan/Tahun",
                    tglLahir: "Tanggal Lahir Tidak Cocok"
                },
                password: {
                    required: "Mohon Masukan Kata Sandi Anda",
                    minlength: "Kata Sandi Minimal 8 Karakter",
                    maxlength: "Kata Sandi Maksimal 16 Karakter"
                },
                repassword: {
                    required: "Mohon Konfirmasi Kata Sandi Anda",
                    equalTo: "Kata Sandi tidak Cocok "
                }
            }
        });
    });
</script>

</html>