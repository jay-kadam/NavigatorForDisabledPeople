<?php
session_start(); ?>

<?php
include 'navbar.php';
include 'config.php';

$location = $_POST['location'];
$checkInDate = $_POST['checkInDate'];
$checkOutDate = $_POST['checkOutDate'];

$_SESSION['location'] = $location;
$_SESSION['checkInDate'] = $checkInDate;
$_SESSION['checkOutDate'] = $checkOutDate;

$sql = "
    SELECT DISTINCT h.*
    FROM hotel h
    JOIN packages p ON h.id = p.hotelUid
    JOIN room r ON p.packageId = r.packageId
    LEFT JOIN reservation s ON r.roomId = s.roomId
    WHERE (h.hotel_name LIKE '%$location%' OR h.hotel_address LIKE '%$location%') 
    AND p.isDeleted = 0
    AND h.status = 1
    AND r.roomId NOT IN (
        SELECT s.roomId 
        FROM reservation s 
        WHERE s.roomId = r.roomId 
        AND (s.checkInDate <= '$checkOutDate' AND s.checkOutDate >= '$checkInDate')
    ) AND r.isDeleted = 0
    ;";
?>

<script>
function show_map(){
var LocationsForMap = [
<?php
$rs = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($rs)) { ?>
      ['<?= $row['hotel_name'] ?>',<?= $row['hotel_lat'] ?>, <?= $row[
    'hotel_long'
] ?>],
<?php }
?>

    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 2,
      center: new google.maps.LatLng(28.704, 77.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < LocationsForMap.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(LocationsForMap[i][1], LocationsForMap[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(LocationsForMap[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}
</script>

<?php
$stmt = mysqli_query($con, $sql);
if (mysqli_num_rows($stmt) > 0) {
    echo '<center><div id="map" style="width: 500px; height: 400px;"></div></center>';
    echo '<div class="title"><h1>Available Hotels</h1></div>';

    while ($row = mysqli_fetch_assoc($stmt)) {
        echo '
            <div class="col d-flex justify-content-center">
                <div class="card mb-3" style="width: 700px; margin-top:20px">
                    <img class="card-img-top" src=' .
            $row['hotel_pic'] .
            ' alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">' .
            $row['hotel_name'] .
            '</h5>
                        <p class="card-text">' .
            $row['hotel_address'] .
            '</p>
                        <p class="card-text"><small class="text-muted">' .
            $row['hotel_disc'] .
            '</small></p>
                        <a class="btn btn-primary btn-sm" href="reservation-front.php?hotelId=' .
            $row['id'] .
            '" role="button">View More</a> <a href="#myModal" data-bs-toggle="modal" data-id="' .
            $row['id'] .
            '" class="btn btn-primary btn-sm" id="btnblock">Amenities</a>
                    </div>
                </div>
            </div>
            ';
    }
    echo '<script>show_map()</script>';
} else {
    echo "<script>alert('No hotels were found for the given location or date. Please try again.'); 
        window.location.href='index.php'</script>";
}
?>


<div class="modal fade" id="myModal" aria-hidden="true" aria-labelledby="registerTitle" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="registerTitle">Hotel Amenities</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" id="result">
			</div>
			<div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
  $(document).ready(function(){
	$('#btnblock').click(function(){
    		var id = $(this).data('id');
		$.ajax({
        		type: 'POST',
        		url: 'get-amenities.php?id='+id,
        		data:{id: id},
        		success: function(data) {
          			$('.modal-body').html(data);
                $('#myModal').modal('show');
        		},
        		error:function(err){
          			alert("error"+JSON.stringify(err));
        		}
    		});
 	});
});
</script>
