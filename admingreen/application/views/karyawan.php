<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>
    <p class="mb-4">Data Tabel Karyawan</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-10">
        <div class="card-header py-8 d-sm-flex-end align-items-end justify-content-between mb-10">
            <h6 class="m-6 font-weight-bold text-primary">Tabel Karyawan</h6>
            <a href="<?php echo base_url('Welcome/tambahkaryawan/') ?>" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download "></i>Tambah Karyawan</a>
                <a href="<?php echo base_url('Welcome/print_karyawan/') ?>" class=" btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-print "></i>Print</a>
                <a href="<?php echo base_url('Welcome/excel_karyawan/') ?>" class=" btn btn-sm btn-success shadow-sm">
                <i class="fas fa-file-excel "></i>Excel</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Karyawan</th>
                            <th>Tanggal Terdaftar</th>
                            <th>Nama</th>
                            <th>No Handphone</th>
                            <th>Alamat</th>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($queryAllkaryawan as $row) {
                            $count = $count + 1;
                        ?>
                            <tr>
                                <td><?php echo $row->id_karyawan ?></td>
                                <td><?php echo $row->tanggal_terdaftar?></td>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->no_hp ?></td>
                                <td><?php echo $row->alamat ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>