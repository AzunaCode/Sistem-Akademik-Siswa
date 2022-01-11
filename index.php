
<?php 
session_start();
if (!isset($_SESSION['user']) ) {
    header('Location: login.php');
    exit;
}
require 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php if ($_SESSION['login'] == 'Admin'):?>
        <title>SIA | Admin</title>
    <?php elseif ($_SESSION['login'] == 'Guru'):?>
        <title>SIA | Guru</title>
    <?php else:?>
        <title>SIA | Siswa</title>
    <?php endif ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/simple-line-icons/css/simple-line-icons.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Date Picker css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" />

    <!-- Bootstrap Date-Picker css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-datepicker/css/bootstrap-datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" />

    <!-- Select 2 css -->
    <link rel="stylesheet" href="assets/plugins/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/select2/css/s2-docs.css">

    <!-- Multi Select css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="assets/plugins/multiselect/css/multi-select.css" />

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">

    <!-- Weather css -->
    <link href="assets/css/svg-weather.css" rel="stylesheet">

    <!-- Echart js -->
    <script src="assets/plugins/charts/echarts/js/echarts-all.js"></script>

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <!--color css-->
    <link rel="stylesheet" type="text/css" href="assets/css/color/color-1.min.css" id="color"/>

</head>
<body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
    <div class="wrapper">
    <!--   <div class="loader-bg">
    <div class="loader-bar">
    </div>
</div> -->
<!-- Navbar-->
<header class="main-header-top hidden-print">
    <?php if ($_SESSION['login']=='Admin'):?>
        <a href="index.php" class="logo">
            <!-- <img class="img-fluid able-logo" src="assets/images/logo.png" alt="Theme-logo"> -->
            ADMINISTRATOR
        </a>

    <?php elseif ($_SESSION['login']=='Guru'):?>
        <a href="index.php" class="logo">
            <!-- <img class="img-fluid able-logo" src="assets/images/logo.png" alt="Theme-logo"> -->
            GURU
        </a>
    <?php else:?>
        <a href="index.php" class="logo">
            <!-- <img class="img-fluid able-logo" src="assets/images/logo.png" alt="Theme-logo"> -->
            SISWA
        </a>
    <?php endif ?>

    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button--><a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
        <!-- Navbar Right Menu-->
        <div class="navbar-custom-menu f-right">
            <ul class="top-nav">
                <!--Notification Menu-->

                <!-- window screen -->
                <li class="pc-rheader-submenu">
                    <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                        <i class="icon-size-fullscreen"></i>
                    </a>

                </li>
                <!-- User Menu-->
                <li class="dropdown">
                    <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                        <span>
                            <!-- ======================== UMTUK gambar ================================================== -->
                            <?php if ($_SESSION['login'] == "Admin"):?>
                                <img class="img-circle " src="assets/images/admin/<?= $_SESSION['user']['foto'] ?>" style="width:40px;" alt="User Image">

                                <!-- ketika login guru -->
                            <?php elseif ($_SESSION['login'] == "Guru"): ?>
                                <img class="img-circle " src="assets/images/guru/<?= $_SESSION['user']['foto'] ?>" style="width:40px;" alt="User Image">

                                <!-- ketika login siswa -->
                            <?php else: ?>
                                <img class="img-circle " src="assets/images/siswa/<?= $_SESSION['user']['foto'] ?>" style="width:40px;" alt="User Image">
                            <?php endif ?>
                        </span>
                        <!-- ======================== UMTUK NAMA ================================================== -->
                        <!-- ketika login admin -->
                        <?php if ($_SESSION['login'] == "Admin"):?>
                            <span><?php echo $_SESSION['user']['nama_user'] ?> <i class=" icofont icofont-simple-down"></i></span>

                            <!-- ketika login guru -->
                        <?php elseif ($_SESSION['login'] == "Guru"): ?>
                            <span><?php echo $_SESSION['user']['nama_guru'] ?> <i class=" icofont icofont-simple-down"></i></span>

                            <!-- ketika login siswa -->
                        <?php else: ?>
                            <span><?php echo $_SESSION['user']['nama_siswa'] ?> <i class=" icofont icofont-simple-down"></i></span>
                        <?php endif ?>
                    </a>
                    <ul class="dropdown-menu settings-menu">
                        <li><a href="#!"><i class="icon-settings"></i> Settings</a></li>

                        <?php if ($_SESSION['login'] == "Admin"):?>
                            <li><a href="index.php?profile=profileadmin"><i class="icon-user"></i> Profile</a></li>
                        <?php elseif ($_SESSION['login'] == "Guru"): ?>
                            <li><a href="index.php?guru=profileguru"><i class="icon-user"></i> Profile</a></li>
                        <?php else: ?>
                            <li><a href="index.php?siswa=profilesiswa"><i class="icon-user"></i> Profile</a></li>
                        <?php endif ?>
                        <li class="p-0">
                            <div class="dropdown-divider m-0"></div>
                        </li>
                        <li><a href="lock-screen.html"><i class="icon-lock"></i> Lock Screen</a></li>
                        <li><a href="index.php?halaman=logout"><i class="icon-logout"></i> Logout</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Side-Nav-->
