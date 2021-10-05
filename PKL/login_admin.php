<!DOCTYPE html>
    <html>
        <head>
            <title>Login Admin</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Latest compiled and minified CSS -->
            <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <!-- jQuery library -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.4/umd/popper.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <style>
                body, html {
                    height: 100%;
                    margin: 0;
                }

                .bg::before {
                    content: "";
                    position: absolute;
                    width: 100%; height: 100%;
                    background-image: url(images/pal.jpg);
                    filter: blur(4px) opacity(30%);
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                }
                .card {
                    box-shadow: 0 10px 30px 0 rgba(0,0,0,0.2);
                    transition: 0.3s;
                }
            </style>
        </head>
        <body>
            
            <?php
                session_start(); //inisialisasi session
                if (isset($_SESSION['username'])){
                    header('Location: dashboard.php');
                }
                require_once('./db_login.php');

                //cek apakah user sudah submit form
                if(isset($_POST["submit"])){
                    $valid = TRUE; //flag validasi
                    //cek validasi email
                    $username = $_POST['username'];
                    if($username == ''){
                        $error_username = "Username harap diisi";
                        $valid = FALSE;
                    }
                    //cek validasi password
                    $password = $_POST['password'];
                    if($password == ''){
                        $error_password = "Password harap diisi";
                        $valid = FALSE;
                    }

                    //cek validasi
                    if($valid){
                        //Assign a query
                        $query =  "SELECT * FROM akun WHERE username = '".$username."' AND password ='".md5($password)."' ";
                        //Execute the query
                        $result = $db->query($query);
                        if(!$result){
                            die ("Could not query the database: <br/>".$db->error);
                        }else{
                            if($result->num_rows > 0){
                                $_SESSION['username'] = $username;
                                header('Location: dashboard.php');
                                exit;
                            }else{
                                
                                $error = "<b>Kombinasi dari Username dan Password tidak benar</b>";
                            }
                        }
                        //close db connection
                        $db->close();
                    }
                }

            ?>

            <div class="bg">
                <br>
                <div class="container">
                    <div class="row mt-4 justify-content-md-center">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <img src="images/sd-negeri-palebon-02-semarang-200x160.jpg" style="width: 120px; height: auto; display: block; margin-left: auto; margin-right: auto;">
                                    <h3 style="text-align: center;">Login Sebagai Admin</h3>
                                    <p style="font-size: 25px; text-align:center;">SDN Palebon 02 Semarang</p>
                                    <?php if(isset($error)) echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';?>
                                    <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" size="30" value="<?php if(isset($username)){ echo $username;}?>">
                                            <p style="color: red; font-size:small"><?php if(isset($error_username)) echo $error_username; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" value="">
                                            <p style="color: red; font-size:small"><?php if(isset($error_password)) echo $error_password; ?></p>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary btn-block py-2" name="submit" value="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer" style="text-align: center;">
                                    <a href="home_pengunjung.php" style="font-size: small;">&lt; Kembali ke Halaman Pengunjung</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </body>
    </html>