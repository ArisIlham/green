<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <title>Form Login</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header  mb-0">
                        <h5 class="text-center">Login</h5>
                    </div>
                    <div class="card-body">
                        <form id="login" action="<?= base_url('Member/login') ?>" method="POST">
                            <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        let csrfName = $('.txt_csrfname').attr('name');
        let csrfHash = $('.txt_csrfname').val();

        $.validator.addMethod("uniqeHP", function(value, element) {
            let res = false;
            $.ajax({
                url: "<?= base_url('Member/uniqe') ?>",
                type: "post",
                async: false,
                data: {
                    no_hp: function() {
                        return $("#no_hp").val();
                    },
                    password: function() {
                        return $("#password").val();
                    },
                    [csrfName]: csrfHash
                },
                dataType: 'json',
                success: function(data) {

                    csrfHash = data.csrfHash;
                    $('.txt_csrfname').val(data.csrfHash);

                    if (data.member == "true") {
                        res = false;
                    } else {
                        res = true;
                    }
                }
            })
            return res;
        }, "");

        $.validator.addMethod("checkPassword", function(value, element) {
            let res = false;
            $.ajax({
                url: "<?= base_url('Member/password') ?>",
                type: "post",
                async: false,
                data: {
                    no_hp: function() {
                        return $("#no_hp").val();
                    },
                    password: function() {
                        return $("#password").val();
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

        $("#login").validate({
            rules: {
                no_hp: {
                    required: true,
                    number: true,
                    minlength: 12,
                    uniqeHP: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    checkPassword: true
                }
            },
            messages: {
                no_hp: {
                    required: "Mohon Masukan Nomor HP Anda",
                    number: "Mohon Masukan Nomor HP dengan Benar",
                    minlength: "Nomor HP Minimal 12 Angka",
                    uniqeHP: "Nomor HP Tidak Terdaftar"
                },
                password: {
                    required: "Mohon Masukan Kata Sandi Anda",
                    minlength: "Kata Sandi Minimal 8 Karakter",
                    checkPassword: "Password Anda Salah"
                }
            }
        });
    });
</script>

</html>