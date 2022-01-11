<script>
    function TambahSemester(){
        $('#judul').text('Tambah Semester');
        $("[name='idsms']").attr('disabled','disabled');
        $("#tahunajaran").val('');
        $("#semester").val('');
        $("[name='simpan']").attr('hidden', false);
        $("[name='ubah']").attr('hidden', true);
        $('#ModalSemester').modal('show');
    }

    function UbahSemester(idsms,tahunajaran,semester){
        $('#judul').text('Ubah Semester');
        $("#idsms").val(idsms);
        $("#tahunajaran").val(tahunajaran);
        $("#semester").val(semester);
        $("[name='simpan']").attr('hidden', true);
        $("[name='ubah']").attr('hidden', false);
        $('#ModalSemester').modal('show');
    }

    function HapusSemester(idsmsdel,smsdel){
        // alert('Hapus Data');
        $("#idsmsdel").val(idsmsdel);
        $("#smsdel").text(smsdel);
        $('#ModalHapus').modal('show'); 

    }

</script>

<?php 
if (isset($_POST['simpan'])) {
    $tahunajaran = $_POST['tahunajaran'];
    $semester = $_POST['semester'];

    $koneksi->query("INSERT INTO semester (tahun_ajaran,semester) VALUES ('$tahunajaran','$semester') ");

    echo "<script>alert('Data Semester Berhasil Di Simpan')</script>";
    echo "<script>location='index.php?master=semester'</script>"; 
}
if (isset($_POST['ubah'])) {
    $idsms = $_POST['idsms'];
    $tahunajaran = $_POST['tahunajaran'];
    $semester = $_POST['semester'];

    $koneksi->query("UPDATE semester SET tahun_ajaran='$tahunajaran',semester='$semester' WHERE id_semester='$idsms'");

    echo "<script>alert('Data Semester Berhasil Di Ubah')</script>";
    echo "<script>location='index.php?master=semester'</script>"; 
}

if (isset($_POST['hapus'])) {
    $idsmsdel = $_POST['idsmsdel'];

    $koneksi->query("DELETE FROM semester WHERE id_semester='$idsmsdel'");
}

?>

<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">

    <!-- Header Starts -->
    <div class="row">
        <div class="col-sm-12 p-0">
            <div class="main-header">
                <h4>DATA JURUSAN</h4>
                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?master=semester">Data Semester</a>
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

                    <!-- Modal Tambah data jurusan -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" onclick="TambahSemester()"><i class="icon-plus"></i>
                      TAMBAH DATA
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="ModalSemester" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="judul">TAMBAH DATA SEMESTER</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-input-wrapper">
                                        <input name="idsms" id="idsms" type="text" class="md-form-control  md-static"/>
                                        <label>ID.Semester</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="md-input-wrapper">
                                    <input name="tahunajaran" id="tahunajaran" type="text" class="md-form-control md-static" required="true" />
                                    <label>Tahun Ajaranr</label>
                                </div>
                            </div>   
                            <div class="col-md-6">
                               <div class="md-input-wrapper">
                                <input name="semester" id="semester" type="text" class="md-form-control md-static" required="true" />
                                <label>Semester</label>
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

<!-- Modal Hapus -->
<div class="modal fade bd-example-modal-sm" style="margin-top: 100px" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body" align="center">
        <form method="post" enctype="multipart/form-data">
            <h5>Yakin Mau Dihapus?</h5>
            <div class="row">
                <div hidden="true" class="col-md-6">
                    <div class="md-input-wrapper">
                        <input name="idsmsdel" id="idsmsdel" type="text" class="md-form-control  md-static" />
                        <label>ID.Semester</label>
                    </div>
                </div>
                <div class="col-md-12">
                   <div class="md-input-wrapper">
                    <p id="smsdel">Semester</p>
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

</div>
<div class="card-block">
    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table class="table">
                <thead>
                    <tr class="table-success">
                        <th>ID</th>
                        <th>TAHUN AJARAN</th>
                        <th>SEMESTER</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>
                   <?php 
                   $no=1;
                   $data=$koneksi->query("SELECT * FROM semester");
                   while ($semester=$data->fetch_assoc()) {
                       ?>
                       <tr>
                           <td><?= $no ?></td>
                           <td><?= $semester['tahun_ajaran']?></td>
                           <td><?= $semester['semester']?></td>
                           <td>
                            <button class="btn btn-success btn-icon waves-effect waves-light" onclick="UbahSemester('<?= $semester['id_semester']?>','<?= $semester['tahun_ajaran']?>','<?= $semester['semester']?>')" data-toggle="tooltip" data-placement="left" title=".Ubah-Data"><i class="icofont icofont-refresh"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="HapusSemester('<?= $semester['id_semester']?>','<?= $semester['tahun_ajaran']?>','<?= $semester['semester']?>')" data-toggle="tooltip" data-placement="left" title=".Hapus-Data"><i class="icofont icofont-trash"></i>
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
