<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Buku</title>
        <meta charset="utf-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="icon" href="favicon.ico" type="image/gif" sizes="20x16">
        <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
        <!-- jQuery library -->
        <script src="bootstrap-4.5.2-dist/jquery.min.js"></script>
        <script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.4/umd/popper.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
        <style>
            #perpus{
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
            .card {
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
                <h1><b>DAFTAR BUKU</b></h1>
                <p><a href="home_pengunjung.php">Home</a> / Daftar Buku</p>
                <br>
                <br>
            </div>
        </div>
        <br>
        <br>
        
        <div class="card" style="margin-left: 5%; margin-right: 5%">
        <div class="card-header" style="text-align: center;">
            <h4><b>Daftar buku yang digunakan di SDN Palebon 02 Semarang</b></h4>
        </div>
            <div class="card-body">
                <table id="example" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Judul</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM daftar_buku";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo '<tr>';
                                    echo '<td>'.$row->judul.'</td>';
                                    echo '<td>'.$row->pengarang.'</td>';
                                    echo '<td>'.$row->penerbit.'</td>';
                                    echo '<td>'.$row->kategori.'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br> <?php include('./footer_pengunjung.php');?> 
        <script type="text/javascript">
            $(document).ready(function() {
            $('#example').DataTable();
            } );
    </script>
    </body>
</html>