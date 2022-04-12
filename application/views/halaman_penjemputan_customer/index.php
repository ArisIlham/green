<html>

<head>
    <title>
        Halaman penjemputan barang
    </title>
    <link href="<?php echo base_url('/asset/assets/'); ?>assets/css/style_pemesanan_customer.css" rel="stylesheet">
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
                    <form id="Penjemputan-form">
                        <div class="form-group">
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

                        <center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Buat Pesanan</button></center>
                    </form>
                </div>
            </div>
        </main>

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>

</html>