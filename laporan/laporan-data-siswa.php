<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">
    <div class="row">
        <div class="main-header">
            <h4>Laporan Data Siswa</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item">
                    <a href="index.php">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Table</a>
                </li>
                <li class="breadcrumb-item"><a href="index.php?laporan=siswa">Siswa</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- 4-blocks row start -->

    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Table starts -->
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table id="laporansiswa" class="table">
                                <thead>
                                    <tr class="table-success">
                                        <th>ID</th>
                                        <th>NIS</th>
                                        <th>NAMA SISWA</th>
                                        <th>GENDER</th>
                                        <th>AGAMA</th>
                                        <th>TEMPAT LAHIR</th>
                                        <th>TANGGAL LAHIR</th>
                                        <th>NO.TELP</th>
                                        <th>USERNAME</th>
                                        <th>KELAS</th>
                                        <th>JURUSAN</th>
                                        <th>NAMA ORTU</th>
                                        <th>ALAMAT</th>
                                        <th>PEKERJAAN</th>
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
                                    <td><?= $siswa['agama']?></td>
                                    <td><?= $siswa['tempat_lahir']?></td>
                                    <td><?= $siswa['tanggal_lahir']?></td>
                                    <td><?= $siswa['no_telp']?></td>
                                    <td><?= $siswa['ussername']?></td>
                                    <td><?= $siswa['nama_kelas']?></td>
                                    <td><?= $siswa['nama_jurusan']?></td>
                                    <td><?= $siswa['nama_ortu']?></td>
                                    <td><?= $siswa['alamat']?></td>
                                    <td><?= $siswa['pekerjaan']?></td>
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
</div>
<!-- Main content ends -->
<!-- Container-fluid ends -->
