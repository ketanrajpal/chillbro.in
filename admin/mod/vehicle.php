<?php if(!isset($_GET["add"])){ ?>
<a class="add_button" href="../home/vehicle?add">Add New Vehicle</a>
<?php } ?>
<?php if(isset($_GET["add"]) || isset($_GET["update"])){ ?>
<a class="add_button" href="../home/vehicle">Show Vehicle</a>
<?php $_SESSION["validation_message"]=""; ?>
<?php } ?>
<h1>Vehicle</h1>
<div class="clear"></div>
<?php
if(isset($_GET["delete"]))
{
	$mysqli=connect();
	$sql="DELETE FROM `vehicle` where `id`='".$_GET["delete"]."'";
	mysqli_query($mysqli,$sql);
	disconnect($mysqli);
	$_SESSION["validation_message"]="Record sucessfully deleted.";
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	if(isset($_GET["update"]))
	{
		$mysqli=connect();
		$sql="UPDATE `vehicle` SET `vehicle_type`='".$_POST["vehicle_type"]."',`name`='".trim($_POST["name"])."',`slug`='".trim($_POST["slug"])."' where id='".$_GET["update"]."'";;
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Updated.";
		header("Location: ../home/vehicle");
		exit();
	}
	else
	{
		$mysqli=connect();
		$sql="INSERT into `vehicle` (`vehicle_type`,`name`,`slug`)VALUES('".$_POST["vehicle_type"]."','".trim($_POST["name"])."','".trim($_POST["slug"])."')";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Added.";
		header("Location: ../home/vehicle");
		exit();
	}
}
?>
<?php if(!isset($_GET["update"]) && !isset($_GET["add"])){ ?>

<table class="display">
  <thead>
  <td>Vehicle Type</td>
   <td>Name</td>
   <td>Slug</td>
   <td>Update</td>
   <td>Delete</td>
  </thead>
<tbody>
<?php
$mysqli=connect();
if(isset($_GET["view"]))
{
	$sql="select * from vehicle_vehicle_type where vehicle_type_id='".$_GET["view"]."'";
}
else 
{
	$sql="select * from vehicle_vehicle_type";
}
$dr=mysqli_query($mysqli,$sql);
while($rec=mysqli_fetch_array($dr))
{
  echo "<tr>";
  echo "<td>".$rec["vehicle_type"]."</td>";
  echo "<td>".$rec["name"]."</td>";
  echo "<td>".$rec["slug"]."</td>";
?>
  <td><a href="?update=<?php echo $rec["id"]; ?>"><span class="fa fa-pencil"></span></a></td>
  <td><a href="#" onClick="delete_record('<?php echo $rec["id"]; ?>','vehicle')"><span class="fa fa-trash"></span></a></td>
    <?php
  echo "</tr>";
}
disconnect($mysqli);
?>
</tbody>
<tfoot>
<td>Vehicle Type</td>
  <td>Name</td>
  <td>Slug</td>
  <td>Update</td>
  <td>Delete</td>
 </tfoot>
</table>

<?php } ?>

<?php if(isset($_GET["update"]) || isset($_GET["add"])){ ?>

<form name="myform" id="myform" class="form" onSubmit="return validate()" method="post">
<fieldset>
     <label>Vehicle Type</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("vehicle_type","vehicle",$_GET["update"]);}
	?>
    <?php select_option("vehicle_type", "vehicle_type", "name", "id", "name", "name", $current); ?>
  </fieldset>
  <fieldset>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php if(isset($_GET["update"])){echo fetch_value("name","vehicle",$_GET["update"]);} ?>" required="required" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="slug">Slug</label>
    <input type="text" id="slug" name="slug" value="<?php if(isset($_GET["update"])){echo fetch_value("slug","vehicle",$_GET["update"]);} ?>" required="required" maxlength="30">
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
      vehicle_type: { // combobox
        required: true
      },
	  name: {
      	required:true,
		regex: /^[a-zA-Z ]*$/
    }
	  }
	  });
	  $("#name").on('blur keypress keydown change focus focusout',function(){
		$("#slug").val(slug($("#name").val()));
	});
  </script>
 
 <?php } ?>
 


