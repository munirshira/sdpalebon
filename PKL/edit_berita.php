<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Edit Berita</title>

      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
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
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
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
        $id = $_GET['id'];
        // if upload button is pressed
        if(!isset($_POST['upload'])){
            $query = " SELECT * FROM berita WHERE id_berita=".$id;
            //Execute the query
            $result = $db->query($query);
            if(!$result){
                die("Could not query the database: <br/>". $db->error);
            }else{
                while($row = $result->fetch_object()){
                    $image = $row->gambar_berita;
                    $judul = $row->judul;
                    $isi_berita = $row->isi_berita;
                }
            }
        }else{
            $valid = TRUE; //flag validasi
            $judul = $_POST['judul'];
            if ($judul == '') {
                
                $valid = FALSE;
            }

            $isi_berita = $_POST['text'];
            if($isi_berita == ''){
                $valid = FALSE;
                
            }

            if($valid){
                $query = "UPDATE berita SET judul='".$judul."',isi_berita='".$isi_berita."' WHERE id_berita='$id'";
                $result = $db->query($query);
                if(!$result){
                    die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
                }else{
                    $db->close();
                    header('Location: manage_berita.php?valid=edit true');
                }
            }else{
                header('Location: edit_berita.php?valid=edit false');
            }
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
                <li>
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
                <li class="active">
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
                            <a class="nav-link">Edit Berita</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <?php
                if(isset($_GET['valid'])){
                    $valid = $_GET['valid'];
                    if($valid == "edit false"){
                        echo'<div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Berita berhasil diubah.
                        </div>';
                    }
                }
            ?>
            <div style="text-align: center;">
                <img src="images/<?php echo $image;?>" height="300">
            </div>
            <br><br>
            <form id="form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>">
                
                <div class="form-group">
                    <label for="judul">Judul :</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="<?php if(isset($judul)) {echo $judul;} ?>" maxlength="100" required>
                    
                </div>
                <div class="form-group">
                    <label for="text">Isi Berita :</label>
                    <textarea class="form-control" type="text" name="text" rows="6" required><?php if(isset($isi_berita)) {echo $isi_berita;} ?></textarea>
                    
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="upload" value="upload image">Submit</button>
                    <a href="manage_berita.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
        
    </script>
</body>

</html>