<?php 
session_start();
require_once "connection.php";
//space kosong

$e_tot = 0;

if (!empty($_SESSION["info"])) {
    $s_info .= $_SESSION["info"];
	$_SESSION["info"] = "";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	
  if (empty($_POST["username"])) {
    $s_error .= "Username tidak boleh kosong!";
	$e_tot += 1;
  } else {
    $username = saring($_POST["username"]);
  }
  
  if (empty($_POST["password"])) {
    $s_error .= "\n Password harus diisi!";
	$e_tot += 1;
  } else {
    $password = saring($_POST["password"]);
  }
  
  if (empty($_POST["ingat"])) {
		$ingat = 0;
  }
	else {
		$ingat = 1;
  }
  
  if ($e_tot == 0) {
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernamedb, $passworddb);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// prepare sql and bind parameters
		$stmt = $conn->prepare("SELECT kategori, username, paswd, nama FROM pengguna 
		WHERE username=:username");
		$stmt->bindValue(':username', $username);

		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($row === false){
			$s_error .= "\n Username salah!";
		} else{
			$data_kategori = $row['kategori'];
			$data_username = $row['username'];
			$data_nama = $row['nama'];
			$data_password = $row['paswd'];
			if (password_verify($password, $data_password)) {
				$_SESSION["role"] = $data_kategori;
				$_SESSION["nama"] = $data_nama;
				header("Location: index.php"); 
				$conn = null;
				exit();
			} else {
				$s_error .= "Password salah!";
			}
		}
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
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - PdM</title>
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
                            <div class="col-lg-5">
                                <!-- Basic login form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <!-- Login form-->
                                        <form>
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter email address" />
                                            </div>
                                            <!-- Form Group (password)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Enter password" />
                                            </div>
                                            <!-- Form Group (remember password checkbox)-->
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" id="rememberPasswordCheck" type="checkbox" value="" />
                                                    <label class="form-check-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <!-- Form Group (login box)-->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="forgot.php">Forgot Password?</a>
                                                <a class="btn btn-primary" href="index.php">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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
