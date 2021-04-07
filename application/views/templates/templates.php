<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="baseUrl" content="<?= base_url() ?>">

    <title> <?= $title ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawasome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawasome/css/all.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/iziToast.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/components.css">

    <!-- Tagify -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/tagify/dist/tagify.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/placeholder-loading.min.css">


    <!-- Summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/summernote/summernote-bs4.css">

    <style type="text/css">
        html {
            scroll-behavior: smooth;
        }

        .tagify__dropdown.users-list .tagify__dropdown__item {
            padding: .5em .7em;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 0 1em;
            grid-template-areas: "avatar name"
                "avatar email";
        }

        .tagify__dropdown.users-list .tagify__dropdown__item:hover .tagify__dropdown__item__avatar-wrap {
            transform: scale(1.2);
        }

        .tagify__dropdown.users-list .tagify__dropdown__item__avatar-wrap {
            grid-area: avatar;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            overflow: hidden;
            background: #EEE;
            transition: .1s ease-out;
        }

        .tagify__dropdown.users-list img {
            width: 100%;
            vertical-align: top;
        }

        .tagify__dropdown.users-list strong {
            grid-area: name;
            width: 100%;
            align-self: center;
        }

        .tagify__dropdown.users-list span {
            grid-area: email;
            width: 100%;
            font-size: .9em;
            opacity: .6;
        }

        .tagify__dropdown.users-list .addAll {
            border-bottom: 1px solid #DDD;
            gap: 0;
        }


        /* Tags items */
        .tagify__tag {
            white-space: nowrap;
        }

        .tagify__tag:hover .tagify__tag__avatar-wrap {
            transform: scale(1.6) translateX(-10%);
        }

        .tagify__tag .tagify__tag__avatar-wrap {
            width: 16px;
            height: 16px;
            white-space: normal;
            border-radius: 50%;
            margin-right: 5px;
            transition: .12s ease-out;
        }

        .tagify__tag img {
            width: 100%;
            vertical-align: top;
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #555;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }

        #myBtn:hover {
            background-color: #00b7c2;
        }

        .dropdown-list .dropdown-list-content:not(.is-end):after {
            height: 0px;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: transparent;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #6777EF;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #6777EF;
        }
    </style>

</head>

<body class="layout-3">
    <button onclick="topFunction()" id="myBtn" class="btn btn-primary" title="Go to top"><i class="fas fa-long-arrow-alt-up"></i></button>
    <div>
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>

            <br>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="<?= base_url('admin/dashboard') ?>" class="navbar-brand sidebar-gone-hide">
                </a>

                <div class="nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                    <ul class="navbar-nav">

                    </ul>
                    <ul class="navbar-nav">
                        <li class="dropdown nav-item">
                                <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    <div class="d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-inline-block"><i class="fas fa-table"> </i> Master Data</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                        <?php if ($this->session->userdata('level') == '1'): ?>
                                            <a href="#" class="dropdown-item has-icon">
                                            Master Admin
                                            </a>
                                             <a href="<?= base_url('admin/dosen') ?>" class="dropdown-item has-icon">
                                                <i class="fas fa-landmark"></i> Dosen
                                            </a>
                                            <a href="<?= base_url('admin/matkul') ?>" class="dropdown-item has-icon">
                                                <i class="fas fa-landmark"></i> Matakuliah
                                            </a>
                                            <a href="<?= base_url('admin/kelas') ?>" class="dropdown-item has-icon">
                                                <i class="fas fa-landmark"></i> Jenis Kelas
                                            </a>
                                            <a href="<?= base_url('admin/nilai') ?>" class="dropdown-item has-icon">
                                                <i class="fas fa-landmark"></i> Harga Nilai
                                            </a>
                                            <a href="<?= base_url('admin/tahun') ?>" class="dropdown-item has-icon">
                                                <i class="fas fa-landmark"></i> tahun
                                            </a>
                                        <?php endif ?>

                                        <?php if ($this->session->userdata('level') == '2' || $this->session->userdata('level') == '1'): ?>
                                          
                                            <a href="#" class="dropdown-item has-icon">
                                            Menu Keuangan
                                            </a>
                                            
                                            <a href="<?= base_url('admin/rekap/nominal') ?>" class="dropdown-item has-icon">
                                                <i class="fas fa-landmark"></i> Rekap Nominal
                                            </a>
                                           
                                        <?php endif ?>
                                        <?php if ($this->session->userdata('level') == '3'  || $this->session->userdata('level') == '1'): ?>

                                             <a href="#" class="dropdown-item has-icon">
                                            Menu Administrasi
                                            </a>

                                            <a href="<?= base_url('admin/jadwal') ?>" class="dropdown-item has-icon">
                                                <i class="fas fa-landmark"></i> Jadwal
                                            </a>
                                            <a href="<?= base_url('admin/rekap') ?>" class="dropdown-item has-icon">
                                                <i class="fas fa-landmark"></i> Rekap Soal
                                            </a>
                                            </a>
                                            <a href="<?= base_url('admin/rekap/nilai    ') ?>" class="dropdown-item has-icon">
                                                <i class="fas fa-landmark"></i> Rekap Nilai
                                            </a>
                                            
                                        <?php endif ?>
                                       

                                   

                                </div>
                        </li>
                    
                    </ul>
                </div>



                <ul class="navbar-nav navbar-right ml-auto">
                    

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>assets/admin/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('nama') ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                           
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('admin/login/aksi/logout')?>" id="btnKeluar" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Keluar
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <!-- <div class="card"> -->
                    <!-- <div class="card-body"> -->
                    <?php if ($_SESSION['nama'] == '') {
                        redirect('','refresh');
                    } ?>
                    <?php require_once 'content.php' ?>
                    <!-- </div> -->
                    <!-- </div> -->


                </section>

                

                <footer class="main-footer">
                    <div class="footer-left">
                        <!-- Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a> -->
                    </div>
                    <div class="footer-right">
                        <!-- 2.3.0 -->
                    </div>
                </footer>
            </div>
        </div>

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url() ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() ?>assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "colvis"]
                "buttons": ["copy", "csv", "excel", "pdf"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>