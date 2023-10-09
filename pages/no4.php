<html>
    <table border = 1>
        <tr>
            <td>id</td>
            <td>emp_id</td>
            <td>work_date</td>
            <td>shift_in</td>
            <td>shift_out</td>
            <td>absence_in</td>
            <td>absence_out</td>
            <td>terlambat</td>
        </tr>

<?php
    $koneksi = mysqli_connect('localhost','root','','putera_group');

    $sql = "SELECT * FROM absensi";
    $query = mysqli_query($koneksi,$sql);
        while ($data = mysqli_fetch_array($query)) {
            $shiftIn = $data['shift_in'];
            $absenceIn = $data['absence_in'];
            $terlambat = ($absenceIn - $shiftIn)/60;
        
?>
        <tr>
            <td><?php echo $data['id'];?></td>
            <td><?php echo $data['emp_id'];?></td>
            <td><?php echo $data['work_date'];?></td>
            <td><?php echo $data['shift_in'];?></td>
            <td><?php echo $data['shift_out'];?></td>
            <td><?php echo $data['absence_in'];?></td>
            <td><?php echo $data['absence_out'];?></td>
            <td><?php echo $terlambat;?></td>
        </tr>
        

<?php } ?>
</table>
</html>
