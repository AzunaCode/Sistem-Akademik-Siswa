<script>
    function Tambahjurusan(){
        $('#judul').text('Tambah Jurusan');
        $("[name='idjur']").attr('disabled','disabled');
        $("#namajurusan").val('');
        $("[name='simpan']").attr('hidden', false);
        $("[name='ubah']").attr('hidden', true);
        $('#ModalJurusan').modal('show');
    }

    function Ubahjurusan(idjur,nama){
        $('#judul').text('Ubah Jurusan');
        $("#idjur").val(idjur);
        $("#namajurusan").val(nama);
        $("[name='simpan']").attr('hidden', true);
        $("[name='ubah']").attr('hidden', false);
        $('#ModalJurusan').modal('show');
    }

    function HapusJurusan(idjur,nama){
        // alert('Hapus Data');
        $("#idjurdel").val(idjur);
        $("#namajurdel").text(nama);
        $('#ModalHapus').modal('show'); 

    }

</script>

<?php 
if (isset($_POST['simpan'])) {
    $nm = $_POST['namajurusan'];

    $koneksi->query("INSERT INTO jurusan (nama_jurusan) VALUES ('$nm') ");

    echo "<script>alert('Data Jurusan Berhasil Di Simpan')</script>";
    echo "<script>location='index.php?master=jurusan'</script>"; 
}
if (isset($_POST['ubah'])) {
    $idjur = $_POST['idjur'];
    $nm = $_POST['namajurusan'];

    $koneksi->query("UPDATE jurusan SET id_jurusan='$idjur',nama_jurusan='$nm' WHERE id_jurusan='$idjur'");

    echo "<script>alert('Data Jurusan Berhasil Di Ubah')</script>";
    echo "<script>location='index.php?master=jurusan'</script>"; 
}

if (isset($_POST['hapus'])) {
    $idjur = $_POST['idjurdel'];

    $koneksi->query("DELETE FROM jurusan WHERE id_jurusan='$idjur'");
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
                    <li class="breadcrumb-item"><a href="index.php?master=jurusan">Data Jurusan</a>
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
                    <button type="button" class="btn btn-primary" onclick="Tambahjurusan()"><i class="icon-plus"></i>
                      TAMBAH DATA
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="ModalJurusan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="judul">TAMBAH DATA JURUSAN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-input-wrapper">
                                        <input name="idjur" id="idjur" type="text" class="md-form-control  md-static"/>
                                        <label>ID.Jurusan</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="md-input-wrapper">
                                    <input name="namajurusan" id="namajurusan" type="text" class="md-form-control md-static" required="true" />
                                    <label>Jurusan</label>
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
                            <input name="idjurdel" id="idjurdel" type="text" class="md-form-control  md-static" />
                            <label>ID.Jurusan</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                     <div class="md-input-wrapper">
                        <p id="namajurdel">Nama Jurusan</p>
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
                        <th>NAMA JURUSAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>
                 <?php 
                 $no=1;
                 $data=$koneksi->query("SELECT * FROM jurusan");
                 while ($jurusan=$data->fetch_assoc()) {
                     ?>
                     <tr>
                         <td><?= $no ?></td>
                         <td><?= $jurusan['nama_jurusan']?></td>
                         <td>
                            <button class="btn btn-success btn-icon waves-effect waves-light" onclick="Ubahjurusan('<?= $jurusan['id_jurusan']?>','<?= $jurusan['nama_jurusan']?>')" data-toggle="tooltip" data-placement="left" title=".Ubah-Data"><i class="icofont icofont-refresh"></i>
                            </button>
                             <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="HapusJurusan('<?= $jurusan['id_jurusan']?>','<?= $jurusan['nama_jurusan']?>')" data-toggle="tooltip" data-placement="left" title=".Hapus-Data"><i class="icofont icofont-trash"></i>
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
