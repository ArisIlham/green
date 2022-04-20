<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Penjemputan</h1>
    <p class="mb-4">Data Tabel yang harus dijemput</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Penjemputan</h6>
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
                            <th>catatan</th>
                            <th>waktu</th>
                            <th>berat</th>
                            <th>tagihan</th>
                            <th>kupon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($queryAllpenjemputan as $row) {
                            $count = $count + 1;
                        ?>
                            <tr>
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