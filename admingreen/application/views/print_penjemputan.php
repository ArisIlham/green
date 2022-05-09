<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
    <table>
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
    <?php
                        $count = 0;
                        foreach ($penjemputan as $row): ?>
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
                        <?php endforeach ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>