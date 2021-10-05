<!DOCTYPE html>
<html>
    <head>
        <title>Profil Sekolah</title>
        <meta charset="utf-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="icon" href="favicon.ico" type="image/gif" sizes="20x16">
        <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="bootstrap-4.5.2-dist/jquery.min.js"></script>
        <script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.4/umd/popper.min.js"></script>

        <style>
            body, html {
                height: 100%;
                margin: 0;
            }
            #navbarDropdown1{
                color: white;
            }
            .bg{
                background-position: center;
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(images/pal.jpg);
                background-size: cover;
                height: 50%;
                position: relative;
                background-repeat: no-repeat;
                background-position: center;
            }
            .tulisan{
                text-align: center;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
            }
            .tulisan p a{
                color: white;
            }
            .card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
            }
            .nav-pills .nav-item .active {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
            }
        </style>
        
    </head>
    <body>
        <?php include('./header_pengunjung.php');?>
        <div class="bg">
            <div class="tulisan">
                <br>
                <br>
                <h1><b>PROFIL SEKOLAH</b></h1>
                <p><a href="home_pengunjung.php">Home</a> / Profil Sekolah</p>
                <br>
                <br>
            </div>
        </div>
        <br>
        <br>
        <ul class="nav nav-pills nav-fill" role="tablist" style="margin: 30px 30% 30px 30%;">
            <li class="nav-item">
                <a class="nav-link active" id="tombol" data-toggle="pill" href="#Sejarah">Sejarah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tombol" data-toggle="pill" href="#Visi">Visi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tombol" data-toggle="pill" href="#Misi">Misi</a>
            </li>
        </ul>
        <div class="card" style="margin-left: 5%; margin-right: 5%" >
            <div class="card-body">
        <br>
        <div class="tab-content">
            <div id="Sejarah" class="container tab-pane active">
                <h3 style="text-align: center;">Sejarah SDN Palebon 02 Semarang</h3>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <br>
            </div>
            <div id="Visi" class="container tab-pane fade">
                <h3 style="text-align: center;">Visi SDN Palebon 02 Semarang</h3>
                <br>
                <?php
                    $sql = "SELECT * FROM profil WHERE kategori='visi'";
                    $result = mysqli_query($db,$sql);
                    if (!$result){
                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                    }else{
                        while ($row = $result->fetch_object()){
                            echo '<p style="text-align:center;">'.$row->isi.'</p>';
                        }
                    }
                ?>
                <br>
            </div>
            <div id="Misi" class="container tab-pane fade">
                <h3 style="text-align: center;">Misi SDN Palebon 02 Semarang</h3>
                <br>
                <ol>
                <?php
                    $sql = "SELECT * FROM profil WHERE kategori='misi'";
                    $result = mysqli_query($db,$sql);
                    if (!$result){
                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                    }else{
                        
                        while ($row = $result->fetch_object()){
                            echo '<li>'.$row->isi.'</li>';
                        }
                    }
                ?>
                </ol>
                <br>
            </div>
        </div>
            </div>
        </div>
        <br>
        <br>
        
        <br> <?php include('./footer_pengunjung.php');?> 
    </body>
</html>