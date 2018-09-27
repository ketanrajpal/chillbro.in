<?php if(!isset($_GET["add"])){ ?>
<a class="add_button" href="../home/vehicle_type?add">Add New Vehicle Type</a>
<?php } ?>
<?php if(isset($_GET["add"]) || isset($_GET["update"])){ ?>
<a class="add_button" href="../home/vehicle_type">Show Vehicle Type</a>
<?php $_SESSION["validation_message"]=""; ?>
<?php } ?>
<h1>Vehicle Type</h1>
<div class="clear"></div>
<?php
if(isset($_GET["delete"]))
{
	$mysqli=connect();
	$sql="DELETE FROM `vehicle_type` where `id`='".$_GET["delete"]."'";
	mysqli_query($mysqli,$sql);
	disconnect($mysqli);
	$_SESSION["validation_message"]="Record sucessfully deleted.";
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_GET["update"]))
	{
		$mysqli=connect();
		$sql="UPDATE `vehicle_type` SET `name`='".trim($_POST["name"])."',`slug`='".trim($_POST["slug"])."',`order`='".trim($_POST["order"])."' where id='".$_GET["update"]."'";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Updated.";
		header("Location: ../home/vehicle_type");
		exit();
	}
	else
	{
		$mysqli=connect();
		$sql="INSERT into `vehicle_type` (`name`,`slug`,`order`)VALUES('".trim($_POST["name"])."','".trim($_POST["slug"])."','".trim($_POST["order"])."')";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Added.";
		header("Location: ../home/vehicle_type");
		exit();
	}
}
?>
<?php if(!isset($_GET["update"]) && !isset($_GET["add"])){ ?>

<table class="display">
  <thead>
   <td>Name</td>
   <td>Slug</td>
   <td>Order</td>
   <td>Update</td>
   <td>Delete</td>
   <td>View</td>
  </thead>
<tbody>
<?php
$mysqli=connect();
$sql="select * from vehicle_type";

$dr=mysqli_query($mysqli,$sql);
while($rec=mysqli_fetch_array($dr))
{
  echo "<tr>";
  echo "<td>".$rec["name"]."</td>";
  echo "<td>".$rec["slug"]."</td>";
  echo "<td>".$rec["order"]."</td>";
?>
  <td><a href="?update=<?php echo $rec["id"]; ?>"><span class="fa fa-pencil"></span></a></td>
  <td><a href="#" onClick="delete_record('<?php echo $rec["id"]; ?>','vehicle_type')"><span class="fa fa-trash"></span></a></td>
   <td><a href="../home/vehicle?view=<?php echo $rec["id"]; ?>"><span class="fa fa-eye"></span></a></td> 
	<?php
  echo "</tr>";
}
disconnect($mysqli);
?>
</tbody>
<tfoot>
  <td>Name</td>
  <td>Slug</td>
  <td>Order</td>
  <td>Update</td>
  <td>Delete</td>
  <td>View</td>
 </tfoot>
</table>

<?php } ?>

<?php if(isset($_GET["update"]) || isset($_GET["add"])){ ?>

<form name="myform" id="myform" onSubmit="return validate()" method="post" class="form">
  <fieldset>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php if(isset($_GET["update"])){echo fetch_value("name","vehicle_type",$_GET["update"]);} ?>" required="required" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="slug">Slug</label>
    <input type="text" id="slug" name="slug" value="<?php if(isset($_GET["update"])){echo fetch_value("slug","vehicle_type",$_GET["update"]);} ?>" readonly="" required="required" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="order">Order</label>
    <input type="text" id="order" name="order" value="<?php if(isset($_GET["update"])){echo fetch_value("order","vehicle_type",$_GET["update"]);} ?>" required="required" maxlength="11">
  </fieldset>
    <fieldset>
  <input type="submit">
  </fieldset>
</form>
<script>
$("#myform").validate({
  rules: {
    name: {
      	required:true,
		regex: /^[a-zA-Z ]*$/
    },
		order:{
			required:true,
			regex: /^[0-9]+$/
    }
  }
});

$("#name").on('blur keypress keydown change focus focusout',function(){
		$("#slug").val(slug($("#name").val()));
	});

 </script>
 
 <?php } ?>
 


