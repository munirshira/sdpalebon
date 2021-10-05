<!DOCTYPE html>
<html>
    <head>
        <title>Tenaga Pengajar</title>
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
            .card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
            }
            .card:hover {
                box-shadow: 0 10px 30px 0 rgba(0,0,0,0.2);
                transition: 0.5s;
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
            .card-img-top{
                width: 100%;
                height: 250px;
                object-fit: cover;
            }
        </style>
    </head>
    <body>
        <?php include('./header_pengunjung.php');?>
        <div class="bg">
            <div class="tulisan">
                <br>
                <br>
                <h1><b>TENAGA PENGAJAR</b></h1>
                <p><a href="home_pengunjung.php">Home</a> / Tenaga Pengajar</p>
                <br>
                <br>
            </div>
        </div>
        <br>
        <br>
        <ul class="nav nav-pills nav-fill" role="tablist" style="margin: 30px 30% 30px 30%;">
            <li class="nav-item">
                <a class="nav-link active" id="tombol" data-toggle="pill" href="#KepalaSekolah">Kepala Sekolah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tombol" data-toggle="pill" href="#Guru">Guru</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tombol" data-toggle="pill" href="#TenagaKependidikan">Tenaga Kependidikan</a>
            </li>
        </ul>

        <br>
        <div class="tab-content">
            <div id="KepalaSekolah" class="container tab-pane active">
            <div class="container">
            <div class="row mt-4 justify-content-md-center">
                <div class="col-md-4">
                <?php
                    $sql = "SELECT * FROM guru WHERE jabatan='Kepala Sekolah'";
                    $result = mysqli_query($db,$sql);
                    if (!$result){
                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                    }else{
                        while ($row = $result->fetch_object()){
                            echo '<div class="card" style="margin-bottom: 20px;">';
                            echo '<img class="card-img-top" src="images/'.$row->gambar_guru.'" alt="Card image cap" style="width:100%;height:100%;">';
                            echo '<div class="card-body">';
                            echo '<p class="card-title" style="font-size:20px; text-align:center;">'.$row->nama_guru.'</p>';
                            echo '<p class="card-subtitle mb-2 text-muted" style="text-align:center;">'.$row->jabatan.'</p>';
                            echo '<p class="card-text" style="text-align:center; font-size:15px;">NIP : '.$row->nip.'</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
                </div>
            </div>
            </div>
            </div>
            <div id="Guru" class="container tab-pane fade">
            <div class="container">
            <div class="row mt-4 justify-content-md-center">
                
                <?php
                    $sql = "SELECT * FROM guru WHERE jabatan='Guru'";
                    $result = mysqli_query($db,$sql);
                    if (!$result){
                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                    }else{
                        while ($row = $result->fetch_object()){
                            echo '<div class="col-md-3">';
                            echo '<div class="card" style="margin-bottom: 20px;">';
                            echo '<img class="card-img-top" src="images/'.$row->gambar_guru.'" alt="Card image cap" style="width:100%;">';
                            echo '<div class="card-body">';
                            echo '<p class="card-title" style="font-size:20px; text-align:center;">'.$row->nama_guru.'</p>';
                            echo '<p class="card-subtitle mb-2 text-muted" style="text-align:center;">'.$row->jabatan.'</p>';
                            echo '<p class="card-text" style="text-align:center; font-size:15px;">NIP : '.$row->nip.'</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
                
            </div>
            </div>
            </div>
            <div id="TenagaKependidikan" class="container tab-pane fade">
            <div class="container">
            <div class="row mt-4 justify-content-md-center">
                
                <?php
                    $sql = "SELECT * FROM guru WHERE jabatan='Tenaga Kependidikan'";
                    $result = mysqli_query($db,$sql);
                    if (!$result){
                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                    }else{
                        while ($row = $result->fetch_object()){
                            echo '<div class="col-md-3">';
                            echo '<div class="card" style="margin-bottom: 20px;">';
                            echo '<img class="card-img-top" src="images/'.$row->gambar_guru.'" alt="Card image cap" style="width:100%;">';
                            echo '<div class="card-body">';
                            echo '<p class="card-title" style="font-size:20px; text-align:center;">'.$row->nama_guru.'</p>';
                            echo '<p class="card-subtitle mb-2 text-muted" style="text-align:center;">'.$row->jabatan.'</p>';
                            echo '<p class="card-text" style="text-align:center; font-size:15px;">NIP : '.$row->nip.'</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
            </div>
            </div>
        </div>
        <br>
        <br>
        <br> <?php include('./footer_pengunjung.php');?> 
    </body>
</html>