<?php
include 'config.php';

if (isset($_POST['submitU'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $age = $_POST['age'];
    $origin = $_POST['origin'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO customer (custName, custEmail, custPwd, custAge, custPlace, custGender) VALUES ('$name', '$email', '$pwd', $age, '$origin', '$gender')";

    mysqli_query($con, $sql);

    $n = mysqli_affected_rows($con);

    if ($n > 0) {
        echo "<script>alert('Customer account successfully created'); window.location.href='login-front.php'</script>";
    } else {
        echo "<script>alert('Failed to create customer account. Please try again.'); window.location.href='register-form.php'</script>";
    }
}

if (isset($_POST['submitH'])) {
    $target_file = 'hotels/' . basename($_FILES['fileUpload']['name']);
    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file);

    $hName = $_POST['hName'];
    $hAdd = $_POST['hAdd'];
    $hPhone = $_POST['hPhone'];
    $hEmail = $_POST['hEmail'];
    $hPwd = $_POST['hPwd'];
    $hLat = $_POST['hLat'];
    $hLong = $_POST['hLong'];
    $imgPath = $target_file;
    $hDesc = mysqli_real_escape_string($con, $_POST['hDesc']);

    $sql = "insert into hotel(hotel_name, hotel_address, hotel_phone, hotel_email, hotel_pwd, hotel_lat, hotel_long, hotel_pic, hotel_disc) values('$hName','$hAdd','$hPhone','$hEmail','$hPwd',$hLat, $hLong, '$imgPath', '$hDesc')";

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

    $sql = "insert into amenities(parking, lift, door, washroom, public, doorways, power_switches, door_handles, bed_space, shower, shower_seat, grab_bars, raised_toilet, proximity1, proximity2) values ($op1, $op2, $op3, $op4, $op5, $op6, $op7, $op8, $op9, $op10, $op11, $op12, $op13, $op14, $op15)";
    mysqli_query($con, $sql);

    $n = mysqli_affected_rows($con);

    if ($n > 0) {
        echo "<script>alert('Hotel account successfully created'); window.location.href='login-front.php'</script>";
    } else {
        echo "<script>alert('Failed to create hotel account. Please try again.'); window.location.href='register-form.php'</script>";
    }
}
?>
