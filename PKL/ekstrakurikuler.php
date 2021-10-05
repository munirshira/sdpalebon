<!DOCTYPE html>
<html>
    <head>
        <title>Ekstrakurikuler</title>
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
            .card-img-top{
                width: 100%;
                height: 300px;
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
                <h1><b>EKSTRAKULIKULER</b></h1>
                <p><a href="home_pengunjung.php">Home</a> / Ekstrakurikuler</p>
                <br>
                <br>
            </div>
        </div>
        <br>
        <br>
        <div class="container">
            <div class="row mt-4">
            <?php
                $sql = "SELECT * FROM ekskul";
                $result = mysqli_query($db,$sql);
                if (!$result){
                    die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                }else{
                    while ($row = $result->fetch_object()){
                        
                        echo '<div class="col-md-6">';
                        echo '<div class="card" style="margin-bottom: 20px;">';
                        echo '<img class="card-img-top" src="images/'.$row->gambar_ekskul.'" alt="Card image cap" style="width:100%;">';
                        echo '<div class="card-body">';
                        echo '<p class="card-title" style="font-size:20px;"><b>'.$row->nama_ekskul.'</b></p>';
                        echo '<p class="card-text" style="text-align: center;">'.$row->keterangan.'</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            ?>
            </div>
        </div>
        <br> <?php include('./footer_pengunjung.php');?> 
    </body>
</html>