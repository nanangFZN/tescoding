<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'putera_group');
$query = "SELECT 
              CONCAT(first_name, ' ', last_name) AS nama,
              CASE
                  WHEN (TIME_TO_SEC(absence_in) - TIME_TO_SEC(shift_in)) / 60 < 0 THEN 0
                  ELSE ROUND((TIME_TO_SEC(absence_in) - TIME_TO_SEC(shift_in)) / 60)
              END AS terlambat,
              CASE
                  WHEN (TIME_TO_SEC(absence_out) - TIME_TO_SEC(shift_out)) / 60 > 0 THEN ROUND((TIME_TO_SEC(absence_out) - TIME_TO_SEC(shift_out)) / 60)
                  ELSE 0
              END AS overtime
          FROM absensi";
$exe = mysqli_query($koneksi, $query);

?>

<table>
    <tr>
        <td>Nama</td>
        <td>Terlambat</td>
        <td>Overtime</td>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($exe)) {
    ?>
    <tr>
        <td><?php echo $row['nama'];?></td>
        <td><?php echo $row['terlambat'];?></td>
        <td><?php echo $row['overtime'];?></td>
    </tr>
    <?php
    }
    ?>
</table>
