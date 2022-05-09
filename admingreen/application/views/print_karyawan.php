<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
    <table>
    <tr>
    <th>ID Karyawan</th>
                        <th>Tanggal Terdaftar</th>
                        <th>Nama</th>
                        <th>Nomor HP</th>
                        <th>Alamat</th>

    </tr>
    <?php
                        $count = 0;
                        foreach ($karyawan as $row): ?>
                            <tr>
                            <td><?php echo $row->id_karyawan ?></td>
                        <td><?php echo $row->tanggal_terdaftar ?></td>
                        <td><?php echo $row->nama ?></td>
                        <td><?php echo $row->no_hp ?></td>
                        <td><?php echo $row->alamat ?></td>

                                </tr>
                        <?php endforeach ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>