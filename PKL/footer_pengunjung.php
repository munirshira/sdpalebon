<div class="footer" style="background-color: black; background-size: cover; color: white;">
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div style="margin-left: 4%; margin-right: 4%">
                    <h5><b>Ikuti Kami</b></h5>
                    <p style=" margin-top: 10px; border: 2px solid blue;"></p>
                    <a href="https://www.instagram.com/sdnpalebon2/" target="blank" style="margin-right: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16" style="color: white;">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/channel/UCVBB1u2BxnAC3RQV0VSbmsQ" target="blank"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16" style="color: white;">
                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                        </svg>
                    </a>
                    <?php
                        $query = "INSERT INTO visit (id_visit,tgl_visit) VALUES(NULL,NOW()) ";
                        $result = $db->query($query);
                        if(!$result){
                            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
                        }
                    ?>
                    <br>
                    <br>
                    
                    <h5><b>Jumlah Pengunjung</b></h5>
                    <p style=" margin-top: 10px; border: 2px solid blue;"></p>
                    <span>
                        <?php
                            $hari = date("Y-m-d");
                            $sql = "SELECT count(*) AS jumlah FROM visit WHERE tgl_visit = '$hari'";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo '<b>Jumlah Pengunjung Hari Ini : </b>'.$row->jumlah.'';
                                }
                            }
                        ?>
                        <?php
                            $bulan = date("m");
                            $sql = "SELECT count(*) AS jumlah FROM visit WHERE MONTH(tgl_visit) = '$bulan'";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo '<br><b>Jumlah Pengunjung Bulan Ini : </b>'.$row->jumlah.'';
                                }
                            }
                        ?>
                        <?php
                            $tahun = date("Y");
                            $sql = "SELECT count(*) AS jumlah FROM visit WHERE YEAR(tgl_visit) = '$tahun'";
                            $result = mysqli_query($db,$sql);
                            if (!$result){
                                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$sql);
                            }else{
                                while ($row = $result->fetch_object()){
                                    echo '<br><b>Jumlah Pengunjung Tahun Ini : </b>'.$row->jumlah.'';
                                }
                            }
                        ?>
                    </span>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
            <div class="col-sm">
                <div style="margin-left: 4%; margin-right: 4%">
                    <h5><b>Kontak Kami</b></h5>
                    <p style=" margin-top: 10px; border: 2px solid blue;"></p>
                    <span><b>SEKOLAH DASAR NEGERI PALEBON 02 SEMARANG</b>
                    <br>Jl. Pedurungan Tengah IV, Semarang, Jawa Tengah
                    <br><b>Telepon : </b>(024) 6720905
                    <br><b>Email : </b>palebonkaleh@gmail.com</span>
                    
                    <br>
                    <br>
                    <br>
                </div>
            </div>
            <div class="col-sm">
                <div style="margin-left: 4%; margin-right: 4%">
                    <h5><b>Google Maps</b></h5>
                    <p style=" margin-top: 10px; border: 2px solid blue;"></p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0151086216374!2d110.46816631403334!3d-7.007503394938083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708cfe0f9f47fd%3A0xbaa9acd1ba100bcb!2sSD%20Negeri%20Palebon%202!5e0!3m2!1sid!2sid!4v1612292856556!5m2!1sid!2sid" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
        <br>
        <p style="color: lightgrey; text-align:center;">Copyright &copy; SDN Palebon 02 Semarang Dikelola Oleh <a href="login_admin.php" style="color: lightgrey;">Admin</a></p>
        <br>
    </div>
</div>

