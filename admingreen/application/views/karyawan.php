<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>
    <p class="mb-4">Data Tabel Karyawan</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Karyawan</h6>
            <a href="<?php echo base_url('Welcome/tambahkaryawan/') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>Tambah Karyawan</a>
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