<script>
  function TambahOrtu(){
   $('#judul').text('Tambah Data Orang Tua/ Wali');
   $("[name='idortu']").attr('disabled','disabled');
   $("#namaortu").val('');
   $("#alamat").val('');
   $("#pekerjaan").val('');
   $("#telp").val('');
   $("[name='simpan']").attr('hidden', false);
        // $("[name='hapus']").attr('hidden', true);
        $("[name='ubah']").attr('hidden', true);
        $('#ModalOrtu').modal('show');   
      }

      function UbahOrtu(idortu,namaortu,alamat,pekerjaan,telp){
        $('#judul').text('Ubah Data Orangtua/ Wali');
        $("#idortu").val(idortu);
        $("#namaortu").val(namaortu);
        $("#alamat").val(alamat);
        $("#pekerjaan").val(pekerjaan);
        $("#telp").val(telp);
        $("[name='simpan']").attr('hidden', true);
        // $("[name='hapus']").attr('hidden', true);
        $("[name='ubah']").attr('hidden', false);
        $('#ModalOrtu').modal('show'); 
      }

      function HapusOrtu(idortu,namaortu){
        // alert('Hapus Data');
        $("#idortudel").val(idortu);
        $("#namaortudel").text(namaortu);
        $('#ModalHapus').modal('show'); 

      }

    </script>


    <?php 
    if (isset($_POST['simpan'])) {
      $namaortu = $_POST['namaortu'];
      $alamat = $_POST['alamat'];
      $pekerjaan = $_POST['pekerjaan'];
      $telp = $_POST['telp'];

      $koneksi->query("INSERT INTO orangtua (nama_ortu,alamat,pekerjaan,no_telp) VALUES ('$namaortu','$alamat','$pekerjaan','$telp') ");

      echo "<script>alert('Simpan Data Orang Tua Sukses')</script>"; 
      echo "<script>location='index.php?master=orangtua'</script>";  
    }

    if (isset($_POST['ubah'])) {
      $idortu = $_POST['idortu'];
      $namaortu = $_POST['namaortu'];
      $alamat = $_POST['alamat'];
      $pekerjaan = $_POST['pekerjaan'];
      $telp = $_POST['telp'];

      $koneksi->query("UPDATE orangtua SET nama_ortu='$namaortu',alamat='$alamat',pekerjaan='$pekerjaan',no_telp='$telp' WHERE id_ortu='$idortu' ");
    }

    if (isset($_POST['hapus'])) {
      $idortu = $_POST['idortudel'];

      $koneksi->query("DELETE FROM orangtua WHERE id_ortu='$idortu'");
    }

    ?>

    <!-- Container-fluid starts -->
    <!-- Main content starts -->
    <div class="container-fluid">

      <!-- Header Starts -->
      <div class="row">
        <div class="col-sm-12 p-0">
          <div class="main-header">
            <h4>DATA ORANG TUA/WALI</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
              <li class="breadcrumb-item">
                <a href="index.php">
                  <i class="icofont icofont-home"></i>
                </a>
              </li>
              <li class="breadcrumb-item"><a href="#">Table</a>
              </li>
              <li class="breadcrumb-item"><a href="data-orangtua.php">Data Ortu</a>
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
              <button type="button" class="btn btn-primary waves-effect waves-light" onclick="TambahOrtu()"><i class="icon-plus"></i>  TAMBAH DATA</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="ModalOrtu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="judul"> TAMBAH DATA ORANG TUA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="md-input-wrapper">
                            <input name="idortu" id="idortu" type="text" class="md-form-control  md-static" />
                            <label>ID.Orang Tua</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                         <div class="md-input-wrapper">
                          <input name="namaortu" id="namaortu" type="text" class="md-form-control md-static" required="true" />
                          <label>Nama Orang Tua</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="md-input-wrapper">
                          <input name="alamat" id="alamat" type="text" class="md-form-control  md-static" required="true"/>
                          <label>Alamat</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="md-input-wrapper">
                          <input name="pekerjaan" id="pekerjaan" type="text" class="md-form-control  md-static" required="true"/>
                          <label>Pekerjaan</label>
                        </div>
                      </div> 
                      <div class="col-md-6">
                        <div class="md-input-wrapper">
                          <input name="telp" id="telp" type="text" class="md-form-control  md-static" required="true"/>
                          <label>No.Telepon</label>
                        </div>
                      </div>  
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
                          <input name="idortudel" id="idortudel" type="text" class="md-form-control  md-static" />
                          <label>ID.Orang Tua</label>
                        </div>
                      </div>
                      <div class="col-md-12">
                       <div class="md-input-wrapper">
                        <p id="namaortudel">Nama Orang Tua</p>
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
                    <th>NAMA ORANG TUA</th>
                    <th>ALAMAT</th>
                    <th>PEKERJAAN</th>
                    <th>NO.TELP</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
                 $no=1;
                 $data=$koneksi->query("SELECT * FROM orangtua");
                 while ($orangtua=$data->fetch_assoc()) {
                   ?>
                   <tr>
                     <td><?= $no ?></td>
                     <td><?= $orangtua['nama_ortu']?></td>
                     <td><?= $orangtua['alamat']?></td>
                     <td><?= $orangtua['pekerjaan']?></td>
                     <td><?= $orangtua['no_telp']?></td>
                     <td>
                      <button class="btn btn-success btn-icon waves-effect waves-light" onclick="UbahOrtu('<?=$orangtua['id_ortu'] ?>','<?=$orangtua['nama_ortu'] ?>','<?=$orangtua['alamat'] ?>','<?=$orangtua['pekerjaan'] ?>','<?=$orangtua['no_telp'] ?>')" data-toggle="tooltip" data-placement="left" title=".Ubah-Data"><i class="icofont icofont-refresh"></i>
                      </button>
                      <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="HapusOrtu('<?=$orangtua['id_ortu'] ?>','<?=$orangtua['nama_ortu'] ?>')" data-toggle="tooltip" data-placement="left" title=".Hapus-Data"><i class="icofont icofont-trash"></i>
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
