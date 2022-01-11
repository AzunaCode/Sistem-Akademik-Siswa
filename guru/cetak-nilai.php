

<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">

    <!-- Header Starts -->
    <div class="row">
        <div class="col-sm-12 p-0">
            <div class="main-header">
                <h4>INPUT NILAI SISWA</h4>
                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?guru=masukkannilaisiswa">Input Nilai</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- Header end -->

    <!-- Tables start -->
    <!-- Row start -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Table starts -->
            <div class="card">
                <div class="card-header">
                    <tr>
                        <th><b>Nama Guru : </b></th>
                        <td><?php echo $_SESSION['user']['nama_guru'] ?></td><br>
                    </tr>
                    <tr>
                        <?php
                        $idajar=$_GET['guru'];
                        $data1=$koneksi->query("SELECT * FROM nilai JOIN pengajar ON nilai.id_pengajar=pengajar.id_ajar JOIN jurusan ON pengajar.id_jurusan=jurusan.id_jurusan JOIN kelas ON pengajar.id_kelas=kelas.id_kelas JOIN pelajaran ON pengajar.id_mapel=pelajaran.id_mapel WHERE pengajar.id_ajar='$idajar' ");
                        $detail=$data1->fetch_assoc();
                        ?>
                        <td><?= $detail['nama_mapel'] ?> | <?= $detail['nama_jurusan'] ?> | <?= $detail['nama_kelas'] ?></td><br>
                    </tr>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <form action="#" method="POST" accept-charset="utf-8">                               
                                <table class="table">
                                    <thead>
                                        <tr class="table-success">
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>KEHADIRAN</th>
                                            <th>UTS</th>
                                            <th>UAS</th>
                                            <th>Nilai</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        $idajar=0;
                                        $idajar=$_GET['guru'];
                                        $idguru =$_SESSION['user']['id_guru'];
                                        $data=$koneksi->query("SELECT * FROM nilai JOIN siswa ON nilai.id_siswa=siswa.id_siswa JOIN pengajar ON nilai.id_pengajar=pengajar.id_ajar WHERE pengajar.id_ajar='$idajar' AND pengajar.id_guru='$idguru' ");
                                        while ($nilai=$data->fetch_assoc()) {
                                         ?>
                                         <input style="width:50%" type="hidden" name="id_nilai[]" class="md-form-control"  value="<?= $nilai['id_nilai']?>">
                                         <tr>
                                             <td><?= $no ?></td>
                                             <td><?= $nilai['nama_siswa']?></td>
                                             <td ><input style="width:50%" type="number" name="hadir[]" class="md-form-control"  value="<?= $nilai['kehadiran']?>"></td>
                                             <td ><input style="width:50%" type="number" name="uts[]" class="md-form-control"  value="<?= $nilai['uts']?>"></td>
                                             <td ><input style="width:50%" type="number" name="uas[]" class="md-form-control"  value="<?= $nilai['uas']?>"></td>
                                             <td ><input style="width:50%" type="number" name="akhir[]" class="md-form-control" value="<?= $nilai['nilai_akhir']?>"></td>
                                             <td><?= $nilai['keterangan']?></td>
                                         </tr>
                                         <?php 
                                         $no++;
                                     }
                                     ?>
                                 </tbody>
                             </table>
                             <button name="update" class="btn btn-success btn-sm" >Simpan</button>
                         </form>

                     </div>
                 </div>
             </div>
         </div>
         <!-- Basic Table ends -->   
     </div>
     <!-- Row end -->
     <!-- Tables end -->
 </div> 

<?php 
if (isset($_POST['update'])) {
    $nilai = $_POST['id_nilai'];

    $i = 0;
    foreach ($nilai as $id) {
        $hadir = $_POST['hadir'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];
        $akhir = $_POST['akhir'];
        if ($akhir[$i]>=80) {
            $status = "Baik";
        }elseif ($akhir[$i]>=60) {
           $status = "Cukup";
       } else {
        $status = "Kurang";
    }
    $koneksi->query("UPDATE nilai SET kehadiran='$hadir[$i]', uts='$uts[$i]',uas='$uas[$i]',nilai_akhir='$akhir[$i]', keterangan='$status' WHERE id_nilai='$id'");
    $i++;
}
echo "<script>alert('Sukses Cuyy')</script>"; 
echo "<script>location='index.php?guru=$idajar'</script>";  

}


?>
