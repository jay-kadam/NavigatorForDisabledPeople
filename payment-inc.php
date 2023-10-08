<?php
session_start();

include 'config.php';

$custUid = $_SESSION['custUid'];
$checkIn = $_SESSION['checkInDate'];
$checkOut = $_SESSION['checkOutDate'];

if (isset($_POST['submit'])) {
    $roomId = $_SESSION['roomId'];
    $price = $_SESSION['price'];

    if ($_POST['submit'] == 'pay-now') {
        $sql = "INSERT INTO payment (finalPrice, payMethod, payStatus) 
        VALUES ($price, 'Online Payment', 'Paid')";

        mysqli_query($con, $sql);

        $sql = "INSERT INTO reservation (checkInDate, checkOutDate, custUid, roomId) 
        VALUES ('$checkIn', '$checkOut', $custUid, $roomId)";
        mysqli_query($con, $sql);

        echo "<script>alert('Thank You For Your Payment!');
            window.location.href='paid-online-front.php'</script>";
    } elseif ($_POST['submit'] == 'pay-later') {
        $sql = "INSERT INTO payment (finalPrice, payMethod, payStatus) 
        VALUES ($price, 'Physical Payment', 'Unpaid')";

        mysqli_query($con, $sql);

        $sql = "INSERT INTO reservation (checkInDate, checkOutDate, custUid, roomId) 
        VALUES ('$checkIn', '$checkOut', $custUid, $roomId)";
        mysqli_query($con, $sql);

        echo "<script>alert('Please Pay at the Hotel Counter Before Check-In.');
            window.location.href='pay-later-front.php'</script>";
    }
}
?>
