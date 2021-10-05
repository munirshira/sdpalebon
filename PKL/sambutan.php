<!DOCTYPE html>
<html>
    <head>
        <title>Sambutan Kepala Sekolah</title>
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
            #home{
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
                <h1><b>SAMBUTAN KEPALA SEKOLAH</b></h1>
                <p><a href="home_pengunjung.php">Home</a> / Sambutan Kepala Sekolah</p>
                <br>
                <br>
            </div>
        </div>
        <br>
        <br>
            <div class="card" style="margin-left: 5%; margin-right: 5%" >
                <br>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-md-4">
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
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>    
                    <h3 style="text-align: center;">Sambutan Kepala Sekolah</h3>
                    <br>
                    <?php
                        $sql = "SELECT * FROM profil WHERE kategori='sambutan'";
                        $result = mysqli_query($db,$sql);
                        if (!$result){
                            die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                        }else{
                            while ($row = $result->fetch_object()){
                                echo nl2br("$row->isi",false);
                            }
                        }
                    ?>
                </div>
                <br>
            </div>
        <br>
        <br> <?php include('./footer_pengunjung.php');?> 
    </body>
</html>