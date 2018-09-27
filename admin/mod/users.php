<?php if(!isset($_GET["add"])){ ?>
<a class="add_button" href="../home/users?add">Add New User</a>
<?php } ?>
<?php if(isset($_GET["add"]) || isset($_GET["update"])){ ?>
<a class="add_button" href="../home/users">Show User</a>
<?php $_SESSION["validation_message"]=""; ?>
<?php } ?>
<h1>Users</h1>
<div class="clear"></div>
<?php
if(isset($_GET["delete"]))
{
	$mysqli=connect();
	$sql="DELETE FROM `users` where `id`='".$_GET["delete"]."'";
	mysqli_query($mysqli,$sql);
	disconnect($mysqli);
	$_SESSION["validation_message"]="Record sucessfully deleted.";
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_GET["update"]))
	{
		$mysqli=connect();
		
		$sql="UPDATE `users` SET `first_name`='".trim($_POST["first_name"])."',`last_name`='".trim($_POST["last_name"])."',`mobile`='".$_POST["mobile"]."',`email`='".trim($_POST["email"])."',`password`='".trim($_POST["password"])."',`user_type`='".$_POST["user_type"]."',now(),now(),'".$_SERVER["REMOTE_ADDR"]."',`activate`='".$_POST["activate"]."',`verified`='".$_POST["verified"]."',`source_address`='".$_POST["source_address"]."',`vehicle_type`='".$_POST["vehicle_type"]."',`vehicle`='".$_POST["vehicle"]."',`source_time`='".$_POST["source_time"]."',`source_date`='".$_POST["source_date"]."',`destination_time`='".$_POST["destination_time"]."',`destination_date`='".$_POST["destination_date"]."',`shifting_type`='".$_POST["shifting_type"]."',`shifting_area`='".$_POST["shifting_area"]."' where id='".$_GET["update"]."'";;
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Updated.";
		header("Location: ../home/users");
		exit();
	}
	else
	{
		$sql="INSERT into `addresses` (`line_1`,`line_2`,`line_3`,`country`,`state`,`city`,`pincode`)VALUES('".trim($_POST["source_line_1"])."','".trim($_POST["source_line_2"])."','".trim($_POST["source_line_3"])."','".$_POST["source_country"]."','".$_POST["source_state"]."','".trim($_POST["source_city"])."','".trim($_POST["source_pincode"])."')";
		$source_id=execute_query($sql);

		$sql="INSERT into `addresses` (`line_1`,`line_2`,`line_3`,`country`,`state`,`city`,`pincode`)VALUES('".trim($_POST["destination_line_1"])."','".trim($_POST["destination_line_2"])."','".trim($_POST["destination_line_3"])."','".$_POST["destination_country"]."','".$_POST["destination_state"]."','".trim($_POST["destination_city"])."','".trim($_POST["destination_pincode"])."')";
		$destination_id=execute_query($sql);

		
		$mysqli=connect();
		$sql="INSERT into `users` (`first_name`,`last_name`,`mobile`,`email`,`password`,`user_type`,`activate`,`verified`,`source_address`,`destination_address`,`vehicle_type`,`vehicle`,`last_login_date`,`last_login_time`,`ip`,`source_time`,`source_date`,`destination_time`,`destination_date`,`shifting_type`,`shifting_area`)VALUES('".trim($_POST["first_name"])."','".trim($_POST["last_name"])."','".trim($_POST["mobile"])."','".trim($_POST["email"])."','".MD5($_POST["password"])."','".trim($_POST["user_type"])."','0','1','".$source_id."','".$destination_id."','".$_POST["vehicle_type"]."','".$_POST["vehicle"]."',now(),now(),'".$_SERVER["REMOTE_ADDR"]."','".$_POST["source_time"]."','".$_POST["source_date"]."','".$_POST["destination_time"]."','".$_POST["destination_date"]."','".$_POST["shifting_type"]."','".$_POST["shifting_area"]."')";
		echo $sql;
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Added.";
		//header("Location: ../home/users");
		//exit();
	}
}
?>
<?php if(!isset($_GET["update"]) && !isset($_GET["add"])){ ?>

<table class="display">
  <thead>
  <td>Full Name</td>
   <td>Mobile</td>
   <td>Email</td>
   <td>User Type</td>
   <td>Update</td>
   <td>Delete</td>
   <td> Source Address</td>
  <td>Destination Address</td>
   
  </thead>
<tbody>
<?php
$mysqli=connect();
//$sql="select * from user_user_type_view";
if(isset($_GET["view"]))
{
	$sql="select * from user_user_type_view where id='".$_GET["view"]."'";
}
else 
{
	$sql="select * from user_user_type_view";
}
$dr=mysqli_query($mysqli,$sql);
while($rec=mysqli_fetch_array($dr))
{
  echo "<tr>";
   echo "<td>".$rec["first_name"]." ".$rec["last_name"]."</td>" ;
  echo "<td>".$rec["mobile"]."</td>";
  echo "<td>".$rec["email"]."</td>";
  echo "<td>".$rec["user_type"]."</td>";

?>
  <td><a href="?update=<?php echo $rec["id"]; ?>"><span class="fa fa-pencil"></span></a></td>
  <td><a href="#" onClick="delete_record('<?php echo $rec["id"]; ?>','users')"><span class="fa fa-trash"></span></a></td>
    <td><a href="../home/?slug=addresses&update=<?php echo $rec["source_address"]; ?>"><span class="fa fa-eye"></span></a></td> 
    <td><a href="../home/?slug=addresses&update=<?php echo $rec["destination_address"]; ?>"><span class="fa fa-eye"></span></a></td> 
	<?php
  echo "</tr>";
}
disconnect($mysqli);
?>
</tbody>
<tfoot>
  <td>Full Name</td>
   <td>Mobile</td>
   <td>Email</td>
   <td>User Type</td>
    <td>Update</td>
   <td>Delete</td>
   <td> Source Address</td>
  <td> Destination Address</td>
  </tfoot>
</table>

<?php } ?>

