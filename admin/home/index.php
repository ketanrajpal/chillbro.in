<?php
ob_start();
session_start();
require_once("../inc/function.php");
if(!isset($_SESSION["name"]) || !isset($_SESSION["salt"]) || !isset($_SESSION["id"])){
	header("Location: ../?session");
	exit();
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<?php require_once("../inc/meta.php"); ?>
<?php require_once("../inc/head.php"); ?>
</head>
<body>
<?php require_once("../inc/head_script.php"); ?>
<header class="clear"> <img src="../img/logo-small.png">
  <nav>
    <ul>
      <li><a href=""><span class="fa fa-user"></span>Howdy!! <?php echo $_SESSION["name"]; ?></a></li>
      <li><a href=""><span class="fa fa-calendar"></span><?php echo date('l, jS F Y'); ?></a></li>
      <li><a href="../auth-out"><span class="fa fa-sign-out"></span>Log Out</a></li>
    </ul>
  </nav>
</header>
<section id="container">
  <section id="sidebar">
    <nav>
      <ul>
        <li><a href="#"><span class="fa fa-dashboard"></span>Dashboard</a></li>
        <li class="trigger"> <a href="#"><span class="fa fa-briefcase"></span>Account<span class="drop fa fa-angle-right"></span></a>
          <ul>
            <li class="trigger"> <a href="#"><span class="fa fa-users"></span>Users<span class="drop fa fa-caret-right"></span></a>
              <ul>
                <li><a href="../home/users"><span class="fa fa-user"></span>List Users</a></li>
                <li><a href="../home/users?add"><span class="fa fa-user-plus"></span>Add Users</a></li>
              </ul>
            </li>
           
              <li class="trigger"> <a href="#"><span class="fa fa-globe"></span>Location<span class="drop fa fa-caret-right"></span></a>
              <ul>
                <li class="trigger"><a href="#"><span class="fa fa-globe"></span>Country<span class="drop fa fa-caret-right"></a>
               <ul>
                <li><a href="../home/country"><span class="fa fa-location-arrow"></span>List Country</a></li>
                <li><a href="../home/country?add"><span class="fa fa-location-arrow"></span>Add Country</a></li>
             </ul>
             </li>
                <li class="trigger"><a href="#"><span class="fa fa-globe"></span>State<span class="drop fa fa-caret-right"></a>
                <ul>
                <li><a href="../home/state"><span class="fa fa-road"></span>List State</a></li>
                <li><a href="../home/state?add"><span class="fa fa-road"></span>Add State</a></li>
                </ul>
                </li>
             </ul>
             </li>
             <li class="trigger"> <a href="#"><span class="fa fa-users"></span>User Type<span class="drop fa fa-caret-right"></span></a>
              <ul>
                <li><a href="../home/user_type"><span class="fa fa-user"></span>List User Type</a></li>
                <li><a href="../home/user_type?add"><span class="fa fa-user-plus"></span>Add User Type</a></li>
             </ul>
             </li>
          </li>
 </li>
          </ul></nav>
          <nav>
          <ul>
          <li class="trigger"> <a href="#"><span class="fa fa-briefcase"></span>Vehicle Information<span class="drop fa fa-angle-right"></span></a>
          <ul>
            <li class="trigger"> <a href="#"><span class="fa fa-car"></span>Vehicle<span class="drop fa fa-caret-right"></span></a>
              <ul>
                <li><a href="../home/vehicle"><span class="fa fa-car"></span>List Vehicle</a></li>
                <li><a href="../home/vehicle?add"><span class="fa fa-car"></span>Add Vehicle</a></li>
              </ul>
            </li>
            <li class="trigger"> <a href="#"><span class="fa fa-car"></span>Vehicle Type<span class="drop fa fa-caret-right"></span></a>
              <ul>
                <li><a href="../home/vehicle_type"><span class="fa fa-car"></span>List Vehicle Type</a></li>
                <li><a href="../home/vehicle_type?add"><span class="fa fa-car"></span>Add Vehicle Type</a></li>
             </ul>
             </li>
          </ul>
           </nav>
           <nav>
          <ul>
          <li class="trigger"> <a href="#"><span class="fa fa-briefcase"></span>Shifting<span class="drop fa fa-angle-right"></span></a>
          <ul>
            <li class="trigger"> <a href="#"><span class="fa fa-suitcase"></span>Shifting Type<span class="drop fa fa-caret-right"></span></a>
              <ul>
                <li><a href="../home/shifting_type"><span class="fa fa-suitcase"></span>List Type</a></li>
                <li><a href="../home/shifting_type?add"><span class="fa fa-suitcase"></span>Add Type</a></li>
              </ul>
            </li>
            <li class="trigger"> <a href="#"><span class="fa fa-suitcase"></span>Shifting Area<span class="drop fa fa-caret-right"></span></a>
              <ul>
                <li><a href="../home/shifting_area"><span class="fa fa-suitcase"></span>List Area</a></li>
                <li><a href="../home/shifting_area?add"><span class="fa fa-suitcase"></span>Add Area</a></li>
             </ul>
             </li>
          </ul>
           </nav>
         <nav>
          <ul>
          <li class="trigger"> <a href="#"><span class="fa fa-briefcase"></span>Contacts<span class="drop fa fa-angle-right"></span></a>
          <ul>
            <li class="trigger"> <a href="#"><span class="fa fa-phone"></span>Show Contacts<span class="drop fa fa-caret-right"></span></a>
              <ul>
                <li><a href="../home/contact"><span class="fa fa-phone"></span>List Contacts</a></li>
              </ul>
            </li>
            </nav>  
  </section>
   <section id="content">
    <?php if(isset($_GET["slug"])){	
	
		?><article><?php if(isset($_GET["slug"])){ 
	
	$new_str=$_SERVER["REQUEST_URI"];
	if(strpos($new_str,"add")==true){
	$_GET["add"]="";
	}
	else if(strpos($new_str,"update")==true){
	$_GET["update"]=substr($new_str, strpos($new_str, "=") + 1);;
}
else if(strpos($new_str,"delete")==true){
	$_GET["delete"]=substr($new_str, strpos($new_str, "=") + 1);;
}
	
	require_once("../mod/".$_GET["slug"].".php"); } 
	
	
	?></article><?php
	
	} ?>
  
  </section>
</section>
<?php require_once("../inc/foot_script.php"); ?>
</body>
</html>
<?php ob_flush(); ?>