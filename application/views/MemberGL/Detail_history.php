<!DOCTYPE html>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h2 style="text-align: center;"> Detail history laundry</h2>
      <div style="display: flex;">
        <div>
          <p>Nama</p>
          <p>Alamat </p>
          <p>Jenis Barang </p>
          <p>Note pemesanan </p>
          <p>Waktu Penjemputan</p>
          <p>Berat Laundry</p>
          <p>Tagihan Laundry</p>
          <p>Kupon</p>
          <p>Status Pemesanan</p>
        </div>
        <div style="margin-left: 5px;">
          <p>: <?= $nama; ?></p>
          <p>: <?= $alamat; ?></p>
          <p>: <?= $jenis_barang; ?></p>
          <p>: <?= $note; ?></p>
          <p>: <?= $waktu_jemput; ?></p>
          <p>: <?php if ($berat != NULL) {
                  echo $berat . "kg";
                } else {
                  echo "<i>Barang belum ditimbang</i>";
                } ?></p>
          <p>: <?php if ($harga != NULL) {
                  echo "Rp" . number_format($harga, 2, ',', '.');
                } else {
                  echo "<i>Barang belum ditimbang</i>";
                } ?></p>
          <p>: <?= $judul_kupon; ?></p>
          <p>: <?php if ($status == 1) {
                  echo "Selesai";
                } else if ($status == 2) {
                  echo "Pending";
                } else {
                  echo "Dibatalkan";
                } ?>
          </p>
        </div>
      </div>
    </div>
    <div class="mt-4 mb-0">

      <div>
        <center>
          <a class="btn btn-primary btn-block" style="background-color: #33A303; border-color: #33A303; " href="<?= $_SERVER['HTTP_REFERER']; ?>">Kembali</a>
        </center>
      </div>
    </div>

  </main>
  <footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
      <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted"></div>
        <div>
          <a href="#">
            &middot;
            <a href="#"></a>
        </div>
      </div>
    </div>
  </footer>
</div>
</div>

</body>

</html>