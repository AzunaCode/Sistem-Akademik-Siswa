
<!-- Main content starts -->
<div class="container-fluid">

    <!-- Header Starts -->
    <div class="row">
        <div class="col-sm-12 p-0">
            <div class="main-header">
                <h4>Laporan Data Guru</h4>
                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.php?laporan=guru">Guru</a>
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
                            <table id="laporanku" class="table" style="width:100%" >
                                <thead>
                                    <tr class="table-success">
                                        <th>NO.</th>
                                        <th>NIP</th>
                                        <th>NAMA GURU</th>
                                        <th>GENDER</th>
                                        <th>ALAMAT</th>
                                        <th>NO.TELP</th>
                                        <th>STATUS</th>
                                        <th>USERNAME</th>
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
                                        <td><?= $guru['alamat']?></td>
                                        <td><?= $guru['no_telp']?></td>
                                        <td><?= $guru['status_aktif']?></td>
                                        <td><?= $guru['ussername']?></td>
                                    </tr>
                                    <?php 
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- <button type="button" class="btn btn-warning btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="left" title=".Cetak-Data"><i class="icofont icofont-print"></i> -->
                        <!-- </button> -->
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
