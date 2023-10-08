<?php
session_start();

include 'config.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $type = $_POST['accType'];

    if ($type == 'customer') {
        $sql = "SELECT * FROM customer WHERE custEmail = '$email' AND custPwd = '$pwd'";

        $rs = mysqli_query($con, $sql);

        if ($row = mysqli_fetch_assoc($rs)) {
            $_SESSION['accountType'] = 'customer';
            $_SESSION['custUid'] = $row['custUid'];

            echo "<script>alert('You are now logged in'); window.location.href='index.php'</script>";
        } else {
            echo "<script>alert('No account found'); window.location.href='login-front.php'</script>";
        }
    } elseif ($type == 'hotel') {
        $sql = "SELECT * FROM hotel WHERE hotel_email = '$email' AND hotel_pwd = '$pwd' and status=1";

        $rs = mysqli_query($con, $sql);

        if ($row = mysqli_fetch_assoc($rs)) {
            $_SESSION['accountType'] = 'hotel';
            $_SESSION['hotelUid'] = $row['id'];
            $_SESSION['hotelName'] = $row['hotel_name'];

            echo "<script>alert('You are now logged in'); window.location.href='dashboard-hotel-front.php'</script>";
        } else {
            echo "<script>alert('No account found'); window.location.href='login-front.php'</script>";
        }
    } elseif ($type == 'admin') {
        $sql = "SELECT * FROM admin WHERE admin_email = '$email' AND admin_pwd = '$pwd'";

        $rs = mysqli_query($con, $sql);

        if ($row = mysqli_fetch_assoc($rs)) {
            $_SESSION['accountType'] = 'admin';
            $_SESSION['adminUid'] = $row['admin_id'];
            $_SESSION['adminName'] = $row['admin_name'];

            echo "<script>alert('You are now logged in'); window.location.href='dashboard-admin-front.php'</script>";
        } else {
            echo "<script>alert('No account found'); window.location.href='login-front.php'</script>";
        }
    }
}
?>
