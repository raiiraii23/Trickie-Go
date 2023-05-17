<?= include '..\register.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>

</head>
<body>
<div class="container-fluid h-100 d-flex align-items-center">
    
    <div class="container text-center ">
    <div class="container ">
            <img src="../assets/img/logo.png" alt="logo">
        </div>
        <div class="container my-2">
            <h2>Register</h2>
        </div>
        <div class="container col-md-6 my-2">
            <!-- content -->
            <form id="register-form" method="POST" >
                <div class="form-group my-2">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" required="required">
                </div>
            </div>

            <div class="form-group my-2">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" required="required">
                </div>
            </div>

                <!-- user role -->
            <div class="form-group my-2">
                <div class="input-group"> 
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <select class="form-select" name="role" aria-label="Select Role">
                    <option value="passenger">Passenger</option>
                    <option value="driver">Driver</option>
                    </select>
                </div>
            </div>

            <div class="form-group my-2">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" required="required" autocomplete="on">
                </div>
            </div>
            
            <div class="form-group text-center my-2">
            <input type="submit" class="btn btn-primary" value="register">
                
            </div>
            <div class="form-group text-center my-2">
                            <!-- <span>Have an account? <a href="">login</a></span> -->
                            <span> have an account? <a href="login.php">Login</a></span>
						</div>
						
					</form>
        </div>
        <p> We need permission for the service you use</p>
        <p> Learn More</p>
</div>
<script>
$(document).ready(function() {
    $('#register-form').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                type: 'POST',
                url: '../register.php',
                data: formData,
                success: function(response) {
                console.log(response);
                    if (response == 'success') {

                    Swal.fire({
                        title: 'Success!',
                        text: 'Data inserted successfully',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "http://localhost/tricycle-reservation/auth/login.php";
                        }
                    });
                    } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Username already exist!',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>