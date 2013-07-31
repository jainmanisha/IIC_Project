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
        height: 98%;
	width: 100%;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBABGScJQIfCPdEHscp_YPmr79uAtdYU-k&sensor=false&region=IN"></script>
    <script>
var markersArray = [];
var map;
function initialize() {
  var mapOptions = {
    zoom: 4,
    center: new google.maps.LatLng(25, 80),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);



function codeLatLong(lat, lng, officename) {
	mylatlong = new google.maps.LatLng(lat, lng)
	
	     var marker = new google.maps.Marker({
        position: mylatlong ,
        map: map,
        title:officename,
     
	});
 var infowindow = new google.maps.InfoWindow({
      content:officename
  });
google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
 markersArray.push(marker);	
marker.setVisible(true);
}

<?php
	$host = mysqli_connect("localhost", "Contrivers", "manisha", "test");
	
	$state = $_POST["sstate"];
	$arsenic = mysqli_query($host, "SELECT officename,Latitude,Longitude FROM coord WHERE statename='$state'");


	 
	while($row = mysqli_fetch_array($arsenic))

	
	{

		
?>
	
		codeLatLong(<?php echo $row['Latitude'] . ", " . $row['Longitude'];?>, '<?php echo $row[officename]; ?>');
		
	
    <?php

	}
    
    	
	 ?>

}



google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  


<body>


<br>&nbsp;&nbsp;<a href="index.html">Back</a>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<img src="imgCL.png" width="490" height="55" alt="" title="" /></p>
   <form method="post">

<p align="center" style="font-size:18px">Enter the state&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name="sstate">
                        <option selected="selected" value=""> -- Select --</option>			
                        
			<option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
			<option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                        <option value="ASSAM">ASSAM</option>
			<option value="BIHAR">BIHAR</option>
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
			<option value="MEGHALAYA"> MEGHALAYA </option>
			<option value="ORISSA"> ORISSA </option>
			<option value="PUNJAB"> PUNJAB </option>
			<option value="RAJASTHAN"> RAJASTHAN</option>
			<option value="TAMIL NADU"> TAMIL NADU </option>
			<option value="TRIPURA"> TRIPURA </option>
                        <option value="UTTAR PRADESH"> UTTAR PRADESH</option>
			<option value="UTTARAKHAND"> UTTARAKHAND </option>
			<option value="WEST BENGAL">WEST BENGAL</option>
			</select>
 

			
 
			
			
			

 &nbsp;&nbsp;<button type="submit" class="btn btn-success"> Search </button>
  
 </form>



	<div id="map-canvas"></div> 
	
  </body>
</html>
