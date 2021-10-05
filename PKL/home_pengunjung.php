<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="icon" href="favicon.ico" type="image/gif" sizes="20x16">
        <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="bootstrap-4.5.2-dist/jquery.min.js"></script>
        <script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.4/umd/popper.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
        <style>
            #home{
                color: white;
            }
            
            a{
                color: black;
            }
            a:hover{
                text-decoration: none;
                color: blue;
            }
            .card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
            }
            .card:hover {
                box-shadow: 0 10px 30px 0 rgba(0,0,0,0.2);
                transition: 0.5s;
            }
            #timbul {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
            }
            #timbul:hover {
                box-shadow: 0 10px 30px 0 rgba(0,0,0,0.2);
                transition: 0.5s;
            }
            .card-img-top{
                width: 100%;
                height: 275px;
                object-fit: cover;
            }
            .counter-up{
                background: url("images/Siswa-SD.jpg") no-repeat;
                min-height: 50vh;
                background-size: cover;
                background-attachment: fixed;
                padding: 0 50px;
                position: relative;
                display: flex;
                align-items: center;
            }
            .counter-up::before{
                position: absolute;
                content: "";
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                background: rgba(0,0,0,0.8);
            }
            .counter-up .content{
                z-index: 1;
                position: relative;
                display: flex;
                width: 100%;
                height: 100%;
                flex-wrap: wrap;
                align-items: center;
                justify-content: space-between;
            }
            .counter-up .content .box{
                border: 1px dashed rgba(255,255,255,0.6);
                width: calc(25% - 30px);
                border-radius: 5px;
                display: flex;
                align-items: center;
                justify-content: space-evenly;
                flex-direction: column;
                padding: 20px;
            }
            .content .box .icon{
                font-size: 48px;
                color: #e6e6e6;
            }
            .content .box .counter{
                font-size: 50px;
                font-weight: 500;
                color: #f2f2f2;
                font-family: sans-serif;
            }
            .content .box .text{
                font-weight: 400;
                color: #ccc;
            }
            @media screen and (max-width: 1036px) {
                .counter-up{
                    padding: 50px 50px 0 50px;
                }
                .counter-up .content .box{
                    width: calc(50% - 30px);
                    margin-bottom: 50px;
                }
            }
            @media screen and (max-width: 580px) {
                .counter-up .content .box{
                    width: 100%;
                }
            }
            @media screen and (max-width: 500px) {
                .wrapper{
                    padding: 20px;
                }
                .counter-up{
                    padding: 30px 20px 0 20px;
                }
            }
        </style>
    </head>
    <body>
        <?php include('./header_pengunjung.php');?>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                    $sql = "SELECT * FROM carousel";
                    $result = mysqli_query($db,$sql);
                    if (!$result){
                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                    }else{
                        $i = 0;
                        while ($row = $result->fetch_object()){
                            if($i==0){
                                echo '<div class="carousel-item active">';
                            }else{
                                echo '<div class="carousel-item">';
                            }
                            echo '<img class="d-block w-100" src="images/'.$row->gambar_carousel.'" alt="First slide" style=" width:100%; height: 500px; object-fit: cover;">';
                            echo '</div>';
                            $i++;
                        }
                    }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div style="margin-left: 10%; margin-right: 10%">
            <br>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-8" style="align-self: center;">
                        <h3 class="text-center">Selamat Datang</h3>
                        <p class="text-center" style="font-size: 20px;">Selamat Datang di Website Pelayanan <br> Sekolah Dasar Negeri Palebon 02 Semarang</p>
                        <div style="text-align: center;">
                            <a type="button" class="btn btn-primary btn-lg" id="timbul" style="border-radius:30px; margin-bottom:20px;" href="visimisi.php">Profil Sekolah</a>
                        </div>
                    </div>
                    
                    <div class="col-md">
                        <?php
                            $sql = "SELECT * FROM guru WHERE jabatan='Kepala Sekolah'";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo '<div class="card" style="margin-bottom: 20px; text-align:center;">';
                                    echo '<img class="card-img-top" src="images/'.$row->gambar_guru.'" alt="Card image cap" style="width:100%;">';
                                    echo '<div class="card-body">';
                                    echo '<p class="card-title" style="font-size:20px; text-align:center;">'.$row->nama_guru.'</p>';
                                    echo '<p class="card-subtitle mb-2 text-muted" style="text-align:center;">'.$row->jabatan.'</p>';
                                    echo '<a type="button" class="btn btn-primary btn-md" id="timbul" href="sambutan.php">Sambutan Kepala Sekolah</a>';
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
            <div class="counter-up">
                <div class="content">
                <div class="box">
                    <div class="icon"><i class="fas fa-users"></i></div>
                    <div class="counter">
                        <?php
                            $sql = "SELECT COUNT(id_guru) AS jtp FROM guru";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo $row->jtp;
                                }
                            }
                        ?>
                    </div>
                    <div class="text">Tenaga Pengajar</div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-trophy"></i></div>
                    <div class="counter">
                        <?php
                            $sql = "SELECT COUNT(id_prestasi) AS jp FROM prestasi";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo $row->jp;
                                }
                            }
                        ?>
                    </div>
                    <div class="text">Prestasi</div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-school"></i></div>
                    <div class="counter">
                        <?php
                            $sql = "SELECT COUNT(id_fasilitas) AS jf FROM fasilitas";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo $row->jf;
                                }
                            }
                        ?>
                    </div>
                    <div class="text">Fasilitas</div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-futbol"></i></div>
                    <div class="counter">
                        <?php
                            $sql = "SELECT COUNT(id_ekskul) AS je FROM ekskul";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo $row->je;
                                }
                            }
                        ?>
                    </div>
                    <div class="text">Ekstrakurikuler</div>
                </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        <div style="margin-left: 10%; margin-right: 10%">
            <div class="container">
                <div class="row">
                <div class="col col-lg-3">
                <h3>Berita Terbaru</h3>
                </div>
                <div class="col">
                <hr style="height:7px;border-width:0;color:gray;background-color:blue">
                </div>
                </div>
                </div>
            <br>
            <div class="container">
                <div class="row">
                    
                        <?php
                            $sql = "SELECT * FROM berita JOIN akun ON id_akun=id_admin ORDER BY tgl_berita DESC LIMIT 3";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo '<div class="col-md-4">';
                                    echo '<div class="card" style="margin-bottom: 20px;">';
                                    echo '<img class="card-img-top rounded" src="images/'.$row->gambar_berita.'" alt="Card image cap" style="width:100%;">';
                                    echo '<div class="card-body">';
                                    echo '<a href="detail_berita.php?id='.$row->id_berita.'"><p class="card-title" style="font-size:20px;">'.$row->judul.'</p></a>';
                                    echo mb_strimwidth('<p class="card-text" style="font-size:15px;">'.$row->isi_berita.'</p>', 0, 240, "...");
                                    echo '<br>';
                                    echo '<p style="color: gray; font-size:12px;">'.$row->nama_admin.'&nbsp;-&nbsp;'.date('l, d F Y', strtotime($row->tgl_berita)). '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }
                        ?>
                    
                </div>
            </div>
            <br>
            <div style="text-align: center;">
                <a type="button" class="btn btn-primary btn-lg" id="timbul" style="border-radius:30px;" href="berita.php">Lebih Banyak</a>
            </div>
            <br>
            <br>
            <br>
            <div class="container">
                <div class="row">
                <div class="col col-lg-3">
                <h3>Prestasi Terbaru</h3>
                </div>
                <div class="col">
                <hr style="height:7px;border-width:0;color:gray;background-color:darkblue">
                </div>
                </div>
                </div>
            <br>
            <div class="container">
                <div class="row">
                    
                <?php
                    $query = "SELECT * FROM prestasi ORDER BY tahun DESC LIMIT 3";
                    $dewan1 = $db->prepare($query);
                    $dewan1->execute();
                    $res1 = $dewan1->get_result();
                    while ($row = $res1->fetch_assoc()) {
                ?>
                    <div class="col-md-4">
                    <div class="card" style="margin-bottom: 20px;">
                    <img class="card-img-top" src='images/<?php echo $row["gambar_lomba"]; ?>' alt="Card image cap" style="width:100%;">
                    <div class="card-body">
                    <p class="card-title" style="font-size:20px;"><?php echo $row["lomba"]; ?></p>
                    <p class="card-subtitle mb-2 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trophy-fill" viewBox="0 0 16 16">
                        <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z"/>
                      </svg> <?php echo $row["juara"]; ?>&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-week-fill" viewBox="0 0 16 16">
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zM8.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM3 10.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
                    </svg> <?php echo $row["tahun"]; ?></p>
                    <p class="card-text">Pemenang : <?php echo $row["pemenang"]; ?></p>
                    </div>
                    </div>
                    </div>
                <?php } ?>
                    
                </div>
            </div>
            <br>
            <div style="text-align: center;">
                <a type="button" class="btn btn-primary btn-lg" id="timbul" style="border-radius:30px;" href="prestasi.php">Lebih Banyak</a>
            </div>
            <br>
            <br>
            <br>
            
        </div>
            
        <br> <?php include('./footer_pengunjung.php');?> 
        <script>
            $(document).ready(function(){
                $('.counter').counterUp({
                delay: 10,
                time: 750
                });
            });
        </script>

    </body>
    
</html>