<?php
include 'config.php';

$rs = mysqli_query($con, 'select * from amenities where id=' . $_GET['id']);
$row1 = mysqli_fetch_row($rs);
?>

<table class="table table-bordered">
<tr>
	<td>1.</td><td>Designated handicap parking with a priority location in the parking lot.</td><td><?php if (
     $row1[1] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>2.</td><td>Step free access (level or ramped) and/or lift access to main entrance.</td><td><?php if (
     $row1[2] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>3.</td><td>Automated door opening.</td><td><?php if (
     $row1[3] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>	
	<td>4.</td><td>Ground level/lobby level accessible washroom.</td><td><?php if (
     $row1[4] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>5.</td><td>Level or ramped access to public areas.</td><td><?php if (
     $row1[5] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>6.</td><td>Wider entry and bathroom doorways – external 80 cm, internal 75 cm. Easy to open?</td><td><?php if (
     $row1[6] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>7.</td><td>Mid-height light switches and power outlets</td><td><?php if (
     $row1[7] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>8.</td><td>Lever type door handles</td><td><?php if (
     $row1[8] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>9.</td><td>Maneuvering space on each side of the bed – 90 cm</td><td><?php if (
     $row1[9] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>10.</td><td>Roll in shower</td><td><?php if (
     $row1[10] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>11.</td><td>Wheeled shower chair and/or wall mounted shower seat</td><td><?php if (
     $row1[11] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>12.</td><td>Grab bars in bathroom</td><td><?php if (
     $row1[12] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>13.</td><td>Raised toilet</td><td><?php if (
     $row1[13] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>14.</td><td>Proximity to markets, pubs, restaurants ... up to 500 m distant.</td><td><?php if (
     $row1[14] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
<tr>
	<td>15.</td><td>Proximity to health services.</td><td><?php if (
     $row1[15] == 1
 ) { ?><i class="fa fa-check" aria-hidden="true"></i><?php } else { ?><i class="fa fa-times" aria-hidden="true"></i><?php } ?></td>
</tr>
</table>	