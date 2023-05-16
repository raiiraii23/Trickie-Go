<?php
	session_start();
	if(!ISSET($_SESSION['user_id'])){
		header('location: index.php');
	}
  require_once "conn.php";
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>


<div class="container header d-flex justify-content-around">
            <nav class="navbar navbar-light">
              <div class="hamburger">
                <button class="navbar-toggler" type="button" alt="logo" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              
            </nav>
            <div class="logo d-flex align-items-center justify-content-end">
                  <img style="max-width: 50%!important" src="assets/img/logo.png" alt="logo">
              </div>

                      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                          <h5 class="offcanvas-title text-uppercase" id="offcanvasExampleLabel">Menu</h5>
                          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body ">
                          <div class="container-fluid text-center text-uppercase">
                              <!-- Sidebar -->
                              <div class=" sidebar bg-sidebar">
                              <ul class="nav flex-column">
                                <?php
                                  if ($role == "passenger") {
                                    ?>
                                        <li class="nav-item">
                                        <a class="nav-link active text-dark disabled text-uppercase" href="#">Passenger <?= $name ?></a>
                                      </li>
                                        <li class="nav-item">
                                        <a class="nav-link active text-dark" href="home.php">Dashboard</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link text-dark" href="available.php">Available Driver</a>
                                      </li>
                                      
                                      <li class="nav-item">
                                        <a class="nav-link text-dark" href="history.php">History</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link text-dark" href="settings.php">Settings</a>
                                      </li>
                                      <li class="nav-item">
                                      <a class="nav-link text-dark" href="destination.php">Destination</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link text-dark" href="location.php">Location</a>
                                      </li>
                                      
                                      <li class="nav-item">
                                        <button id="logoutBtn">Logout</button>
                                      </li>
                                    <?php
                                  }
                                  if ($role == "driver" ) {
                                      ?>
                                      <li class="nav-item">
                                        <a class="nav-link active text-dark text-capitalize disabled" href="#">Driver <?= $name ?></a>
                                      </li>
                                      <li class="nav-item">
                                      <a class="nav-link active text-dark" href="home.php">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link text-dark" href="reservation.php">Reservation</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                      <a class="nav-link text-dark" href="history.php">History</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link text-dark" href="settings.php">Settings</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link text-dark" href="destination.php">Destination</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link text-dark" href="location.php">Location</a>
                                    </li>
                                    <li class="nav-item">
                                    <button id="logoutBtn">Logout</button>
                                    </li>
                                  <?php
                                  }
                                  
                                ?>
                                  
                                </ul>
                            </div>
                          </div>
                        </div>
                      </div>
            </div>
        </div>  

            <div class="container page-title text-center">
                <!-- content -->
                <button class="button-header" disabled>Message</button>
            </div>

        <div class="container h-50 d-flex text-center align-items-center my-5 py-5">
            <div class="container">
                <!-- content -->
                <i class='fa fa-user-circle' style='font-size:100px'></i>
                <h1 class="bristol text-uppercase">Message</h1>
                <h1 class="text-capitalize"> <?= $role ?> <?= $name ?></h1>
            </div>
        </div>

        <div class="footer container text-center fixed-bottom">
            <small class="text-white"> We need permission for the service you use <a href="#" class="text-white">Learn More</a> </p> </small>
        </div>

        <script src="assets/js/query.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>