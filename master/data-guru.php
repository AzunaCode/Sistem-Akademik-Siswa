<script>
    // tambah
    function Tambahguru() {
        // alert('aha');
        $('#judul').text('Tambah Data Guru');
        $("#nip").val('');
        $("#namaguru").val('');
        $("#jk").val('');
        $("#alamat").val('');
        $("#notelp").val('');
        $("#status").val('');
        $("#email").val('');
        $("#pasword").val('');
        $("#foto").val('');
        $("[name='simpan']").attr('hidden', false);
        // $("[name='hapus']").attr('hidden', true);
        $("[name='ubah']").attr('hidden', true);
        $('#ModalGuru').modal('show');
    }

    // ubah
    function Ubahguru(nip,nama,jk,alamat,telp,status,email,password,foto) {
        // alert('aha');
        $('#judul').text('Ubah Data Guru');
        $("#nip").val(nip);
        $("#namaguru").val(nama);
        $("#jk").val(jk);
        $("#alamat").val(alamat);
        $("#notelp").val(telp);
        $("#status").val(status);
        $("#email").val(email);
        $("#pasword").val(password);
        $("#foto").val(foto);
        // $("[name='hapus']").attr('hidden', true);
        $("[name='ubah']").attr('hidden', false);
        $("[name='simpan']").attr('hidden', true);
        $('#ModalGuru').modal('show');
    }

     function HapusGuru(nip,namaguru){
        // alert('Hapus Data');
        $("#nipdel").val(nip);
        $("#namagurudel").text(namaguru);
        $('#ModalHapus').modal('show'); 

    }

</script>

<?php 
// Syntak tombol Simpan
if (isset($_POST['simpan'])) {
    $np = $_POST['nip'];
    $nm = $_POST['namaguru'];
    $kel = $_POST['jk'];
    $alm = $_POST['alamat'];
    $telp = $_POST['notelp'];
    $sts = $_POST['status'];
    $user = $_POST['email'];
    $ps = md5($_POST['pasword']);

    // variabel ambil foto
    $foto=$_FILES['foto']['name'];

    if (!empty($foto)) {
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "assets/images/guru/".$foto);

        $koneksi->query("INSERT INTO guru (nip,nama_guru,kelamin,alamat,no_telp,status_aktif,ussername, password,foto) VALUES ('$np','$nm','$kel','$alm','$telp','$sts','$user','$ps','$foto') ");

        echo "<script>alert('Simpan Data Guru Sukses')</script>"; 
        echo "<script>location='index.php?master=guru'</script>"; 

    }
    else{
     echo "<script>alert('Foto Tidak Boleh Kosong')</script>"; 
 }
}

// Syntak tombol ubah
if (isset($_POST['ubah'])) {
    $np = $_POST['nip'];
    $nm = $_POST['namaguru'];
    $kel = $_POST['jk'];
    $alm = $_POST['alamat'];
    $telp = $_POST['notelp'];
    $sts = $_POST['status'];
    $user = $_POST['email'];
    $ps = md5($_POST['pasword']);

    $foto=$_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];

    if (!empty($lokasi)) {

        move_uploaded_file($lokasi, "assets/images/guru/".$foto);

        $koneksi->query("UPDATE guru SET nama_guru='$nm',kelamin='$kel',alamat='$alm',no_telp='$telp',status_aktif='$sts',ussername='$user',password='$ps',foto='$foto' WHERE nip='$np' ");

        echo "<script>alert('Data Guru Berhasil Di Ubah')</script>";
    }
    else{
       $koneksi->query("UPDATE guru SET nama_guru='$nm',kelamin='$kel',alamat='$alm',no_telp='$telp',status_aktif='$sts',ussername='$user',password='$ps' WHERE nip='$np'"); 
   }
   echo "<script>location='index.php?master=guru'</script>";
}

if (isset($_POST['hapus'])) {
    $nip = $_POST['nipdel'];

    $koneksi->query("DELETE FROM guru WHERE nip='$nip'");
}

?>



