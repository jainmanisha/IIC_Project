<!DOCTYPE html>
<html>
  <head>

	
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        margin: 0;
        padding: 0;
        height: 90%;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBABGScJQIfCPdEHscp_YPmr79uAtdYU-k&sensor=false&region=IN"></script>
    <script>
var map;
function initialize() {
  var mapOptions = {
    zoom: 5,
    center: new google.maps.LatLng(27, 75),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}
function get_marker(lat,lon) {
var myLatlng = new google.maps.LatLng(lat,lon);
 var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });
var infowindow = new google.maps.InfoWindow({
      content: 'My lat is ' + lat + 'My lon is ' + lon
  });
google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}

function codeAddress(address) {
  var geocoder;
   geocoder = new google.maps.Geocoder();
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
          title: address
      });
      var infowindow = new google.maps.InfoWindow({
      content: address
  });
google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
//codeAddress('RAJASTHAN');
    </script>
  </head>
  <body>


<br>&nbsp;&nbsp;<a href="index.html">Back</a>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<img src="imgBL.png" width="480" height="55" alt="" title="" /></p>



 <form method="post">
 
<p align="center" style="font-size:18px">Enter the state&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<select name="sstate">
                        <option selected="selected" value=""> -- Select -- </option>
			
			<option value="ANDAMAN & NICOBAR ISLANDS">ANDAMAN & NICOBAR ISLANDS</option>
			<option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
			<option value="ASSAM">ASSAM</option>
			<option value="BIHAR">BIHAR</option>
			<option value="CHANDIGARH">CHANDIGARH </option>
			<option value="CHATTISGARH">CHATTISGARH </option>
                        <option value="DELHI">DELHI</option>
			<option value="GOA">GOA </option>
			<option value="GUJARAT"> GUJARAT </option>
			<option value="HARYANA">HARYANA </option>
			<option value="HIMACHAL PRADESH"> HIMACHAL PRADESH </option>
			<option value="JAMMU & KASHMIR"> JAMMU & KASHMIR </option>
			<option value="JHARKHAND"> JHARKHAND </option>
			<option value="KARNATAKA"> KARNATAKA </option>
			<option value="KERALA"> KERALA </option>
			<option value="MADHYA PRADESH"> MADHYA PRADESH </option>
			<option value="MAHARASHTRA"> MAHARASHTRA </option>
			<option value="MANIPUR"> MANIPUR </option>
			<option value="MEGHALAYA"> MEGHALAYA </option>
			<option value="MIZORAM"> MIZORAM </option>
			<option value="NAGALAND"> NAGALAND</option>
			<option value="ORISSA"> ORISSA </option>
			<option value="PONDICHERRY"> PONDICHERRY </option>
			<option value="PUNJAB"> PUNJAB </option>
			<option value="RAJASTHAN"> RAJASTHAN</option>
			<option value="TAMIL NADU"> TAMIL NADU </option>
			<option value="TRIPURA"> TRIPURA </option>
                        <option value="UTTAR PRADESH"> UTTAR PRADESH</option>
			<option value="UTTARAKHAND"> UTTARAKHAND </option>
			<option value="WEST BENGAL">WEST BENGAL</option>
			</select>
 

		
 
			
			
			

&nbsp;&nbsp; <button type="submit" class="btn btn-success"> Search </button>
  
 
 </form>











   <?php
	$host = mysqli_connect("localhost", "Contrivers", "manisha", "test");
	if(mysqli_connect_errno($host)) {
	    echo "Not connected to database";
	} 

	$state = $_POST["sstate"];
	$result = mysqli_query($host, "SELECT officename FROM bureau WHERE statename='$state'");
	 
	while($row = mysqli_fetch_array($result))

	
	{
?>
	<script>
       

		codeAddress("<?php echo $row["officename"]?>");
               
	</script>
    <?php
        }
    ?>

	<div id="map-canvas"></div> 

  </body>
</html>
