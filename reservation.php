<?php
	session_start();
	if(!ISSET($_SESSION['user_id'])){
		header('location: index.php');
	}
  require_once "conn.php";

  $query = "SELECT booked_by FROM users WHERE user_id = $id";

  $result = mysqli_query($conn, $query);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $bookedBy = $row['booked_by'];
  } else {
    echo "Error executing the query: " . mysqli_error($conn);
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
                <button class="button-header" disabled>Reservation</button>
            </div>


            <div class="container d-flex text-center align-items-center">
    <div class="container">
      <hr>

      <div class="scrollable-div">
      <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Passenger Name</th>
          <th scope="col">location</th>
          <th scope="col">Destination</th>
          <th scope="col">Passenger count</th>
          <th scope="col">Reserve</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM users INNER JOIN directions ON directions.id = users.user_id WHERE user_id = '$bookedBy'";
            $result = mysqli_query($conn, $sql);
           if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
          ?>
        <div class="d-flex justify-content-around">
        <tr>
          <td scope="col"><?= $row['user_id']?></td>
          <td scope="col"><?= $row['name']?></td>
          <td scope="col"><?= $row['locations']?></td>
          <td scope="col"><?= $row['destination']?></td>
          <td scope="col"><?= $row['passenger']?></td>
          <td scope="col">

            <?php
              if ($row['status'] == 'accept') { ?>
                <button type="button" name="done" data-id="<?= $row['user_id']?>" class="done btn btn-success" value="done">Done</button>
                <button type="button" name="cancel" data-id="<?= $row['user_id']?>" class="cancel btn btn-danger" value="cancel">Cancel</button>
                <?php
              } else { ?>
                <button type="button" name="accept" data-id="<?= $row['user_id']?>" class="accept btn btn-success" value="accept">Accept</button>
                <?php
              }
              
            ?>
        </td>
        </tr>
      <?php }} ?>
          </tbody>
        </table>  


      </div>
    </div>
  </div>

  <div class="footer container text-center fixed-bottom">
    <small class="text-white"> We need permission for the service you use <a href="#" class="text-white">Learn More</a>
      </p> </small>
  </div>


  <script>
    $(document).ready(function () {
      $('.done').click(function (e) {
        e.preventDefault();
        var action = $(this).val();
        var id = $(this).data("id");
        var data = { 'action': action ,'id': id };

        $.ajax({
          type: 'POST',
          url: 'reserve.php',
          data: data, 
          success: function (res) {
            console.log(res);
            if (res == 'success') {
              Swal.fire({
                title: 'Success!',
                text: 'Successfully Done Booking',
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.reload();
                }
              });
            } else {
              Swal.fire({
                title: 'Error!',
                text: 'You cant done this booking!',
                icon: 'error',
                confirmButtonText: 'Ok'
              });
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            Swal.fire({
              title: 'Error!',
              text: 'Operation failed',
              icon: 'error',
              confirmButtonText: 'Ok'
            });

          }
        });

      });

      $('.cancel').click(function (e) {
        e.preventDefault();
        var action = $(this).val();
        var id = $(this).data("id");
        var data = { 'action': action ,'id': id };


        $.ajax({
          type: 'POST',
          url: 'reserve.php',
          data: data, 
          success: function (res) {
            if (res == 'success') {
              Swal.fire({
                title: 'Caceled!',
                text: 'Successfully Cancel Booking',
                icon: 'error',
                confirmButtonText: 'Ok'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.reload();
                }
              });
            } else {
              Swal.fire({
                title: 'Error!',
                text: 'You cant cancel booking!',
                icon: 'error',
                confirmButtonText: 'Ok'
              });
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            Swal.fire({
              title: 'Error!',
              text: 'Operation failed',
              icon: 'error',
              confirmButtonText: 'Ok'
            });

          }
        });

      });

      $('.accept').click(function (e) {
        e.preventDefault();
        var action = $(this).val();
        var id = $(this).data("id");
        var data = { 'action': action ,'id': id };

        $.ajax({
          type: 'POST',
          url: 'reserve.php',
          data: data, 
          success: function (res) {
            console.log(res);
            if (res == 'success') {
              Swal.fire({
                title: 'Success!',
                text: 'Successfully Accept Booking',
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.reload();
                }
              });
            } else {
              Swal.fire({
                title: 'Error!',
                text: 'You cant accept more than 1!',
                icon: 'error',
                confirmButtonText: 'Ok'
              });
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            Swal.fire({
              title: 'Error!',
              text: 'Operation failed',
              icon: 'error',
              confirmButtonText: 'Ok'
            });

          }
        });

      });
    });
  </script>
  <script src="assets/js/query.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>