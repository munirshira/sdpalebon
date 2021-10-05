<!DOCTYPE html>
<html>
    <head>
        <title>Data Alumni</title>
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
            #data_alumni{
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
                <h1><b>DATA ALUMNI</b></h1>
                <p><a href="home_pengunjung.php">Home</a> / Data Alumni</p>
                <br>
                <br>
            </div>
        </div>
        <br>
        <br>
            <div style="margin-left: 10%; margin-right:10%;">
                <a href="add_alumni.php" type="button" class="btn btn-primary btn-md">Mendaftarkan Alumni</a><br /><br />
					<table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
						<tr>
                            <th>Foto</th>
                            <th>Nama</th>
							<th>Tahun</th>
                            <th>Action</th>
						</tr>
                        </thead>
                        <tbody>
                        <?php 
                            $query = mysqli_query($db, "SELECT * FROM alumni WHERE auth = 'Sudah Disetujui'");
                            while ($data = mysqli_fetch_assoc($query)) 
                            {
                            ?>
                                <tr>
                                <td><img src="images/<?php echo $data['foto_alumni']; ?>" alt="alumni" style="width: 200px; height: 100px; object-fit:cover"></td>
                                <td><?php echo $data['nama_alumni']; ?></td>
                                <td><?php echo $data['tahun']; ?></td>
                                <td>
                                    <!-- Button untuk modal -->
                                    <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_alumni']; ?>">Info Lengkap</a>
                                </td>
                                </tr>
                                <!-- Modal Edit Mahasiswa-->
                                <div class="modal fade bd-example-modal-lg" id="myModal<?php echo $data['id_alumni']; ?>" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Info Alumni</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                    </div>
                                    <div class="modal-body">
                                            <?php
                                                $id = $data['id_alumni'];
                                                $query_edit = mysqli_query($db, "SELECT * FROM alumni WHERE id_alumni='$id'");
                                                while ($row = mysqli_fetch_array($query_edit)) {  
                                            ?>
                                            <div style="text-align: center;">
                                                <img src="images/<?php echo $row['foto_alumni'];?>" style="width: 250px; height: 250px; object-fit:cover;"><br><br>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-2">
                                                        Nama  
                                                    </div>
                                                    <div class="col">
                                                        : <?php echo $row['nama_alumni'];?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">
                                                        Alamat   
                                                    </div>
                                                    <div class="col">
                                                        : <?php echo $row['alamat_alumni'];?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">
                                                        No. Telp 
                                                    </div>
                                                    <div class="col">
                                                        : <?php echo $row['telp'];?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">
                                                        Tahun Lulus   
                                                    </div>
                                                    <div class="col">
                                                        : <?php echo $row['tahun'];?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">
                                                        Profesi 
                                                    </div>
                                                    <div class="col">
                                                        : <?php echo $row['kerja'];?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <?php 
                                            }
                                            ?>
                                                
                                    </div>
                                    </div>
                                </div>
                                </div>
                            <?php               
                            } 
                            ?>
                        </tbody>
                    </table>
            </div>
        <br> <?php include('./footer_pengunjung.php');?> 
        <script type="text/javascript">
            $(document).ready(function() {
            $('#example').DataTable();
            } );
        </script>
    </body>
</html>