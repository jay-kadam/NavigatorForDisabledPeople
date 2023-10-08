<?php
session_start();

include 'navbar.php';
include 'config.php';

$custId = $_SESSION['custUid'];
$hotelId = $_SESSION['hotelId'];
$checkIn = $_SESSION['checkInDate'];
$checkOut = $_SESSION['checkOutDate'];
$packageId = $_SESSION['packId'];
$price = $_SESSION['price'];

$rs = mysqli_query($con, "select * from hotel where id=$hotelId");
$row = mysqli_fetch_assoc($rs);

$rs = mysqli_query($con, "select * from packages where packageId=$packageId");
$row1 = mysqli_fetch_assoc($rs);
?>

<html>

    <div class="col d-flex justify-content-center">
        <div class="card mb-3" style="width: 700px; margin-top:20px">
            <img class="card-img-top" src="<?= $row[
                'hotel_pic'
            ] ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $row['hotel_name'] ?></h5>
                    <p class="card-text"><small>Check-in Date: <?= $checkIn ?><br>Check-out Date: <?= $checkOut ?></small></p>
            </div>
        </div>
    </div>

    <div class="payment">
        <div class="container">
            <h1>Payment Details</h1>
            <div class="section">
                <table>
                    <tr>
                        <td>Package:</td>
                        <td><?= $row1['packageName'] ?></td>
                    </tr>
                    <tr>
                        <td>Price per Package:</td>
                        <td>Rs. <?= $row1['packagePrice'] ?></td>
                    </tr>
                    <tr>
                        <td>Number of Nights:</td>
                        <td><?= $nights = numOfNights(
                            $checkIn,
                            $checkOut
                        ) ?></td>
                    </tr>
                    <tr>
                        <td>Sub-Total:</td>
                        <td>Rs. <?= sprintf(
                            '%0.2f',
                            $row1['packagePrice'] * $nights
                        ) ?></td>
                    </tr>
                    <tr>
                        <td>Booking Fee:</td>
                        <td>Rs. <?= 100 ?></td>
                    </tr>
                    <tr style="background-color:#ECECEC;">
                        <td><b>Total Amount Payable:</b></td>
                        <td><b>Rs. <?= $price ?></b></td>
                    </tr>
                </table>
            </div>
            <div>
                <h1>Paid Online</h1>
            </div>
        </div>
    </div>
    <div style="padding-bottom: 40px;"></div>

</html>

<?php function numOfNights($checkInDate, $checkOutDate)
{
    $date1 = strtotime($checkInDate);
    $date2 = strtotime($checkOutDate);
    $diff = abs($date2 - $date1);
    $years = floor($diff / (365 * 60 * 60 * 24));
    $months = floor(
        ($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24)
    );
    $days = floor(
        ($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) /
            (60 * 60 * 24)
    );
    $nights = $years * 365 + $months * 30 + $days;
    return $nights;
} ?>
