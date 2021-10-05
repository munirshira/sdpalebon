<!DOCTYPE html>
<html>
    <head>
        <title>Pencarian</title>
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
            .tulisan p a{
                color: white;
            }
            .btn:hover{
                box-shadow: 0 8px 8px 0 rgba(0,0,0,0.2);
                transition: 0.5s;
            }
            .rounded{
                box-shadow: 0 10px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
            }
            a{
                color: black;
            }
            a:hover{
                text-decoration: none;
                color: blue;
            }
        </style>
    </head>
    <body>
        <?php include('./header_pengunjung.php');?>
        <?php
            $search = $_GET['search'];
        ?>
        <div class="bg">
            <div class="tulisan">
                <br>
                <br>
                <h1><b>PENCARIAN</b></h1>
                <p><a href="home_pengunjung.php">Home</a> / <a href="berita.php">Berita</a> / Pencarian</p>
                <br>
                <br>
            </div>
        </div>
        <br>
        <br>
            <?php
                $query_jumlah = "SELECT count(*) AS jumlah FROM berita WHERE judul LIKE '%".$search."%' or isi_berita LIKE '%".$search."%' ORDER BY tgl_berita";
                $dewan1 = $db->prepare($query_jumlah);
                $dewan1->execute();
                $res1 = $dewan1->get_result();
                $row = $res1->fetch_assoc();
                $total_records = $row['jumlah'];
            ?>
            
            <div style="margin-left: 5%; margin-right: 5%;">
                <p><b>Hasil Pencarian dari : <?php echo $search; ?></b></p>
                <p style="border: 4px solid blue;"></p>
                <br><br>

                <?php
                    if($total_records <= 0){
                        echo '<div class="alert alert-secondary" role="alert">';
                            echo 'Berita dengan kata kunci '.$search.' tidak dapat ditemukan. Temukan berita lainnya <a href="berita.php" class="alert-link">disini</a>';
                        echo '</div>';
                        echo '<br><br>';
                    }
                ?>

                <?php
                    $page = (isset($_GET['page']))? $_GET['page'] : 1;
                    $limit = 8; 
                    $limit_start = ($page - 1) * $limit;
                    $no = $limit_start + 1;
                
                    $query = "SELECT * FROM berita JOIN akun ON id_akun = id_admin WHERE judul LIKE '%".$search."%' or isi_berita LIKE '%".$search."%' ORDER BY tgl_berita DESC LIMIT $limit_start, $limit";
                    $dewan1 = $db->prepare($query);
                    $dewan1->execute();
                    $res1 = $dewan1->get_result();
                    while ($row = $res1->fetch_assoc()) {
                ?>
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                        <img src="images/<?php echo $row["gambar_berita"]; ?>" style="width: 100%; height: 215px; object-fit: cover;" alt="conten 1" class="rounded">
                        <br><br>
                        </div>
                        <div class="col">
                        <a id="judul" href="detail_berita.php?id=<?php echo $row["id_berita"]; ?>"><h4><?php echo $row["judul"]; ?></h4></a>
                        <p style="font-size: small; color: gray;"><?php echo $row["nama_admin"]; ?> X <?php echo $row["tgl_berita"]; ?></p>    
                        <?php echo mb_strimwidth('<p>'.$row["isi_berita"].'</p>', 0, 240, "...");?>
                        <br><br>
                        <a class="btn btn-primary" href="detail_berita.php?id=<?php echo $row["id_berita"]; ?>" style="color: white;">Lanjutkan Baca...</a>
                        </div>
                    </div>
                    </div>
                    <br>
                    <br>
                <?php } ?>
                <p><b>Jumlah Berita: <?php echo $total_records; ?></b></p>
            </div>
            <br>
                <nav class="mb-5">
                <ul class="pagination justify-content-center">
                <?php
                    $jumlah_page = ceil($total_records / $limit);
                    $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
                    $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
                    $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
                    
                    if($page == 1){
                        echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
                    } else{
                        $link_prev = ($page > 1)? $page - 1 : 1;
                        echo '<li class="page-item"><a class="page-link" href="?page=1&search='.$search.'">First</a></li>';
                        echo '<li class="page-item"><a class="page-link" href="?page='.$link_prev.'&search='.$search.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                
                    for($i = $start_number; $i <= $end_number; $i++){
                        $link_active = ($page == $i)? ' active' : '';
                        echo '<li class="page-item '.$link_active.'"><a class="page-link" href="?page='.$i.'&search='.$search.'">'.$i.'</a></li>';
                    }
                
                    if($page == $jumlah_page){
                        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                        echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
                    } else if($jumlah_page == 0){
                        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                        echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
                    } else {
                        $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                        echo '<li class="page-item"><a class="page-link" href="?page='.$link_next.'&search='.$search.'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                        echo '<li class="page-item"><a class="page-link" href="?page='.$jumlah_page.'&search='.$search.'">Last</a></li>';
                    }
                ?>
                </ul>
                </nav>
        <br> <?php include('./footer_pengunjung.php');?> 
    </body>
</html>