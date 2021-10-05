<!DOCTYPE html>
<html>
    <head>
        <title>Mendaftarkan Alumni</title>
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
            #data_alumni{
                color: white;
            }
            body, html {
                height: 100%;
                margin: 0;
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
            .nav-pills .nav-item .active {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
            }
            .error{
                color: red;
                font-size: 12px;
            }
        </style>
    </head>
    <body>
        
        <?php   
            require_once('./db_login.php');
            if(isset($_POST['upload'])){
            
                $valid = TRUE; //flag validasi
                $nama = $_POST['nama'];
                if ($nama == '') {
                    $error_nama = "*Nama Harap Diisi";
                    $valid = FALSE;
                }

                $alamat = $_POST['text'];
                if($alamat == ''){
                    $valid = FALSE;
                    $error_alamat = "*Alamat Harap Diisi";
                }

                $telp = $_POST['telp'];
                if($telp == ''){
                    $valid = FALSE;
                    $error_telp = "*No. Telp/HP Harap Diisi";
                }elseif(strlen($telp) < 10){
                    $valid = FALSE;
                    $error_telp = "*No. Telp/HP Tidak boleh kurang dari 10";
                }elseif(strlen($telp) > 13){
                    $valid = FALSE;
                    $error_telp = "*No. Telp/HP Tidak boleh lebih dari 13";
                }

                $tahun = $_POST['tahun'];
                if($tahun == ''){
                    $valid = FALSE;
                    $error_tahun = "*Tahun Angkatan Harap Diisi";
                }

                $kerja = $_POST['kerja'];
                if($kerja == ''){
                    $valid = FALSE;
                    $error_kerja = "*Pekerjaan Harap Diisi";
                }

                

                $temp = explode(".", $_FILES["image"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                $target = "images/".$newfilename;	 
                $file_gambar = $_FILES['image']['name'];
                if($file_gambar == ''){
                    $valid = FALSE;
                    $error_foto = "*Foto Harap Diisi";
                }

                if($valid){
                    $query = "INSERT INTO alumni (id_alumni, nama_alumni, alamat_alumni, telp, tahun, kerja, foto_alumni, auth) VALUES (NULL, '".$nama."', '".$alamat."', '".$telp."', '".$tahun."', '".$kerja."','".$newfilename."','Belum Disetujui')";
                    $result = $db->query($query);
                    if(!$result){
                        die("Could not query the database: <br/>". $db->error);
                    }else{
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                            $msg = "Post upload success";
                            $db->close();
                            echo("<script>location.href = 'makasih.php';</script>");
                            }
                        else{
                            $msg = "There was a problem uploading image";
                        }
                    }
                }
            }
        ?>

        <?php include('./header_pengunjung.php');?><br>
        <br><br>
        <br>
        <div class="card" style="margin-left: 10%; margin-right:10%;">
            <div class="card-header">
                <h3 style="text-align: center;">Form Pendataan Alumni</h3>
            </div>
            <div class="card-body">
                <form id="form" method="post" enctype="multipart/form-data" action="add_alumni.php">
                    <div class="form-group">
                        <label for="judul">Nama :</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?php if(isset($nama)) {echo $nama;} ?>">
                        <div class="error"><?php if(isset($error_nama)) echo $error_nama; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="text">Alamat :</label>
                        <textarea class="form-control" type="text" name="text" rows="6"><?php if(isset($alamat)) {echo $alamat;} ?></textarea>
                        <div class="error"><?php if(isset($error_alamat)) echo $error_alamat; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="judul">No.Telp/HP :</label>
                        <input type="number" class="form-control" name="telp" id="telp" value="<?php if(isset($telp)) {echo $telp;} ?>">
                        <div class="error"><?php if(isset($error_telp)) echo $error_telp; ?></div>
                    </div>
                    <div class="form-group">
                        <label>Tahun Angkatan:</label>
                        <?php
                            // Sets the top option to be the current year. (IE. the option that is chosen by default).
                            // Year to start available options at
                            $earliest_year = 1950; 
                            // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                            $latest_year = date('Y'); 

                            print '<select class="form-control" id="tahun" name="tahun" required>';
                            // Loops over each int[year] from current year, back to the $earliest_year [1950]
                            foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                // Prints the option with the next year in range.
                                if($i == $tahun){
                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                }else{
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            }
                            print '</select>';
                        ?>  
                    </div>
                    <div class="form-group">
                        <label for="judul">Pekerjaan :</label>
                        <input type="text" class="form-control" name="kerja" id="kerja" value="<?php if(isset($kerja)) {echo $kerja;} ?>">
                        <div class="error"><?php if(isset($error_kerja)) echo $error_kerja; ?></div>
                    </div>
                    <p>Foto :</p>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="image">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <div class="error"><?php if(isset($error_foto)) echo $error_foto; ?></div>
                    </div>
                    <br><br>
                    <p>*Note : Data yang diinput akan melalui persetujuan admin dahulu untuk ditampilkan</p>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-primary" name="upload" value="upload image">Submit</button>
                        <a href="data_alumni.php" class="btn btn-secondary">Cancel</a>
                    </div>
                 </form>
            </div>
        </div>
        <br><br><br>
        <br> <?php include('./footer_pengunjung.php');?>
        <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script> 
    </body>
</html>