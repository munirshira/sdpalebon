<!DOCTYPE html>
<html>
    <head>
        <title>Jadwal Pelajaran</title>
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
                <h1><b>JADWAL PELAJARAN</b></h1>
                <p><a href="home_pengunjung.php">Home</a> / Jadwal Pelajaran</p>
                <br>
                <br>
            </div>
        </div>
        <br>
        <br>
        <h3 style="text-align: center;">Hari</h3>
        <ul class="nav nav-pills nav-fill" role="tablist" style="margin: 30px 20% 30px 20%;">
            <li class="nav-item">
                <a class="nav-link active" id="tombol" data-toggle="pill" href="#Senin">Senin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tombol" data-toggle="pill" href="#Selasa">Selasa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tombol" data-toggle="pill" href="#Rabu">Rabu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tombol" data-toggle="pill" href="#Kamis">Kamis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tombol" data-toggle="pill" href="#Jumat">Jumat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tombol" data-toggle="pill" href="#Sabtu">Sabtu</a>
            </li>
        </ul>
        <br>
        <div class="tab-content">
            <div id="Senin" class="container tab-pane active">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Jam</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Pengajar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM jadwal JOIN guru ON id_pengajar=id_guru WHERE hari='Senin' ORDER BY kelas,jam";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo '<tr>';
                                    echo '<td>'.$row->jam.'</td>';
                                    echo '<td>'.$row->mapel.'</td>';
                                    echo '<td>'.$row->kelas.'</td>';
                                    echo '<td>'.$row->nama_guru.'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <div id="Selasa" class="container tab-pane fade">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Jam</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Pengajar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM jadwal JOIN guru ON id_pengajar=id_guru WHERE hari='Selasa' ORDER BY kelas,jam";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo '<tr>';
                                    echo '<td>'.$row->jam.'</td>';
                                    echo '<td>'.$row->mapel.'</td>';
                                    echo '<td>'.$row->kelas.'</td>';
                                    echo '<td>'.$row->nama_guru.'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="Rabu" class="container tab-pane fade">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Jam</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Pengajar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM jadwal JOIN guru ON id_pengajar=id_guru WHERE hari='Rabu' ORDER BY kelas,jam";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo '<tr>';
                                    echo '<td>'.$row->jam.'</td>';
                                    echo '<td>'.$row->mapel.'</td>';
                                    echo '<td>'.$row->kelas.'</td>';
                                    echo '<td>'.$row->nama_guru.'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="Kamis" class="container tab-pane fade">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Jam</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Pengajar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM jadwal JOIN guru ON id_pengajar=id_guru WHERE hari='Kamis' ORDER BY kelas,jam";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo '<tr>';
                                    echo '<td>'.$row->jam.'</td>';
                                    echo '<td>'.$row->mapel.'</td>';
                                    echo '<td>'.$row->kelas.'</td>';
                                    echo '<td>'.$row->nama_guru.'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="Jumat" class="container tab-pane fade">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Jam</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Pengajar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM jadwal JOIN guru ON id_pengajar=id_guru WHERE hari='Jumat' ORDER BY kelas,jam";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo '<tr>';
                                    echo '<td>'.$row->jam.'</td>';
                                    echo '<td>'.$row->mapel.'</td>';
                                    echo '<td>'.$row->kelas.'</td>';
                                    echo '<td>'.$row->nama_guru.'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="Sabtu" class="container tab-pane fade">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Jam</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Pengajar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM jadwal JOIN guru ON id_pengajar=id_guru WHERE hari='Sabtu' ORDER BY kelas,jam";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo '<tr>';
                                    echo '<td>'.$row->jam.'</td>';
                                    echo '<td>'.$row->mapel.'</td>';
                                    echo '<td>'.$row->kelas.'</td>';
                                    echo '<td>'.$row->nama_guru.'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <br> <?php include('./footer_pengunjung.php');?> 
    </body>
</html>