<?php 
include 'register.php';
include 'login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Customized bootstrap login forms with multiple variants. Easy to customize.">
	<meta name="keywords" content="Bootstrap Modal, Login Form, Modal Login, Registration Form, Form, Bootstrap, Login, Registration">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/logo.png"/>
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Bootstrap Modal Login</title>


	<!-- font awesome v5.5.0 free version -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
	<!-- bootstrap version v4.0.0 -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
	<!-- custom css -->
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

	<div class="main-container h-100">
		<div class="h-100 d-flex align-items-center justify-content-center row text-center mt-3">
			<div class="col-sm-4 ">
				<div class="button-card">
					<div class="action-buttons mb-3 mt-2">
						<a href="#login" data-toggle="modal" class="btn btn-theme btn-primary text-white"> Login</a>
						<a href="#register" data-toggle="modal" class="btn btn-theme btn-success text-white">Register</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- passenger modal start here -->
	<div id="login" class="modal-style-1 dark modal ">
		<div class="modal-dialog modal-login">
			<div class="modal-content">
				<div class="modal-header p-0 mb-3 mt-3">				
					<h4 class="modal-title">Login</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
                    <div class="modal-body">
                    <!-- login -->
                            <form action="" method="POST">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" class="form-control" name="username" placeholder="Enter username" required="required">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" name="password" placeholder="Enter password" required="required" autocomplete="on">
							</div>
						</div>
						
						<div class="form-group text-center">
							<button  name="login" class="btn btn-primary btn-signin">login</button>
							
						</div>
						
					</form>
                        </div>
                    </div>
  
				</div>
			</div>
		</div>
	</div>  
<!-- passenger modal end here -->
	<!-- driver modal start here -->
	<div id="register" class="modal-style-1 dark modal ">
		<div class="modal-dialog modal-login">
			<div class="modal-content">
				<div class="modal-header p-0 mb-3 mt-3">				
					<h4 class="modal-title">Register</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				
					
                    <div class="modal-body">
                            <!--  -->
                            <form action="" method="POST">
                            <div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="text" class="form-control" name="name" placeholder="Enter name" required="required">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="text" class="form-control" name="username" placeholder="Enter username" required="required">
							</div>
						</div>
                        <div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<select class="form-control" name="role" id="role_select">
                                <option>Passenger</option>
                                <option>Driver</option>
                                </select>
                                </div>
						</div>
                        
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" name="password" placeholder="Enter password" required="required" autocomplete="on">
							</div>
						</div>
						
						<div class="form-group text-center">
                        <button name="register" class="btn btn-primary">Register</button>
							
						</div>
						
					    </form>
                        </div>
                    </div>
  
				</div>
			</div>
		</div>
	</div>  

<!-- driver modal end here -->

	<!-- include scripts here -->
	<!-- jQuery v3.4.1 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
	<!-- bootstrap js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" ></script>
</body>
</html>
