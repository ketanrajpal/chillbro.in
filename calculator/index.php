<?php require_once("../config.php"); ?>
<?php
if(!isset($_GET["slug"])){
	header("Location: ../");
}
?>
<!DOCTYPE HTML>
<html>
<?php head("Chillbro &bull; Calculator"); ?>
<body>


<?php top_header(); ?>
<section id="slider">
  <ul>
    <li><img src="../img/slide-1.jpg" alt="<h1>Uninstalling</h1><h2>We are not only providing you with Transportation , Packing and unpacking service when we talk about relocation,  but we also Assist you with Pre-Shifting chaos, such as getting your Home and Office Appliance uninstalled which includes  Ac, geyser, Washing machine,water purifier, Inveter ETC.</h2>"></li>
    <li><img src="../img/slide-2.jpg" alt="<h1>Packing & Labeling </h1><h2>Every Box And Consignment relocated by ChillBro.in is Properly Packed and Labeled, ,So that you don't mix up your Kitchenware with your books or any such item. When you need to find specific thing /product in a new place you can easily track it down by Reading Boxes Label.</h2>"></li>
    <li><img src="../img/slide-3.jpg" alt="<h1>Transportation </h1><h2>There can be no doubt that the transportation is the most critical aspect of our Service . and so does our Highly Trained Employee and Drivers Involved in it. We Take Every Possible Effort by our Side To make sure your Consignment  is Safe, Cost  Effective and Friendly to your Pocket . </h2>"></li>
    <li><img src="../img/slide-4.jpg" alt="<h1>Unpacking</h1><h2>Packing brings one side effect called unpacking , which can be really painful without some professional hands . But No  Problem now, as we will there to help you with all your unpacking Stuff.</h2>"></li>
    <li><img src="../img/slide-5.jpg" alt="<h1>Installing</h1><h2>Just like Packing Brings problem of Unpacking , same does apply for uninstalling , but Why to worry ? Just ChillBro ! when we have take responsibility for your relocation we mean every aspect of it , so every Home and Office Appliance uninstalled by our Experts will Reinstalled by at New Destination without any extra charge. To bring you even more Extra smile .</h2>"></li>
  </ul>
  <script>
  $(document).ready(function(){
  $('#slider ul').bxSlider({pager:false, captions:true, auto:true});
});
  </script>
</section>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<?php if($_GET["slug"]=="home-realocation"){ ?>
<script type="text/javascript">
var source, destination;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
google.maps.event.addDomListener(window, 'load', function () {
    new google.maps.places.SearchBox(document.getElementById('txtSource'));
    new google.maps.places.SearchBox(document.getElementById('txtDestination'));
    directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
});
function GetRoute() {
    var mumbai = new google.maps.LatLng(18.9750, 72.8258);
    var mapOptions = {
        zoom: 7,
        center: mumbai
    };
	var distance;
    source = document.getElementById("txtSource").value;
    destination = document.getElementById("txtDestination").value;
 
    var request = {
        origin: source,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });
    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix({
        origins: [source],
        destinations: [destination],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
            distance = response.rows[0].elements[0].distance.text;
            var duration = response.rows[0].elements[0].duration.text;
            var dvDistance = document.getElementById("dvDistance");
			
			dvDistance.innerHTML= "Distance Between <b>" + document.getElementById("txtSource").value + "</b> and <b>" + document.getElementById("txtDestination").value + "</b> is <b>";
			
			dvDistance.innerHTML += distance + "</b> (Rs.65/Km) <br />";
			dvDistance.innerHTML += "Base Cost Rs.2000";
			var str=distance.slice(0, -2);
			var total = 2000 + (parseFloat(str) * 65 ) + parseFloat(document.getElementById("bhk").value) + parseFloat(document.getElementById("vehicle").value) + parseFloat(document.getElementById("transfer").value);
			var servicetax = (parseFloat(total) * 0.15) + parseFloat(total);
			document.getElementById("total").innerHTML="<br>Price without sales tax: <b>Rs." + total + "</b><br>Price Including sales tax: <b>Rs."+ servicetax + "</b> (15% Sales Tax)";
			
        } else {
            alert("Unable to find the distance via road.");
        }
    });
}
</script>
<section id="content">
 <h1>Get Quote for Home Realocation</h1>
 <fieldset>
  <label for="source_address">Source Pickup Address</label>
  <input type="text" id="txtSource" value="" />
