<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sambutan Kepala Sekolah</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="bootstrap-4.5.2-dist/jquery.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <style>
        .card-body{
            text-align: center;
        }

        .card:hover {
            box-shadow: 0 10px 30px 0 rgba(0,0,0,0.2);
            transition: 0.5s;
        }
    </style>
</head>

<body>
    <?php   
        session_start();
        require_once('./db_login.php');
        $query = "SELECT * FROM akun WHERE username = '".$_SESSION['username']."'";
        $result = $db->query($query);
        if(!$result){
            die("Could not query the database: <br/>". $db->error);
        }else{
            while($row = $result->fetch_object()){
                $nama_admin = $row->nama_admin;
            }
        }
        if (!isset($_SESSION['username'])){
            header('Location: login_admin.php');
        }
    ?>    
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>SDN Palebon 02 Semarang</h4>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
                <li class="active">
                    <a href="#tmSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tentang Kami</a>
                    <ul class="collapse list-unstyled" id="tmSubmenu">
                        <li>
                            <a href="manage_carousel.php">Carousel</a>
                        </li>
                        <li>
                            <a href="manage_visimisi.php">Visi Misi</a>
                        </li>
                        <li>
                            <a href="manage_sambutan.php">Sambutan</a>
                        </li>
                        <li>
                            <a href="manage_pengajar.php">Pengajar</a>
                        </li>
                        <li>
                            <a href="manage_fasilitas.php">Fasilitas</a>
                        </li>
                        <li>
                            <a href="manage_ekstrakurikuler.php">Ekstrakurikuler</a>
                        </li>
                        <li>
                            <a href="manage_buku.php">Buku</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#postSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Posting</a>
                    <ul class="collapse list-unstyled" id="postSubmenu">
                        <li>
                            <a href="manage_berita.php">Berita</a>
                        </li>
                        <li>
                            <a href="manage_prestasi.php">Prestasi</a>
                        </li>
                        <li>
                            <a href="manage_PPD.php">PPD</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="manage_data_alumni.php">Data Alumni</a>
                </li>
                <li>
                    <a href="#jadwalSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Jadwal</a>
                    <ul class="collapse list-unstyled" id="jadwalSubmenu">
                        <li>
                            <a href="manage_jadwal.php">Jadwal Pelajaran</a>
                        </li>
                        <li>
                            <a href="manage_jadwal_kegiatan.php">Jadwal Kegiatan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#passSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Password</a>
                    <ul class="collapse list-unstyled" id="passSubmenu">
                        <li>
                            <a href="ubah_password.php">Ubah Password</a>
                        </li>
                        <li>
                            <a href="reset_password.php">Reset Password</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <p style="font-size: small; text-align:center;">Selamat datang <?php echo $nama_admin; ?></p>
                </li>
                <li>
                    <a href="logout_admin.php" class="article">Logout</a>
                </li>
            </ul>
        </nav>


        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Tombol Navigasi</span>
                    </button>

                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link">Manage Sambutan</a>
                        </li>
                    </ul>
                    
                </div>
            </nav>
            <?php
                if(isset($_GET['valid'])){
                    $valid = $_GET['valid'];
                    if($valid == "true"){
                        echo'<div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Sambutan berhasil diubah.
                        </div>';
                    }elseif($valid == "false"){
                        echo '<div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Failed!</strong> Sambutan gagal diubah. 
                        </div>';
                    }
                }
            ?>
            <h4 style="text-align: center;">Sambutan Kepala Sekolah</h4>
            <br>
            <?php
                $sql = "SELECT * FROM profil WHERE kategori='sambutan'";
                $result = mysqli_query($db,$sql);
                if (!$result){
                    die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                }else{
                    while ($row = $result->fetch_object()){
                        echo nl2br("$row->isi",false);
                        echo '<br><br>';
                        echo '<a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModalvisimisi">Edit</a>';           
                    }
                }
            ?>
                <div class="modal fade bd-example-modal-lg" id="myModalvisimisi" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Sambutan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>   
                    </div>
                    <div class="modal-body">
                        <form role="form" action="edit_sambutan.php" method="get">
                            <?php
                                $sql = "SELECT * FROM profil WHERE kategori='sambutan'";
                                $result = mysqli_query($db,$sql);
                                if (!$result){
                                    die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                }else{
                                    while ($row = $result->fetch_object()){
                            ?>
                            <div class="form-group">
                            <textarea type="text" name="sambutan" class="form-control" rows="15" required><?php echo $row->isi; ?></textarea>  
                            </div>
                            <div class="modal-footer">  
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                            <?php 
                                }
                            }
                            ?>        
                        </form>
                    </div>
                    </div>
                </div>
                </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>