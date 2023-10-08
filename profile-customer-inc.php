<?php
session_start();

include 'config.php';

$custId = $_SESSION['custUid'];

if (isset($_POST['submit'])) {
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];
    $newPwd = $_POST['pwd'];
    $newAge = $_POST['age'];
    $newOrigin = $_POST['origin'];
    $newGender = $_POST['gender'];

    $sql = "UPDATE customer SET custName = '$newName', custEmail = '$newEmail', custPwd = '$newPwd', 
    custAge = '$newAge', custPlace = '$newOrigin', custGender = '$newGender' WHERE custUid='$custId'";

    mysqli_query($con, $sql);

    echo "<script>alert('Profile changed successfully'); 
        window.location.href='profile-customer-front.php'</script>";
}
?>
