<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Promo</h1>
    <p class="mb-4">Data Tabel Promo</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Promo</h6>
            <a href="<?php echo base_url('Welcome/tambahpromo/') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>Tambah Promo</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Kupon</th>
                            <th>Judul Kupon</th>
                            <th>Masa Berlaku</th>
                            <th>Keterangan</th>
                            <th>Miniman Laundry</th>
                            <th>Persentase Diskon</th>
                            <th>Tier Kupon</th>
                            <th>Jumlah Klaim</th>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($queryAllpromo as $row) {
                            $count = $count + 1;
                        ?>
                            <tr>
                                <td><?php echo $row->kode_kupon ?></td>
                                <td><?php echo $row->judul_kupon ?></td>
                                <td><?php echo $row->masa_berlaku ?></td>
                                <td><?php echo $row->keterangan ?></td>
                                <td><?php echo $row->min_laundry ?>kg</td>
                                <td><?php echo $row->persentase_diskon ?>%</td>
                                <td><?php if ($row->tier_kupon == 0) {
                                        echo "newMember";
                                    } elseif ($row->tier_kupon == 1) {
                                        echo "Silver";
                                    } elseif ($row->tier_kupon == 2) {
                                        echo "Gold";
                                    } elseif ($row->tier_kupon == 3) {
                                        echo "Platinum";
                                    } else {
                                        echo "Semua Tier";
                                    } ?></td>
                                <td><?php echo $row->jumlah_klaim ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>