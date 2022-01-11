<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">

  <!-- Header Starts -->
  <div class="row">
    <div class="col-sm-12 p-0">
      <div class="main-header">
        <h4>HASIL STUDI</h4>
        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
          <li class="breadcrumb-item">
            <a href="homesiswa.php">
              <i class="icofont icofont-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item"><a href="#">Table</a>
          </li>
          <li class="breadcrumb-item"><a href="index.php?siswa=nilaihasil">Nilai</a>
          </li>
        </ol>
      </div>
    </div>
  </div>
  <!-- Header end -->
  <div class="row">
    <div class="col-sm-12">
     <div class="card">
      <div class="card-header">
       <tr>
        <?php
        $idajar=$_GET['siswa'];
        $data1=$koneksi->query("SELECT * FROM siswa JOIN jurusan ON siswa.id_jurusan=jurusan.id_jurusan JOIN kelas ON siswa.id_kelas=kelas.id_kelas");
        $detail=$data1->fetch_assoc();
        ?>
        <td><b><?= $_SESSION['user']['nis'] ?> | <?= $_SESSION['user']['nama_siswa'] ?> | <?= $detail['nama_kelas'] ?> | <?= $detail['nama_jurusan'] ?></td></b>
      </tr>
    </div>
    <div class="card-block">
      <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
          <li class="breadcrumb-item">
            <a href="index.php?siswa=nilaihasil">Kelas X</a>
          </li>
          <li class="breadcrumb-item"><a href="index.php?siswa=nilaixi">Kelas XI</a>
          </li>
          <li class="breadcrumb-item"><a href="index.php?siswa=nilaixii">Kelas XII</a>
          </li>
        </ol>
      <div class="row">
       <table id="kelas1" class="table">
                <thead>
                  <tr class="table-success">
                    <th>NO.</th>
                    <th>MAPEL</th>
                    <th>SEMESTER</th>
                    <th>KEHADIRAN</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>NILAI</th>
                    <th>KETERANGAN</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $idsiswa =$_SESSION['user']['id_siswa'];
                  $data=$koneksi->query("SELECT * FROM nilai JOIN pengajar ON nilai.id_pengajar=pengajar.id_ajar JOIN jurusan ON pengajar.id_jurusan=jurusan.id_jurusan JOIN kelas ON pengajar.id_kelas=kelas.id_kelas JOIN pelajaran ON pengajar.id_mapel=pelajaran.id_mapel WHERE nilai.id_siswa='$idsiswa' ");
                  while ($nilai=$data->fetch_assoc()) {
                   ?>
                   <tr>
                    <?php 
                    $mapel=$koneksi->query("SELECT * FROM pelajaran JOIN semester ON pelajaran.id_semester=semester.id_semester");
                    $detail2=$mapel->fetch_assoc();
                    ?>
                    <td><?= $no ?></td>
                    <td><?= $nilai['nama_mapel']?></td>
                    <td><?= $detail2['semester']?></td>
                    <td><?= $nilai['kehadiran']?></td>
                    <td><?= $nilai['uts']?></td>
                    <td><?= $nilai['uas']?></td>
                    <td><?= $nilai['nilai_akhir']?></td>
                    <?php if (!empty($nilai['keterangan'])): ?>
                     <td><?= $nilai['keterangan']?></td>
                   <?php else: ?>
                    <td>Belum dinilai</td>
                  <?php endif ?>
                </tr>
                <?php 
                $no++;
              }
              ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

</div>
<!-- Row end -->
<!-- Tables end -->
</div>
<!-- Main content ends -->
<!-- Container-fluid ends -->
</div>
