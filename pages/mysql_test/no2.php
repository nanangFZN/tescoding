<?php
$koneksi = mysqli_connect('localhost','root','','putera_group');
$query = "SELECT
                    CONCAT(first_name, ' ', last_name) AS name,
                    YEAR(DATE('2021-01-01')) - YEAR(birth_date) - (DATE_FORMAT(DATE('2021-01-01'), '%m%d') < DATE_FORMAT(birth_date, '%m%d')) AS age
                    FROM table_karyawan
                    WHERE birth_date = (SELECT MIN(birth_date) FROM table_karyawan)
                    OR birth_date = (SELECT MAX(birth_date) FROM table_karyawan)
                    ORDER BY age";
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
            <td><?php echo $row['age'];?></td>
        </tr>
      <?php } ?>
    </table>

