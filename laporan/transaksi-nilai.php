<script>
  function Tambahnilai(){
   $('#judul').text('Tambah Data Pengajar');
   $("[name='simpan']").attr('hidden', false);
   $("[name='ubah']").attr('hidden', true);
   $('#Modalpengajar').modal('show');   
 }

 function Ubahpengajar(idpengajar,idguru,idkelas,idmapel){
  $('#judul').text('Ubah Data Pengajar');
  $("#idpengajar").val(idpengajar);
  $("#idguru").val(idguru);
  $("#idkelas").val(idkelas);
  $("#idmapel").val(idmapel);
  $("[name='simpan']").attr('hidden', true);
  $("[name='ubah']").attr('hidden', false);
  $('#Modalpengajar').modal('show');
}

</script>


<?php 
if (isset($_POST['simpan'])) {
  $idpengajar = $_POST['idpengajar'];
  $idjurusan = $_POST['idjurusan'];
  $idkelas = $_POST['idkelas'];

  $data=$koneksi->query("SELECT * FROM siswa JOIN jurusan ON siswa.id_jurusan=jurusan.id_jurusan JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE jurusan.id_jurusan='$idjurusan' AND kelas.id_kelas='$idkelas'");

  $cek = $data->num_rows;

  if ($cek>0)   {
    while ($nilai=$data->fetch_assoc()) {
      $idsiswa = $nilai['id_siswa'];
      $koneksi->query("INSERT INTO nilai (id_pengajar,id_siswa) VALUES ('$idpengajar','$idsiswa')");


    };
    echo "<script>alert('Ada Data dan Disimpan')</script>";
    echo "<script>location='index.php?laporan=transaksinilai'</script>";  

  }
  else{
    echo "<script>alert('Tidak Ada Data')</script>"; 

  }
}

if (isset($_POST['ubah'])) {
  $idpengajar = $_POST['idpengajar'];
  $idguru = $_POST['idguru'];
  $idkelas = $_POST['idkelas'];
  $idmapel = $_POST['idmapel'];

  $koneksi->query("UPDATE pengajar SET id_guru='$idguru', id_kelas='$idkelas', id_mapel='$idmapel' WHERE id_ajar='$idpengajar' ");

  echo "<script>alert('Ubah Data Pengajar Sukses')</script>"; 
  echo "<script>location='index.php?laporan=pengajar'</script>";  
}

?>

<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">

  <!-- Header Starts -->
  <div class="row">
    <div class="col-sm-12 p-0">
      <div class="main-header">
        <h4>Transaksi Nilai</h4>
        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
          <li class="breadcrumb-item">
            <a href="index.php">
              <i class="icofont icofont-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item"><a href="#">Table</a>
          </li>
          <li class="breadcrumb-item"><a href="index.php?laporan=transaksinilai">Nilai</a>
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
          <button type="button" class="btn btn-primary waves-effect waves-light" onclick="Tambahnilai()"><i class="icon-plus"></i>  TAMBAH DATA</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="Modalpengajar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="judul">TRANSAKSI NILAI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="md-input-wrapper">
                    <input name="idnilai" type="text" class="md-form-control" />
                    <label>ID.  NILAI</label>
                  </div>
                  <div class="md-input-wrapper">
                    <select name="idpengajar" id="idpengajar" class="md-form-control" required="true" >
                      <option selected disabled="true">- Pengajar -</option>
                      <?php 
                      $ambil=$koneksi->query("SELECT * FROM pengajar JOIN guru ON pengajar.id_guru=guru.id_guru JOIN pelajaran ON pengajar.id_mapel=pelajaran.id_mapel JOIN kelas ON pengajar.id_kelas=kelas.id_kelas");
                      while ($pengajar=$ambil->fetch_assoc()) {
                       ?>
                       <option value="<?= $pengajar['id_ajar']; ?>"><?= $pengajar['nama_guru']; ?> - <?= $pengajar['nama_mapel']; ?> - <?= $pengajar['nama_kelas']; ?></option>
                       <?php 
                     }
                     ?>
                   </select>
                 </div>
                 <div class="md-input-wrapper">
                  <select name="idjurusan" id="idjurusan" class="md-form-control" required="true" >
                    <option selected disabled="true">- Jurusan -</option>
                    <?php 
                    $ambil=$koneksi->query("SELECT * FROM Jurusan");
                    while ($jurusan=$ambil->fetch_assoc()) {
                     ?>
                     <option value="<?= $jurusan['id_jurusan']; ?>"><?= $jurusan['nama_jurusan']; ?></option>
                     <?php } ?>
                   </select>
                 </div>
                 <div class="md-input-wrapper">
                  <select name="idkelas" id="idkelas" class="md-form-control" required="true" >
                    <option selected disabled="true">- Nama Kelas -</option>
                    <?php 
                    $ambil=$koneksi->query("SELECT * FROM kelas");
                    while ($kelas=$ambil->fetch_assoc()) {
                     ?>
                     <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['nama_kelas']; ?></option>
                     <?php } ?>
                   </select>
                 </div>
                 <div class="modal-footer">
                  <button name="simpan" class="btn btn-primary">Simpan</button>
                  <button name="ubah" class="btn btn-success">Ubah</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>

      <div class="card-block">
        <div class="row">
          <div class="col-sm-12 table-responsive">
            <table id="datatable" class="table">
              <thead>
                <tr class="table-success">
                  <th>ID</th>
                  <th>NAMA SISWA</th>
                  <th>KELAS</th>
                  <th>MAPEL</th>
                  <th>PENGAJAR</th>
                  <th>NILAI</th>
                  <th>STATUS</th>
                  <!-- <th>AKSI</th> -->
                </tr>
              </thead>
              <tbody>
               <?php 
               $no=1;
               $data=$koneksi->query("SELECT * FROM nilai JOIN siswa ON nilai.id_siswa=siswa.id_siswa JOIN pengajar ON nilai.id_pengajar=pengajar.id_ajar JOIN kelas ON pengajar.id_kelas=kelas.id_kelas JOIN pelajaran ON pengajar.id_mapel=pelajaran.id_mapel JOIN guru ON pengajar.id_guru=guru.id_guru ORDER BY nilai.id_siswa");
               while ($nilai=$data->fetch_assoc()) {
                 ?>
                 <tr>
                   <td><?= $no ?></td>
                   <td><?= $nilai['nama_siswa']?></td>
                   <td><?= $nilai['nama_kelas']?></td>
                   <td><?= $nilai['nama_mapel']?></td>
                   <td><?= $nilai['nama_guru']?></td>
                   <td><?= $nilai['nilai_akhir']?></td>
                   <td><?= $nilai['keterangan']?></td>
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
   <!-- Basic Table ends -->   
 </div>
 <!-- Row end -->
 <!-- Tables end -->
</div>
<!-- Main content ends -->
<!-- Container-fluid ends -->
