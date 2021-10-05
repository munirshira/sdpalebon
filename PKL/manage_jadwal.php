<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Jadwal</title>

      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="bootstrap-4.5.2-dist/jquery.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <style>
        .card-body{
            text-align: center;
        }

        .card:hover {
            box-shadow: 0 10px 30px 0 rgba(0,0,0,0.2);
            transition: 0.5s;
        }
        
    </style>
</head>

<body>
    <?php   
        session_start();
        require_once('./db_login.php');
        $query = "SELECT * FROM akun WHERE username = '".$_SESSION['username']."'";
        $result = $db->query($query);
        if(!$result){
            die("Could not query the database: <br/>". $db->error);
        }else{
            while($row = $result->fetch_object()){
                $nama_admin = $row->nama_admin;
            }
        }
        if (!isset($_SESSION['username'])){
            header('Location: login_admin.php');
        }
    ?>    
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>SDN Palebon 02 Semarang</h4>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
                <li>
                    <a href="#tmSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tentang Kami</a>
                    <ul class="collapse list-unstyled" id="tmSubmenu">
                        <li>
                            <a href="manage_carousel.php">Carousel</a>
                        </li>
                        <li>
                            <a href="manage_visimisi.php">Visi Misi</a>
                        </li>
                        <li>
                            <a href="manage_sambutan.php">Sambutan</a>
                        </li>
                        <li>
                            <a href="manage_pengajar.php">Pengajar</a>
                        </li>
                        <li>
                            <a href="manage_fasilitas.php">Fasilitas</a>
                        </li>
                        <li>
                            <a href="manage_ekstrakurikuler.php">Ekstrakurikuler</a>
                        </li>
                        <li>
                            <a href="manage_buku.php">Buku</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#postSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Posting</a>
                    <ul class="collapse list-unstyled" id="postSubmenu">
                        <li>
                            <a href="manage_berita.php">Berita</a>
                        </li>
                        <li>
                            <a href="manage_prestasi.php">Prestasi</a>
                        </li>
                        <li>
                            <a href="manage_PPD.php">PPD</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="manage_data_alumni.php">Data Alumni</a>
                </li>
                <li class="active">
                    <a href="#jadwalSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Jadwal</a>
                    <ul class="collapse list-unstyled" id="jadwalSubmenu">
                        <li>
                            <a href="manage_jadwal.php">Jadwal Pelajaran</a>
                        </li>
                        <li>
                            <a href="manage_jadwal_kegiatan.php">Jadwal Kegiatan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#passSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Password</a>
                    <ul class="collapse list-unstyled" id="passSubmenu">
                        <li>
                            <a href="ubah_password.php">Ubah Password</a>
                        </li>
                        <li>
                            <a href="reset_password.php">Reset Password</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <p style="font-size: small; text-align:center;">Selamat datang <?php echo $nama_admin; ?></p>
                </li>
                <li>
                    <a href="logout_admin.php" class="article">Logout</a>
                </li>
            </ul>
        </nav>


        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Tombol Navigasi</span>
                    </button>

                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link">Manage Jadwal</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <?php
                if(isset($_GET['valid'])){
                    $valid = $_GET['valid'];
                    if($valid == "edit true"){
                        echo'<div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Jadwal berhasil diubah.
                        </div>';
                    }elseif($valid == "edit false"){
                        echo '<div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Failed!</strong> Jadwal gagal diubah. 
                        </div>';
                    }elseif($valid == "add true"){
                        echo'<div class="alert alert-primary alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Jadwal berhasil ditambahkan.
                        </div>';
                    }elseif($valid == "add false"){
                        echo '<div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Failed!</strong> Jadwal gagal ditambahkan. 
                        </div>';
                    }elseif($valid == "delete true"){
                        echo'<div class="alert alert-secondary alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Jadwal berhasil dihapus.
                        </div>';
                    }elseif($valid == "delete false"){
                        echo '<div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Failed!</strong> Jadwal gagal dihapus. 
                        </div>';
                    }
                }
            ?>
            <a href="#" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModaladdjadwal">Tambahkan Jadwal</a><br /><br />
					<table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
						<tr>
                            <th>Hari</th>
                            <th>Jam</th>
							<th>Mata Pelajaran</th>
							<th>Kelas</th>
                            <th>Pengajar</th>
                            <th>Action</th>
						</tr>
                        </thead>
                        <tbody>
                        <?php 
                            $query = mysqli_query($db, "SELECT * FROM jadwal JOIN guru ON id_pengajar=id_guru ORDER BY kelas,jam");
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($query)) 
                            {
                            ?>
                                <tr>
                                <td><?php echo $data['hari']; ?></td>
                                <td><?php echo $data['jam']; ?></td>
                                <td><?php echo $data['mapel']; ?></td>
                                <td><?php echo $data['kelas']; ?></td>
                                <td><?php echo $data['nama_guru']; ?></td>
                                <td>
                                    <!-- Button untuk modal -->
                                    <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_jadwal']; ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus jadwal ini?')" href="delete_jadwal.php?id=<?php echo $data['id_jadwal'];?>">Delete</a>
                                </td>
                                </tr>
                                <!-- Modal Edit Mahasiswa-->
                                <div class="modal fade bd-example-modal-lg" id="myModal<?php echo $data['id_jadwal']; ?>" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Edit Jadwal</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="edit_jadwal.php" method="get">
                                            <?php
                                            $id = $data['id_jadwal'];
                                            $hari = $data['hari'];
                                            $id_pengajar = $data['id_pengajar'];
                                            $query_edit = mysqli_query($db, "SELECT * FROM jadwal WHERE id_jadwal='$id'");
                                            while ($row = mysqli_fetch_array($query_edit)) {  
                                            ?>
                                            <input type="hidden" name="id_jadwal" value="<?php echo $row['id_jadwal']; ?>">
                                            <div class="form-group">
                                            <label>Hari :</label>
                                            <select class="form-control" id="hari" name="hari" required>
                                                <option value="" disabled>Pilih Hari</option>
                                                <option value="Senin" <?php if($hari == 'Senin') echo 'selected'; ?>>Senin</option>
                                                <option value="Selasa" <?php if($hari == 'Selasa') echo 'selected'; ?>>Selasa</option>
                                                <option value="Rabu" <?php if($hari == 'Rabu') echo 'selected'; ?>>Rabu</option>
                                                <option value="Kamis" <?php if($hari == 'Kamis') echo 'selected'; ?>>Kamis</option>
                                                <option value="Jumat" <?php if($hari == 'Jumat') echo 'selected'; ?>>Jumat</option>
                                                <option value="Sabtu" <?php if($hari == 'Sabtu') echo 'selected'; ?>>Sabtu</option>
                                            </select>  
                                            </div>
                                            <div class="form-group">
                                            <label>Jam :</label>
                                            <input type="text" name="jam" class="form-control" value="<?php echo $row['jam']; ?>" required>      
                                            </div>
                                            <div class="form-group">
                                            <label>Mata Pelajaran :</label>
                                            <input type="text" name="mapel" class="form-control" value="<?php echo $row['mapel']; ?>" required>      
                                            </div>
                                            <div class="form-group">
                                            <label>Kelas :</label>
                                            <input type="text" name="kelas" class="form-control" value="<?php echo $row['kelas']; ?>" required>      
                                            </div>
                                            <div class="form-group">
                                            <label>Pengajar :</label>
                                            <select class="form-control" id="pengajar" name="pengajar" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required>
                                                <option value="" disabled>Pilih Pengajar</option>
                                            <?php
                                                $sql = "SELECT * FROM guru";
                                                $result = mysqli_query($db,$sql);
                                                if (!$result){
                                                    die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                                }else{
                                                    while ($row = $result->fetch_object()){
                                                        if($row->id_guru == $id_pengajar){
                                                            echo '<option value="'.$row->id_guru.'" selected>'.$row->nama_guru.'</option>';
                                                        }else{
                                                            echo '<option value="'.$row->id_guru.'">'.$row->nama_guru.'</option>';
                                                        }
                                                        
                                                    }
                                                }
                                            ?>
                                            </select>  
                                            </div>
                                            <div class="modal-footer">  
                                            <button type="submit" class="btn btn-success">Update</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            <?php 
                                            }
                                            ?>        
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            <?php               
                            } 
                            ?>
                        </tbody>
                    </table>
                <div class="modal fade bd-example-modal-lg" id="myModaladdjadwal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambahkan Jadwal</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>   
                    </div>
                    <div class="modal-body">
                        <form role="form" action="add_jadwal.php" method="get">
                            <div class="form-group">
                            <label>Hari :</label>
                            <select class="form-control" id="hari" name="hari" required>
                                <option value="" disabled selected>Pilih Hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>  
                            </div>
                            <div class="form-group">
                            <label>Jam :</label>
                            <input type="text" name="jam" class="form-control" placeholder="Contoh : 07:00-09:00" required>  
                            </div>
                            <div class="form-group">
                            <label>Mata Pelajaran :</label>
                            <input type="text" name="mapel" class="form-control" required>  
                            </div>
                            <div class="form-group">
                            <label>Kelas :</label>
                            <input type="text" name="kelas" class="form-control" required>  
                            </div>
                            <div class="form-group">
                            <label>Pengajar :</label>
                            <select class="form-control" id="pengajar" name="pengajar" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required>
                                <option value="" disabled selected>Pilih Pengajar</option>
                            <?php
                                $sql = "SELECT * FROM guru";
                                $result = mysqli_query($db,$sql);
                                if (!$result){
                                    die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                                }else{
                                    while ($row = $result->fetch_object()){
                                        echo '<option value="'.$row->id_guru.'">'.$row->nama_guru.'</option>';
                                    }
                                }
                            ?>
                            </select>  
                            </div>
                            <div class="modal-footer">  
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>       
                        </form>
                    </div>
                    </div>
                </div>
                </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [[ 3, "asc" ]]
            });
        } );
    </script>
</body>

</html>