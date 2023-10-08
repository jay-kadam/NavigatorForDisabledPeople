<?php
session_start();
include 'navbar.php';
include 'config.php';

$custId = $_SESSION['custUid'];
$hotelId = $_SESSION['hotelId'];
$checkIn = $_SESSION['checkInDate'];
$checkOut = $_SESSION['checkOutDate'];
$packageId = $_SESSION['packId'] = $_POST['packageId'];
$roomId = $_SESSION['roomId']=$_POST['roomId'];
$rs = mysqli_query($con, "select * from hotel where id=$hotelId");
$row = mysqli_fetch_assoc($rs);

$rs = mysqli_query($con, "select * from packages where packageId = $packageId");
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
            <h1>Booking Details</h1>
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
                        <td><b>Rs. 
                            <?php
                            $finalPrice = $row1['packagePrice'] * $nights + 100;
                            $_SESSION['price'] = sprintf('%0.2f', $finalPrice);

                            echo $_SESSION['price'];
                            ?>
                        </b></td>
                    </tr>
                </table>
            </div>
            <div class="section">
                <h1>Payment Options</h1>
                <form>
                        <input type="radio" name="payment" value="now" id="pay-now" required>
                    <label for="pay-now">Pay Now</label><br>
                        <input type="radio" name="payment" value="later" id="pay-later" required>
                    <label for="pay-later">Pay Later</label>
                </form>
            </div>

        <div id="payment-details" style="display: none;">
            <div class="section">
                <h1>Payment Details</h1>
                <form id="pay-now" method="POST" action="payment-inc.php">
                    <label for="card-number">Card Number:</label><br>
                        <input type="text" id="card-number" placeholder="xxxx-xxxx-xxxx-xxxx" pattern="^\d{4}-\d{4}-\d{4}-\d{4}$" required><br>

                    <label for="expiry-date">Expiry Date:</label><br>
                        <input type="text" id="expiry-date" placeholder="MM/YY" pattern="^\d{2}/\d{2}$" required><br>

                    <label for="cvv">CVV:</label><br>
                        <input type="password" id="cvv" placeholder="xxx" pattern="^\d{3}$" required><br>

                    <button type="submit" id="submit" name="submit" value="pay-now">Pay Now</button>
                </form>
            </div>
        </div>

        <div id="continue-button" style="display: none;">
            <form id="pay-later" method="POST" action="payment-inc.php">
                <button type="submit" name="submit" id="submit" value="pay-later">Continue</button>
            </form>
        </div>
    </div>

    <div style="padding-bottom: 40px;"></div>

    <script>
        var paymentOptions = document.getElementsByName("payment");
        var paymentDetails = document.getElementById("payment-details");
        var continueButton = document.getElementById("continue-button")

        for (var i = 0; i < paymentOptions.length; i++) {
            paymentOptions[i].addEventListener("click", function() {
                if (this.value == "now") {
                    paymentDetails.style.display = "block";
                    continueButton.style.display = "none";
                } else {
                    paymentDetails.style.display = "none";
                    continueButton.style.display = "block";
                }
            });
        }
    </script>
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
</html>