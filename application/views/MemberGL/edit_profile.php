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
                        <h5 class="text-center">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <form action=<?= base_url('Member/goEditProfile') ?> method="POST" id="join" enctype="multipart/form-data">
                            <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" placeholder="Upload Foto">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda" value="<?= $nama; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" placeholder="Masukkan No HP Anda" name="no_hp" value="<?= $no_hp; ?>">
                            </div>
                            <div class=" mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" value="<?= $alamat; ?>">
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
    $(document).ready(function() {
        let csrfName = $('.txt_csrfname').attr('name');
        let csrfHash = $('.txt_csrfname').val();

        $.validator.addMethod("uniqeHP", function(value, element) {
            let res = false;
            $.ajax({
                url: "<?= base_url('Member/editHP') ?>",
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

        $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param * 1000000)
        }, 'Maksimal Ukuran File Foto {0} MB');

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
                    uniqeHP: true
                },
                foto: {
                    extension: "gif|jpeg|jpg|png",
                    filesize: 2
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
                    uniqeHP: "Nomor HP Sudah Terdaftar"
                },
                foto: {
                    extension: "Format Foto tidak Didukung"

                },
                alamat: {
                    required: "Mohon Masukan Alamat Anda"
                }
            }
        });
    });
</script>

</html>