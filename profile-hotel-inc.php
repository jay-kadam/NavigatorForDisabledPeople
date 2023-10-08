<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'config.php';

$hotelUid = $_SESSION['hotelUid'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pwd = $_POST['pwd'];
$address = $_POST['address'];
$description = $_POST['description'];
$lat = $_POST['lat'];
$long = $_POST['long'];
$oldimg = $_POST['oldimg'];

if (strlen($_FILES['fileUpload']['name']) > 0) {
    unlink($oldimg);

    $oldimg = 'hotels/' . basename($_FILES['fileUpload']['name']);
    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $oldimg);
}

$sql = "update hotel set hotel_name='$name', hotel_address='$address', hotel_phone='$phone', hotel_email='$email', hotel_pwd='$pwd', hotel_lat='$lat', hotel_long='$long', hotel_pic='$oldimg', hotel_disc='$description' where id=$hotelUid";

mysqli_query($con, $sql);

$op1 = isset($_POST['op1']) ? 1 : 0;
$op2 = isset($_POST['op2']) ? 1 : 0;
$op3 = isset($_POST['op3']) ? 1 : 0;
$op4 = isset($_POST['op4']) ? 1 : 0;
$op5 = isset($_POST['op5']) ? 1 : 0;
$op6 = isset($_POST['op6']) ? 1 : 0;
$op7 = isset($_POST['op7']) ? 1 : 0;
$op8 = isset($_POST['op8']) ? 1 : 0;
$op9 = isset($_POST['op9']) ? 1 : 0;
$op10 = isset($_POST['op10']) ? 1 : 0;
$op11 = isset($_POST['op11']) ? 1 : 0;
$op12 = isset($_POST['op12']) ? 1 : 0;
$op13 = isset($_POST['op13']) ? 1 : 0;
$op14 = isset($_POST['op14']) ? 1 : 0;
$op15 = isset($_POST['op15']) ? 1 : 0;

$sql = "update amenities set parking=$op1, lift=$op2, door=$op3, washroom=$op4, public=$op5, doorways=$op6, power_switches=$op7, door_handles=$op8, bed_space=$op9, shower=$op10, shower_seat=$op11, grab_bars=$op12, raised_toilet=$op13, proximity1=$op14, proximity2=$op15 where id=$hotelUid";

mysqli_query($con, $sql);
?>
<script>
    alert('Changed Successfully'); 
    window.location.href='profile-hotel-front.php'
</script>";
