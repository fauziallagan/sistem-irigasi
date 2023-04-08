<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensortes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM coba WHERE nama = 'Lora 0'  ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
} else {
  echo "0 results";
}
$conn->close();
?>
<?php include "header.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container-xl px-4">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Dashboard Utama
                                        </h1>
                                        <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                                    </div>
                                   </div>   
                        </div>
                    </header>
                    <!-- Main page content-->
                    <!-- Section 1 -->
                    <div class="container-xl px-4 mt-n10">
                        <div class="rows">
                            <div class="card card-collapsable">
                                <a class="card-header" href="#collapseCardExample" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">Monitoring Lahan 1
                                    <div class="card-collapsable-arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </a>
                                <div class="collapse show" id="collapseCardExample">
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-teal text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 lager">Kelembaban</div>
                                                                <div class="text-lg fw-bold" id="kelembaban"></span> &percnt;</span></div>
                                                            </div>
                                                            <i class="fas fa-wind fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-warning text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 lager">Natrium</div>
                                                                <div class="text-lg fw-bold" id="sensor_n"></span> &percnt;</span></div>
                                                            </div>
                                                             <i class="fas fa-leaf fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-purple text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 large">Phosphat</div>
                                                                <div class="text-lg fw-bold" id="sensor_p"></span> &percnt;</span></div>
                                                            </div>
                                                              <i class="fas fa-leaf fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-orange text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 small">Kalium</div>
                                                                <div class="text-lg fw-bold" id="sensor_k"></span> &percnt;</span></div>
                                                            </div>
                                                               <i class="fas fa-leaf fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                                 <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-primary text-white h-90">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 lager">pH</div>
                                                                <div class="text-lg fw-bold" id="sensor_ph"></span> &percnt;</span></div>
                                                            </div>
                                                              <i class="fas fa-tree fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 -->
                            
                        </div>
                        
           </div>
                <br>
            <div class="card card-collapsable">
                                <a class="card-header" href="#collapseCardExample2" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">Monitoring Lahan 2
                                    <div class="card-collapsable-arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </a>
                                <div class="collapse show" id="collapseCardExample2">
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-teal text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 lager">Kelembaban</div>
                                                                <div class="text-lg fw-bold" id="kelembaban"></span> &percnt;</span></div>
                                                            </div>
                                                            <i class="fas fa-wind fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-warning text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 lager">Natrium</div>
                                                                <div class="text-lg fw-bold" id="sensor_n"></span> &percnt;</span></div>
                                                            </div>
                                                             <i class="fas fa-leaf fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-purple text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 large">Phosphat</div>
                                                                <div class="text-lg fw-bold" id="sensor_p"></span> &percnt;</span></div>
                                                            </div>
                                                              <i class="fas fa-leaf fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-orange text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 small">Kalium</div>
                                                                <div class="text-lg fw-bold" id="sensor_k"></span> &percnt;</span></div>
                                                            </div>
                                                               <i class="fas fa-leaf fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                                 <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-primary text-white h-90">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 lager">pH</div>
                                                                <div class="text-lg fw-bold" id="sensor_ph"></span> &percnt;</span></div>
                                                            </div>
                                                              <i class="fas fa-tree fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
           <!-- 3 -->
           
          </div>
          </div>
     <br>
            <div class="card card-collapsable">
                                <a class="card-header" href="#collapseCardExample3" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample3">Monitoring Lahan 3
                                    <div class="card-collapsable-arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </a>
                                <div class="collapse show" id="collapseCardExample3">
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-teal text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 lager">Kelembaban</div>
                                                                <div class="text-lg fw-bold" id="kelembaban"></span> &percnt;</span></div>
                                                            </div>
                                                            <i class="fas fa-wind fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-warning text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 lager">Natrium</div>
                                                                <div class="text-lg fw-bold" id="sensor_n"></span> &percnt;</span></div>
                                                            </div>
                                                             <i class="fas fa-leaf fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-purple text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 large">Phosphat</div>
                                                                <div class="text-lg fw-bold" id="sensor_p"></span> &percnt;</span></div>
                                                            </div>
                                                              <i class="fas fa-leaf fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-orange text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 small">Kalium</div>
                                                                <div class="text-lg fw-bold" id="sensor_k"></span> &percnt;</span></div>
                                                            </div>
                                                               <i class="fas fa-leaf fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                                 <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-primary text-white h-90">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 lager">pH</div>
                                                                <div class="text-lg fw-bold" id="sensor_ph"></span> &percnt;</span></div>
                                                            </div>
                                                              <i class="fas fa-tree fa-2xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                </main>

                 <?php include "footer.php" ?>
            </div>
        </div>

        <!-- Javascript  -->
<script>
$(document).ready(function(){
    setInterval(function(){
      $.ajax({
        url: "dataupdate.php",
        dataType: "json",
        success: function(result){
          // Update data pada halaman
          $("#kelembaban").text(result.sensor_kelembaban + " %");
          $("#sensor_n").text(result.sensor_n + " ");
          $("#sensor_p").text(result.sensor_p + " ");
          $("#sensor_k").text(result.sensor_k + " ");
          $("#sensor_ph").text(result.sensor_ph + " ");
        }
      });
    }, 100); // Mengupdate data setiap 5 detik
  });
  </script>
    </body>
</html>
