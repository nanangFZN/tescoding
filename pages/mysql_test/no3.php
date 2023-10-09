<?php
$koneksi = mysqli_connect('localhost','root','','putera_group');
$query = "SELECT
            CONCAT(first_name, ' ', last_name) AS name,
            YEAR(birth_date) AS birth_year,
            YEAR(CURRENT_DATE()) + 5 - YEAR(birth_date) AS tahun_pensiun
            FROM table_karyawan
            WHERE YEAR(CURRENT_DATE()) + 5 - YEAR(birth_date) >= 55";

$exe = mysqli_query($koneksi,$query);

?>
    <table>
        <tr>
            <td>Name</td>
            <td>Age</td>
        </tr>
        <?php
             while ($row = mysqli_fetch_assoc($exe)) {
        ?>
        <tr>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['tahun_pensiun'];?></td>
        </tr>
      <?php } ?>
    </table>

