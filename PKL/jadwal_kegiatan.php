<!DOCTYPE html>
<html>
    <head>
        <title>Jadwal Kegiatan</title>
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
            #navbarDropdown{
                color: white;
            }
            body, html {
                height: 100%;
                margin: 0;
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
            .table {
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
                <h1><b>JADWAL KEGIATAN</b></h1>
                <p><a href="home_pengunjung.php">Home</a> / Jadwal Kegiatan</p>
                <br>
                <br>
            </div>
        </div>
        <br>
        <br>
        <h3 style="text-align: center;">Jadwal Kegiatan SDN Palebon 02</h3>
        <div style="margin: 30px 10% 30px 10%;">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    function tgl_indo($tanggal){
                        $bulan = array (
                            1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                        );
                        $pecahkan = explode('-', $tanggal);
                        
                        // variabel pecahkan 0 = tanggal
                        // variabel pecahkan 1 = bulan
                        // variabel pecahkan 2 = tahun
                    
                        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                    }

                    $sql = "SELECT * FROM kegiatan WHERE tanggal_kegiatan > CURRENT_TIMESTAMP ORDER BY tanggal_kegiatan,jam";
                    $result = mysqli_query($db,$sql);
                    if (!$result){
                        die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                    }else{
                        $i = 1;
                        while ($row = $result->fetch_object()){
                            echo '<tr>';
                            echo '<th>'.$i.'</th>';
                            echo '<td>'.$row->nama_kegiatan.'</td>';
                            echo '<td>'.tgl_indo($row->tanggal_kegiatan).'</td>';
                            echo '<td>'.$row->jam.'</td>';
                            echo '</tr>';
                            $i++;
                        }
                    }
                ?>
            </tbody>
        </table>
        </div>

        <br> <?php include('./footer_pengunjung.php');?> 
    </body>
</html>