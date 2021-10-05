<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Catatan Data Alumni</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css">
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
                $id_admin = $row->id_admin;
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
                <li class="active">
                    <a href="manage_data_alumni.php">Data Alumni</a>
                </li>
                <li>
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
                            <a class="nav-link">Catatan Data Alumni</a>
                        </li>
                    </ul>
                    
                </div>
            </nav>
            <?php
                if(isset($_GET['valid'])){
                    $valid = $_GET['valid'];
                    if($valid == "terdaftar"){
                        echo'<div class="alert alert-info alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Catatan alumni telah terdaftar.
                        </div>';
                    }elseif($valid == "delete true"){
                        echo'<div class="alert alert-secondary alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Catatan alumni berhasil dihapus.
                        </div>';
                    }elseif($valid == "reset"){
                        echo'<div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Catatan alumni telah direset.
                        </div>';
                    }elseif($valid == "edit true"){
                        echo'<div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Catatan alumni berhasil diedit.
                        </div>';
                    }elseif($valid == "add true"){
                        echo'<div class="alert alert-primary alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Catatan alumni berhasil ditambahkan.
                        </div>';
                    }
                }
            ?>
                <a href="#" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModaladdbuku">Tambahkan Catatan Alumni</a><br /><br />
					<table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
						<tr>
                            <th>Nama</th>
                            <th>Angkatan</th>
							<th>Status</th>
                            <th>Action</th>
						</tr>
                        </thead>
                        <tbody>
                        <?php 
                            $query = mysqli_query($db, "SELECT * FROM catatan_alumni ORDER BY status DESC");
                            while ($data = mysqli_fetch_assoc($query)) 
                            {
                            ?>
                                <tr>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['angkatan']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                                <td>
                                    <!-- Button untuk modal -->
                                    <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_catat']; ?>">Edit</a>
                                    <a class="btn btn-info btn-sm <?php if($data['status'] == "Sudah Terdaftar"){ echo "disabled";} ?>" href="terdaftar_catat.php?id=<?php echo $data['id_catat'];?>">Terdaftar</a>
                                    <a class="btn btn-secondary btn-sm <?php if($data['status'] == "Belum Terdaftar"){ echo "disabled";} ?>" href="reset_catat.php?id=<?php echo $data['id_catat'];?>">Reset</a>
                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus catatan alumni ini?')" href="delete_catat.php?id=<?php echo $data['id_catat'];?>">Delete</a>
                                </td>
                                </tr>
                                <!-- Modal Edit Mahasiswa-->
                                <div class="modal fade bd-example-modal-lg" id="myModal<?php echo $data['id_catat']; ?>" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Edit Catatan Alumni</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="edit_catat.php" method="get">
                                            <?php
                                            $id = $data['id_catat'];
                                            $query_edit = mysqli_query($db, "SELECT * FROM catatan_alumni WHERE id_catat='$id'");
                                            while ($row = mysqli_fetch_array($query_edit)) {  
                                            ?>
                                            <input type="hidden" name="id_catat" value="<?php echo $row['id_catat']; ?>">
                                            
                                            <div class="form-group">
                                            <label>Nama :</label>
                                            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>      
                                            </div>
                                            <div class="form-group">
                                            <label>Angkatan :</label>
                                            <?php
                                                // Sets the top option to be the current year. (IE. the option that is chosen by default).
                                                // Year to start available options at
                                                $earliest_year = 1950; 
                                                // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                                                $latest_year = date('Y'); 

                                                print '<select class="form-control" id="angkatan" name="angkatan" required>';
                                                // Loops over each int[year] from current year, back to the $earliest_year [1950]
                                                foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                                    // Prints the option with the next year in range.
                                                    if($i == $row['angkatan']){
                                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                    }else{
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                }
                                                print '</select>';
                                            ?>    
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
                <div class="modal fade bd-example-modal-lg" id="myModaladdbuku" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambahkan Catatan Alumni</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>   
                    </div>
                    <div class="modal-body">
                        <form role="form" action="add_catat.php" method="get">
                            <div class="form-group">
                            <label>Nama :</label>
                            <input type="text" name="nama" class="form-control" required>  
                            </div>
                            <div class="form-group">
                            <label>Angkatan :</label>
                            <?php
                                // Sets the top option to be the current year. (IE. the option that is chosen by default).
                                // Year to start available options at
                                $earliest_year = 1950; 
                                // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                                $latest_year = date('Y'); 

                                print '<select class="form-control" id="angkatan" name="angkatan" required>';
                                // Loops over each int[year] from current year, back to the $earliest_year [1950]
                                foreach ( range( $latest_year + 1, $earliest_year ) as $i ) {
                                    // Prints the option with the next year in range.
                                    if($i > $latest_year){
                                        echo '<option value="" selected disabled>Pilih Angkatan</option>';
                                    }else{
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                }
                                print '</select>';
                            ?> 

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
                "order": [[ 1, "desc" ]]
            });
        } );
    </script>
</body>

</html>