<aside class="main-sidebar hidden-print " >
    <?php include_once 'layout/menu.php';?>
</aside>

<div class="content-wrapper">
    <!-- Ambil konten -->
    <!-- Admin -->
    <?php if ($_SESSION['login'] == 'Admin'):?>
        <?php 
        if (isset($_GET['master'])) {
            if ($_GET['master']=='orangtua'){
                include_once 'master/data-orangtua.php';
            }
            elseif ($_GET['master']=='guru') {
                include_once 'master/data-guru.php';
            }
            elseif ($_GET['master']=='kelas') {
                include_once 'master/data-kelas.php';
            }
            elseif ($_GET['master']=='siswa') {
                include_once 'master/data-siswa.php';
            }
            elseif ($_GET['master']=='jurusan') {
                include_once 'master/data-jurusan.php';
            }
            elseif ($_GET['master']=='matapelajaran') {
                include_once 'master/data-matapelajaran.php';
            }
            elseif ($_GET['master']=='semester') {
                include_once 'master/data-semester.php';
            }
        } 
        elseif (isset($_GET['halaman'])) {
            if ($_GET['halaman']=='logout'){
                include_once 'logout.php';
            } 
        }
        elseif (isset($_GET['nilai'])) {
            if ($_GET['nilai']=='nilaimatapelajaran'){
                include_once 'nilai/nilai-matapelajaran.php';
            } 
        }
        elseif (isset($_GET['laporan'])) {
            if ($_GET['laporan']=='pengajar'){
                include_once 'laporan/data-pengajar.php';
            } 
            elseif ($_GET['laporan']=='transaksinilai'){
                include_once 'laporan/transaksi-nilai.php';
            } 
            elseif ($_GET['laporan']=='guru'){
                include_once 'laporan/laporan-data-guru.php';
            } 
            elseif ($_GET['laporan']=='siswa') {
                include_once 'laporan/laporan-data-siswa.php';
            }
            elseif ($_GET['laporan']=='jurusan') {
                include_once 'laporan/laporan-data-jurusan.php';
            }
            elseif ($_GET['laporan']=='kelas') {
                include_once 'laporan/laporan-data-kelas.php';
            }
            elseif ($_GET['laporan']=='mapel') {
                include_once 'laporan/laporan-data-mapel.php';
            }
        }
        elseif (isset($_GET['profile'])) {
            if ($_GET['profile']=='profileadmin'){
                include_once 'profile/profile-admin.php';
            } 
        }
        else{
            include_once 'home.php';
        }
        ?>

        <!-- Guru -->
    <?php elseif ($_SESSION['login'] == 'Guru'):?>
        <?php 
        if (isset($_GET['guru'])) {
            if ($_GET['guru']=='profileguru'){
                include_once 'guru/profile-guru.php';
            }
            elseif ($_GET['guru']=='mapeldiampu') {
                include_once 'guru/mapel-diampu.php';
            }
            elseif ($_GET['guru']=='laporannilai') {
                include_once 'guru/laporan-nilai-siswa.php';
            }
            elseif ($_GET['guru']=='cetaknilai') {
                include_once 'guru/cetak-nilai.php';
            }
            else {
                include_once 'guru/masukkan-nilaisiswa.php';
            }
        }
        elseif (isset($_GET['halaman'])) {
            if ($_GET['halaman']=='logout'){
                include_once 'logout.php';
            } 
        }
        else{
            include_once 'homeguru.php';
        }
        ?>

        <!-- Siswa -->
    <?php else:?>
        <?php 
        if (isset($_GET['siswa'])) {
            if ($_GET['siswa']=='profilesiswa'){
                include_once 'siswa/profile-siswa.php';
            }
            elseif ($_GET['siswa']=='nilaihasil'){
                include_once 'siswa/nilai-siswa.php';
            } 
            elseif ($_GET['siswa']=='nilaixi'){
                include_once 'siswa/nilai-kelas-xi.php';
            } 
            elseif ($_GET['siswa']=='nilaixii'){
                include_once 'siswa/nilai-kelas-xii.php';
            } 
        }
        elseif (isset($_GET['halaman'])) {
            if ($_GET['halaman']=='logout'){
                include_once 'logout.php';
            } 
        }
        else{
            include_once 'homesiswa.php';
        }
        ?>
    <?php endif ?>

