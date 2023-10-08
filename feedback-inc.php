<?php
session_start();

include 'config.php';

$feedback = $_POST['feedback'];
$resId = $_POST['resId'];
$rating = $_POST['rating'];

$sql = "insert into feedback(feedback_date, feedback_message, rating, resId) values (current_date, '$feedback', '$rating', $resId)";
echo $sql;
mysqli_query($con, $sql);
?>
<script>
    alert('Thank you for your valuable feedback. We will soon come back to you.');
    location.href = 'show-reservation-front.php';
</script>