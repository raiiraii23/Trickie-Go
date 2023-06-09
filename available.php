<?php
	session_start();
	if(!ISSET($_SESSION['user_id'])){
		header('location: index.php');
	}
  if($_SESSION['role'] == 'driver' ){
		header('location: reservation.php');
	}
  require_once "conn.php";

  require_once "user-session.php";

  $me = $_SESSION['user_id'];
  $name = $_SESSION['name'];
  $booking = "SELECT * FROM users WHERE user_id = '$me'";
  $test = mysqli_query($conn, $booking);
  if (mysqli_num_rows($test) > 0) {
    while ($row = mysqli_fetch_assoc($test)) {
      $booked_by = $row['booked_by'];
    }
  }
  var_dump($me);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
  <div class="container header d-flex justify-content-around">
    <nav class="navbar navbar-light">
      <div class="hamburger">
        <button class="navbar-toggler" type="button" alt="logo" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
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
                <a class="nav-link active text-dark disabled text-uppercase" href="#">Passenger
                  <?= $name ?>
                </a>
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
                <a class="nav-link active text-dark text-capitalize disabled" href="#">Driver
                  <?= $name ?>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-dark" href="home.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="reservation.php">Reservation</a>
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
    <button class="button-header" disabled>
      Available Driver
    </button>
  </div>

  <div class="container d-flex text-center align-items-center">
    <div class="container">
      <hr>

      <div class="scrollable-div">
      <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Driver Name:</th>
          <th scope="col">Activity</th>
          <th scope="col">Book</th>
        </tr>
      </thead>
      <tbody>
      
        <?php
              if ($role == "passenger") {
                ?>
        <?php
              if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
              // mag-display ng detalye ng user at session
                  $d_name = $row['name'] ;
                  $d_id = $row['user_id'] ;
                  $book = $row['booked_by'] ;
                  $d_time = time_elapsed_string($row['timestamp']);
                  ?>
        <div class="d-flex justify-content-around">
    <tr>
    <td><?= $d_id ?></td>
      <td><?= $d_name ?></td>
      <td><?= $d_time?></td>
        <td>
          <form id="book-form" class="form-submit" method="POST">
            <input type="text" class="form-control" name="user-id" value="<?= $me ?>" hidden>
            <input type="text" class="form-control" name="name" value="<?= $d_name ?>" hidden>
            <input type="text" class="form-control" name="driver-id" value="<?= $d_id ?>" hidden>
            <input type="text" class="form-control" name="action" value="book" hidden>
            <input type="submit" class="btn btn-success" value="<?php echo ($book == $me) ? 'booked' : 'book'; ?>" <?php echo($book == $me)  ? 'hidden' : ''; ?>>
            <?php
                 
              if ($booked_by == $me) {
                ?>
                <a  class="btn btn-warning disabled"> On Going </a>
              <?php
              } else{
                ?>
                <a  class="btn btn-danger disabled"> Canceled </a>
              <?php
              }
            ?>
            
          </form>
          </td>
    </tr>
        </div>

        <?php
        }
        } else {
          $d_notif = 'none';
        }
        }
      ?>
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
      $('.form-submit').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var params = new URLSearchParams(formData);
        var name = params.get('name');

        $.ajax({
          type: 'POST',
          url: 'book.php',
          data: formData,
          success: function (res) {
            // console.log(response);
            if (res == 'success') {
              Swal.fire({
                title: 'Success!',
                text: 'successfully Booked Driver '+ name ,
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
                text: 'You cant book more than 1 !',
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