</fieldset>
<fieldset>
  <label for="destination_address">Select Drop Address</label>
  <input type="text" id="txtDestination" value=""  />
</fieldset>

<fieldset>
  <label>No of Bedrooms</label>
  <select id="bhk" name="bhk">
    <option>Select No of Bedrooms</option>
    <option value="2000">1</option>
    <option value="4500">2</option>
    <option value="6000">3</option>
    <option value="8500">4</option>
    <option value="18000">Villa*</option>
  </select>
</fieldset>
<fieldset>
  <label>Type of Vehicle</label>
  <select id="vehicle" name="vehicle">
    <option>Select type of Vehicle</option>
    <option value="2200">Small</option>
    <option value="3500">Medium</option>
    <option value="4500">Large</option>
  </select>
</fieldset>
<fieldset>
  <label>Transfer Within</label>
  <select id="transfer" name="transfer">
    <option>Transfer Within</option>
    <option value="0">City</option>
    <option value="1500">Intra State*</option>
  </select>
</fieldset>
<input type="button" value="Get Route" onclick="GetRoute()" />
<div class="clear"></div><br><br>
<h1>Approx. Quote for Home Realocation</h1>
<p id="dvDistance"></p>
<p id="total"></p>
</section>
<?php }else if($_GET["slug"]=="vehicle-realocation"){ ?>
<script type="text/javascript">
var source, destination;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
google.maps.event.addDomListener(window, 'load', function () {
    new google.maps.places.SearchBox(document.getElementById('txtSource'));
    new google.maps.places.SearchBox(document.getElementById('txtDestination'));
    directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
});
function GetRoute() {
    var mumbai = new google.maps.LatLng(18.9750, 72.8258);
    var mapOptions = {
        zoom: 7,
        center: mumbai
    };
	var distance;
    source = document.getElementById("txtSource").value;
    destination = document.getElementById("txtDestination").value;
 
    var request = {
        origin: source,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });
    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix({
        origins: [source],
        destinations: [destination],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
            distance = response.rows[0].elements[0].distance.text;
            var duration = response.rows[0].elements[0].duration.text;
            var dvDistance = document.getElementById("dvDistance");
			
			dvDistance.innerHTML= "Distance Between <b>" + document.getElementById("txtSource").value + "</b> and <b>" + document.getElementById("txtDestination").value + "</b> is <b>";
			
			dvDistance.innerHTML += distance + "</b> (Rs.35/Km) <br />";
			dvDistance.innerHTML += "Base Cost Rs.1200";
			var str=distance.slice(0, -2);
			var total = 1200 + (parseFloat(str) * 65 ) + parseFloat(document.getElementById("bhk").value);
			var servicetax = (parseFloat(total) * 0.15) + parseFloat(total);
			document.getElementById("total").innerHTML="<br>Price without sales tax: <b>Rs." + total + "</b><br>Price Including sales tax: <b>Rs."+ servicetax + "</b> (15% Sales Tax)";
			
        } else {
            alert("Unable to find the distance via road.");
        }
    });
}
</script>
<section id="content">
 <h1>Get Quote for Vehicle Realocation</h1>
<fieldset>
  <label for="source_address">Source Pickup Address</label>
  <input type="text" id="txtSource" value="" />
</fieldset>
<fieldset>
  <label for="destination_address">Select Drop Address</label>
  <input type="text" id="txtDestination" value=""  />
</fieldset>
<fieldset>
  <label>No of Vehicles</label>
  <select id="bhk" name="bhk">
    <option>Select No of Vehicles</option>
    <option value="2000">1</option>
    <option value="3500">2</option>
    <option value="5500">3</option>
  </select>
</fieldset>
<input type="button" value="Get Route" onclick="GetRoute()" />
<div class="clear"></div><br><br>
<h1>Approx. Quote for Vehicle Realocation</h1>
<p id="dvDistance"></p>
<p id="total"></p>
</section>

