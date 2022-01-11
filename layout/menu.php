
<section class="sidebar" id="sidebar-scroll">

    <div class="user-panel">
        <div class="f-left image">
            <?php if ($_SESSION['login']=='Admin'):?>
             <img src="assets/images/admin/<?= $_SESSION['user']['foto'] ?>" alt="User Image" class="img-circle">

         <?php elseif ($_SESSION['login'] == 'Guru'): ?>
             <img src="assets/images/guru/<?= $_SESSION['user']['foto'] ?>" alt="User Image" class="img-circle">

         <?php else: ?>
             <img src="assets/images/siswa/<?= $_SESSION['user']['foto'] ?>" alt="User Image" class="img-circle">
         <?php endif ?>          
     </div>
     <div class="f-left info">
       <p>
           <?php if ($_SESSION['login'] == 'Admin'):?>
           </p>
           <p class="designation"><?php echo $_SESSION['user']['nama_user']?><i class="icofont icofont-caret-down m-l-5"></i></p>
           <p>
           <?php elseif ($_SESSION['login'] == 'Guru'):?>
           </p>
           <p class="designation"><?php echo $_SESSION['user']['nama_guru'] ?><i class="icofont icofont-caret-down m-l-5"></i></p>
           <p>
           <?php else:?>
           </p>
           <p class="designation"><?php echo $_SESSION['user']['nama_siswa'] ?><i class="icofont icofont-caret-down m-l-5"></i></p>
           <p>
           <?php endif ?>
       </p>
       <p class="designation"><?= $_SESSION['login'] ?></p>
   </div>
</div>
<!-- sidebar profile Menu-->
<ul class="nav sidebar-menu extra-profile-list">

    <?php if ($_SESSION['login'] == "Admin"):?>
        <li>
            <a class="waves-effect waves-dark" href="index.php?profile=profileadmin">
                <i class="icon-user"></i>
                <span class="menu-text">View Profile</span>
                <span class="selected"></span>
            </a>
        </li>
    <?php elseif ($_SESSION['login'] == 'Guru'): ?>  
        <li>
            <a class="waves-effect waves-dark" href="index.php?guru=profileguru">
                <i class="icon-user"></i>
                <span class="menu-text">View Profile</span>
                <span class="selected"></span>
            </a>
        </li>
    <?php else:?>
        <li>
            <a class="waves-effect waves-dark" href="index.php?siswa=profilesiswa">
                <i class="icon-user"></i>
                <span class="menu-text">View Profile</span>
                <span class="selected"></span>
            </a>
        </li>
    <?php endif ?>

    <li>
        <a class="waves-effect waves-dark" href="javascript:void(0)">
            <i class="icon-settings"></i>
            <span class="menu-text">Settings</span>
            <span class="selected"></span>
        </a>
    </li>
    <li>
        <a class="waves-effect waves-dark" href="index.php?halaman=logout">
            <i class="icon-logout"></i>
            <span class="menu-text">Logout</span>
            <span class="selected"></span>
        </a>
    </li>
</ul>
<!-- Sidebar Menu-->
<ul class="sidebar-menu">
    <li class="nav-level">MENU UTAMA</li>
    <li class="active treeview">
        <a class="waves-effect waves-dark" href="index.php">
            <i class="icon-speedometer"></i><span> HOME</span>
        </a>                
    </li>
    <!-- menu Admin -->
    <?php if ($_SESSION['login'] == "Admin"):?>
        <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span>DATA MASTER</span><i class="icon-arrow-down"></i></a>
            <ul class="treeview-menu">
                <li><a class="waves-effect waves-dark" href="index.php?master=guru"><i class="icon-arrow-right"></i> Data Guru</a></li>
                <li><a class="waves-effect waves-dark" href="index.php?master=siswa"><i class="icon-arrow-right"></i> Data Siswa</a></li>
                <li><a class="waves-effect waves-dark" href="index.php?master=orangtua"><i class="icon-arrow-right"></i> Data Orang Tua/Wali</a></li>
                <li><a class="waves-effect waves-dark" href="index.php?master=jurusan"><i class="icon-arrow-right"></i> Data Jurusan</a></li>
                <li><a class="waves-effect waves-dark" href="index.php?master=kelas"><i class="icon-arrow-right"></i> Data Kelas</a></li>
                <li><a class="waves-effect waves-dark" href="index.php?master=semester"><i class="icon-arrow-right"></i> Data Semester</a></li>
                <li><a class="waves-effect waves-dark" href="index.php?master=matapelajaran"><i class="icon-arrow-right"></i> Data Mata Pelajaran</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a class="waves-effect waves-dark" href="index.php?laporan=pengajar" >
                <i class="icon-note"></i><span> PENGAJAR</span>
            </a>                
        </li>
        <li class="treeview">
            <a class="waves-effect waves-dark" href="index.php?laporan=transaksinilai">
                <i class="icon-note"></i><span> TRANSAKSI NILAI</span>
            </a>                
        </li>

        <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-book-open"></i><span> LAPORAN</span><i class="icon-arrow-down"></i></a>
            <ul class="treeview-menu">
                <li><a class="waves-effect waves-dark" href="index.php?laporan=guru"><i class="icon-arrow-right"></i> Laporan Data Guru</a></li>
                <li><a class="waves-effect waves-dark" href="index.php?laporan=siswa"><i class="icon-arrow-right"></i> Laporan Data Siswa</a></li>
                <li><a class="waves-effect waves-dark" href="index.php?laporan=jurusan"><i class="icon-arrow-right"></i> Laporan Data Jurusan</a></li>
                <li><a class="waves-effect waves-dark" href="index.php?laporan=kelas"><i class="icon-arrow-right"></i> Laporan Data Kelas</a></li>
                <li><a class="waves-effect waves-dark" href="index.php?laporan=mapel"><i class="icon-arrow-right"></i> Laporan Data Mapel</a></li>
            </ul>
        </li>

       <!--  <li class="treeview">
            <a class="waves-effect waves-dark" href="basic-table.html">
                <i class="icon-list"></i><span> Table</span>
            </a>                
        </li>
    -->

    <!-- Menu Guru -->
<?php elseif ($_SESSION['login'] == 'Guru'): ?>  

    <li class="treeview">
        <a class="waves-effect waves-dark" href="index.php?guru=mapeldiampu">
            <i class="icon-notebook"></i><span> MAPEL </span>
        </a>                
    </li>
   <!--  <li class="treeview">
        <a class="waves-effect waves-dark" href="index.php?guru=laporannilai">
            <i class="icon-notebook"></i><span> LAPORAN </span>
        </a>                
    </li> -->


    <!-- Menu Siswa -->
<?php else:?>
    <li class="treeview">
        <a class="waves-effect waves-dark" href="index.php?siswa=nilaihasil">
            <i class="icon-notebook"></i><span> LIHAT NILAI</span>
        </a>                
    </li>
<?php endif ?>

</ul>
</section>
