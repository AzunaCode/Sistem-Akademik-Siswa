<script>
  function TambahPengajar(){
   $('#judul').text('Tambah Data Pengajar');
   $("[name='idpengajar']").attr('disabled','disabled');
   $("[name='simpan']").attr('hidden', false);
   $("[name='ubah']").attr('hidden', true);
   $('#Modalpengajar').modal('show');   
 }

 function Ubahpengajar(idpengajar,idguru,idjurusan,idkelas,idmapel){
  $('#judul').text('Ubah Data Pengajar');
  $("#idpengajar").val(idpengajar);
  $("#idguru").val(idguru);
  $("#idjurusan").val(idjurusan);
  $("#idkelas").val(idkelas);
  $("#idmapel").val(idmapel);
  $("[name='simpan']").attr('hidden', true);
  $("[name='ubah']").attr('hidden', false);
  $('#Modalpengajar').modal('show');
}

</script>


<?php 
if (isset($_POST['simpan'])) {
  $idguru = $_POST['idguru'];
  $idjurusan = $_POST['idjurusan'];
  $idkelas = $_POST['idkelas'];
  $idmapel = $_POST['idmapel'];

  $koneksi->query("INSERT INTO pengajar (id_guru,id_jurusan,id_kelas,id_mapel) VALUES ('$idguru','$idjurusan','$idkelas','$idmapel') ");

  echo "<script>alert('Simpan Data Pengajar Sukses')</script>"; 
  echo "<script>location='index.php?laporan=pengajar'</script>";  
}

if (isset($_POST['ubah'])) {
  $idpengajar = $_POST['idpengajar'];
  $idguru = $_POST['idguru'];
  $idjurusan = $_POST['idjurusan'];
  $idkelas = $_POST['idkelas'];
  $idmapel = $_POST['idmapel'];

  $koneksi->query("UPDATE pengajar SET id_guru='$idguru',id_jurusan='$idjurusan',id_kelas='$idkelas',id_mapel='$idmapel' WHERE id_ajar='$idpengajar' ");

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
        <h4>DATA PENGAJAR</h4>
        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
          <li class="breadcrumb-item">
            <a href="index.php">
              <i class="icofont icofont-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item"><a href="#">Table</a>
          </li>
          <li class="breadcrumb-item"><a href="index.php?laporan=pengajar">Pengajar</a>
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
          <button type="button" class="btn btn-primary waves-effect waves-light" onclick="TambahPengajar()"><i class="icon-plus"></i>  TAMBAH DATA</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="Modalpengajar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="judul">TAMBAH DATA PENGAJAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="md-input-wrapper">
                    <input name="idpengajar" type="text" class="md-form-control" />
                    <label>ID. PENGAJAR</label>
                  </div>
                  <div class="md-input-wrapper">
                    <select name="idguru" id="idguru" class="md-form-control" required="true" >
                      <option selected disabled="true">- Nama Guru -</option>
                      <?php 
                      $ambil=$koneksi->query("SELECT * FROM guru");
                      while ($guru=$ambil->fetch_assoc()) {
                       ?>
                       <option value="<?= $guru['id_guru']; ?>"><?= $guru['nama_guru']; ?></option>
                       <?php 
                     }
                     ?>
                   </select>
                 </div>
                 <div class="md-input-wrapper">
                  <select name="idjurusan" id="idjurusan" class="md-form-control" required="true" >
                    <option selected disabled="true">- Jurusan -</option>
                    <?php 
                    $ambil=$koneksi->query("SELECT * FROM jurusan");
                    while ($jurusan=$ambil->fetch_assoc()) {
                     ?>
                     <option value="<?= $jurusan['id_jurusan']; ?>"><?= $jurusan['nama_jurusan']; ?></option>
                     <?php 
                   }
                   ?>
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
               <div class="md-input-wrapper">
                <select name="idmapel" id="idmapel" class="md-form-control" required="true" >
                  <option selected disabled="true">- Nama Mapel -</option>
                  <?php 
                  $ambil=$koneksi->query("SELECT * FROM pelajaran");
                  while ($pelajaran=$ambil->fetch_assoc()) {
                   ?>
                   <option value="<?= $pelajaran['id_mapel']; ?>"><?= $pelajaran['nama_mapel']; ?></option>
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
                <th>NAMA GURU</th>
                <th>JURUSAN</th>
                <th>KELAS</th>
                <th>MAPEL</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
             <?php 
             $no=1;
             $data=$koneksi->query("SELECT * FROM pengajar JOIN guru ON pengajar.id_guru=guru.id_guru JOIN jurusan ON pengajar.id_jurusan=jurusan.id_jurusan JOIN pelajaran ON pengajar.id_mapel=pelajaran.id_mapel JOIN kelas ON pengajar.id_kelas=kelas.id_kelas");
             while ($pengajar=$data->fetch_assoc()) {
               ?>
               <tr>
                 <td><?= $no ?></td>
                 <td><?= $pengajar['nama_guru']?></td>
                 <td><?= $pengajar['nama_jurusan']?></td>
                 <td><?= $pengajar['nama_kelas']?></td>
                 <td><?= $pengajar['nama_mapel']?></td>
                 <td>
                   <button class="btn btn-success btn-sm" onclick="Ubahpengajar('<?=$pengajar['id_ajar'] ?>','<?=$pengajar['id_guru'] ?>','<?=$pengajar['id_jurusan'] ?>','<?=$pengajar['id_kelas'] ?>','<?=$pengajar['id_mapel'] ?>')">UBAH</button>
                 </td>
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
