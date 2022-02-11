<?php 
require "session.php";
?>
<?php include "header.php"?>
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
                            <a class="nav-link" href="./tables.php"><div class="nav-link-icon"><i class="fas fa-chart-line"></i></div>
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
                            <div class="sidenav-menu-heading" name="admin">Admin</div>
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
                                    Calibration
                                     </a>
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
                    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                        <div class="container-xl px-4">
                            <div class="page-header-content">
                                <div class="row align-items-center justify-content-between pt-3">
                                    <div class="col-auto mb-3">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                                            Add User
                                        </h1>
                                    </div>
                                    <div class="col-12 col-xl-auto mb-3">
                                        <a class="btn btn-sm btn-light text-primary" href="user-management-list.php">
                                            <i class="me-1" data-feather="arrow-left"></i>
                                            Back to Users List
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-4">
                        <div class="row">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Profile Picture</div>
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile rounded-circle mb-2" src="assets/img/demo/user-placeholder.svg" alt="" />
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                        <!-- Profile picture upload button-->
                                        <button class="btn btn-primary" type="button">Upload new image</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Account Details</div>
                                    <div class="card-body">
                                        <form>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="" />
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="" />
                                                </div>
                                            </div>
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="" />
                                            </div>
                                            <!-- Form Group (Group Selection Checkboxes)-->
                                            <div class="mb-3">
                                                <label class="small mb-1">Group(s)</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" id="groupSales" type="checkbox" value="" />
                                                    <label class="form-check-label" for="groupSales">Sales</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" id="groupDevs" type="checkbox" value="" />
                                                    <label class="form-check-label" for="groupDevs">Developers</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" id="groupMarketing" type="checkbox" value="" />
                                                    <label class="form-check-label" for="groupMarketing">Marketing</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" id="groupManagers" type="checkbox" value="" />
                                                    <label class="form-check-label" for="groupManagers">Managers</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" id="groupCustomer" type="checkbox" value="" />
                                                    <label class="form-check-label" for="groupCustomer">Customer</label>
                                                </div>
                                            </div>
                                            <!-- Form Group (Roles)-->
                                            <div class="mb-3">
                                                <label class="small mb-1">Role</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected disabled>Select a role:</option>
                                                    <option value="administrator">Administrator</option>
                                                    <option value="registered">Registered</option>
                                                    <option value="edtior">Editor</option>
                                                    <option value="guest">Guest</option>
                                                </select>
                                            </div>
                                            <!-- Submit button-->
                                            <button class="btn btn-primary" type="button">Add user</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include "footer.php"?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
