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
    <title>Join Member</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header  mb-0">
                        <h5 class="text-center">Join Member</h5>
                    </div>
                    <div class="card-body">
                        <form action=<?= base_url('Member/register') ?> method="POST" id="join">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" placeholder="Masukkan No HP Anda" name="no_hp">
                            </div>
                            <div class=" mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" class="form-control" id="password" placeholder="Buat Kata Sandi" name="password">
                            </div>
                            <div class=" mb-3">
                                <label for="repassword" class="form-label">Ulangi Kata Sandi</label>
                                <input type="password" class="form-control" id="repassword" placeholder="Konfirmasi Kata Sandi" name="repassword">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" aria-describedby="emailHelp">
                            </div>
                            <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div> -->
                            <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        // $("form").submit(function(event) {
        //     var formData = $("form").serialize();
        //     $.post("<?= site_url('Member/register') ?>", function(formData) {
        //         // place success code here
        //     });

        //     event.preventDefault();
        // });
        $("#join").validate({
            rules: {
                nama: {
                    required: true,
                    minlength: 3,
                },
                no_hp: {
                    required: true,
                    number: true,
                    minlength: 12,
                    remote: {
                        url: "<?= base_url('Member/uniqe') ?>",
                        type: "post",
                        async: false,
                        data: {
                            no_hp: function() {
                                return $("#no_hp").val();
                            }
                        },
                        dataType: 'json'
                    }
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                repassword: {
                    required: true,
                    equalTo: "#password"
                },
                alamat: {
                    required: true,
                }
            },
            messages: {
                nama: {
                    required: "Mohon Masukan Nama Anda",
                    minlength: "Nama Minimal 3 Karakter"
                },
                no_hp: {
                    required: "Mohon Masukan Nomor HP Anda",
                    number: "Mohon Masukan Nomor HP dengan Benar",
                    minlength: "Nomor HP Minimal 12 Angka",
                    remote: "Nomor HP Sudah Terdaftar"
                },
                password: {
                    required: "Mohon Masukan Kata Sandi Anda",
                    minlength: "Kata Sandi Minimal 8 Karakter"
                },
                repassword: {
                    required: "Mohon Konfirmasi Kata Sandi Anda",
                    equalTo: "Kata Sandi tidak Cocok "
                },
                alamat: {
                    required: "Mohon Masukan Alamat Anda"
                }
            }
        });
    });
</script>

</html>