<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Member</h1>
    <p class="mb-4">Data Tabel Member yang Bergabung</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Member</h6>
            <a class="btn btn-secondary" href="<?php echo base_url('welcome/print_member') ?>">
                <i class="fa fa-print"></i> Print
            </a>
            <a class="btn btn-success" href="<?php echo base_url('welcome/excel_member') ?>">
                <i class="fa fa-file-excel"></i> Excel
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Tier Member</th>
                            <th>Total Laundry</th>
                            <th>Total Harga</th>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($queryAlldatamember as $row) {
                            $count = $count + 1;
                        ?>
                            <tr>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->tanggal_lahir ?></td>
                                <td><?php echo $row->alamat ?></td>
                                <td><?php echo $row->no_hp ?></td>
                                <td><?php if ($row->tier_member == 1) {
                                        echo "Silver";
                                    } elseif ($row->tier_member == 2) {
                                        echo "Gold";
                                    } else {
                                        echo "Platinum";
                                    } ?></td>
                                <td><?php if ($row->total_laundry == NULL) {
                                        echo "0";
                                    } else {
                                        echo $row->total_laundry;
                                    } ?>kg</td>
                                <td>Rp<?php echo number_format($row->total_harga, 2, ',', '.') ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>