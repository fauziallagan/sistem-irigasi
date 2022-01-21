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
  $kategori = "Admin";
	
  if (empty($_POST["nama"])) {
    $s_danger = "Nama tidak boleh kosong!";
	$e_tot += 1;
  } else {
    $nama = saring($_POST["nama"]);
    // check if nama only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
      $s_info = "\n Nama hanya boleh mengandung huruf.";
	  $e_tot += 1;
    }
  }

  if (empty($_POST["username"])) {
    $s_danger = "Username tidak boleh kosong!";
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
    $s_danger = "\n Email harus diisi!";
	$e_tot += 1;
  } else {
    $email = saring($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $s_danger = "\n Email tidak benar.";
	  $e_tot += 1;
    }
  }
  
  if ((empty($_POST["password"])) && (empty($_POST["password2"]))) {
    $s_danger = "\n Password harus diisi!";
	$e_tot += 1;
  } else {
    $password = saring($_POST["password"]);
	$password2 = saring($_POST["password2"]);
	if ($password === $password2) {
		$paswd = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
	} else {
		$s_danger = "\n Ulangi password anda yang sama!";
		$e_tot += 1;
	}
  }

  if ($e_tot == 0) {
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernamedb, $passworddb);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// prepare sql and bind parameters
		$stmt = $conn->prepare("INSERT INTO pengguna (kategori, username, paswd, email, nama)
		VALUES (:kategori, :username, :paswd, :email, :nama)");
		$stmt->bindValue(':kategori', $kategori);
		$stmt->bindValue(':username', $username);
		$stmt->bindValue(':paswd', $paswd);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':nama', $nama);
        // $stmt->bindParam(':kategori', $_REQUEST['kategori']);
        // $stmt->bindParam(':username', $_REQUEST['username']);
        // $stmt->bindParam(':pass', $_REQUEST['pass']);
        // $stmt->bindParam(':email', $_REQUEST['email']);
        // $stmt->bindParam(':nama', $_REQUEST['nama']);
		$stmt->execute();

		$s_success = "\n Akun berhasil didaftarkan, silakan login.";
	}
	catch(PDOException $e) {
		$s_danger = "\n " . $e->getMessage();
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
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - PdM</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
   
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <!-- Alert -->
                            <!-- End -->
                            <div class="col-lg-7">
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
                                                        <input class="form-control" name = "nama" id="inputFirstName" type="text" placeholder="Enter first name" />
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row gx-3">
                                                <div class="col-md-12">
                                                    <!-- Form Group (first name)-->
                                                    <div class="mb-12">
                                                        <label class="small mb-1" for="username">Username</label>
                                                        <input class="form-control" name="username" id="inputFirstName" type="text" placeholder="Enter first name" />
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- Form Group (email address)            -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control" name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <br>
                                            <!-- Form Row    -->
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <!-- Form Group (password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="password">Password</label>
                                                        <input class="form-control" name = "password" id="inputPassword" type="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Form Group (confirm password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="password2">Confirm Password</label>
                                                        <input class="form-control" name="password2" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
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
    </body>
</html>
