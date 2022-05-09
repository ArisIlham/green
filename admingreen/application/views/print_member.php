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
                        <th>No HP</th>
                        <th>Profil</th>
                        <th>Tier Member</th>
                        <th>Total Laundry</th>
                        <th>Total Harga</th>
    </tr>
    <?php
                        $count = 0;
                        foreach ($member as $row): ?>
                            <tr>
                            <td><?php echo $row->nama ?></td>
                        <td><?php echo $row->alamat ?></td>
                        <td><?php echo $row->no_hp ?></td>
                        <td><?php echo $row->foto ?></td>
                        <td><?php echo $row->tier_member ?></td>
                        <td><?php echo $row->total_laundry ?></td>
                        <td><?php echo $row->total_harga ?></td>
                                </tr>
                        <?php endforeach ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>