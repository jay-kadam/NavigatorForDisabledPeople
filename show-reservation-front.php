<?php
session_start();

include 'navbar.php';
include 'config.php';

showReservations($con, $_SESSION['custUid']);

function showReservations($con, $custUid)
{
    $sql = "
        SELECT r.resId, r.checkInDate, r.checkOutDate, h.hotel_name, h.hotel_address, h.hotel_pic, p.packageName
        FROM reservation r 
        JOIN room s ON r.roomId = s.roomId
        JOIN packages p ON p.packageId = s.packageId
        LEFT JOIN hotel h ON h.id = p.hotelUid
        WHERE custUid = $custUid;     
        ";

    $stmt = mysqli_query($con, $sql);

    if (mysqli_num_rows($stmt) > 0) {
        echo '
            <div class="title">
            <h1>Your Reservations</h1>
            </div>
            ';

        while ($row = mysqli_fetch_assoc($stmt)) {
            echo '
            <div class="col d-flex justify-content-center">
                <div class="card mb-3" style="width: 700px; margin-top:20px">
                    <img class="card-img-top" src=' .
                $row['hotel_pic'] .
                ' alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">' .
                $row['packageName'] .
                ', ' .
                $row['hotel_name'] .
                '</h5>
                        <p class="card-text">' .
                $row['hotel_address'] .
                '</p>
                        <p class="card-text"><small>Check-in Date: ' .
                $row['checkInDate'] .
                '<br>Check-out Date: ' .
                $row['checkOutDate'] .
                '</small></p>
                        <a class="btn btn-primary btn-sm" href="cancel-reservation-inc.php?id=' .
                $row['resId'] .
                '" role="button">Cancel Reservation</a>
                <a class="btn btn-primary btn-sm" data-bs-target="#registerUser' .
                $row['resId'] .
                '" data-bs-toggle="modal">Post Feedback</a>
                    </div>
                </div>
            </div>
            '; ?>

<div class="modal fade modal-lg" id="registerUser<?= $row[
    'resId'
] ?>" aria-hidden="true" aria-labelledby="registerUserTitle" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="registerUserTitle">Post your feedback</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="register_user" method="POST" action="feedback-inc.php">
				<div class="form-row">
					<div class="mb-3">
                        <textarea name="feedback" class="form-control" cols="30" rows="5" placeholder="Enter your feedback" required></textarea>
					</div>
				</div>
				<div class="mb-3">
					<select class="form-control" name="rating" required>
						<option value="">Select your rating</option>
						<option value="Excellent">Excellent</option>
						<option value="Good">Good</option>
                        <option value="Average">Average</option>
                        <option value="Poor">Poor</option>
					</select>
				</div>
                <input type="hidden" name="resId" id="resId" value="<?= $row[
                    'resId'
                ] ?>">
				<button type="submit" name="submitU" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>


<?php
        }
    } else {
        echo '<div class="title">
                <h1>No Reservations Found</h1>
            </div>
            ';
    }
}
?>


