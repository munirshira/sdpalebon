<!DOCTYPE html>
<html>
    <head>
        <title>Berita</title>
        <meta charset="utf-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="icon" href="favicon.ico" type="image/gif" sizes="20x16">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.4/umd/popper.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style>
            body, html {
                height: 100%;
                margin: 0;
            }
            #berita{
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
            p a{
                color: blue;
            }

        </style>
    </head>
    <body>
        <?php include('./header_pengunjung.php');?><br>
        <div style="margin-left:10%; margin-right:10%">
        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM berita JOIN akun ON id_akun = id_admin WHERE id_berita=".$id." ";
            $result = mysqli_query($db,$sql);
            if (!$result){
                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
            }else{
                while ($row = $result->fetch_object()){
                    echo '<p><b><a href="home_pengunjung.php">Home</a> / <a href="berita.php">Berita</a> / '.$row->judul.'</b></p>';
                    echo '<img src="images/'.$row->gambar_berita.'" style="width: 100%; height: auto;">';
                    echo '<br><br>';
                    echo '<div style="border-bottom: 1px solid lightgrey;">';
                    echo '<h3 style="font-weight: bold;">'.$row->judul.'</h3>';
                    echo '<p style="color: gray;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  </svg>  '.$row->nama_admin.'&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                </svg>  '.date('l, d F Y', strtotime($row->tgl_berita)). '</p>';
                    echo '</div>';
                    echo '<br>';
                    echo nl2br("$row->isi_berita",false);
                }
            }
        ?>
        </div>
        <br> <?php include('./footer_pengunjung.php');?> 
    </body>
</html>