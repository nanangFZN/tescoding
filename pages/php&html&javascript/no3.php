<?php 
session_start();

if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = array(
        array("000001", "Andi", "Teknik Informatika S1"),
    );
}

if(isset($_POST['save'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    $_SESSION['mahasiswa'][] = array($nik, $nama, $jurusan);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
</head>
<body>
<script>
    function confirmDelete(nik){
        if (confirm("Apakah anda yakin ingin menghapus data" +nik + "ini ? ")) {
            window.location.href = 'hapus_data.php?nik=' +nik;
        }
    }
</script>
<script>
        function copyData(nik, nama, jurusan){
            document.getElementById("nik").value = nik;
            document.getElementById("nama").value = nama;
            document.getElementById("jurusan").value = jurusan;
        }
    </script>

    <form method="post">
        <table>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><input type="number" name="nik" id="nik"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="jurusan"></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" name="save" value="Save"></td>
            </tr>
        </table>
    </form>

    <table border="1">
        <tr>
            <td>No</td>
            <td>NIK</td>
            <td>Nama</td>
            <td>Jurusan</td>
            <td>Action</td>
        </tr>

        <?php
 
      foreach ($_SESSION['mahasiswa'] as $key => $data) {
            echo "<tr>";
            echo "<td>".($key+1)."</td>";
            echo "<td>".$data[0]."</td>";
            echo "<td>".$data[1]."</td>";
            echo "<td>".$data[2]."</td>";
            echo '<td>
            <input type="button" value="pencil" onclick="copyData(\''.$data[0].'\',\''.$data[1].'\',\''.$data[2].'\')">
            <input type="button" value="delete" onclick="confirmDelete(\''.$data[0].'\')"></td>';
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

