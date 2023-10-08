<?php
session_start();
include 'navbar.php';

include 'config.php';

$hotelUid = $_SESSION['hotelUid'];
$rs = mysqli_query($con, "select * from hotel where id=$hotelUid");
$row = mysqli_fetch_assoc($rs);
?>
<html>
	<center>
		<h3 style="margin-top:15px;">Welcome back</small></h3>
	</center>

	<div class="col d-flex justify-content-center">
		<div class="card mb-3" style="width: 700px; margin-top:20px">
			<img class="card-img-top" src="<?= $row['hotel_pic'] ?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><?= $row['hotel_name'] ?></h5>
				<p class="card-text"><small class="text-muted">
					<?= $row['hotel_address'] ?>
				</small></p>
			</div>
		</div>
	</div>

	<div class="row px-2 py-2 justify-content-center col d-flex">
		<div class="col-sm-7 px-3 py-3">
			<div class="card bg-light border-light text-center">
				<h5 class="card-header">Update Profile</h5>
				<div class="card-body">
				<p class="card-text">Update your hotel profile to be displayed</p>
					<a href="profile-hotel-front.php" class="btn btn-primary">Update Profile</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row px-2 py-2 justify-content-center col d-flex">
		<div class="col-sm-7 px-3 py-3">
			<div class="card bg-light border-light text-center">
				<h5 class="card-header">View Packages</h5>
				<div class="card-body">
					<p class="card-text">Add new packages or edit existing packages</p>
					<a href="packages-hotel-front.php" class="btn btn-primary">Update Packages</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row px-2 py-2 justify-content-center col d-flex">
		<div class="col-sm-7 px-3 py-3">
			<div class="card bg-light border-light text-center">
				<h5 class="card-header">View Reservations</h5>
				<div class="card-body">
					<p class="card-text">Manage your reservations here</p>
					<a href="#reservation" data-bs-target="#reservation" data-bs-toggle="modal" class="btn btn-primary">View reservations</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row px-2 py-2 justify-content-center col d-flex">
		<div class="col-sm-7 px-3 py-3">
			<div class="card bg-light border-light text-center">
				<h5 class="card-header">View Feedbacks</h5>
				<div class="card-body">
					<p class="card-text">Manage your feedbacks here</p>
					<a href="#feedback" data-bs-target="#feedback" data-bs-toggle="modal" class="btn btn-primary">View feedbacks</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade modal-xl " id="reservation" aria-hidden="true" aria-labelledby="reservationTitle" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="reservationTitle">Your Reservations</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<?php showReservationHotel($con, $hotelUid); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade modal-xl " id="feedback" aria-hidden="true" aria-labelledby="reservationTitle" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="feedbackTitle">Your Feedbacks</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<?php showFeedbacks($con, $hotelUid); ?>
				</div>
			</div>
		</div>
	</div>

<?php
function showReservationHotel($con, $hotelUid)
{
    $sql = "SELECT r.resId, p.packageName, r.checkInDate, r.checkOutDate, c.custName, c.custEmail, h.hotel_pic FROM reservation r JOIN customer c ON r.custUid = c.custUid JOIN room s ON s.roomId =  r.roomId JOIN packages p ON p.packageId = s.packageId LEFT JOIN hotel h ON p.hotelUid = h.id WHERE h.id = $hotelUid;";

    $rs = mysqli_query($con, $sql);

    if (mysqli_num_rows($rs) > 0) {
        echo '
                <div class="row d-flex justify-content-center py-2">
                    <table class="table" style="width: 100%;">
                        <thead class="thead">
                            <tr>
                                <th scope="col">Package Name</th>
                                <th scope="col">Check In Date</th>
                                <th scope="col">Check Out Date</th>
                                <th scope="col">Reserved by</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                ';

        while ($row = mysqli_fetch_assoc($rs)) {
            echo '
                            <tr>
                                <td>' .
                $row['packageName'] .
                '</td>
                                <td>' .
                $row['checkInDate'] .
                '</td>
                                <td>' .
                $row['checkOutDate'] .
                '</td>
                                <td>' .
                $row['custName'] .
                '</td>
                                <td>' .
                $row['custEmail'] .
                '</td>
                                <td><a style="text-decoration:none" href="cancel-reservation.php?id=' .
                $row['resId'] .
                '">Cancel</a></td>
                            </tr>
                ';
        }
        echo '
                        </tbody>
                    </table>
                </div>
                ';
    } else {
        echo 'No reservation has been found.';
    }
}

function showFeedbacks($con, $hotelUid)
{
    $sql = "SELECT r.resId, p.packageName, r.checkInDate, r.checkOutDate, c.custName, c.custEmail, h.hotel_pic, f.feedback_date, f.feedback_message, f.rating FROM feedback f JOIN reservation r ON f.resID = r.resId JOIN customer c ON r.custUid = c.custUid JOIN room s ON s.roomId =  r.roomId JOIN packages p ON p.packageId = s.packageId LEFT JOIN hotel h ON p.hotelUid = h.id WHERE h.id = $hotelUid;";

    $rs = mysqli_query($con, $sql);

    if (mysqli_num_rows($rs) > 0) {
        echo '
                <div class="row d-flex justify-content-center py-2">
                    <table class="table" style="width: 100%;">
                        <thead class="thead">
                            <tr>
                                <th scope="col">Package Name</th>
                                <th scope="col">Check In Date</th>
                                <th scope="col">Check Out Date</th>
                                <th scope="col">Reserved by</th>
                                <th scope="col">Email</th>
                                <th scope="col">Feedback Date</th>
                                <th scope="col">Feedback</th>
                                <th scope="col">Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                ';

        while ($row = mysqli_fetch_assoc($rs)) {
            echo '
                            <tr>
                                <td>' .
                $row['packageName'] .
                '</td>
                                <td>' .
                $row['checkInDate'] .
                '</td>
                                <td>' .
                $row['checkOutDate'] .
                '</td>
                                <td>' .
                $row['custName'] .
                '</td>
                                <td>' .
                $row['custEmail'] .
                '</td>
                                <td>' .
                $row['feedback_date'] .
                '</td><td>' .
                $row['feedback_message'] .
                '</td><td>' .
                $row['rating'] .
                '</td>
                            </tr>
                ';
        }
        echo '
                        </tbody>
                    </table>
                </div>
                ';
    } else {
        echo 'No reservation has been found.';
    }
}
?>

?>
</html>