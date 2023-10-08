<?php
session_start();

include 'config.php';

$resId = $_GET['id'];

$sql = "DELETE FROM reservation WHERE resId = $resId";

mysqli_query($con, $sql);

if ($_SESSION['accountType'] === 'customer') {
    echo "<script>alert('Your reservation have been successfully cancelled.'); 
                window.location.href='show-reservation-front.php'</script>";
} else {
    echo "<script>alert('The reservation have been successfully cancelled.'); 
                window.location.href='dashboard-hotel-front.php'</script>";
}
?>
