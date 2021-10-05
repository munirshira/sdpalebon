
        <?php 
            require_once('./db_login.php');
        ?>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

	///////////////// fixed menu on scroll for desctop
    if ($(window).width() > 992) {
        
        var navbar_height =  $('.navbar').outerHeight();

        $(window).scroll(function(){  
            if ($(this).scrollTop() > 300) {
				 $('.navbar-wrap').css('height', navbar_height + 'px');
                 $('#navbar_top').addClass("fixed-top");
                 
            }else{
                $('#navbar_top').removeClass("fixed-top");
                $('.navbar-wrap').css('height', 'auto');
            }   
        });
    } // end if

	
}); // jquery end
</script>
        <div class="container" style="margin-top: 2%; margin-bottom:2%;">
            <div class="row justify-content-center">
                <div class="col" style="text-align: right;">
                    <img src="images/Lambang_Kota_Semarang.png" style="width: 35%;">
                </div>
                <div class="col-auto" style="text-align:center;">
                    <h3 style="font-size:2vw;">SEKOLAH DASAR NEGERI PALEBON 02 KOTA SEMARANG</h3>
                    <p style="font-size: 2vw;">Jl. Pedurungan Tengah IV, Semarang, Jawa Tengah</p>
                </div>
                <div class="col" style="text-align: left;">
                    <img src="images/sd-negeri-palebon-02-semarang-200x160 (2).jpg" style="width: 40%;">
                </div>
            </div>
        </div>
        
        <div class="navbar-wrap">
        <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-primary">
            <pre>   </pre>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" id="home" href="home_pengunjung.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tentang Kami</a>
                        <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item bg-primary" id="vm" href="visimisi.php" style="color: white;">Profil Sekolah</a>
                        <a class="dropdown-item bg-primary" id="tp" href="guru.php" style="color: white;">Tenaga Pengajar</a>
                        <a class="dropdown-item bg-primary" id="ekstrakulikuler" href="ekstrakurikuler.php" style="color: white;">Ekstrakurikuler</a>
                        <a class="dropdown-item bg-primary" id="fasilitas" href="fasilitas.php" style="color: white;">Fasilitas</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="berita" href="berita.php">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="prestasi" href="prestasi.php">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="perpus" href="daftar_buku.php">Daftar Buku</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Informasi Sekolah</a>
                        <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item bg-primary" id="jadwal_pelajaran" href="jadwal_pelajaran.php" style="color: white;">Jadwal Pelajaran</a>
                        <a class="dropdown-item bg-primary" id="jadwal_kegiatan" href="jadwal_kegiatan.php" style="color: white;">Jadwal Kegiatan</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ppd" href="ppd.php">PPD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="data_alumni" href="data_alumni.php">Data Alumni</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="GET" action="search_pengunjung.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" required>
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                <pre>   </pre>
                </form>
            </div>
        </nav>
        </div>