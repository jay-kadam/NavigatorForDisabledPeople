<?php
session_start();

include 'navbar.php';
include 'config.php';

$_SESSION['hotelId'] = $_GET['hotelId'];

if (isset($_SESSION['accountType'])) {
    getPackageDetails(
        $con,
        $_SESSION['hotelId'],
        $_SESSION['checkInDate'],
        $_SESSION['checkOutDate']
    );
} else {
    echo "<script>alert('Please login to continue.'); 
        window.location.href='login-front.php'</script>";
}

function getPackageDetails($con, $hotelId, $checkInDate, $checkOutDate)
{
    $sql = "
        SELECT DISTINCT p.*,r.*
        FROM packages p
        JOIN hotel h ON h.id = p.hotelUid
        JOIN room r ON p.packageId = r.packageId
        LEFT JOIN reservation s ON r.roomId = s.roomId
        WHERE h.id = $hotelId
        AND p.isDeleted = '0'
        AND r.roomId NOT IN (
            SELECT s.roomId 
            FROM reservation s 
            WHERE s.roomId = r.roomId 
            AND (s.checkInDate <= '$checkOutDate' AND s.checkOutDate >= '$checkInDate')
        ) AND r.isDeleted = '0'
        ;";

    $stmt = mysqli_query($con, $sql);
    if (mysqli_num_rows($stmt) > 0) {
        echo '<div class="title"><h1>Available Packages</h1></div>';

        while ($row = mysqli_fetch_assoc($stmt)) {
            echo '
                <div class="col d-flex justify-content-center">
                    <div class="card mb-3" style="width: 700px; margin-top:20px">
                    <img class="card-img-top" src=' .
                $row['packageImage'] .
                ' alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">' .
                $row['packageName'] .
                '</h5>
                            <p class="card-text"><small>Rs.' .
                $row['packagePrice'] .
                '/night</small></p>

                            <p class="card-text"><small class="text-muted">
                            ' .
                $row['packageDesc'] .
                '</small></p>
                                <form action="payment-front.php" method="POST">
                                <input type="hidden" name="packageId" value=' .
                $row['packageId'] .
                '>
                <input type="hidden" name="roomId" value='.$row['roomId'].'>';

            if ($_SESSION['accountType'] == 'customer') {
                echo '<input type="submit" class="btn btn-primary btn-sm" value="Book now">';
            }
            echo '</form>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo 'No packages are available at the moment. Consider changing the check in and check out dates.';
    }
}
?>

