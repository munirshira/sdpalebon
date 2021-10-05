<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>

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
        .kunjung{
            font-size: 14px;
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
                <li class="active">
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
                            <a class="nav-link">Dashboard</a>
                        </li>
                    </ul>
                    
                </div>
            </nav>
            <div class="container">
                <div class="row mt-4">
                    <div class="col-md-4">
                        <a href="manage_pengajar.php">
                        <div class="card text-white border-light" style=" background-image: linear-gradient(to right, red , orange); margin-bottom: 20px;">
                            <div class="card-body">
                                <?php
                                    $sql = "SELECT count(*) AS jumlah FROM guru";
                                    $result = mysqli_query($db,$sql);
                                    if (!$result){
                                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                    }else{
                                        while ($row = $result->fetch_object()){
                                            echo '<p style="color:white; font-size:3vw;">'.$row->jumlah.'</p>';
                                        }
                                    }
                                ?>
                                Total Tenaga Pengajar
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="manage_prestasi.php">
                        <div class="card text-white border-light" style=" background-image: linear-gradient(to right, green , springgreen); margin-bottom: 20px;">
                            <div class="card-body">
                            <?php
                                    $sql = "SELECT count(*) AS jumlah FROM prestasi";
                                    $result = mysqli_query($db,$sql);
                                    if (!$result){
                                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                    }else{
                                        while ($row = $result->fetch_object()){
                                            echo '<p style="color:white; font-size:3vw;">'.$row->jumlah.'</p>';
                                        }
                                    }
                                ?>
                                Total Prestasi
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="manage_berita.php">
                        <div class="card text-white border-light" style=" background-image: linear-gradient(to right, #1D2671 , #C33764); margin-bottom: 20px;">
                            <div class="card-body">
                            <?php
                                    $sql = "SELECT count(*) AS jumlah FROM berita";
                                    $result = mysqli_query($db,$sql);
                                    if (!$result){
                                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                    }else{
                                        while ($row = $result->fetch_object()){
                                            echo '<p style="color:white; font-size:3vw;">'.$row->jumlah.'</p>';
                                        }
                                    }
                                ?>
                                Total Berita
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="manage_buku.php">
                        <div class="card text-white border-light" style=" background-image: linear-gradient(to right, orangered , yellow); margin-bottom: 20px;">
                            <div class="card-body">
                                <?php
                                    $sql = "SELECT count(*) AS jumlah FROM daftar_buku";
                                    $result = mysqli_query($db,$sql);
                                    if (!$result){
                                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                    }else{
                                        while ($row = $result->fetch_object()){
                                            echo '<p style="color:white; font-size:3vw;">'.$row->jumlah.'</p>';
                                        }
                                    }
                                ?>
                                Total Buku
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="manage_fasilitas.php">
                        <div class="card text-white border-light" style=" background-image: linear-gradient(to right, #0f3443 , #34e89e); margin-bottom: 20px;">
                            <div class="card-body">
                                <?php
                                    $sql = "SELECT count(*) AS jumlah FROM fasilitas";
                                    $result = mysqli_query($db,$sql);
                                    if (!$result){
                                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                    }else{
                                        while ($row = $result->fetch_object()){
                                            echo '<p style="color:white; font-size:3vw;">'.$row->jumlah.'</p>';
                                        }
                                    }
                                ?>
                                Total Fasilitas
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="manage_ekstrakurikuler.php">
                        <div class="card text-white border-light" style=" background-image: linear-gradient(to right, #6190E8 , #A7BFE8); margin-bottom: 20px;">
                            <div class="card-body">
                                <?php
                                    $sql = "SELECT count(*) AS jumlah FROM ekskul";
                                    $result = mysqli_query($db,$sql);
                                    if (!$result){
                                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                    }else{
                                        while ($row = $result->fetch_object()){
                                            echo '<p style="color:white; font-size:3vw;">'.$row->jumlah.'</p>';
                                        }
                                    }
                                ?>
                                Total Ekstrakurikuler
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card text-white border-light" style=" background-image: linear-gradient(to right, #363795, #005C97); margin-bottom: 20px;">
                            <div class="card-body">
                                <?php
                                    $hari = date("Y-m-d");
                                    $sql = "SELECT count(*) AS jumlah FROM visit WHERE tgl_visit = '$hari'";
                                    $result = mysqli_query($db,$sql);
                                    if (!$result){
                                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                    }else{
                                        while ($row = $result->fetch_object()){
                                            echo '<p style="color:white; font-size:3vw;">'.$row->jumlah.'</p>';
                                        }
                                    }
                                ?>
                                <div class="kunjung">
                                    Pengunjung Hari Ini
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white border-light" style=" background-image: linear-gradient(to right, #363795 , #005C97); margin-bottom: 20px;">
                            <div class="card-body">
                                <?php
                                    $bulan = date("m");
                                    $sql = "SELECT count(*) AS jumlah FROM visit WHERE MONTH(tgl_visit) = '$bulan'";
                                    $result = mysqli_query($db,$sql);
                                    if (!$result){
                                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                    }else{
                                        while ($row = $result->fetch_object()){
                                            echo '<p style="color:white; font-size:3vw;">'.$row->jumlah.'</p>';
                                        }
                                    }
                                ?>
                                <div class="kunjung">
                                    Pengunjung Bulan Ini
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white border-light" style=" background-image: linear-gradient(to right, #363795 , #005C97); margin-bottom: 20px;">
                            <div class="card-body">
                                <?php
                                    $tahun = date("Y");
                                    $sql = "SELECT count(*) AS jumlah FROM visit WHERE YEAR(tgl_visit) = '$tahun'";
                                    $result = mysqli_query($db,$sql);
                                    if (!$result){
                                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                    }else{
                                        while ($row = $result->fetch_object()){
                                            echo '<p style="color:white; font-size:3vw;">'.$row->jumlah.'</p>';
                                        }
                                    }
                                ?>
                                <div class="kunjung">
                                    Pengunjung Tahun Ini
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white border-light" style=" background-image: linear-gradient(to right, #363795, #005C97); margin-bottom: 20px;">
                            <div class="card-body">
                                <?php
                                    $sql = "SELECT count(*) AS jumlah FROM visit";
                                    $result = mysqli_query($db,$sql);
                                    if (!$result){
                                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                    }else{
                                        while ($row = $result->fetch_object()){
                                            echo '<p style="color:white; font-size:3vw;">'.$row->jumlah.'</p>';
                                        }
                                    }
                                ?>
                                <div class="kunjung">
                                    Total Pengunjung Web
                                </div>     
                            </div>
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