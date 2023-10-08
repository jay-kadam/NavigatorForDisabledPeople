<?php
include 'navbar.php';
include 'register-form.php';
?>
<html>
<body>
	<section class="text-center">
		<div class="p-5 bg-image" style="background-image: url('images/loginregbg.png'); height: 400px; background-repeat: no-repeat; background-position: center; background-size: cover;"></div>
		<div class="card mx-4 mx-md-5 shadow-5-strong" style="margin-top: -100px; background: hsla(0, 0%, 100%, 0.8); backdrop-filter: blur(30px);">
			<div class="card-body py-5 px-md-5">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-4">
						<h2 class="fw-bold mb-5">Sign in to your account</h2>
						<form id="login" method="POST" action="login.php">
							<div class="row">
								<center>
								<select class="form-select" aria-label="form-select" name="accType" style="width: 90%;" required>
									<option value="">Select Account Type</option>
									<option value="customer">Customer</option>
									<option value="hotel">Hotel</option>
									<option value="admin">Admin</option>
								</select>

								<div class="form-outline mb-2 py-5" style="width: 90%; margin-top: -20px;">
									<input type="email" name="email" id="email" class="form-control" placeholder="Email address" required/>
								</div>

								<div class="form-outline mb-2" style="width: 90%; margin-top: -20px;">
									<input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password" required/>
								</div>

								<div style="margin-bottom: 10px;">
									<a href="#register" data-bs-target="#register" data-bs-toggle="modal" style="text-decoration:none;">Don't have an account?</a>
								</div>

								<button type="submit" name="submit" class="btn btn-primary" style="width: 40%;">Login</button>
								</center>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>