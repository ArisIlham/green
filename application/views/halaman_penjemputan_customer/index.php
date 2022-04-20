<html>

<head>
    <title>
        Halaman penjemputan barang
    </title>
    <link href="<?php echo base_url('/asset/assets/'); ?>assets/css/style_pemesanan_customer.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <link href="<?php echo base_url('/asset/assets/'); ?>assets/css/validation_order.css" rel="stylesheet" />
</head>



<body>

    <div class="header">

        <h1>
            GREEN LAUNDRY EXPRESS PRINGSEWU</h1>

        <h3>
            Melayani dengan Sepenuh Hati, Cepat, dan Handal</h3>


        <main id="main">
            <div class="penjemputan-page">
                <h2>
                    <p class="center">Penjemputan Barang
                    <p>
                </h2>
                <div class="form">
                    <form id="order" action="<?= base_url('Member/order') ?>" method="POST">
                        <input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="form-group1">
                            <label for="nama">Nama</label> <input id="nama" name="nama" type="text">
                        </div> <br>
                        <div class="form-group">
                            <label for="alamat">Alamat</label> <input id="alamat" name="alamat" type="text">
                        </div> <br>
                        <div class="form-group">
                            <label for="no_hp">No.Hp</label> <input id="no_hp" name="no_hp" type="text">
                        </div><br>
                        <div class="form-group">
                            <label for="jenis">Jenis Barang</label> <input id="jenis" name="jenis" type="text">
                        </div><br>
                        <div class="form-group">
                            <label for="note">Note Pemesanan</label> <input id="note" name="note" type="text">
                        </div><br>
                        <div>
                            <label for="waktu">Waktu Penjemputan</label> <input type="datetime-local" id="waktu" name="waktu">
                        </div><br>

                        <center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary" type="submit">Buat Pesanan</button></center>
                    </form>
                </div>
            </div>
        </main>

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>
<script>
    $(document).ready(function() {
        $('#order').validate({
            rules: {
                nama: {
                    required: true,
                    minlength: 3
                },
                no_hp: {
                    required: true,
                    number: true,
                    minlength: 12,
                },
                alamat: {
                    required: true,
                    minlength: 4
                },
                jenis: {
                    required: true,
                    minlength: 4
                },
                waktu: {
                    required: true,
                }
            },
            messages: {
                nama: {
                    required: "Masukkan Nama Anda",
                    minlength: "Masukkan Nama dengan Benar"
                },
                no_hp: {
                    required: "Masukkan Kontak Anda",
                    minlength: "Masukkan Nomor HP dengan Benar",
                    number: "Masukkan Nomor HP dengan Benar"
                },
                alamat: {
                    required: "Masukkan Alamat Penjemputan",
                    minlength: "Masukkan Alamat dengan Benar"
                },
                jenis: {
                    required: "Masukkan Jenis Barang Laundry",
                    minlength: "Masukkan Jenis Barang dengan Benar"
                },
                waktu: {
                    required: "Masukkan Waktu Penjemputan"
                },
            }
        })
    })
</script>

</html>