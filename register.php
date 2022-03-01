<?php

session_start();

require_once "connection.php";

//space kosong
if (empty($_SESSION["error"])) {
	$s_error = "";
} else {
	$s_error = $_SESSION["error"];
	$_SESSION["error"] = "";
}
if (empty($_SESSION["warning"])) {
	$s_warning = "";
} else {
	$s_warning = $_SESSION["warning"];
	$_SESSION["warning"] = "";
}
if (empty($_SESSION["info"])) {
	$s_info = "";
} else {
	$s_info = $_SESSION["info"];
	$_SESSION["info"] = "";
}
if (empty($_SESSION["success"])) {
	$s_success = "";
} else {
	$s_success = $_SESSION["success"];
	$_SESSION["success"] = "";
}

$e_tot = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $adminRole = "Admin"; // edited!
  $userRole = "User";
  if (empty($_POST["nama"])) {
    $s_error = "Nama tidak boleh kosong!";
	$e_tot += 1;
  } else {
    $nama = saring($_POST["nama"]);
    // check if nama only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
      $s_info .= "\n Nama hanya boleh mengandung huruf.";
	  $e_tot += 1;
    }
  }

  if (empty($_POST["username"])) {
    $s_error .= "Username tidak boleh kosong!";
	$e_tot += 1;
  } else {
    $username = saring($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$username)) {
      $s_info = "\n Username hanya boleh mengandung huruf dan angka.";
	  $e_tot += 1;
    }
  }

  if (empty($_POST["email"])) {
    $s_error .= "\n Email harus diisi!";
	$e_tot += 1;
  } else {
    $email = saring($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $s_error .= "\n Email tidak benar.";
	  $e_tot += 1;
    }
  }
  
  if ((empty($_POST["password"])) && (empty($_POST["password2"]))) {
    $s_error .= "\n Password harus diisi!";
	$e_tot += 1;
  } else {
    $password = saring($_POST["password"]);
	$password2 = saring($_POST["password2"]);
	if ($password === $password2) {
		$paswd = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
	} else {
		$s_error .= "\n Ulangi password anda yang sama!";
		$e_tot += 1;
	}
  }

  
  if ($e_tot == 0) {
	try {
		// prepare sql and bind parameters
		$stmt = $connection->prepare("INSERT INTO pengguna (kategori, username, paswd, email, nama)
		VALUES (:kategori, :username, :paswd, :email, :nama)");
		$stmt->bindValue(':kategori', $adminRole);
		$stmt->bindValue(':username', $username);
		$stmt->bindValue(':paswd', $paswd);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':nama', $nama);
		$stmt->execute();

		$s_success = "\n Akun berhasil didaftarkan, silakan login.";
	}
	catch(PDOException $e) {
		$s_error = "\n " . $e->getMessage();
	}
  }
}

$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Predictive Maintenance (PdM)"/>
        <meta name="author" content="Sari Technology"/>
        <title>Register - PdM</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
      <!-- SVG Sample  -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>
      <!-- End -->
      <!-- Alert -->
   
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <!-- Alert -->
                            <div class="col-lg-7">
                            <?php 
                               if ($s_success !== "") { ?>
                                 <div class="alert alert-success alert-redirect d-flex align-items-center" role="alert" id="alert">
                                   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                   <div>
                                     <?php echo $s_success; ?>
                                     </div>
                                   </div>
                                   <?php }
                                   if ($s_info !== "") { ?>
                                   <div class="alert alert-info alert-notif d-flex align-items-center" role="alert"id="alert">
                                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <?php echo $s_info; ?>
                                   </div>
                                 <?php } if ($s_warning !== "") { ?>
                                   <div class="alert alert-warning alert-notif d-flex align-items-center" role="alert"id="alert">
                                   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                   <div>
                                     <?php echo $s_warning; ?>
                                   </div>
                                 </div>
                                   <?php } if ($s_error !== "") { ?>
                                     <div class="alert alert-danger  alert-notif d-flex align-items-center" role="alert"id="alert">
                                       <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                       <div>
                                          <?php 
                                            echo $s_error; ?>
                                         </div>
                                     </div>
                                     <?php }?>
                                <!-- Basic registration form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <!-- Registration form-->
                                        <form action="register.php" method="post">
                                            <!-- Form Row-->
                                            <div class="row gx-3">
                                                <div class="col-md-12">
                                                    <!-- Form Group (first name)-->
                                                    <div class="mb-12">
                                                        <label class="small mb-1" for="nama">Name</label>
                                                        <input class="form-control" name = "nama" id="name" type="text" placeholder="Enter first name" required autocomplete="off"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row gx-3">
                                                <div class="col-md-12">
                                                    <!-- Form Group (first name)-->
                                                    <div class="mb-12">
                                                        <label class="small mb-1" for="username">Username</label>
                                                        <input class="form-control" name="username" id="username" type="text" placeholder="Enter first name" required autocomplete="off"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- Form Group (email address)            -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control" name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required autocomplete="off"/>
                                            </div>
                                            <br>
                                            <!-- Form Row    -->
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <!-- Form Group (password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="password">Password</label>
                                                        <input class="form-control" name = "password" id="inputPassword" type="password" placeholder="Enter password" required autocomplete="off"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Form Group (confirm password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="password2">Confirm Password</label>
                                                        <input class="form-control" name="password2" id="inputConfirmPassword" type="password" placeholder="Confirm password" required autocomplete="off"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- Form Group (create account submit)-->
                                            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer-admin mt-auto footer-dark">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; PT SARI TEKNOLOGI 2022</div>
                            <div class="col-md-6 text-md-end small">
                                <a href="#!">Privacy Policy</a>
                                &middot;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/index.js" ></script>
        
        <script>
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
          });
          }, 2000);
          </script>
    </body>
</html>