</div>
</div>

<!-- Required Jqurey -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/tether/dist/js/tether.min.js"></script>

<!-- Required Fremwork -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- waves effects.js -->
<script src="assets/plugins/Waves/waves.min.js"></script>

<!-- Scrollbar JS-->
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

<!-- Datatable-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<!--classic JS-->
<script src="assets/plugins/classie/classie.js"></script>

<!-- notification -->
<script src="assets/plugins/notification/js/bootstrap-growl.min.js"></script>

<!-- Rickshaw Chart js -->
<script src="assets/plugins/d3/d3.js"></script>
<script src="assets/plugins/rickshaw/rickshaw.js"></script>

<!-- Sparkline charts -->
<script src="assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

<!-- Counter js  -->
<script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/plugins/countdown/js/jquery.counterup.js"></script>

<!-- Date picker.js -->
<script src="assets/plugins/datepicker/js/moment-with-locales.min.js"></script>
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Select 2 js -->
<script src="assets/plugins/select2/dist/js/select2.full.min.js"></script>

<!-- Max-Length js -->
<script src="assets/plugins/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>

<!-- Multi Select js -->
<script src="assets/plugins/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
<script src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="assets/plugins/multi-select/js/jquery.quicksearch.js"></script>

<!-- Tags js -->
<script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>

<!-- Bootstrap Datepicker js -->
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js"></script>

<!-- bootstrap range picker -->
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- custom js -->
<script type="text/javascript" src="assets/js/main.min.js"></script>
<script type="text/javascript" src="assets/pages/dashboard.js"></script>
<script type="text/javascript" src="assets/pages/elements.js"></script>
<script type="text/javascript" src="assets/pages/advance-form.js"></script>
<script src="assets/js/menu.min.js"></script>





