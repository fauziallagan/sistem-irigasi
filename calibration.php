<?php
require_once "data.php";

require "session.php";

$e_tot = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tipe = saring($_POST['tipe']);
    $tegangan_terukur = saring($_POST["tegangan_terukur"]);
    $id_mesin = saring($_POST["id_mesin"]);
    $nilai_analog = saring($_POST["nilai_analog"]);
    $pin = saring($_POST["pin"]);
    $tegangan_max = saring($_POST["tegangan_max"]);

  if ($e_tot == 0) {
	try {

		// prepare sql and bind parameters
        $stmt = $connection->prepare("INSERT INTO kalibrasi (id, id_mesin, pin, tegangan_max, nilai_analog, tegangan_terukur, tipe)
		VALUES (:id, :id_mesin, :pin, :tegangan_max, :nilai_analog, :tegangan_terukur, :tipe)");
        $stmt->bindValue(':id', $id);
		$stmt->bindValue(':id_mesin', $id_mesin);
		$stmt->bindValue(':pin', $pin);
		$stmt->bindValue(':tegangan_max', $tegangan_max);
		$stmt->bindValue(':nilai_analog', $nilai_analog);
		$stmt->bindValue(':tegangan_terukur', $tegangan_terukur);
        $stmt->bindValue(':tipe', $tipe);
		$stmt->execute();

		$s_success = "\n Data Berhasil Di Masukkan.";
        
	}
	catch(PDOException $e) {
		$s_error = "\n " . $e->getMessage();
	}
    
  }
} 
// Koneksi ke database kalibrasi
try{
    $sql = 'SELECT * FROM kalibrasi WHERE is_deleted = false'; // Edited! Where is_deleted = false (soft deleted)
    $row = $connection->query($sql);
    $row->setFetchMode(PDO::FETCH_ASSOC);
} catch(PDOException $e){
    die("Connection to Database Failed!. Please Check Database Connection!!" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Predictive Maintenance (PdM)"/>
        <meta name="author" content="Sari Technology"/>
        <title>Log Data PdM</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">              
            <!-- Sidenav Toggle Button-->
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
            <!-- Navbar Brand-->
            <!-- * * Tip * * You can use text or an image for your navbar brand.-->
            <!-- * * * * * * When using an image, we recommend the SVG format.-->
            <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
            <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.php">PdM</a>
            <!-- Navbar Search Input-->
            <!-- * * Note: * * Visible only on and above the lg breakpoint-->
            <form class="form-inline me-auto d-none d-lg-block me-3">
                <div class="input-group input-group-joined input-group-solid">
                    <input class="form-control pe-0" type="search" placeholder="Search" aria-label="Search" />
                    <div class="input-group-text"><i data-feather="search"></i></div>
                </div>
            </form>
      <!-- SVG Alert -->
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
      <?php 
      if ($s_success !== "") { ?>
        <div class=" alert alert-success alert-notif d-flex align-items-center" role="alert" id="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          <div>
            <?php echo $s_success; ?>
            
            </div>
          </div>
          <?php }
          if ($s_info !== "") { ?>
          <div class="alert alert-warning alert-notif alert-dismissible fade show" role="alert"id="alert">
            <?php echo $s_info; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
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
            <!-- Navbar Items-->
            <ul class="navbar-nav align-items-center ms-auto">
                <!-- Documentation Dropdown-->
              
                <!-- Navbar Search Dropdown-->
                <!-- * * Note: * * Visible only below the lg breakpoint-->
                <li class="nav-item dropdown no-caret me-3 d-lg-none">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search"></i></a>
                    <!-- Dropdown - Search-->
                    <div class="dropdown-menu dropdown-menu-end p-3 shadow animated--fade-in-up" aria-labelledby="searchDropdown">
                        <form class="form-inline me-auto w-100">
                            <div class="input-group input-group-joined input-group-solid">
                                <input class="form-control pe-0" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                                <div class="input-group-text"><i data-feather="search"></i></div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- Alerts Dropdown-->
                <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <i class="me-2" data-feather="bell"></i>
                            Alerts Center
                        </h6>
                        <!-- Example Alert 1-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 29, 2021</div>
                                <div class="dropdown-notifications-item-content-text">This is an alert message. It's nothing serious, but it requires your attention.</div>
                            </div>
                        </a>
                        <!-- Example Alert 2-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-info"><i data-feather="bar-chart"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 22, 2021</div>
                                <div class="dropdown-notifications-item-content-text">A new monthly report is ready. Click here to view!</div>
                            </div>
                        </a>
                        <!-- Example Alert 3-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-danger"><i class="fas fa-exclamation-triangle"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 8, 2021</div>
                                <div class="dropdown-notifications-item-content-text">Critical system failure, systems shutting down.</div>
                            </div>
                        </a>
                        <!-- Example Alert 4-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-success"><i data-feather="user-plus"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 2, 2021</div>
                                <div class="dropdown-notifications-item-content-text">New user request. Woody has requested access to the organization.</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-footer" href="#!">View All Alerts</a>
                    </div>
                </li>
                <!-- Messages Dropdown-->
              
                <!-- User Dropdown-->
                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="assets/img/illustrations/profiles/profile-1.png" /></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="assets/img/illustrations/profiles/profile-1.png" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name"><?php echo $nama;?></div>
                                <div class="dropdown-user-details-email"><?php echo $email; ?></div>
                                
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="account-profile.php">
                            <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                            Account
                        </a>
                        <a class="dropdown-item" href="logout.php">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <!-- Sidenav Menu Heading (Account)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <div class="sidenav-menu-heading d-sm-none">Account</div>
                            <!-- Sidenav Link (Alerts)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                                Alerts
                                <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                            </a>
                            <!-- Sidenav Link (Messages)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                                Messages
                                <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                            </a>
                            <!-- Sidenav Menu Heading (Core)-->
                            <div class="sidenav-menu-heading">Menu</div>
                            <!-- Sidenav Accordion (Dashboard)-->
                            <a class="nav-link"  href="index.php" >
                                <div class="nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                
                                Dashboards
                            
                            </a>
                            <a class="nav-link" href="tables.php"><div class="nav-link-icon"><i class="fas fa-chart-line"></i></div>
                                Log Data 
                            </a>
                      
                            <!-- Account -->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseApps" aria-expanded="false" aria-controls="collapseApps">
                                <div class="nav-link-icon"><i class="fas fa-user-circle"></i></div>
                                Account
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseApps" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                                    <!-- Nested Sidenav Accordion (Apps -> Knowledge Base)-->
                                          <a class="nav-link" href="account-profile.php">
                                            <div class="nav-link-icon"><i class="fas fa-user"></i></div>Profile</a>
                                    </a>
                                   
                                    <!-- Nested Sidenav Accordion (Apps -> Posts Management)-->
                                        <a class="nav-link" href="account-security.php">
                                            <div class="nav-link-icon"><i class="fas fa-user-lock"></i></div>Security</a>
                                       
                                </nav>
                            </div>
                         
                            
                            <!-- Sidenav Heading (Custom)-->
                            <div class="sidenav-menu-heading">Admin</div>
                            <!-- Sidenav Accordion (Pages)-->

                                    <!-- Nested Sidenav Accordion (Pages -> Authentication)-->
                                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#appsCollapseUserManagement" aria-expanded="false" aria-controls="appsCollapseUserManagement">
                                        <div class="nav-link-icon"><i data-feather="settings"></i></div> User Management
                                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="appsCollapseUserManagement" data-bs-parent="#accordionSidenavAppsMenu">
                                        <nav class="sidenav-menu-nested nav">
                                            <a class="nav-link" href="user-management-list.php">
                                                <div class="nav-link-icon"><i class="fas fa-user"></i></div>Users List</a>
                                            <a class="nav-link" href="user-management-edit-user.php">
                                                <div class="nav-link-icon"><i class="fas fa-user-edit"></i></div>Edit User</a>
                                            <a class="nav-link" href="user-management-add-user.php">
                                                <div class="nav-link-icon"><i class="fas fa-user-plus"></i></div>Add User</a>
                                            <a class="nav-link" href="user-management-groups-list.php">
                                                <div class="nav-link-icon"><i class="fas fa-user-friends"></i></div>Groups List</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link" href="calibration.php"><div class="nav-link-icon"><i class="fas fa-compass"></i></div>
                                    Calibration </a>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as:</div>
                            <div class="sidenav-footer-title"><?php echo $role; ?></div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
                <main>
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container-xl px-4">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i class="fas fa-compass"></i></div>
                                            Calibration
                                        </h1>
                                        <div class="page-header-subtitle"><?php echo $calibration_content; ?><br><br>
                                          <div class="container">
                                              <div class="row">
                                                  <div class="col-md-1 offset-md-11">
                                                  <a href="formCalibration.php" class="btn rounded-pill btn-success btn-lg lift">Calibrasi</a>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="card lg-4">
                            <div class="col-lg-12">
                                <div class="card-header lg-6">Table Calibration
                                </div>
                            
                                    <div class="card-body">
                            
                                    <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID_Mesin</th>
                                            <th>Pin</th>
                                            <th>Type</th>
                                            <th>Tegangan Maksimal</th>
                                            <th>Nilai Analog</th>
                                            <th>Tegangan Terukur</th>
                                            <th>Faktor Kalibrasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID_Mesin</th>
                                            <th>Pin</th>
                                            <th>Type</th>
                                            <th>Tegangan Maksimal</th>
                                            <th>Nilai Analog</th>
                                            <th>Tegangan Terukur</th>
                                            <th>Faktor Kalibrasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while($rows = $row->fetch()):?>
                                            <?php $result = $rows["tegangan_terukur"] / $rows["nilai_analog"] ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars(strtoupper($rows["id_mesin"]))?></td>
                                                <td><?php echo htmlspecialchars(strtoupper($rows["pin"]))?></td>
                                                <td><?php echo htmlspecialchars(strtoupper($rows["tipe"]))?></td>
                                                <td><?php echo htmlspecialchars($rows["tegangan_max"])?></td>
                                                <td><?php echo htmlspecialchars($rows["nilai_analog"])?></td>
                                                <td><?php echo htmlspecialchars($rows["tegangan_terukur"])?></td>
                                                <td><?php echo htmlspecialchars(round($result,3));?></td>
                                                <td>
                                                    <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="hapus.php?id=<?php echo $rows["id"]?>" onclick="return confirm('Data Akan Dihapus. Yakin?');" data-toggle="tooltip" title="Hapus Data"><i data-feather="trash-2"></i></a> 
                                                    
                                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" data-toggle="tooltip" 
                                                    title="Update Data" href="update.php?id=<?php echo $rows["id"]?>"><i data-feather="edit"></i></a>

                                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" data-toggle="tooltip" 
                                                    title="View Data" href="view.php?id=<?php echo $rows["id"]?>"><i data-feather="eye"></i></a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </main>
                <footer class="footer-admin mt-auto footer-light">
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
        <script src="js/index.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables/datatables-simple-demo.js"></script>
        <script src="https://code.jquery.com/jquery-latest.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>
