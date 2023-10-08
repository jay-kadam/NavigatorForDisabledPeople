<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'config.php';

$hotelUid = $_SESSION['hotelUid'];

if (isset($_POST['submit'])) {
    $packageId = $_POST['packageId'];
    $packageName = $_POST['name'];
    $packagePrice = $_POST['price'];
    $packageDesc = mysqli_real_escape_string($con, $_POST['description']);
    $packageImage = $_POST['packageImage'];

    if (strlen($_FILES['fileUpload']['name']) > 0) {
        unlink($packageImage);

        $packageImage = 'packages/' . basename($_FILES['fileUpload']['name']);
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $packageImage);
    }

    $sql = "update packages set hotelUid=$hotelUid, packageName='$packageName', packagePrice=$packagePrice, packageDesc='$packageDesc', packageImage='$packageImage' where packageId=$packageId";

    mysqli_query($con, $sql);

    echo "
            <script>
                alert('Package changed successfully'); 
                window.location.href='packages-hotel-front.php'
            </script>";
}

if (isset($_POST['submitA'])) {
    $packageImage = 'packages/' . basename($_FILES['fileUpload']['name']);
    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $packageImage);

    $packageName = $_POST['name'];
    $packagePrice = $_POST['price'];
    $packageDesc = mysqli_real_escape_string($con, $_POST['description']);

    $sql = "INSERT INTO packages (hotelUid, packageName, packagePrice, packageDesc, packageImage) VALUES ($hotelUid, '$packageName', $packagePrice, '$packageDesc', '$packageImage')";

    mysqli_query($con, $sql);

    echo "
            <script>
                alert('Package added successfully'); 
                window.location.href='packages-hotel-front.php'
            </script>";
}

if (isset($_POST['delete'])) {
    $packageId = $_POST['packageId'];

    $packageImage = $_POST['packageImage'];

    unlink($packageImage);

    $sql = "UPDATE room SET isDeleted = 1 WHERE packageId = $packageId";
    mysqli_query($con, $sql);

    $sql2 = "UPDATE packages SET isDeleted= 1 WHERE packageId = $packageId";
    mysqli_query($con, $sql2);

    echo "
            <script>
                alert('Package deleted successfully'); 
                window.location.href='packages-hotel-front.php'
            </script>";
}

if (isset($_POST['submitR'])) {
    $packageId = $_POST['packageId'];
    $roomNum = $_POST['roomNum'];

    $sql = "INSERT INTO room (roomNum, packageId, hotelUid) VALUES ('$roomNum', $packageId, $hotelUid)";

    mysqli_query($con, $sql);

    echo "
            <script>
                alert('Room added successfully'); 
                window.location.href='packages-hotel-front.php'
            </script>";
}

if (isset($_POST['deleteR'])) {
    $roomNum = $_POST['roomNum'];
    $packageId = $_POST['packageId'];

    $sql = "UPDATE room SET isDeleted = 1 WHERE roomNum = '$roomNum' AND packageId = $packageId";

    mysqli_query($con, $sql);

    echo "<script>
        alert('Deleted Successfully'); 
        window.location.href='packages-hotel-front.php';
    </script>";
}
?>
