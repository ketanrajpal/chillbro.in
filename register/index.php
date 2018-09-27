<?php 
ob_start();
require_once("../config.php");
require_once("../admin/inc/function.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
		$sql="INSERT into `addresses` (`line_1`,`line_2`,`line_3`,`country`,`state`,`city`,`pincode`)VALUES('','','','1','1','".trim($_POST["source_address"])."','')";
		$source_id=execute_query($sql);

$sql="INSERT into `addresses` (`line_1`,`line_2`,`line_3`,`country`,`state`,`city`,`pincode`)VALUES('','','','1','1','".trim($_POST["destination_address"])."','')";
		$destination_id=execute_query($sql);
		
		$mysqli=connect();
		$sql="INSERT into `users` (`first_name`,`last_name`,`mobile`,`email`,`password`,`user_type`,`activate`,`verified`,`source_address`,`destination_address`,`vehicle_type`,`vehicle`,`last_login_date`,`last_login_time`,`ip`,`source_time`,`source_date`,`destination_time`,`destination_date`,`shifting_type`,`shifting_area`)VALUES('".trim($_POST["first_name"])."','".trim($_POST["last_name"])."','".trim($_POST["mobile"])."','".trim($_POST["email"])."','".MD5("admin@123")."','1','0','1','".$source_id."','".$destination_id."','".$_POST["vehicle_type"]."','".$_POST["vehicle"]."',now(),now(),'".$_SERVER["REMOTE_ADDR"]."','24:00:00','".$_POST["source_date"]."','11:00:00','".$_POST["destination_date"]."','1','1')";
		//echo $sql;
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Added.";
		header("Location: ../register_complete");
		exit();
	}
?>
<!DOCTYPE HTML>
<html>
<?php head("Chillbro &bull; Register"); ?>
<body>
<?php top_header(); ?>
<?php slider("register"); ?>
<form name="myform" id="myform" class="form" onSubmit="return validate()" method="post">
  <section id="content">
   <h1>Step 2: Provide Your Details</h1>
   <p>Let us know your details, so that we can you reach in scheduled places on scheduled time.</p>
   <article>
   <h2>Enter your personal details</h2>
    <fieldset>
    <input type="text" id="first_name" name="first_name" required placeholder="Enter your First Name">
      <label for="first_name"> First Name</label>
       </fieldset>
    <fieldset>
    <input type="text" id="last_name" name="last_name" required placeholder="Enter your Last Name">
      <label for="last_name"> Last Name</label>
       </fieldset>
    <fieldset>
    <input type="text" id="email" name="email" required placeholder="Enter your Email Address">
      <label for="email">Email</label>
      </fieldset>
    <fieldset>
    <input type="text" id="mobile" name="mobile" required placeholder="Enter your Phone Number">
      <label for="mobile">Phone</label>
      </fieldset>
    <fieldset>
     <?php select_option("vehicle", "vehicle", "name", "id", "name", "name", ""); ?>
      <label for="vehicle">Vehicle</label>
     </fieldset>
    <fieldset>
    <?php select_option("vehicle_type", "vehicle_type", "name", "id", "name", "name", ""); ?>
      <label for="vehicle_type">Vehicle Type</label>
      </fieldset>
</article>
    <article>
      <h2>Enter the Source Address Below</h2>
      <fieldset>
       <input type="date" id="source_date" name="source_date" required>
        <label for="source_date"> Pick Up Date</label>
        </fieldset>
      <fieldset>
      <input type="text" id="source_address" name="source_address" required value="<?php if(isset($_GET["source_address"])){ echo $_GET["source_address"];} ?>">
        <label for="source_city">City</label>
         </fieldset>
     </article>
    <article>
      <h2>Enter the Destination Address Below</h2>
      <fieldset>
         <input type="date" id="destination_date" name="destination_date" required>
         <label for="destination_date"> Drop Date</label>
      </fieldset>
      <fieldset>
      <input type="text" id="destination_address" name="destination_address" required value="<?php if(isset($_GET["destination_address"])){ echo $_GET["destination_address"];} ?>">
        <label for="destination_city">City</label>
        </fieldset>
      </article>
    <div class="clear"></div><br><br><br>
    <fieldset>
    <center><input type="submit"></center>
  </fieldset>
    
    
  </section>
</form>
<script>
$("#myform").validate({
    focusInvalid: false,
    focusCleanup: true,
    rules: {
		first_name: {
			required:true,
			regex:/^[a-zA-Z ]+$/
		},
		last_name: {
			required:true,
			regex:/^[a-zA-Z ]+$/
		},
		email: {
			required:true,
			regex: /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/
		},
		mobile: {
			required:true,
			regex:/^[0-9]+$/
		},
		vehicle_type: {
			required: true
		},
		vehicle: {
			required: true
		},
		source_state: {
			required: true
		},
		
		destination_state: {
			required: true
		},
		source_city:{
			required:true,
			regex: /^[a-zA-Z ]*$/
    },
		destination_city:{
			required:true,
			regex: /^[a-zA-Z ]*$/
    }
	}
	 });
  
 </script>
 <?php footer(); ?>
</body>
</html>
