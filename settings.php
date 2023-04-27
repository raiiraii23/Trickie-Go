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
                                        <a class="nav-link text-dark" href="message.php">Message</a>
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
                                      <a class="nav-link text-dark" href="available.php">Reservation</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link text-dark" href="message.php">Message</a>
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
        <button class="button-header" disabled>Settings</button>
    </div>

    <div class="container h-50 d-flex text-center align-items-center">
        <div class="container">
        <?php
              if ($role == "driver") {
                ?>
                  <div class="container">
                  <form id="update-destination-form" method="POST">

                  <div class="form-group my-2">
                      <div class="input-group">
                        <span class="input-group-addon mx-2"><i class="fa fa-user"></i></span>
                        <span class="px-2">Name: </span>
                        <strong ><?= $name ?></strong>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon mx-2"><i class="fa fa-user"></i></span>
                        <span class="px-2">Username: </span>
                        <strong ><?= $username ?></strong>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon mx-2"><i class="fa fa-user"></i></span>
                        <span class="px-2">Role: </span>
                        <strong ><?= $role ?></strong>
                      </div>
                    </div>

                    

                    <div class="form-group text-center my-2">
                        <div class="container d-flex flex-column"></div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form id="" method="POST">
                              <div class="form-group my-2">
                                <div class="input-group">
                                  <span class="input-group-addon mx-2 my-2"><i class="fa fa-map"></i></span>
                                  <select class="form-select" name="destination" aria-label="Select Role">
                                    <option value="woodhouse" <?php echo (isset($destination) === 'woodhouse') ? 'selected' : ''; ?>> Wood House</option>
                                    <option value="Block 1" <?php echo (isset($destination) === 'Block 1') ? 'selected' : ''; ?> >Block 1</option>
                                    <option value="Block 2" <?php echo (isset($destination) === 'Block 2') ? 'selected' : ''; ?> >Block 2</option>
                                 
                                  </select>
                                </div>
                              </div>
                              
                            <input type="text" class="btn btn-primary" name="uuid" value="<?= $_SESSION['user_id']?>" hidden>
                            <input type="text" class="btn btn-primary" name="role" value="<?= $role ?>" hidden>
                            <input type="text" class="btn btn-primary" name="page" value="destination" hidden>
                                
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary" value="Save">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>

                    <div class="form-group text-center my-2">
                                    <!-- <span>Have an account? <a href="">login</a></span> -->
                    </div>
                    
                  </form>
                </div>
                <?php
              }
              if ($role == "passenger" ) {
                  ?>
                  <form id="update-destination-form" method="POST">

                  <div class="form-group my-2">
                      <div class="input-group">
                        <span class="input-group-addon mx-2"><i class="fa fa-user"></i></span>
                        <span class="px-2">Name: </span>
                        <strong ><?= $name ?></strong>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon mx-2"><i class="fa fa-user"></i></span>
                        <span class="px-2">Username: </span>
                        <strong ><?= $username ?></strong>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon mx-2"><i class="fa fa-user"></i></span>
                        <span class="px-2">Role: </span>
                        <strong ><?= $role ?></strong>
                      </div>
                    </div>
                    
                    <div class="form-group text-center my-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-passenger="<?= $count_passenger ?>" data-destination="Block 5  ">
                    Edit profile
                  </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form id="" method="POST">
                              <div class="form-group my-2">
                                <div class="input-group">
                                  <span class="input-group-addon mx-2 my-2"><i class="fa fa-map"></i></span>
                                  <select class="form-select" name="destination" aria-label="Select Role">
                                    <option value="woodhouse" <?php echo (isset($destination) === 'woodhouse') ? 'selected' : ''; ?> >Wood House</option>
                                    <option value="Block 1" <?php echo (isset($destination) === 'Block 1') ? 'selected' : ''; ?> >Block 1</option>
                                    <option value="Block 2" <?php echo (isset($destination) === 'Block 2') ? 'selected' : ''; ?> >Block 2</option>
                                    <option value="Block 3" <?php echo (isset($destination) === 'Block 3') ? 'selected' : ''; ?> >Block 3</option>
                                    <option value="Block 4" <?php echo (isset($destination) === 'Block 4') ? 'selected' : ''; ?> >Block 4</option>
                              
                                </div>
                              </div>
                              <div class="form-group my-2 ">
                                <div class="input-group">
                                  <span class="input-group-addon mx-2"><i class="fa fa-users"></i></span>
                                  <input type="number" class="form-control passenger-count" name="passenger-count" min="1" max="5" placeholder="<?= $count_passenger ?>" required="required" autocomplete="on">
                                </div>
                              </div>
                              
                            <input type="text" class="btn btn-primary" name="uuid" value="<?= $_SESSION['user_id']?>" hidden>
                            <input type="text" class="btn btn-primary" name="role" value="passenger" hidden>
                            <input type="text" class="btn btn-primary" name="page" value="destination" hidden>

                                
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary" value="Save">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>

                    
                  </form>
              <?php
              }
              
            ?>
            
            <button id="logoutBtn" class="btn btn-primary">Logout</button>
        </div>
    </div>

<div class="footer container text-center fixed-bottom">
    <small class="text-white"> We need permission for the service you use <a href="#" class="text-white">Learn More</a> </p> </small>
</div>



<script src="assets/js/query.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>