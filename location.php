<?php
	session_start();
  require_once('conn.php');
	if(!ISSET($_SESSION['user_id'])){
		header('location: index.php');
	}

  $id = $_SESSION['user_id'];

  $sql = "SELECT * FROM directions WHERE id = '$id' ";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
      // Loop through each row and store the data in an array
      $location = array();
      while ($row = mysqli_fetch_assoc($result)) {
          $location[] = $row;
      }
      $locations = $location;
  } else {
      echo "No rows found.";
  }
  if (isset($locations)) {
    foreach ($locations  as $row){
      $uid = $row['id'];
      $location = $row['locations'];
      $destination = $row['destination'];
      $count_passenger = $row['passenger'];
    }
  }

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
                                      <a class="nav-link text-dark" href="available.php">Reservation</a>
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
                <button class="button-header" disabled>Location</button>
            </div>

        <div class="container h-50 d-flex text-center align-items-center my-5 py-5">
            <div class="container">
                <!-- content -->
                
              
            <?php
              if ($role == "driver") {
                ?>
                  <div class="container">
                  <form id="update-destination-form" method="POST">

                  <div class="form-group my-2">
                      <div class="input-group">
                        <span class="input-group-addon mx-2"><i class="fa fa-map"></i></span>
                        <span class="px-2">Location: </span>
                        <strong ><?= isset($location) ? $location : 'Add' ?>
                        </strong>
                      </div>
                    </div>

                    
                    <div class="form-group text-center my-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-passenger="<?= $count_passenger ?>" data-destination="Block 5  ">
                    <?= isset($location) ? 'Edit' : 'Add' ?>
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
                                  <select class="form-select" name="location" aria-label="Select location">
                                    <option value="Wood House" <?php echo (isset($location) === 'Wood House') ? 'selected' : ''; ?> >Wood House</option>
                                    <option value="Block 1" <?php echo (isset($location) === 'Block 1') ? 'selected' : ''; ?> >Block 1</option>
                                    <option value="Block 2" <?php echo (isset($location) === 'Block 2') ? 'selected' : ''; ?> >Block 2</option>
                                    <option value="Block 3" <?php echo (isset($location) === 'Block 3') ? 'selected' : ''; ?> >Block 3</option>
                                    <option value="Block 4" <?php echo (isset($location) === 'Block 4') ? 'selected' : ''; ?> >Block 4</option>
                                    <option value="Block 5" <?php echo (isset($location) === 'Block 5') ? 'selected' : ''; ?> >Block 5</option>
                                    <option value="Block 6" <?php echo (isset($location) === 'Block 6') ? 'selected' : ''; ?> >Block 6</option>
                                    <option value="Block 7" <?php echo (isset($location) === 'Block 7') ? 'selected' : ''; ?> >Block 7</option>
                                    <option value="Block 8" <?php echo (isset($location) === 'Block 8') ? 'selected' : ''; ?> >Block 8</option>
                                    <option value="Block 9" <?php echo (isset($location) === 'Block 9') ? 'selected' : ''; ?> >Block 9</option>
                                    <option value="Block 10" <?php echo (isset($location) === 'Block 10') ? 'selected' : ''; ?> >Block 10</option>
                                    <option value="Block 11" <?php echo (isset($location) === 'Block 11') ? 'selected' : ''; ?> >Block 11</option>
                                    <option value="Block 12" <?php echo (isset($location) === 'Block 12') ? 'selected' : ''; ?> >Block 12</option>
                                    <option value="Block 13" <?php echo (isset($location) === 'Block 13') ? 'selected' : ''; ?> >Block 13</option>
                                    <option value="Block 14" <?php echo (isset($location) === 'Block 14') ? 'selected' : ''; ?> >Block 14</option>
                                    <option value="Block 15" <?php echo (isset($location) === 'Block 15') ? 'selected' : ''; ?> >Block 15</option>
                                    <option value="Block 16" <?php echo (isset($location) === 'Block 16') ? 'selected' : ''; ?> >Block 16</option>
                                    <option value="Block 17" <?php echo (isset($location) === 'Block 17') ? 'selected' : ''; ?> >Block 17</option>
                                    <option value="Block 18" <?php echo (isset($location) === 'Block 18') ? 'selected' : ''; ?> >Block 18</option>
                                    <option value="Block 19" <?php echo (isset($location) === 'Block 19') ? 'selected' : ''; ?> >Block 19</option>
                                    <option value="Block 20" <?php echo (isset($location) === 'Block 20') ? 'selected' : ''; ?> >Block 20</option>
                                    <option value="Block 21" <?php echo (isset($location) === 'Block 21') ? 'selected' : ''; ?> >Block 21</option>
                                    <option value="Block 22" <?php echo (isset($location) === 'Block 22') ? 'selected' : ''; ?> >Block 22</option>
                                    <option value="Block 23" <?php echo (isset($location) === 'Block 23') ? 'selected' : ''; ?> >Block 23</option>
                                    <option value="Block 24" <?php echo (isset($location) === 'Block 24') ? 'selected' : ''; ?> >Block 24</option>
                                    <option value="Block 25" <?php echo (isset($location) === 'Block 25') ? 'selected' : ''; ?> >Block 25</option>
                                    <option value="Block 26" <?php echo (isset($location) === 'Block 26') ? 'selected' : ''; ?> >Block 26</option>
                                    <option value="Block 27" <?php echo (isset($location) === 'Block 27') ? 'selected' : ''; ?> >Block 27</option>
                                  </select>
                                </div>
                              </div>
                              
                              
                            <input type="text" class="btn btn-primary" name="uuid" value="<?= $_SESSION['user_id']?>" hidden>
                            <input type="text" class="btn btn-primary" name="page" value="location" hidden>
                            <input type="text" class="btn btn-primary" name="role" value="<?= $role ?>" hidden>
                                
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
                        <span class="input-group-addon mx-2"><i class="fa fa-map"></i></span>
                        <span class="px-2">Location: </span>
                        <strong ><?= isset($location) ? $location : 'Add' ?>
                        </strong>
                      </div>
                    </div>
                    
                    <div class="form-group text-center my-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-passenger="<?= $count_passenger ?>" data-destination="Block 5  ">
                    <?= isset($location) ? 'Edit' : 'Add' ?>
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
                                  <select class="form-select" name="location" aria-label="Select Location">
                                    <option value="woodhouse" <?php echo (isset($location) === 'woodhouse') ? 'selected' : ''; ?> >Wood House</option>
                                    <option value="Block 1" <?php echo (isset($location) === 'Block 1') ? 'selected' : ''; ?> >Block 1</option>
                                    <option value="Block 2" <?php echo (isset($location) === 'Block 2') ? 'selected' : ''; ?> >Block 2</option>
                                    <option value="Block 3" <?php echo (isset($location) === 'Block 3') ? 'selected' : ''; ?> >Block 3</option>
                                    <option value="Block 4" <?php echo (isset($location) === 'Block 4') ? 'selected' : ''; ?> >Block 4</option>
                                    <option value="Block 5" <?php echo (isset($location) === 'Block 5') ? 'selected' : ''; ?> >Block 5</option>
                                    <option value="Block 6" <?php echo (isset($location) === 'Block 6') ? 'selected' : ''; ?> >Block 6</option>
                                    <option value="Block 7" <?php echo (isset($location) === 'Block 7') ? 'selected' : ''; ?> >Block 7</option>
                                    <option value="Block 8" <?php echo (isset($location) === 'Block 8') ? 'selected' : ''; ?> >Block 8</option>
                                    <option value="Block 9" <?php echo (isset($location) === 'Block 9') ? 'selected' : ''; ?> >Block 9</option>
                                    <option value="Block 10" <?php echo (isset($location) === 'Block 10') ? 'selected' : ''; ?> >Block 10</option>
                                    <option value="Block 11" <?php echo (isset($location) === 'Block 11') ? 'selected' : ''; ?> >Block 11</option>
                                    <option value="Block 12" <?php echo (isset($location) === 'Block 12') ? 'selected' : ''; ?> >Block 12</option>
                                    <option value="Block 13" <?php echo (isset($location) === 'Block 13') ? 'selected' : ''; ?> >Block 13</option>
                                    <option value="Block 14" <?php echo (isset($location) === 'Block 14') ? 'selected' : ''; ?> >Block 14</option>
                                    <option value="Block 15" <?php echo (isset($location) === 'Block 15') ? 'selected' : ''; ?> >Block 15</option>
                                    <option value="Block 16" <?php echo (isset($location) === 'Block 16') ? 'selected' : ''; ?> >Block 16</option>
                                    <option value="Block 17" <?php echo (isset($location) === 'Block 17') ? 'selected' : ''; ?> >Block 17</option>
                                    <option value="Block 18" <?php echo (isset($location) === 'Block 18') ? 'selected' : ''; ?> >Block 18</option>
                                    <option value="Block 19" <?php echo (isset($location) === 'Block 19') ? 'selected' : ''; ?> >Block 19</option>
                                    <option value="Block 20" <?php echo (isset($location) === 'Block 20') ? 'selected' : ''; ?> >Block 20</option>
                                    <option value="Block 21" <?php echo (isset($location) === 'Block 21') ? 'selected' : ''; ?> >Block 21</option>
                                    <option value="Block 22" <?php echo (isset($location) === 'Block 22') ? 'selected' : ''; ?> >Block 22</option>
                                    <option value="Block 23" <?php echo (isset($location) === 'Block 23') ? 'selected' : ''; ?> >Block 23</option>
                                    <option value="Block 24" <?php echo (isset($location) === 'Block 24') ? 'selected' : ''; ?> >Block 24</option>
                                    <option value="Block 25" <?php echo (isset($location) === 'Block 25') ? 'selected' : ''; ?> >Block 25</option>
                                    <option value="Block 26" <?php echo (isset($location) === 'Block 26') ? 'selected' : ''; ?> >Block 26</option>
                                    <option value="Block 27" <?php echo (isset($location) === 'Block 27') ? 'selected' : ''; ?> >Block 27</option>
                                  </select>
                                </div>
                              </div>
                            <input type="text" class="btn btn-primary" name="uuid" value="<?= $_SESSION['user_id']?>" hidden>
                            <input type="text" class="btn btn-primary" name="page" value="location" hidden>
                            <input type="text" class="btn btn-primary" name="role" value="<?= $role ?>" hidden>
                                
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
              <?php
              }
              
            ?>
            </div>
        </div>

        <div class="footer container text-center fixed-bottom">
            <small class="text-white"> We need permission for the service you use <a href="#" class="text-white">Learn More</a> </p> </small>
        </div>



        <script src="assets/js/query.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>



