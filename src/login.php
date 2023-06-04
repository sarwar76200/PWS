<!doctype html>
<html lang="en">

<head>
	<title>PWS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Welcome back!</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/01.png);">
						</div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Sign In</h3>
								</div>
							</div>
							<form action="login.php" class="signin-form" method="post">
								<div class="form-group mb-3">
									<label class="label" for="name">Username</label>
									<input type="text" class="form-control" placeholder="Username" name="user" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Password</label>
									<input type="password" class="form-control" placeholder="Password" name="pass" required>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
										In</button>


								</div>

								<div>
									<?php
									include "PHPConnect.php";
									include "hash.php";

									if ($_SERVER['REQUEST_METHOD'] == 'POST') {
										$user = $_POST['user'];
										$pass = $_POST['pass'];
										$query = "SELECT pass FROM `user` WHERE user = '$user'";
										$result = $conn->query($query);
										if ($result->num_rows == 0) {
											echo '<p>No such user</p>';
											exit(0);
										}
										$og_hash = $result->fetch_assoc()['pass'];

										$cur_hash = gen_hash($pass);

										if ($og_hash != $cur_hash) {
											echo '<p>Password incorrect</p>';
											exit(0);
										}
										header("Location: homepage.php?user=" . $user);
									}


									?>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
								</div>
							</form>
							<p class="text-center">Not a member? <a href="signup.php">Sign Up</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>




	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>