<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">

    <!-- Header Starts -->
    <div class="row">
        <div class="col-sm-12 p-0">
            <div class="main-header">
                <h4>DATA GURU</h4>
                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?master=guru">Data Guru</a>
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
                    <button type="button" class="btn btn-primary" onclick="Tambahguru()"><i class="icon-plus"></i>Tambah Data</button>
                    <!-- Button trigger modal -->
                    
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="ModalGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="judul">Tambah Data Guru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-block">

                            <div hidden="true" class="md-input-wrapper">
                                <input name="id" type="text" class="md-form-control" />
                                <label>ID. Guru</label>
                            </div>

                            <div class="md-input-wrapper">
                                <input name="nip" id="nip" type="text" class="md-form-control md-static" required="true"/>
                                <label>NIP</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-input-wrapper">
                                        <input name="namaguru" id="namaguru" type="text" class="md-form-control  md-static" required="true" />
                                        <label>Nama Guru</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="md-input-wrapper">
                                    <select name="jk" id="jk" class="md-form-control" required="true" >
                                        <option selected disabled="true">- Jenis Kelamin -</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>   
                        </div> 

                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-input-wrapper">
                                    <textarea name="alamat" id="alamat" class="md-form-control md-static" cols="2" rows="4" required="true"></textarea>
                                    <label>Alamat </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                             <div class="md-input-wrapper">
                                <input name="notelp" id="notelp" type="text" class="md-form-control md-static" required="true" />
                                <label>No. Telp</label>
                            </div>
                        </div>   
                    </div> 

                    <div class="row">
                        <div class="col-md-6">
                           <div class="md-input-wrapper">
                            <input name="email" id="email" type="email" class="md-form-control md-static" required="true"/>
                            <label>Email/Username</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="md-input-wrapper">
                            <input name="pasword" id="pasword" type="password" class="md-form-control md-static" required="true" />
                            <label>Password</label>
                        </div>
                    </div>   
                </div> 

                <div class="row">
                 <div class="col-md-6">
                     <div class="md-input-wrapper">
                        <select name="status" id="status" class="md-form-control" required="true" >
                            <option selected disabled="true">- Status Aktif -</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>   
                <div class="col-md-6">
                    <span class="md-add-on-file">
                        <button class="btn btn-success waves-effect waves-light"><i class="icon-picture"></i> Foto</button>
                    </span>
                    <div class="md-input-file">
                      <input name="foto" id="file" type="file" class="costum-file-input"/>
                      <input type="text" class="md-form-control md-form-file" >
                      <label for="file" class="md-label-file">Upload Foto</label>
                  </div>
              </div>   
          </div> 
      </div>

  </div>
  <div class="modal-footer">
    <button name="simpan" class="btn btn-primary">Simpan</button>
    <button name="ubah" class="btn btn-success">Ubah</button>
    <button  type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>

</div>
</form>
</div>
</div>
</div>
</div>

<!-- MOdal Hapus -->
<div class="modal fade bd-example-modal-sm" style="margin-top: 100px" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body" align="center">
        <form method="post" enctype="multipart/form-data">
            <h5>Yakin Mau Dihapus?</h5>
            <div class="row">
                <div hidden="true" class="col-md-6">
                    <div class="md-input-wrapper">
                        <input name="nipdel" id="nipdel" type="text" class="md-form-control  md-static" />
                        <label>NIP</label>
                    </div>
                </div>
                <div class="col-md-12">
                   <div class="md-input-wrapper">
                    <p id="namagurudel">Nama Guru</p>
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
                        <th>NO.</th>
                        <th>NIP</th>
                        <th>NAMA GURU</th>
                        <th>GENDER</th>
                        <th>NO.TELP</th>
                        <th>STATUS</th>
                        <th>USERNAME</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    $data=$koneksi->query("SELECT * FROM guru");
                    while ($guru=$data->fetch_assoc()) {
                     ?>
                     <tr>
                        <td><?= $no ?></td>
                        <td><?= $guru['nip']?></td>
                        <td><?= $guru['nama_guru']?></td>
                        <td><?= $guru['kelamin']?></td>
                        <td><?= $guru['no_telp']?></td>
                        <td><?= $guru['status_aktif']?></td>
                        <td><?= $guru['ussername']?></td>
                        <td>
                             <button class="btn btn-success btn-icon waves-effect waves-light" onclick="Ubahguru('<?= $guru['nip']?>','<?= $guru['nama_guru']?>','<?= $guru['kelamin']?>','<?= $guru['alamat']?>','<?= $guru['no_telp']?>','<?= $guru['status_aktif']?>','<?= $guru['ussername']?>','<?= $guru['password']?>','<?= $guru['foto']?>')" data-toggle="tooltip" data-placement="left" title=".Ubah-Data"><i class="icofont icofont-refresh"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="HapusGuru('<?= $guru['nip']?>','<?= $guru['nama_guru']?>')" data-toggle="tooltip" data-placement="left" title=".Hapus-Data"><i class="icofont icofont-trash"></i>
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
</div>
</div>

