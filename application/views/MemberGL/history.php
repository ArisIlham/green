<!DOCTYPE html>
<html lang="en">

<div id="layoutSidenav_content">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: green;">Riwayat Laundry</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kontak</th>
                            <th>Barang</th>
                            <th>Catatan</th>
                            <th>Waktu</th>
                            <th>Berat</th>
                            <th>Tagihan</th>
                            <th>Kupon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($data as $row) {
                            $count = $count + 1;
                        ?>
                            <tr onclick="location.href = `<?= base_url('Member/detail/' . $row->id_order) ?>`">
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->alamat ?></td>
                                <td><?php echo $row->no_hp ?></td>
                                <td><?php echo $row->jenis_barang ?></td>
                                <td><?php echo $row->note ?></td>
                                <td><?php echo $row->waktu_jemput ?></td>
                                <td><?php echo $row->berat ?></td>
                                <td><?php echo $row->harga ?></td>
                                <td><?php echo $row->kupon ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

<!-- Page level custom scripts -->

<script src="<?php echo base_url('/asset/assets/'); ?>assets/vendor/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('/asset/assets/'); ?>assets/vendor/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('/asset/assets/'); ?>assets/js//datatables-demo.js"></script>

</html>