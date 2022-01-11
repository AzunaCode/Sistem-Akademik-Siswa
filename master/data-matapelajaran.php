<script>
    function TambahMapel(){
       $('#judul').text('Tambah Data Mata Pelajaran');
       $("[name='idmapel']").attr('disabled','disabled');
       $("#namamapel").val('');
       $("#keterangan").val('');
       $("[name='simpan']").attr('hidden', false);
       $("[name='ubah']").attr('hidden', true);
       $('#ModalMapel').modal('show');   
   }

   function UbahMapel(idmapel,idsemester,namamapel,keterangan){
    $('#judul').text('Ubah Data Mata Pelajaran');
    $("#idmapel").val(idmapel);
    $("#idsemester").val(idsemester);
    $("#namamapel").val(namamapel);
    $("#keterangan").val(keterangan);
    $("[name='simpan']").attr('hidden', true);
    $("[name='ubah']").attr('hidden', false);
    $('#ModalMapel').modal('show'); 
}

function HapusMapel(idmapel,namamapel){
        // alert('Hapus Data');
        $("#idmapeldel").val(idmapel);
        $("#namamapeldel").text(namamapel);
        $('#ModalHapus').modal('show'); 

    }

</script>

<?php 
if (isset($_POST['simpan'])) {
  $namamapel = $_POST['namamapel'];
  $idsemester = $_POST['idsemester'];
  $keterangan = $_POST['keterangan'];

  $koneksi->query("INSERT INTO pelajaran (nama_mapel,id_semester,ket) VALUES ('$namamapel','$idsemester','$keterangan') ");

  echo "<script>alert('Simpan Data Mata Pelajaran Sukses')</script>"; 
  echo "<script>location='index.php?master=matapelajaran'</script>";  
}

if (isset($_POST['ubah'])) {
    $idmapel = $_POST['idmapel'];
    $namamapel = $_POST['namamapel'];
    $idsemester = $_POST['idsemester'];
    $keterangan = $_POST['keterangan'];

    $koneksi->query("UPDATE pelajaran SET nama_mapel='$namamapel',id_semester='$idsemester',ket='$keterangan' WHERE id_mapel='$idmapel'");
}

if (isset($_POST['hapus'])) {
    $idmapel = $_POST['idmapeldel'];

    $koneksi->query("DELETE FROM pelajaran WHERE id_mapel='$idmapel'");
}

?>

<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">

    <!-- Header Starts -->
    <div class="row">
        <div class="col-sm-12 p-0">
            <div class="main-header">
                <h4>DATA MATA PELAJARAN</h4>
                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?master=matapelajaran">Data Mapel</a>
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
                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="TambahMapel()"><i class="icon-plus"></i> TAMBAH DATA</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="ModalMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="judul">TAMBAH DATA KELAS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-input-wrapper">
                                    <input name="idmapel" id="idmapel" type="text" class="md-form-control  md-static" />
                                    <label>ID.Mapel</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="md-input-wrapper">
                                <input name="namamapel" id="namamapel" type="text" class="md-form-control md-static" required="true" />
                                <label>Nama Maperl</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-input-wrapper">
                                <select name="tahunajaran" id="tahunajaran" class="md-form-control" required="true" >
                                    <option selected disabled="true">- Tahun Ajaran -</option>
                                    <?php 
                                    $ambil=$koneksi->query("SELECT * FROM semester");
                                    while ($semester=$ambil->fetch_assoc()) {
                                     ?>
                                     <option value="<?= $semester['id_semester']; ?>"><?= $semester['tahun_ajaran']; ?></option>
                                     <?php 
                                 }
                                 ?>
                             </select>
                         </div>
                     </div>
                     <div class="col-md-6">
                        <div class="md-input-wrapper">
                            <select name="idsemester" id="idsemester" class="md-form-control" required="true" >
                                <option selected disabled="true">- Semester -</option>
                                <?php 
                                $ambil=$koneksi->query("SELECT * FROM semester");
                                while ($semester=$ambil->fetch_assoc()) {
                                 ?>
                                 <option value="<?= $semester['id_semester']; ?>"><?= $semester['semester']; ?></option>
                                 <?php 
                             }
                             ?>
                         </select>
                     </div>
                 </div>
                 <div class="col-md-6">
                    <div class="md-input-wrapper">
                        <input name="keterangan" id="keterangan" type="text" class="md-form-control  md-static"/>
                        <label>Keterangan</label>
                    </div>
                </div>   
            </div>

            <div class="modal-footer">
                <button name="simpan" class="btn btn-primary">Simpan</button>
                <button name="ubah" class="btn btn-primary">Ubah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            </div>
        </form>
    </div>

</div>
</div>
</div>

<!-- Modal Delete -->
<div class="modal fade bd-example-modal-sm" style="margin-top: 100px" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body" align="center">
        <form method="post" enctype="multipart/form-data">
            <h5>Yakin Mau Dihapus?</h5>
            <div class="row">
                <div hidden="true" class="col-md-6">
                    <div class="md-input-wrapper">
                        <input name="idmapeldel" id="idmapeldel" type="text" class="md-form-control  md-static" />
                        <label>ID.Mapel</label>
                    </div>
                </div>
                <div class="col-md-12">
                   <div class="md-input-wrapper">
                    <p id="namamapeldel">Nama Maperl</p>
                </div>
            </div>
        </div>
        <button name="hapus" class="btn btn-primary">Hapus</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
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
                        <th>NAMA MAPEL</th>
                        <th>SEMESTER</th>
                        <th>KETERANGAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    $data=$koneksi->query("SELECT * FROM pelajaran JOIN semester ON pelajaran.id_semester=semester.id_semester");
                    while ($pelajaran=$data->fetch_assoc()) {
                       ?>
                       <tr>
                           <td><?= $no ?></td>
                           <td><?= $pelajaran['nama_mapel']?></td>
                           <td><?= $pelajaran['semester']?></td>
                           <td><?= $pelajaran['ket']?></td>
                           <td>
                             <button class="btn btn-success btn-icon waves-effect waves-light" onclick="UbahMapel('<?=$pelajaran['id_mapel'] ?>','<?=$pelajaran['id_semester'] ?>','<?=$pelajaran['nama_mapel'] ?>','<?=$pelajaran['ket'] ?>')" data-toggle="tooltip" data-placement="left" title=".Ubah-Data"><i class="icofont icofont-refresh"></i>
                             </button>
                             <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="HapusMapel('<?=$pelajaran['id_mapel'] ?>','<?=$pelajaran['nama_mapel'] ?>')" data-toggle="tooltip" data-placement="left" title=".Hapus-Data"><i class="icofont icofont-trash"></i>
                             </button>
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