<?php if(isset($_GET["update"]) || isset($_GET["add"])){ ?>

<form name="myform" id="myform" class="form" onSubmit="return validate()" method="post">
<fieldset>
    <label for="first_name">First Name</label>
    <input type="text" id="" name="first_name" value="<?php if(isset($_GET["update"])){echo fetch_value("first_name","users",$_GET["update"]);} ?>" required="required" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name" value="<?php if(isset($_GET["update"])){echo fetch_value("last_name","users",$_GET["update"]);} ?>"  required="required" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="mobile">Mobile</label>
    <input type="text" id="mobile" name="mobile" value="<?php if(isset($_GET["update"])){echo fetch_value("mobile","users",$_GET["update"]);} ?>"  required="required" maxlength="10">
  </fieldset>
   <fieldset>
    <label for="email">Email</label>
    <input type="text" id="email" name="email" value="<?php if(isset($_GET["update"])){echo fetch_value("email","users",$_GET["update"]);} ?>"  required="required" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="password">Password</label>
    <input type="password" id="password" name="password"  required="required" maxlength="50">
  </fieldset>
  <fieldset>
    <label for="confirm_password">Confirm Password</label>
    <input type="text" id="confirm_password" name="confirm_password"  required="required" maxlength="50">
  </fieldset>
<fieldset>
     <label>User Type</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("user_type","users",$_GET["update"]);}
	?>
    <?php select_option("user_type", "user_type", "name", "id", "name", "name", $current); ?>
  </fieldset>
  <fieldset>
     <label>Vehicle Type</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("vehicle_type","users",$_GET["update"]);}
	?>
    <?php select_option("vehicle_type", "vehicle_type", "name", "id", "name", "name", $current); ?>
  </fieldset>
  <fieldset>
     <label>Vehicle</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("vehicle","users",$_GET["update"]);}
	?>
    <?php select_option("vehicle", "vehicle", "name", "id", "name", "name", $current); ?>
  </fieldset>
   <fieldset>
    <label for="source_time">Source Time</label>
    <input type="time" id="source_time" name="source_time" value="<?php if(isset($_GET["update"])){echo fetch_value("source_time","users",$_GET["update"]);} ?>"  required="required">
  </fieldset>
 <fieldset>
    <label for="source_date">Source Date</label>
    <input type="date" id="source_date" name="source_date" value="<?php if(isset($_GET["update"])){echo fetch_value("source_date","users",$_GET["update"]);} ?>"  required="required">
  </fieldset> 
   <fieldset>
    <label for="destination_time">Destination Time</label>
    <input type="time" id="destination_time" name="destination_time" value="<?php if(isset($_GET["update"])){echo fetch_value("destination_time","users",$_GET["update"]);} ?>"  required="required">
  </fieldset>
  <fieldset>
    <label for="destination_date">Source Time</label>
     <input type="date" id="destination_date" name="destination_date" value="<?php if(isset($_GET["update"])){echo fetch_value("destination_date","users",$_GET["update"]);} ?>"  required="required">
  </fieldset> 
   <fieldset>
     <label>Shifting Type</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("shifting_type","users",$_GET["update"]);}
	?>
    <?php select_option("shifting_type", "shifting_type", "name", "id", "name", "name", $current); ?>
  </fieldset>
  <fieldset>
     <label>Shifting Area</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("shifting_area","users",$_GET["update"]);}
	?>
    <?php select_option("shifting_area", "shifting_area", "name", "id", "name", "name", $current); ?>
  </fieldset>
  <br /><br />
  
  <?php if(!isset($_GET["update"])) { ?>
  
  <h1>Source Address</h1>
  <fieldset>
    <label for="source_line_1">Line 1</label>
    <input type="text" id="source_line_1" name="source_line_1" value="<?php if(isset($_GET["update"])){echo fetch_value("line_1","addresses",$_GET["update"]);} ?>"   maxlength="50">
  </fieldset>
  <fieldset>
    <label for="source_line_2">Line 2</label>
    <input type="text" id="source_line_2" name="source_line_2" value="<?php if(isset($_GET["update"])){echo fetch_value("line_2","addresses",$_GET["update"]);} ?>"  maxlength="50">
  </fieldset>
  <fieldset>
    <label for="source_line_3">Line 3</label>
    <input type="text" id="source_line_3" name="source_line_3" value="<?php if(isset($_GET["update"])){echo fetch_value("line_3","addresses",$_GET["update"]);} ?>"  maxlength="50">
  </fieldset>
 <fieldset>
     <label>Country</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("country","addresses",$_GET["update"]);}
	?>
    <?php select_option("source_country", "country", "name", "id", "name", "name", $current); ?>
  </fieldset>
   <fieldset>
     <label>State</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("state","addresses",$_GET["update"]);}
	?>
    <?php select_option("source_state", "state", "name", "id", "name", "name", $current); ?>
  </fieldset>
  <fieldset>
    <label for="source_city">City</label>
    <input type="text" id="source_city" name="source_city" value="<?php if(isset($_GET["update"])){echo fetch_value("city","addresses",$_GET["update"]);} ?>"  required="required" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="source_pincode">Pincode</label>
    <input type="text" id="source_pincode" name="source_pincode" value="<?php if(isset($_GET["update"])){echo fetch_value("pincode","addresses",$_GET["update"]);} ?>"  required="required" maxlength="10"><br /><br />
    <h1>Destination Address</h1>
    <fieldset>
    <label for="destination_line_1">Line 1</label>
    <input type="text" id="destination_line_1" name="destination_line_1" value="<?php if(isset($_GET["update"])){echo fetch_value("line_1","addresses",$_GET["update"]);} ?>"   maxlength="40">
  </fieldset>
  <fieldset>
    <label for="destination_line_2">Line 2</label>
    <input type="text" id="destination_line_2" name="destination_line_2" value="<?php if(isset($_GET["update"])){echo fetch_value("line_2","addresses",$_GET["update"]);} ?>"   maxlength="40">
  </fieldset>
  <fieldset>
    <label for="destination_line_3">Line 3</label>
    <input type="text" id="destination_line_3" name="destination_line_3" value="<?php if(isset($_GET["update"])){echo fetch_value("line_3","addresses",$_GET["update"]);} ?>"   maxlength="40">
  </fieldset>
 <fieldset>
     <label>Country</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("country","addresses",$_GET["update"]);}
	?>
    <?php select_option("destination_country", "country", "name", "id", "name", "name", $current); ?>
  </fieldset>
   <fieldset>
     <label>State</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("state","addresses",$_GET["update"]);}
	?>
    <?php select_option("destination_state", "state", "name", "id", "name", "name", $current); ?>
  </fieldset>
  <fieldset>
    <label for="destination_city">City</label>
    <input type="text" id="destination_city" name="destination_city" value="<?php if(isset($_GET["update"])){echo fetch_value("city","addresses",$_GET["update"]);} ?>"  required="required" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="destination_pincode">Pincode</label>
    <input type="text" id="destination_pincode" name="destination_pincode" value="<?php if(isset($_GET["update"])){echo fetch_value("pincode","addresses",$_GET["update"]);} ?>"  required="required" maxlength="10">
    <fieldset>
    
    <?php } ?>
  <input type="submit">
  </fieldset>
