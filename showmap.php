<?php include 'config.php'; ?>

<?php $rs = mysqli_query($con, 'select * from hotel'); ?>

<html>
<head>
<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
</head>
<body>
<div id="map" style="width: 500px; height: 400px;"></div>
<script>

var LocationsForMap = [
<?php while ($row = mysqli_fetch_assoc($rs)) { ?>
      ['<?= $row['hotel_name'] ?>',<?= $row['hotel_lat'] ?>, <?= $row[
    'hotel_long'
] ?>],
<?php } ?>

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
</script>
</body>
</html>