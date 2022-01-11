

<!-- Container-fluid starts -->
<!-- Main content starts -->
<div class="container-fluid">
    <div class="row">
        <div class="main-header">
            <h4>Guru | SMK Sudirman 1 Wonogiri</h4>
        </div>
    </div>
    <!-- 4-blocks row start -->
    <div class="row m-b-30 dashboard-header">
        <div class="col-lg-3 col-sm-6">
            <div class="col-sm-12 card dashboard-product">
                <?php 
                $id =$_SESSION['user']['id_guru'];
                $data=$koneksi->query("SELECT * FROM pengajar WHERE id_guru='$id'");
                $jmlmapel=$data->num_rows;
                ?>
                <span>Jumlah Ajar</span>
                <h2 class="dashboard-total-products counter"><?= $jmlmapel  ?></h2>
                <span class="label label-warning">Mata Pelajaran</span>
                <div class="side-box bg-warning">
                    <i class="icon-social-soundcloud"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="col-sm-12 card dashboard-product">
                <?php 
                $id =$_SESSION['user']['id_guru'];
                $data=$koneksi->query("SELECT * FROM pengajar WHERE id_guru='$id'");
                $jmlmapel=$data->num_rows;
                ?>
                <span>Jumlah Jurusan</span>
                <h2 class="dashboard-total-products counter"></h2>
                <span class="label label-primary">Jurusan</span>
                <div class="side-box bg-primary">
                    <i class="icon-social-soundcloud"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="col-sm-12 card dashboard-product">
                <?php 
                $id =$_SESSION['user']['id_guru'];
                $data=$koneksi->query("SELECT * FROM pengajar WHERE id_guru='$id'");
                $jmlmapel=$data->num_rows;
                ?>
                <span>Jumlah Kelas</span>
                <h2 class="dashboard-total-products counter"></h2>
                <span class="label label-primary">Kelas</span>
                <div class="side-box bg-primary">
                    <i class="icon-social-soundcloud"></i>
                </div>
            </div>
        </div>
        
    </div>

    <div class="card">
      <div class="card-header">
        <center><h5 class="card-header-text">VISI DAN MISI SEKOLAH</h5></center>
    </div>
    <div class="card-block accordion-block">
        <div class="color-accordion" id="color-accordion">
          <center><a class="accordion-msg  bg-danger b-none">VISI SEKOLAH</a></center>
          <div class="accordion-desc">
            <center>
                <p>"Sekolah unggulan yang menghasilkan tamatan terampil bekerja dan berakhlaq mulia".</p>
            </center>
        </div>
        <center><a class="accordion-msg  bg-danger b-none">MISI SEKOLAH</a></center>
        <div class="accordion-desc">
           <p>1. Melaksanakan manajemen pengelolaan sekolah secara terbuka, akun tabel, berwawasan mutu dan berorientasi masa depan.</p>
           <p>2. Melaksanakan kegiatan belajar mengajar secara optimal yang berorientasi kepada pencapaian kompetensi nasional dan internasional, dengan tetap mempertimbangkan potensi yang dimiliki peserta didik.</p>
           <p>3. Menghasilkan tamatan yang cerdas, terampil, jujur, berkarakter, kompetitif, didunia usaha dan industri yang berskala nasional maupun internasional serta mampu mengembangkan dirinya.</p>
       </div>
   </div>

</div>

</div>
<!-- 3-1-block start -->

<!-- 2-1 block start -->
<!-- 2-1 block end -->
<pre>
    <?php 
    print_r($_SESSION);
    ?>
</pre>
</div>
<!-- Main content ends -->
<!-- Container-fluid ends -->