</form>

<script>
$("#myform").validate({
    focusInvalid: false,
    focusCleanup: true,
    rules: {
         source_country: {
			required: true
		},
		source_state: {
			required: true
		},
		destination_country: {
			required: true
		},
		destination_state: {
			required: true
		},
	  first_name: {
			required:true,
			regex:/^[a-zA-Z ]+$/
		},
		last_name: {
			required:true,
			regex:/^[a-zA-Z ]+$/
		},
		mobile: {
			required:true,
			regex:/^[0-9]+$/
		},
		email: {
			required:true,
			regex: /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/
		},
		password: {
          required: true,
          minlength: 6,
          maxlength: 10

        },
        cfmPassword: {
        required: true,
         equalTo: "#password",
        minlength: 6,
        maxlength: 10
       
	  },
	   user_type: { 
	   required: true
	    },
		vehicle_type: {
			required: true
		},
		vehicle: {
			required: true
		},
		shifting_type: {
			required: true
		},
		shifting_area: {
			required: true
		},
		source_pincode:{
			required:true,
			regex: /^[0-9]+$/
	  },
		destination_pincode:{
			required:true,
			regex: /^[0-9]+$/
		},
		city:{
			required:true,
			regex: /^[a-zA-Z ]*$/
    }
	}
	 });
  
 </script>
 
 <?php } ?>
 
