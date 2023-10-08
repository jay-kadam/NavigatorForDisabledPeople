<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">
	<title>Travel Navigator | Your One Stop Platform for Awesome Travels</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://maps.google.com/maps/api/js?sensor=false"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
     
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<?php if (
    session_status() == PHP_SESSION_ACTIVE &&
    empty($_SESSION['accountType'])
) { ?>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light px-2">
		<a class="navbar-brand" href="index.php"><img src="images/logo.png" width="100" height="70" class="d-inline-block align-top" alt="">TRAVEL NAVIGATOR</a>
		<div class="navbar">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="index.php">Home</a>
				<a class="nav-item nav-link" href="login-front.php">Login</a>
			</div>
		</div>
	</nav>

<?php } elseif (
    session_status() == PHP_SESSION_ACTIVE &&
    $_SESSION['accountType'] === 'customer'
) { ?>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light px-2">
		<a class="navbar-brand" href="index.php"><img src="images/logo.png" width="100" height="70" class="d-inline-block align-top" alt="">TRAVEL NAVIGATOR</a>
		<div class="navbar">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="index.php">Home</a>
				<a class="nav-item nav-link" href="show-reservation-front.php">Reservations</a>
				<a class="nav-item nav-link" href="profile-customer-front.php">Profile</a>
				<a class="nav-item nav-link" href="logout.php">Logout</a>
			</div>
		</div>
	</nav>
<?php } elseif (
    session_status() == PHP_SESSION_ACTIVE &&
    $_SESSION['accountType'] === 'hotel'
) { ?>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light px-2">
		<a class="navbar-brand" href="index.php"><img src="images/logo.png" width="100" height="70" class="d-inline-block align-top" alt="">TRAVEL NAVIGATOR</a>
		<div class="navbar">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="dashboard-hotel-front.php">Dashboard</a>
				<a class="nav-item nav-link" href="logout.php">Logout</a>
			</div>
		</div>
	</nav>
<?php } elseif (
    session_status() == PHP_SESSION_ACTIVE &&
    $_SESSION['accountType'] === 'admin'
) { ?>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light px-2">
		<a class="navbar-brand" href="index.php"><img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">TRAVEL NAVIGATOR</a>
		<div class="navbar">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="dashboard-admin-front.php">Dashboard</a>
				<a class="nav-item nav-link" href="logout.php">Logout</a>
			</div>
		</div>
	</nav>
<?php } ?>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>