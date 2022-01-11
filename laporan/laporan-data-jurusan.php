<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">

    <!-- Header Starts -->
    <div class="row">
        <div class="col-sm-12 p-0">
            <div class="main-header">
                <h4>LAPORAN DATA JURUSAN</h4>
                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?laporan=jurusan">Jurusan</a>
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
                        <table id="laporanjurusan" class="table">
                            <thead>
                                <tr class="table-success">
                                    <th>ID</th>
                                    <th>NAMA JURUSAN</th>
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
