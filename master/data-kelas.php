<script>
    function TambahKelas(){
        $('#judul').text('Tambah Data Kelas');
        $("[name='idkelas']").attr('disabled','disabled');
        $("#namakelas").val('');
        $('#ModalKelas').modal('show');
        $("[name='simpan']").attr('hidden',false);
        $("[name='ubah']").attr('hidden',true);
    }

    function UbahKelas(idkelas,namakelas){
        $('#judul').text('Ubah Data Kelas');
        $("#idkelas").val(idkelas);
        $("#namakelas").val(namakelas);
        $('#ModalKelas').modal('show');
        $("[name='simpan']").attr('hidden',true);
        $("[name='ubah']").attr('hidden',false);
    }

    function HapusKelas(idkel,nama){
        // alert('Hapus Data');
        $("#idkeldel").val(idkel);
        $("#namakeldel").text(nama);
        $('#ModalHapus').modal('show'); 

    }
</script>

<?php 
    // Syntak Simpan Data Kelas
if (isset($_POST['simpan'])) {
    $namakelas = $_POST['namakelas'];

    $koneksi->query("INSERT INTO kelas (nama_kelas) VALUES ('$namakelas') ");

    echo "<script>alert('Simpan Data Kelas Sukses')</script>"; 
    echo "<script>location='index.php?master=kelas'</script>";
}

    // syntak Ubah Data Kelas
if (isset($_POST['ubah'])) {
    $idkelas = $_POST['idkelas'];
    $namakelas = $_POST['namakelas'];

    $koneksi->query("UPDATE kelas SET nama_kelas='$namakelas' WHERE id_kelas='$idkelas' ");

    echo "<script>alert('Ubah Data Kelas Sukses')</script>"; 
    echo "<script>location='index.php?master=kelas'</script>";
}

 // Syntak Hapus Kelas
if (isset($_POST['hapus'])) {
    $idkel = $_POST['idkeldel'];

    $koneksi->query("DELETE FROM kelas WHERE id_kelas='$idkel'");
}

?>

<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">

    <!-- Header Starts -->
    <div class="row">
        <div class="col-sm-12 p-0">
            <div class="main-header">
                <h4>DATA KELAS</h4>
                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?master=kelas">Data Kelas</a>
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
                    <button type="button" class="btn btn-primary" onclick="TambahKelas()"><i class="icon-plus"></i>  TAMBAH DATA</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="ModalKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <input name="idkelas" id="idkelas" type="text" class="md-form-control  md-static"/>
                                    <label>ID.Kelas</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="md-input-wrapper">
                                <input name="namakelas" id="namakelas" type="text" class="md-form-control md-static" required="true" />
                                <label>Nama Kelas</label>
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
                        <input name="idkeldel" id="idkeldel" type="text" class="md-form-control  md-static" />
                        <label>ID.Kelas</label>
                    </div>
                </div>
                <div class="col-md-12">
                 <div class="md-input-wrapper">
                    <p id="namakeldel">Nama Kelas</p>
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
                        <th>NAMA KELAS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    $data=$koneksi->query("SELECT * FROM kelas");
                    while ($kelas=$data->fetch_assoc()) {
                       ?>
                       <tr>
                           <td><?= $no ?></td>
                           <td><?= $kelas['nama_kelas']?></td>
                           <td>
                            <button class="btn btn-success btn-icon waves-effect waves-light" onclick="UbahKelas('<?=$kelas['id_kelas'] ?>','<?=$kelas['nama_kelas'] ?>')" data-toggle="tooltip" data-placement="left" title=".Ubah-Data"><i class="icofont icofont-refresh"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="HapusKelas('<?= $kelas['id_kelas']?>','<?= $kelas['nama_kelas']?>')" data-toggle="tooltip" data-placement="left" title=".Hapus-Data"><i class="icofont icofont-trash"></i>
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
