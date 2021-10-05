<!DOCTYPE html>
<html>
    <head>
        <title>Terima Kasih</title>
        <meta charset="utf-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv='refresh' content='20; URL=data_alumni.php'>
        <!-- Latest compiled and minified CSS -->
        <link rel="icon" href="favicon.ico" type="image/gif" sizes="20x16">
        <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="bootstrap-4.5.2-dist/jquery.min.js"></script>
        <script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.4/umd/popper.min.js"></script>
        <style>
        
        </style>
    </head>
    <body>
        <?php include('./header_pengunjung.php');?><br>
        <br><br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div style="text-align: center;">
                                <h4>Terima Kasih!</h4>
                                <p>Terima kasih sudah menyempatkan waktu untuk mengisi formulir data alumni tersebut, data akan ditampilkan ketika sudah disetujui oleh admin. Halaman ini akan secara otomatis mengarahkan anda ke halaman data alumni dalam</p>
                                <div id="countdown"></div>
                                <br>
                                <a href="data_alumni.php">Klik link ini jika halaman tidak segera berpindah</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <br> <?php include('./footer_pengunjung.php');?>
    </body>
    <script>
        var timeleft = 20;
        var downloadTimer = setInterval(function(){
        if(timeleft <= 0){
            clearInterval(downloadTimer);
            document.getElementById("countdown").innerHTML = "Finished";
        } else {
            document.getElementById("countdown").innerHTML = timeleft + " detik";
        }
        timeleft -= 1;
        }, 1000);
    </script>
</html>