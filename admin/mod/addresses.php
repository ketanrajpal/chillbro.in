<?php if(!isset($_GET["add"])){ ?>
<a class="add_button" href="../home/addresses?add">Add New Address</a>

<?php } ?>
<?php if(isset($_GET["add"]) || isset($_GET["update"])){ ?>
<!--<a class="add_button" href="../home/addresses">Show Address</a>-->
<?php $_SESSION["validation_message"]=""; ?>
<?php } ?>
<h1>Address</h1>
<div class="clear"></div>
<?php
if(isset($_GET["delete"]))
{
	$mysqli=connect();
	$sql="DELETE FROM `addresses` where `id`='".$_GET["delete"]."'";
	mysqli_query($mysqli,$sql);
	disconnect($mysqli);
	$_SESSION["validation_message"]="Record sucessfully deleted.";
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_GET["update"]))
	{
		$mysqli=connect();
		$sql="UPDATE `addresses` SET `line_1`='".trim($_POST["line_1"])."',`line_2`='".trim($_POST["line_2"])."',`line_3`='".trim($_POST["line_3"])."',`country`='".$_POST["country"]."',`state`='".$_POST["state"]."',`city`='".trim($_POST["city"])."',`pincode`='".trim($_POST["pincode"])."' where id='".$_GET["update"]."'";;
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Updated.";
		header("Location: ../home/users");
		exit();
		
	}
	else
	{
		$mysqli=connect();
		$sql="INSERT into `addresses` (`line_1`,`line_2`,`line_3`,`country`,`state`,`city`,`pincode`)VALUES('".trim($_POST["line_1"])."','".trim($_POST["line_2"])."','".trim($_POST["line_3"])."','".$_POST["country"]."','".$_POST["state"]."','".trim($_POST["city"])."','".trim($_POST["pincode"])."')";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Added.";
		header("Location: ../home/users");
		exit();
		
	}
}
?>
<?php
if(isset($_SESSION["validation_message"])){
	if($_SESSION["validation_message"]!=""){ ?>
    <div class="bar_error">
     <span class="fa fa-exclamation-circle"></span>
	 <?php  echo $_SESSION["validation_message"]; ?></div><?php }} ?>
     
<?php if(!isset($_GET["update"]) && !isset($_GET["add"])){ ?>
<table class="display">
  <thead>
  <td>Address</td>
   <td>Country</td>
   <td>State</td>
   <td>City</td>
   <td>Pincode</td>
   <td>Update</td>
   <td>Delete</td>
   
  </thead>
<tbody>
<?php
$mysqli=connect();
if(isset($_GET["view"]))
{
	$sql="select * from addresses_view where id='".$_GET["view"]."'";
}
else
{
	$sql="select * from addresses_view";
}
$dr=mysqli_query($mysqli,$sql);
while($rec=mysqli_fetch_array($dr))
{
  echo "<tr>";
  echo "<td>".$rec["line_1"]." ".$rec["line_2"]." ".$rec["line_3"]."</td>";
  echo "<td>".$rec["country"]."</td>";
  echo "<td>".$rec["state"]."</td>";
  echo "<td>".$rec["city"]."</td>";
  echo "<td>".$rec["pincode"]."</td>";
?>
  <td><a href="?update=<?php echo $rec["id"]; ?>"><span class="fa fa-pencil"></span></a></td>
  <td><a href="#" onClick="delete_record('<?php echo $rec["id"]; ?>','addresses')"><span class="fa fa-trash"></span></a></td>
    <?php
  echo "</tr>";
}
disconnect($mysqli);
?>
</tbody>
<tfoot>
 <td>Address</td>
   <td>Country</td>
   <td>State</td>
   <td>City</td>
   <td>Pincode</td>
   <td>Update</td>
   <td>Delete</td>
   
 </tfoot>
</table>

<?php } ?>

<?php if(isset($_GET["update"]) || isset($_GET["add"])){ ?>

<form name="myform" id="myform" class="form" onSubmit="return validate()" method="post">
<fieldset>
    <label for="line_1">Line 1</label>
    <input type="text" id="line_1" name="line_1" value="<?php if(isset($_GET["update"])){echo fetch_value("line_1","addresses",$_GET["update"]);} ?>" maxlength="50">
    </fieldset>
  <fieldset>
    <label for="line_2">Line 2</label>
    <input type="text" id="line_2" name="line_2" value="<?php if(isset($_GET["update"])){echo fetch_value("line_2","addresses",$_GET["update"]);} ?>" maxlength="50">
  </fieldset>
  <fieldset>
    <label for="line_3">Line 3</label>
    <input type="text" id="line_3" name="line_3" value="<?php if(isset($_GET["update"])){echo fetch_value("line_3","addresses",$_GET["update"]);} ?>" maxlength="50">
  </fieldset>
 <fieldset>
     <label>Country</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("country","addresses",$_GET["update"]);}
	?>
    <?php select_option("country", "country", "name", "id", "name", "name", $current); ?>
  </fieldset>
   <fieldset>
     <label>State</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("state","addresses",$_GET["update"]);}
	?>
    <?php select_option("state", "state", "name", "id", "name", "name", $current); ?>
    
  </fieldset>
  <fieldset>
    <label for="city">City</label>
    <input type="text" id="city" name="city" value="<?php if(isset($_GET["update"])){echo fetch_value("city","addresses",$_GET["update"]);} ?>" required="required" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="pincode">Pincode</label>
    <input type="text" id="pincode" name="pincode" value="<?php if(isset($_GET["update"])){echo fetch_value("pincode","addresses",$_GET["update"]);} ?>" required="required" maxlength="10">
    </fieldset>
  <fieldset>
  <input type="submit">
  </fieldset>
</form>
<script>

$("#myform").validate({
    focusInvalid: false,
    focusCleanup: true,
    rules: {
      country: { 
	   required: true
	    },
		state: {
			required: true
		},
		pincode:{
			required:true,
			regex: /^[0-9]+$/
    }
	  }
	 });
	</script>
 <?php } ?>
 


