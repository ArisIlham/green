<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Presensi</h1>
    <p class="mb-4">Data Tabel Presensi Karyawan</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Presensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Karyawan</th>
                            <th>Namat</th>
                            <th>Status</th>
                            <th>Waktu Hadir</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($queryAllpresensi as $row) {
                            $count = $count + 1;
                        ?>
                            <tr>
                                <td><?php echo $row->id_karyawan ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->status ?></td>
                                <td><?php echo $row->waktu_hadir ?></td>
                                <td><?php echo $row->keterangan ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>