<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">

    <!-- Header Starts -->
    <div class="row">
        <div class="col-sm-12 p-0">
            <div class="main-header">
                <h4>LAPORAN DATA MATA PELAJARAN</h4>
                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?laporan=matapelajaran">Mapel</a>
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
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table id="laporanmapel" class="table">
                                <thead>
                                    <tr class="table-success">
                                        <th>ID</th>
                                        <th>NAMA MAPEL</th>
                                        <th>SEMESTER</th>
                                        <th>KETERANGAN</th>
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
                                     </tr>
                                     <?php 
                                     $no++;
                                 }
                                 ?>
                             </tbody>
                         </table>
                         <button type="button" class="btn btn-warning btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="left" title=".Cetak-Data"><i class="icofont icofont-print"></i>
                         </button>
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
