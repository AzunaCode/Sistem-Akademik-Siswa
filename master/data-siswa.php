<script>
    function TambahSiswa() {
        // alert('aha');
        $('#judul').text('Tambah Data Siswa');
        $("#nis").val('');
        $("#namasiswa").val('');
        $("#jk").val('');
        $("#agama").val('');
        $("#tempatlhr").val('');
        $("#date").val('');
        $("#alamat").val('');
        $("#notelp").val('');
        $("#email").val('');
        $("#pasword").val('');
        $("#foto").val('');
        $("[name='simpan']").attr('hidden', false);
        $("[name='ubah']").attr('hidden', true);
        $('#ModalSiswa').modal('show');
    }

    function UbahSiswa(nis,idjurusan,idortu,idkelas,namasiswa,jk,agama,tempatlhr,date,alamat,notelp,email,pasword,foto) {
        // alert('aha');
        $('#judul').text('Ubah Data Siswa');
        $("#nis").val(nis);
        $("#idjurusan").val(idjurusan);
        $("#idortu").val(idortu);
        $("#idkelas").val(idkelas);
        $("#namasiswa").val(namasiswa);
        $("#jk").val(jk);
        $("#agama").val(agama);
        $("#tempatlhr").val(tempatlhr);
        $("#date").val(date);
        $("#alamat").val(alamat);
        $("#notelp").val(notelp);
        $("#email").val(email);
        $("#pasword").val(pasword);
        $("#foto").val(foto);
        $("[name='simpan']").attr('hidden', true);
        $("[name='ubah']").attr('hidden', false);
        $('#ModalSiswa').modal('show');
    }

    function HapusSiswa(nis,namasiswa){
        // alert('Hapus Data');
        $("#nisdel").val(nis);
        $("#namasiswadel").text(namasiswa);
        $('#ModalHapus').modal('show'); 

    }


</script>

<?php 

if (isset($_POST['simpan'])) {
    $ns = $_POST['nis'];
    $idjurusan = $_POST['idjurusan'];
    $idortu = $_POST['idortu'];
    $idkelas = $_POST['idkelas'];
    $nm = $_POST['namasiswa'];
    $kel = $_POST['jk'];
    $agama = $_POST['agama'];
    $tempatlhr = $_POST['tempatlhr'];
    $date = $_POST['date'];
    $alm = $_POST['alamat'];
    $telp = $_POST['notelp'];
    $email = $_POST['email'];
    $ps = md5($_POST['pasword']);

    $foto=$_FILES['foto']['name'];

    if (!empty($foto)) {
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "assets/images/siswa/".$foto);

        $koneksi->query("INSERT INTO siswa (nis,id_jurusan,id_kelas,id_ortu,nama_siswa,jenis_kelamin,agama,tempat_lahir,tanggal_lahir,alamat,no_telp,ussername,password,foto) VALUES ('$ns','$idjurusan','$idkelas','$idortu','$nm','$kel','$agama','$tempatlhr','$date','$alm','$telp','$email','$ps','$foto') ");

        echo "<script>alert('Simpan Data Siswa Sukses')</script>"; 
        echo "<script>location='index.php?master=siswa'</script>"; 

    }
    else{
       echo "<script>alert('Foto Tidak Boleh Kosong')</script>"; 
   }
}

if (isset($_POST['ubah'])) {
    $ns = $_POST['nis'];
    $idjurusan = $_POST['idjurusan'];
    $idortu = $_POST['idortu'];
    $idkelas = $_POST['idkelas'];
    $nm = $_POST['namasiswa'];
    $kel = $_POST['jk'];
    $agama = $_POST['agama'];
    $tempatlhr = $_POST['tempatlhr'];
    $date = $_POST['date'];
    $alm = $_POST['alamat'];
    $telp = $_POST['notelp'];
    $email = $_POST['email'];
    $ps = md5($_POST['pasword']);

    $foto=$_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];

    if (!empty($lokasi)) {

        move_uploaded_file($lokasi, "assets/images/siswa/".$foto);

        $koneksi->query("UPDATE siswa SET id_jurusan='$idjurusan',id_ortu='$idortu',id_kelas='$idkelas',nama_siswa='$nm',jenis_kelamin='$kel',agama='$agama',tempat_lahir='$tempatlhr',tanggal_lahir='$date',alamat='$alm',no_telp='$telp',ussername='$email',password='$ps',foto='$foto' WHERE nis='$ns' ");

        echo "<script>alert('Data Siswa Berhasil Di Ubah')</script>";
    }
    else{
       $koneksi->query("UPDATE siswa SET nama_siswa='$nm',jenis_kelamin='$kel',agama='$agama',tempat_lahir='$tempatlhr',tanggal_lahir='$date',alamat='$alm',no_telp='$telp',ussername='$email',password='$ps' WHERE nis='$ns' ");

       echo "<script>alert('Data Siswa Gagal Di Ubah')</script>";

   }
   echo "<script>location='index.php?master=siswa'</script>";

}

if (isset($_POST['hapus'])) {
    $ns = $_POST['nisdel'];

    $koneksi->query("DELETE FROM siswa WHERE nis='$ns'");
}


?>

