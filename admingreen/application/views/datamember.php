
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Member</h1>
<p class="mb-4">Data Tabel Member yang Bergabung</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Member</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Profil</th>
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
                        <td><?php echo $row->alamat ?></td>
                        <td><?php echo $row->no_hp ?></td>
                        <td><?php echo $row->foto ?></td>
                        <td><?php echo $row->tier_member ?></td>
                        <td><?php echo $row->total_laundry ?></td>
                        <td><?php echo $row->total_harga ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>