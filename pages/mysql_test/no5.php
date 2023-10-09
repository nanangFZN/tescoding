<?php
$koneksi = mysqli_connect('localhost','root','','putera_group');
?>

<table border=1>
    <tr>
        <td>Nama</td>
        <td>Sallary</td>
        <td>Potongan Ketidakhadiran</td>
        <td>Potongan Telat</td>
        <td>Overtime</td>
        <td>Reward Karyawan</td>
        <td>Pajak Penghasilan</td>
        <td>Take Home Pay</td>
    </tr>
<?php
    $query1 = "SELECT * FROM absensi join table_karyawan on absensi.id=table_karyawan.id";
    $exe1 = mysqli_query($koneksi,$query1);
        $query2 = "SELECT emp_id, absence_in, absence_out, shift_in, shift_out FROM absensi";
        $exe2 = mysqli_query($koneksi, $query2);
        
        $jumlahKerjaKurang8Jam = array();
        
        while ($data = mysqli_fetch_array($exe2)) {
            $empId = $data['emp_id'];
            $shiftIn = strtotime($data['shift_in']);
            $shiftOut = strtotime($data['shift_out']);
            $absenceIn = strtotime($data['absence_in']); 
            $absenceOut = strtotime($data['absence_out']); 
            $selisihWaktuLembur = $absenceOut - $shiftOut;

            //Perhitungan Telat
            if ($absenceIn > $shiftIn) {
                $selisihWaktu = $absenceIn - $shiftIn;
        
                if ($selisihWaktu < 3600) {
                    $selisihWaktu = 3600; // 1 jam dalam detik
                }
        
                // Menghitung keterlambatan dalam jam dan menit
                $jamTelat = floor($selisihWaktu / 3600); // Jam
                $menitTelat = floor(($selisihWaktu % 3600) / 60); 
                if (!isset($totalKeterlambatan[$empId])) {
                    $totalKeterlambatan[$empId] = 0;
                }
                $totalKeterlambatan[$empId] += $jamTelat;
            }

            //perhitungan lembur
            if($selisihWaktuLembur > 3600){
                $jamLembur = floor($selisihWaktuLembur/3600);
                if (!isset($totalJamLembur[$empId])) {
                    $totalJamLembur[$empId] = 0;

                }
                $totalJamLembur[$empId] += $jamLembur;
            }

            //Perhitungan kurang dari 8 jam
            $selisihWaktu = $absenceOut - $absenceIn;
            
            $selisihJam = $selisihWaktu / 3600; // 3600 detik dalam 1 jam
            
            if (!isset($jumlahKerjaKurang8Jam[$empId])) {
                $jumlahKerjaKurang8Jam[$empId] = 0;
            }
            
            if ($selisihJam < 8) {
                $jumlahKerjaKurang8Jam[$empId]++;
            }
        }
        foreach ($jumlahKerjaKurang8Jam as $empId => $jumlah) {
          
        }

    while ($data = mysqli_fetch_array($exe1)) {
        $empId = $data['emp_id'];
        $hireDate = strtotime($data['hire_date']); // Mengubah format hire_date menjadi timestamp
        $currentDate = time(); // Waktu saat ini dalam timestamp
    
        // Menghitung selisih tahun antara hire_date dan waktu saat ini
        $selisihTahun = floor(($currentDate - $hireDate) / (365 * 24 * 60 * 60)); // 365 hari dalam 1 tahun, 24 jam dalam 1 hari, 60 menit dalam 1 jam, 60 detik dalam 1 menit
    
        // Menghitung bonus berdasarkan syarat yang Anda sebutkan
        $bonus = 0;
        if ($selisihTahun >= 20) {
            $bonus = 100; // Bonus 100% jika hire_date lebih dari atau sama dengan 20 tahun
        } elseif ($selisihTahun >= 10) {
            $bonus = 50; // Bonus 50% jika hire_date lebih dari atau sama dengan 10 tahun
        }
    $sallary = $data['sallary']
?>
    <tr>
        <td><?php echo $data['first_name'].' '.$data['last_name'];?></td>
        <td><?php echo $data['sallary'];?></td>
        <td>
         <?php
        // echo isset($jumlahKerjaKurang8Jam[$data['emp_id']]) ? $jumlahKerjaKurang8Jam[$data['emp_id']] *7 .'%'  : 0 ;
       $potongantidakhadir = ($jumlahKerjaKurang8Jam[$data['emp_id']] * 7 /100) * $sallary;
        echo $potongantidakhadir;
        ?>
        </td>
        <td>
        <?php
        //echo isset($totalKeterlambatan[$data['emp_id']]) ? $totalKeterlambatan[$data['emp_id']] * 2 .'%'  : 0 ;
        $terlambat = ($totalKeterlambatan[$data['emp_id']] * 2 / 100) * $sallary;
        echo $terlambat;
        ?>
        </td>
        <td>
        <?php
        //echo isset($totalJamLembur[$data['emp_id']]) ? $totalJamLembur[$data['emp_id']]   : 0 ;
        //echo $sallary * 0.08;
        $lembur = ($totalJamLembur[$data['emp_id']]) * $sallary * 0.08;
        echo $lembur;
        ?>
        </td>
        <td>
            <?php
            if ($selisihTahun > 20) {
                $bonus = $sallary * 100/100; 
                echo $bonus;
                // Bonus 100% jika hire_date lebih dari atau sama dengan 20 tahun
            } elseif ($selisihTahun > 10) {
                $bonus = $sallary * 50/100; 
                echo $bonus; // Bonus 50% jika hire_date lebih dari atau sama dengan 10 tahun
            }else if ($selisihTahun > 5){
                $bonus = $sallary * 25/100; 
                echo $bonus;
            }
            ?>
        </td>
        <td><?php
         $pajak = $sallary * 0.03;
         echo $pajak;
         ?></td>
        <td>
            <?php
                $thp = ($sallary - $pajak - $potongantidakhadir - $terlambat) + $lembur + $bonus;
                echo $thp;
            ?>
        </td>
    </tr>
<?php } ?>
</table>