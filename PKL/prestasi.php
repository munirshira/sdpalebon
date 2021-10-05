<!DOCTYPE html>
<html>
    <head>
        <title>Prestasi</title>
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
            #prestasi{
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
            .active{
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
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
                <h1><b>PRESTASI SISWA</b></h1>
                <p><a href="home_pengunjung.php">Home</a> / Prestasi</p>
                <br>
                <br>
            </div>
        </div>
        <br>
        <br>
            <?php
                $query_jumlah = "SELECT count(*) AS jumlah FROM prestasi";
                $dewan1 = $db->prepare($query_jumlah);
                $dewan1->execute();
                $res1 = $dewan1->get_result();
                $row = $res1->fetch_assoc();
                $total_records = $row['jumlah'];
            ?>
            <div style="margin-left: 6%; margin-right: 6%;">
            <div style="border-bottom: 1px solid lightgrey;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h5>Data Prestasi</h5>
                    </div>
                    <div class="col">
                        <h5 style="text-align: right;">Jumlah Prestasi : <?php echo $total_records; ?></h5>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <br>
            <div class="container">
            <div class="row mt-4">
                <?php
                    $page = (isset($_GET['page']))? $_GET['page'] : 1;
                    $limit = 8; 
                    $limit_start = ($page - 1) * $limit;
                    $no = $limit_start + 1;
                
                    $query = "SELECT * FROM prestasi ORDER BY tahun DESC LIMIT $limit_start, $limit";
                    $dewan1 = $db->prepare($query);
                    $dewan1->execute();
                    $res1 = $dewan1->get_result();
                    while ($row = $res1->fetch_assoc()) {
                ?>
                    <div class="col-md-3">
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
                    } else {
                        $link_prev = ($page > 1)? $page - 1 : 1;
                        echo '<li class="page-item"><a class="page-link" href="?page=1">First</a></li>';
                        echo '<li class="page-item"><a class="page-link" href="?page='.$link_prev.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                
                    for($i = $start_number; $i <= $end_number; $i++){
                        $link_active = ($page == $i)? ' active' : '';
                        echo '<li class="page-item '.$link_active.'"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
                    }
                
                    if($page == $jumlah_page){
                        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                        echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
                    } else {
                        $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                        echo '<li class="page-item"><a class="page-link" href="?page='.$link_next.'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                        echo '<li class="page-item"><a class="page-link" href="?page='.$jumlah_page.'">Last</a></li>';
                    }
                ?>
                </ul>
                </nav>
                
        <?php include('./footer_pengunjung.php');?> 
    </body>
</html>