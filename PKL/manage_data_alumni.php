<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Manage Data Alumni</title>

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
                            <a class="nav-link">Manage Data Alumni</a>
                        </li>
                    </ul>
                    
                </div>
            </nav>
            <?php
                if(isset($_GET['valid'])){
                    $valid = $_GET['valid'];
                    if($valid == "setuju"){
                        echo'<div class="alert alert-primary alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Alumni berhasil disetujui.
                        </div>';
                    }elseif($valid == "hapus"){
                        echo'<div class="alert alert-secondary alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Alumni berhasil dihapus.
                        </div>';
                    }elseif($valid == "reset"){
                        echo'<div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Alumni berhasil direset.
                        </div>';
                    }
                }
            ?>
                <a class="btn btn-success btn-sm" href="Convert_excel.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"/>
</svg> Cetak Excel</a>
                <a class="btn btn-danger btn-sm" href="Convert_pdf.php" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
  <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
</svg> Cetak PDF</a>
                <a class="btn btn-info btn-sm" href="catatan_alumni.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
  <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg> Catatan Data Alumni</a>
                <br><br>
					<table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
						<tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Tahun</th>
                            <th>Status</th>
                            <th>Action</th>
						</tr>
                        </thead>
                        <tbody>
                        <?php 
                            $query = mysqli_query($db, "SELECT * FROM alumni ORDER BY tahun DESC,nama_alumni DESC");
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($query)) 
                            {
                            ?>
                                <tr>
                                <td><img src="images/<?php echo $data['foto_alumni']; ?>" alt="alumni" style="width: 100px; height: 100px; object-fit:cover"></td>
                                <td><?php echo $data['nama_alumni']; ?></td>
                                <td><?php echo $data['tahun']; ?></td>
                                <td><?php echo $data['auth']; ?></td>               
                                <td>
                                    <!-- Button untuk modal -->
                                    <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_alumni']; ?>">Info Lengkap</a>
                                    <a class="btn btn-primary btn-sm <?php if($data['auth'] == "Sudah Disetujui"){ echo "disabled";} ?>" href="setuju_alumni.php?id=<?php echo $data['id_alumni'];?>">Setujui</a>
                                    <a class="btn btn-secondary btn-sm <?php if($data['auth'] == "Belum Disetujui"){ echo "disabled";} ?>" href="reset_alumni.php?id=<?php echo $data['id_alumni'];?>">Reset</a>
                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus alumni ini?')" href="delete_alumni.php?id=<?php echo $data['id_alumni'];?>">Delete</a>
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
                "order": [[ 3, "desc" ]]
            });
        } );
    </script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</body>

</html>