<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">

    <!-- Header Starts -->
    <div class="row">
        <div class="col-sm-12 p-0">
            <div class="main-header">
                <h4>DATA SISWA</h4>
                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Siswa</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- Header end -->

    
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="ModalSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judul"> Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form method="post" enctype="multipart/form-data">
                    <div class="card-block">
                        <div hidden="true" class="md-input-wrapper">
                            <input name="id" type="text" class="md-form-control" />
                            <label>ID. Siswa</label>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                            <div class="md-input-wrapper">
                                <input name="nis" id="nis" type="text" class="md-form-control md-static" required="true"/>
                                <label>NIS</label>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                     </div>
                 </div>

                 <div class="row">
                     <div class="col-md-6">
                        <div class="md-input-wrapper">
                            <select name="idortu" id="idortu" class="md-form-control" required="true" >
                                <option selected disabled="true">- Data Orangtua -</option>
                                <?php 
                                $ambil=$koneksi->query("SELECT * FROM orangtua");
                                while ($orangtua=$ambil->fetch_assoc()) {
                                 ?>
                                 <option value="<?= $orangtua['id_ortu']; ?>"><?= $orangtua['nama_ortu']; ?> - <?= $orangtua['alamat']; ?> - <?= $orangtua['pekerjaan']; ?> - <?= $orangtua['no_telp']; ?></option>
                                 <?php 
                             }
                             ?>
                         </select>
                     </div>
                 </div>   
                 <div class="col-md-6">
                    <div class="md-input-wrapper">
                        <select name="idkelas" id="idkelas" class="md-form-control" required="true" >
                            <option selected disabled="true">- Pilih Kelas -</option>
                            <?php 
                            $ambil=$koneksi->query("SELECT * FROM kelas");
                            while ($kelas=$ambil->fetch_assoc()) {
                             ?>
                             <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['nama_kelas']; ?></option>
                             <?php 
                         }
                         ?>
                     </select>
                 </div>
             </div>                         
         </div>

         <div class="row">
            <div class="col-md-6">
                <div class="md-input-wrapper">
                    <input name="namasiswa" id="namasiswa" type="text" class="md-form-control  md-static" required="true" />
                    <label>Nama Siswa</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="md-input-wrapper">
                    <select name="agama" id="agama" class="md-form-control" required="true" >
                        <option selected disabled="true">- Agama -</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Islam">Islam</option>
                        <option value="Budha">Budha</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
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
                    <input name="pasword" id="pasword" type="password" class="md-form-control  md-static" required="true" />
                    <label>Password</label>
                </div>
            </div>
        </div>

        <div class="row advance-elements">
            <div class="col-md-6">
                <div class="md-input-wrapper">
                    <input name="tempatlhr" id="tempatlhr" type="text" class="md-form-control md-static" required="true"/>
                    <label>Tempat Lahir</label>
                </div>

            </div>
            <div class="col-md-6">
                <label>Tanggal Lahir</label>
                <div class="form-control-wrapper">
                    <input name="date" type="text" id="date" class="form-control floating-label" placeholder="Tanggal Lahir" required="true"/>
                </div>
            </div>
        </div> 

        <div class="row">
            <div class="col-md-6">
                <div class="md-input-wrapper">
                    <select name="jk" id="jk" class="md-form-control" required="true" >
                        <option selected disabled="true">- Jenis Kelamin -</option>
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-6">
                <span class="md-add-on-file">
                    <button class="btn btn-success waves-effect waves-light">Foto</button>
                </span>
                <div class="md-input-file">
                  <input name="foto" id="file" type="file" class="costum-file-input" required="true"/>
                  <input type="text" class="md-form-control md-form-file" >
                  <label for="file" class="md-label-file"> Upload Foto</label>
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
                <label>No.Telp</label>
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
                        <input name="nisdel" id="nisdel" type="text" class="md-form-control  md-static" />
                        <label>NIS</label>
                    </div>
                </div>
                <div class="col-md-12">
                 <div class="md-input-wrapper">
                    <p id="namasiswadel">Nama Siswa</p>
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


<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary waves-effect waves-light" onclick="TambahSiswa()">TAMBAH DATA</button>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-sm-12  table-responsive">
                <table id="datatable" class="table">

                    <thead>
                        <tr class="table-success">
                            <th>ID</th>
                            <th>NIS</th>
                            <th>NAMA SISWA</th>
                            <th>GENDER</th>
                            <th>ALAMAT</th>
                            <th>NO.TELP</th>
                            <th>USERNAME</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $data=$koneksi->query("SELECT * FROM siswa JOIN jurusan ON siswa.id_jurusan=jurusan.id_jurusan JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN orangtua ON siswa.id_ortu=orangtua.id_ortu");
                        while ($siswa=$data->fetch_assoc()) {
                         ?>
                         <tr>
                            <td><?= $no ?></td>
                            <td><?= $siswa['nis']?></td>
                            <td><?= $siswa['nama_siswa']?></td>
                            <td><?= $siswa['jenis_kelamin']?></td>
                            <td><?= $siswa['alamat']?></td>
                            <td><?= $siswa['no_telp']?></td>
                            <td><?= $siswa['ussername']?></td>
                            <td>
                                <button class="btn btn-success btn-icon waves-effect waves-light" onclick="UbahSiswa('<?= $siswa['nis']?>','<?= $siswa['id_jurusan']?>','<?= $siswa['id_ortu']?>','<?= $siswa['id_kelas']?>','<?= $siswa['nama_siswa']?>','<?= $siswa['jenis_kelamin']?>','<?= $siswa['agama']?>','<?= $siswa['tempat_lahir']?>','<?= $siswa['tanggal_lahir']?>','<?= $siswa['alamat']?>','<?= $siswa['no_telp']?>','<?= $siswa['ussername']?>','<?= $siswa['password']?>','<?= $siswa['foto']?>')" data-toggle="tooltip" data-placement="left" title=".Ubah-Data"><i class="icofont icofont-refresh"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="HapusSiswa('<?= $siswa['nis']?>','<?= $siswa['nama_siswa']?>')" data-toggle="tooltip" data-placement="left" title=".Hapus-Data"><i class="icofont icofont-trash"></i>
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
</div>
<!-- Basic Table ends -->   