<?php }else if($_GET["slug"]=="transportation"){ ?>
<script type="text/javascript">
var source, destination;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
google.maps.event.addDomListener(window, 'load', function () {
    new google.maps.places.SearchBox(document.getElementById('txtSource'));
    new google.maps.places.SearchBox(document.getElementById('txtDestination'));
    directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
});
function GetRoute() {
    var mumbai = new google.maps.LatLng(18.9750, 72.8258);
    var mapOptions = {
        zoom: 7,
        center: mumbai
    };
	var distance;
    source = document.getElementById("txtSource").value;
    destination = document.getElementById("txtDestination").value;
 
    var request = {
        origin: source,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });
    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix({
        origins: [source],
        destinations: [destination],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
            distance = response.rows[0].elements[0].distance.text;
            var duration = response.rows[0].elements[0].duration.text;
            var dvDistance = document.getElementById("dvDistance");
			
			dvDistance.innerHTML= "Distance Between <b>" + document.getElementById("txtSource").value + "</b> and <b>" + document.getElementById("txtDestination").value + "</b> is <b>";
			
			dvDistance.innerHTML += distance + "</b> (Rs.40/Km) <br />";
			dvDistance.innerHTML += "Base Cost Rs.1200";
			var str=distance.slice(0, -2);
			var total = 1200 + (parseFloat(str) * 40 ) + parseFloat(document.getElementById("vehicle").value);
			var servicetax = (parseFloat(total) * 0.15) + parseFloat(total);
			document.getElementById("total").innerHTML="<br>Price without sales tax: <b>Rs." + total + "</b><br>Price Including sales tax: <b>Rs."+ servicetax + "</b> (15% Sales Tax)";
			
        } else {
            alert("Unable to find the distance via road.");
        }
    });
}
</script>
<section id="content">
 <h1>Get Quote for B2B Services\Transportation</h1>
<fieldset>
  <label for="source_address">Source Pickup Address</label>
  <input type="text" id="txtSource" value="" />
</fieldset>
<fieldset>
  <label for="destination_address">Select Drop Address</label>
  <input type="text" id="txtDestination" value=""  />
</fieldset>
<fieldset>
  <label>Type of Vehicle</label>
  <select id="vehicle" name="vehicle">
    <option>Select type of Vehicle</option>
    <option value="2000">Small</option>
    <option value="3500">Medium</option>
    <option value="5500">Large</option>
  </select>
</fieldset>
<input type="button" value="Get Route" onclick="GetRoute()" />
<div class="clear"></div><br><br>
<h1>Approx. Quote for B2B Services\Transportation</h1>
<p id="dvDistance"></p>
<p id="total"></p>
</section>
<?php }else if($_GET["slug"]=="office-realocation"){ ?>
<script type="text/javascript">
var source, destination;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
google.maps.event.addDomListener(window, 'load', function () {
    new google.maps.places.SearchBox(document.getElementById('txtSource'));
    new google.maps.places.SearchBox(document.getElementById('txtDestination'));
    directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
});
function GetRoute() {
    var mumbai = new google.maps.LatLng(18.9750, 72.8258);
    var mapOptions = {
        zoom: 7,
        center: mumbai
    };
	var distance;
    source = document.getElementById("txtSource").value;
    destination = document.getElementById("txtDestination").value;
 
    var request = {
        origin: source,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });
    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix({
        origins: [source],
        destinations: [destination],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
            distance = response.rows[0].elements[0].distance.text;
            var duration = response.rows[0].elements[0].duration.text;
            var dvDistance = document.getElementById("dvDistance");
			
			dvDistance.innerHTML= "Distance Between <b>" + document.getElementById("txtSource").value + "</b> and <b>" + document.getElementById("txtDestination").value + "</b> is <b>";
			
			dvDistance.innerHTML += distance + "</b> (Rs.35/Km) <br />";
			dvDistance.innerHTML += "Base Cost Rs.5000";
			var str=distance.slice(0, -2);
			var total = 5000 + (parseFloat(str) * 35 );
			var servicetax = (parseFloat(total) * 0.15) + parseFloat(total);
			document.getElementById("total").innerHTML="<br>Price without sales tax: <b>Rs." + total + "</b><br>Price Including sales tax: <b>Rs."+ servicetax + "</b> (15% Sales Tax)";
			
        } else {
            alert("Unable to find the distance via road.");
        }
    });
}
</script>
<section id="content">
 <h1>Get Quote for Office Realocation</h1>
<fieldset>
  <label for="source_address">Source Pickup Address</label>
  <input type="text" id="txtSource" value="" />
</fieldset>
<fieldset>
  <label for="destination_address">Select Drop Address</label>
  <input type="text" id="txtDestination" value=""  />
</fieldset>
<input type="button" value="Get Route" onclick="GetRoute()" />
<div class="clear"></div><br><br>
<h1>Approx. Quote for Office Realocation</h1>
<p id="dvDistance"></p>
<p id="total"></p>
</section>
<?php } ?>
<?php footer(); ?>
 </body>
</html>
