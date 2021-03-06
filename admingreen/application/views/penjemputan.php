<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Penjemputan</h1>
    <p class="mb-4">Data Tabel yang harus dijemput</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Penjemputan</h6>
            <a class="btn btn-secondary" href="<?php echo base_url('welcome/print_penjemputan') ?>">
                <i class="fa fa-print"></i> Print
            </a>
            <a class="btn btn-success" href="<?php echo base_url('welcome/excel_penjemputan') ?>">
                <i class="fa fa-file-excel"></i> Excel
            </a>
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
                            <th>Status</th>
                            <th>Aksi</th>
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
                                <td><?php if ($row->berat == NULL) {
                                        echo "0";
                                    } else {
                                        echo $row->berat;
                                    } ?>kg</td>
                                <td>Rp<?php echo number_format($row->harga, 2, ',', '.') ?></td>
                                <td><?php echo $row->kupon ?></td>
                                <td><?php if ($row->status == 1) {
                                        echo "Selesai";
                                    } elseif ($row->status == 2) {
                                        echo "Pending";
                                    } else {
                                        echo "Dibatalkan";
                                    } ?></td>
                                <td>
                                    <!-- <a href="<?php echo base_url('welcome/hapus_penjemputan') ?>/<?php echo $row->id_order ?>">
                                        <button onclick="javascript: return confirm('Anda Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                    <hr> -->
                                    <div style="display:flex;">
                                        <a style="margin-right: 3px;" href="<?php echo base_url('welcome/edit_penjemputan') ?>/<?php echo $row->id_order ?>">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>
                                        <a style="margin-right: 3px;" href="<?php echo base_url('welcome/pending_penjemputan') ?>/<?php echo $row->id_order ?>">
                                            <button class="btn btn-warning btn-sm"><i class="fa fa-clock"></i></button></a>
                                        <a style="margin-right: 3px;" href="<?php echo base_url('welcome/selesai_penjemputan') ?>/<?php echo $row->id_order ?>">
                                            <button class="btn btn-success btn-sm"><i class="fa fa-check"></i></button></a>
                                        <a href="<?php echo base_url('welcome/batal_penjemputan') ?>/<?php echo $row->id_order ?>">
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-ban"></i></button></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>