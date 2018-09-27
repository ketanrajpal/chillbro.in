<?php function head($title){ ?><head>
  <title><?php echo $title; ?></title>
  <meta name="keywords" content="Packers and Movers , Movers and Packers , Packers & Movers, Movers & Packers, Packers and Movers Delhi , Movers and Packers India, Shifting solution, shift, Movers and Packers Mumbai, Movers and Packers Kolkata, warehousing, Home, Transportation , Freight,  new house,   Movers and Packers Delhi, Vehicle Transportation , Vehicle Transportation India , Vehicle Transportation Delhi, Corporate Relocation, Corporate Relocation Delhi, Corporate Relocation India,Household Moving  Household Moving Delhi,Packing Unpacking">
  <link rel="stylesheet" type="text/css" href="../css/reset.css">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="../css/slicknav.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.bxslider.css">
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="../js/jquery.bxslider.min.js"></script>
  <script src="../js/jquery.slicknav.min.js"></script>
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
  <link rel="shortcut icon" href="../img/favicon.ico">
  
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var source_address = new google.maps.places.Autocomplete(document.getElementById('source_address'));
			var destination_address = new google.maps.places.Autocomplete(document.getElementById('destination_address'));
            
			google.maps.event.addListener(source_address, 'place_changed', function () {
                var place = source_address.getPlace();
                var address = source_address.formatted_address;
                var latitude = source_address.geometry.location.lat();
                var longitude = source_address.geometry.location.lng();
                var mesg = "Address: " + address;
                mesg += "\nLatitude: " + latitude;
                mesg += "\nLongitude: " + longitude;
                alert(mesg);
            });
			google.maps.event.addListener(destination_address, 'place_changed', function () {
                var place = destination_address.getPlace();
                var address = destination_address.formatted_address;
                var latitude = destination_address.geometry.location.lat();
                var longitude = destination_address.geometry.location.lng();
                var mesg = "Address: " + address;
                mesg += "\nLatitude: " + latitude;
                mesg += "\nLongitude: " + longitude;
                alert(mesg);
            });
        });
    </script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74681522-1', 'auto');
  ga('send', 'pageview');

</script>
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3kLDve5lOHgudm2etkmrMa24ZkY9ZIBl";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->
 </head>
<?php } ?>

<?php function top_header(){ ?>

<section id="top_header">
   <header class="clear">
   <a href="" id="logo"><img src="../img/logo.png"></a>
   <nav>
    <ul>
     <li><a href="../"><span class="fa fa-home"></span>Home</a></li>
     <li><a href="../about"><span class="fa fa-trophy"></span>About</a></li>
     <li class="submenu">
      <a href="#"><span class="fa fa-calculator"></span>Calculator</a>
      <ul>
       <li><a href="../calculator/home-realocation">Home Realocation</a></li>
       <li><a href="../calculator/vehicle-realocation">Vehicle Realocation</a></li>
       <li><a href="../calculator/transportation">B2B Realocation</a></li>
       <li><a href="../calculator/office-realocation">Office Realocation</a></li>
      </ul>
     </li>
     <li><a href="../services"><span class="fa fa-truck"></span>Services</a></li>
     <li><a href="../register"><span class="fa fa-sign-in"></span>Register</a></li>
     <li><a href="../contact"><span class="fa fa-phone"></span>Contact</a></li>
     <!--<li class="contact_nav"><a href="mailto:info@chillbro.in"><span class=" fa fa-envelope"></span>info@chillbro.in</a></li>-->
     <li class="contact_nav"><a href="tel:1800113993"><span class=" fa fa-phone"></span>Toll Free No. 1800 11 3993</a></li>
    </ul>
   </nav>
  </header>
  </section>
  <script>
	$(".submenu").hover(function(){
		$(this).children("ul").stop().slideToggle("slow");	
	});	 
</script> 
  <style>
   .submenu ul{
	   display:none;
	   position:absolute;
	   background-color:#FFF;
   }
   
   .submenu ul li{
	   float:none !important;
	   margin:0px !important;
   }
   
   .submenu ul li a:hover{
	   background-color: #e31e26;
	   color:#FFF !important;
   }
   
  </style>
  
  
<?php } ?>

<?php function slider($page){ ?>
<section>
   <img src="../img/<?php echo $page; ?>.jpg" width="100%">
  </section>
<?php } ?>

<?php function footer(){ ?>
<script>
	$(function(){
		$('nav').slicknav();
	});
</script>
<footer class="footer_two"> <a href="../"><img src="../img/logo.png" class="logo"></a>
  <h1>&copy; copyright 2016 By Chill Bro Pvt Ltd (U93030DL2016OPC291495). All Rights Reserved. Site by<a href="http://www.krpl.in">krpl.in</a></h1>
  <ul class="clear link">
    <li><a href="../">home</a></li>
    <li><span class="fa fa-angle-right"></span></li>
    <li><a href="../about">about</a></li>
    <li><span class="fa fa-angle-right"></span></li>
    <li><a href="../services">services</a></li>
    <li><span class="fa fa-angle-right"></span></li>
    <li><a href="../register">register</a></li>
    <li><span class="fa fa-angle-right"></span></li>
    <li><a href="../contact">contact</a></li>
  </ul>
</footer>
<?php } ?>

<?php function sevices(){ ?>

<section id="home-section-2">
 
 <ul class="clear">
        <li>
      <img src="../img/household-moving.jpg">
      <h2>Household<br>Moving</h2>
      <p> we know shifting home in not that thing which we often do or like to do, but sometimes it's better to sift and experience the new world out there.[--]</p>
      <a href="../services#household-moving">Read More<span class="fa fa-chevron-circle-right"></span></a>
      </li>
            <li>
      <img src="../img/corporate-relocation.jpg">
      <h2>Corporate<br>Relocation</h2>
      <p> Expansion has always been proven good for mankind , and so it will be for your business . Now without taking out time from your core business activities, Moving is possible .[--]</p>
      <a href="../services#corporate-relocation">Read More<span class="fa fa-chevron-circle-right"></span></a>
      </li>
            <li>
      <img src="../img/vahicle-moving.jpg">
      <h2>Vehicle<br>Moving</h2>
      <p>  we are big admires of moving objects , and it's understood by our business , of course it is ! when you assign us to relocate your loved vehicle.[--]</p>
      <a href="../services#vahicle-moving">Read More<span class="fa fa-chevron-circle-right"></span></a>
      </li>
        </ul>
        
        <ul class="clear">
        <li>
      <img src="../img/import-export.jpg">
      <h2>Export<br>Import</h2>
      <p>Got a consignment ? want Ship is across the Globe in the smartest & Simplest way possible  .
Register here at Chillbro.in and [--]</p>
      <a href="../services#household-moving">Read More<span class="fa fa-chevron-circle-right"></span></a>
      </li>
            <li>
      <img src="../img/warehouse.jpg">
      <h2>Warehousing<br>Relocation</h2>
      <p>Moving to new place and before shifting want to take long holiday ! No problem . At Chillbro.in we provide you with 720hrs of warehousing facility [--]</p>
      <a href="../services#corporate-relocation">Read More<span class="fa fa-chevron-circle-right"></span></a>
      </li>
            <li>
      <img src="../img/transportation.jpg">
      <h2>Transportation <br></h2>
      <p>Got businesses across the Nation , looking for transportation service ? with Fleet Size of more that 1300 Trucks running in 23 different state [--]</p>
      <a href="../services#vahicle-moving">Read More<span class="fa fa-chevron-circle-right"></span></a>
      </li>
        </ul>
  
</section>

<?php } ?>