<script>
    var $window = $(window);
    var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('active');
     }
     else {
         nav.removeClass('active');
     }
 });
    $(document).ready(function() {
        $('#datatable').DataTable();

        $('#laporanku').DataTable({
            "lengthChange": false,
            "bInfo": false,
            // responsive: true,
            language: {
              search: "_INPUT_",
              searchPlaceholder: "Cari Data",
          },

          dom: 'Bfrtip',
          buttons: [{
             extend: 'print',
             text: '<i class="icofont icofont-print"></i>',
             className: 'btn-success',
             extend: 'print',
             title: '',
             customize: function ( win ) {
              $(win.document.body)
              .css( 'font-size', '10pt' )
              .prepend(
                '<table width="100%"><tr><td width="25" align="center"><img src="https://i.ibb.co/ByWqdVr/logo.png" width="60%"></td><td width="50" align="center"><h5>YAYASAN PENDIDIKAN ISLAM SUDIRMAN</h5><br><h5>SMK SUDIRMAN 1 WONOGIRI</h5><br><h6>DATA-DATA GURU</h6></td><td width="25" align="center"></td></tr></table><hr>'
                );

              $(win.document.body).find('table')
              .addClass( 'compact' )
              .css( 'font-size', 'inherit' );
          }
      }]
  });

        $('#laporansiswa').DataTable({
            "lengthChange": false,
            "bInfo": false,
            // responsive: true,
            language: {
              search: "_INPUT_",
              searchPlaceholder: "Cari Data",
          },

          dom: 'Bfrtip',
          buttons: [{
             extend: 'print',
             text: '<i class="icofont icofont-print"></i>',
             className: 'btn-success',
             extend: 'print',
             title: '',
             customize: function ( win ) {
              $(win.document.body)
              .css( 'font-size', '10pt' )
              .prepend(
                '<table width="100%"><tr><td width="25" align="center"><img src="https://i.ibb.co/ByWqdVr/logo.png" width="60%"></td><td width="50" align="center"><h5>YAYASAN PENDIDIKAN ISLAM SUDIRMAN</h5><br><h5>SMK SUDIRMAN 1 WONOGIRI</h5><br><h6>DATA-DATA SISWA</h6></td><td width="25" align="center"></td></tr></table><hr>'
                );

              $(win.document.body).find('table')
              .addClass( 'compact' )
              .css( 'font-size', 'inherit' );
          }
      }]
  });
        $('#laporankelas').DataTable({
            "lengthChange": false,
            "bInfo": false,
            // responsive: true,
            language: {
              search: "_INPUT_",
              searchPlaceholder: "Cari Data",
          },

          dom: 'Bfrtip',
          buttons: [{
             extend: 'print',
             text: '<i class="icofont icofont-print"></i>',
             className: 'btn-success',
             extend: 'print',
             title: '',
             customize: function ( win ) {
              $(win.document.body)
              .css( 'font-size', '10pt' )
              .prepend(
                '<table width="100%"><tr><td width="25" align="center"><img src="https://i.ibb.co/ByWqdVr/logo.png" width="60%"></td><td width="50" align="center"><h5>YAYASAN PENDIDIKAN ISLAM SUDIRMAN</h5><br><h5>SMK SUDIRMAN 1 WONOGIRI</h5><br><h6>DATA-DATA KELAS</h6></td><td width="25" align="center"></td></tr></table><hr>'
                );

              $(win.document.body).find('table')
              .addClass( 'compact' )
              .css( 'font-size', 'inherit' );
          }
      }]
  });
        $('#laporanjurusan').DataTable({
            "lengthChange": false,
            "bInfo": false,
            // responsive: true,
            language: {
              search: "_INPUT_",
              searchPlaceholder: "Cari Data",
          },

          dom: 'Bfrtip',
          buttons: [{
             extend: 'print',
             text: '<i class="icofont icofont-print"></i>',
             className: 'btn-success',
             extend: 'print',
             title: '',
             customize: function ( win ) {
              $(win.document.body)
              .css( 'font-size', '10pt' )
              .prepend(
                '<table width="100%"><tr><td width="25" align="center"><img src="https://i.ibb.co/ByWqdVr/logo.png" width="60%"></td><td width="50" align="center"><h5>YAYASAN PENDIDIKAN ISLAM SUDIRMAN</h5><br><h5>SMK SUDIRMAN 1 WONOGIRI</h5><br><h6>DATA-DATA JURUSAN</h6></td><td width="25" align="center"></td></tr></table><hr>'
                );

              $(win.document.body).find('table')
              .addClass( 'compact' )
              .css( 'font-size', 'inherit' );
          }
      }]
  });
        $('#laporanmapel').DataTable({
            "lengthChange": false,
            "bInfo": false,
            // responsive: true,
            language: {
              search: "_INPUT_",
              searchPlaceholder: "Cari Data",
          },

          dom: 'Bfrtip',
          buttons: [{
             extend: 'print',
             text: '<i class="icofont icofont-print"></i>',
             className: 'btn-success',
             extend: 'print',
             title: '',
             customize: function ( win ) {
              $(win.document.body)
              .css( 'font-size', '10pt' )
              .prepend(
                '<table width="100%"><tr><td width="25" align="center"><img src="https://i.ibb.co/ByWqdVr/logo.png" width="60%"></td><td width="50" align="center"><h5>YAYASAN PENDIDIKAN ISLAM SUDIRMAN</h5><br><h5>SMK SUDIRMAN 1 WONOGIRI</h5><br><h6>DATA-DATA MATA PELAJARAN</h6></td><td width="25" align="center"></td></tr></table><hr>'
                );

              $(win.document.body).find('table')
              .addClass( 'compact' )
              .css( 'font-size', 'inherit' );
          }
      }]
  });

        $('#laporannilai').DataTable({
            "lengthChange": false,
            "bInfo": false,
            // responsive: true,
            language: {
              search: "_INPUT_",
              searchPlaceholder: "Cari Data",
          },

          dom: 'Bfrtip',
          buttons: [{
             extend: 'print',
             text: '<i class="icofont icofont-print"></i>',
             className: 'btn-success',
             extend: 'print',
             title: '',
             customize: function ( win ) {
              $(win.document.body)
              .css( 'font-size', '10pt' )
              .prepend(
                '<table width="100%"><tr><td width="25" align="center"><img src="https://i.ibb.co/ByWqdVr/logo.png" width="60%"></td><td width="50" align="center"><h5>YAYASAN PENDIDIKAN ISLAM SUDIRMAN</h5><br><h5>SMK SUDIRMAN 1 WONOGIRI</h5><br><h6>DATA-DATA NILAI SISWA</h6></td><td width="25" align="center"></td></tr></table><hr>'
                );

              $(win.document.body).find('table')
              .addClass( 'compact' )
              .css( 'font-size', 'inherit' );
          }
      }]
  });
    } );
</script>
</body>

</html>
