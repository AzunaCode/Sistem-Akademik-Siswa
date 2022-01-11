
<div class="container-fluid">
    <div class="row">
        <div class="main-header">
            <h4>Profile</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="index.php"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Extras</a>
                </li>
                <li class="breadcrumb-item"><a href="index.php?guru=profileguru">Profile</a>
                </li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card faq-left">
                <div class="social-profile">
                    <img src="assets/images/guru/<?= $_SESSION['user']['foto'] ?>" alt="User Image" class="img-circle">
                    <!-- <img class="img-fluid" src="assets/images/social/profile.jpg" alt=""> -->
                    <div class="profile-hvr m-t-15">
                        <i class="icofont icofont-ui-edit p-r-10 c-pointer"></i>
                        <i class="icofont icofont-ui-delete c-pointer"></i>
                    </div>
                </div>
                <div class="card-block">
                    <h4 class="f-18 f-normal m-b-10 txt-primary">
                        <?php echo $_SESSION['user']['nama_guru'] ?>
                    </h4>
                    <h5 class="f-14">Software Engineer</h5>
                    <p class="m-b-15">Lorem ipsum dolor sit amet, consectet
                    ur adipisicing elit, sed do eiusmod temp or incidi dunt ut labore et.Lorem ipsum dolor sit amet, consecte</p>
                    <ul>
                        <li class="faq-contact-card">
                            <i class="icofont icofont-telephone"></i>
                            <?php echo $_SESSION['user']['no_telp'] ?>
                        </li>
                        <li class="faq-contact-card">
                            <i class="icofont icofont-world"></i>
                            <a href="http://phoenixcoded.com">www.phoenixcoded.com</a>
                        </li>
                        <li class="faq-contact-card">
                            <i class="icofont icofont-email"></i>
                            <a href="mailto:joe@example.com">demo@phoenixcoded.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- start col-lg-9 -->
        <div class="col-xl-9 col-lg-6">
            <div class="tab-content">
                <div class="tab-pane active" id="personal" role="tabpanel">
                    <div class="card">
                        <div class="card-header"><h5 class="card-header-text">About Me</h5>
                            <button id="edit-btn" type="button" class="btn btn-primary waves-effect waves-light f-right" >
                                <i  class="icofont icofont-edit"></i>
                            </button>
                        </div>
                        <div class="card-block">
                            <div class="view-info">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info">
                                            <div class="col-lg-12 col-xl-6">
                                                <table class="table m-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">NIP</th>
                                                            <td><?php echo $_SESSION['user']['nip'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Full Name</th>
                                                            <td><?php echo $_SESSION['user']['nama_guru'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Location</th>
                                                            <td><?php echo $_SESSION['user']['alamat'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Status</th>
                                                            <td>Guru</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Gender</th>
                                                            <td><?php echo $_SESSION['user']['kelamin'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td><a href="#!"><?php echo $_SESSION['user']['ussername'] ?></a></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Mobile Number</th>
                                                            <td><?php echo $_SESSION['user']['no_telp'] ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- end of table col-lg-6 -->
                                            </div>
                                            <!-- end of row -->
                                        </div>
                                        <!-- end of general info -->
                                    </div>
                                    <!-- end of col-lg-12 -->
                                </div>
                                <!-- end of row -->
                            </div>
                            <!-- end of view-info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>