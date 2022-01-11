<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">

    <!-- Header Starts -->
    <div class="row">
        <div class="col-sm-12 p-0">
            <div class="main-header">
                <h4>Data Laporan</h4>
                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?guru=laporannilai">Laporan</a>
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
                    <tr>
                        <th scope="row"><b>Nama Guru : </b></th>
                        <td><?php echo $_SESSION['user']['nama_guru'] ?></td>
                    </tr>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="table-success">
                                        <th>No</th>
                                        <th>Nama Mapel</th>
                                        <th>Jurusan</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    $id =$_SESSION['user']['id_guru'];
                                    $data=$koneksi->query("SELECT * FROM pengajar JOIN guru ON pengajar.id_guru=guru.id_guru JOIN pelajaran ON pengajar.id_mapel=pelajaran.id_mapel JOIN jurusan ON pengajar.id_jurusan=jurusan.id_jurusan JOIN kelas ON pengajar.id_kelas=kelas.id_kelas WHERE pengajar.id_guru='$id'");
                                    while ($mapel=$data->fetch_assoc()) {
                                     ?>
                                     <tr>
                                         <td><?= $no ?></td>
                                         <td><?= $mapel['nama_mapel']?></td>
                                         <td><?= $mapel['nama_jurusan']?></td>
                                         <td><?= $mapel['nama_kelas']?></td>
                                         <td>
                                            <button type="button" class="btn btn-warning btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="left" title=".Cetak-Data" onclick="print_d()"><i class="icofont icofont-print"></i>
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
<script>
    function print_d(){
        window.open("#","_blank");
    }
</script>