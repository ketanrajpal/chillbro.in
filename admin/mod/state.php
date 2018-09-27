<?php if(!isset($_GET["add"])){ ?>
<a class="add_button" href="../home/state?add">Add New State</a>
<?php } ?>
<?php if(isset($_GET["add"]) || isset($_GET["update"])){ ?>
<a class="add_button" href="../home/state">Show State</a>
<?php $_SESSION["validation_message"]=""; ?>
<?php } ?>
<h1>State</h1>
<div class="clear"></div>
<?php
if(isset($_GET["delete"]))
{
	$mysqli=connect();
	$sql="DELETE FROM `state` where `id`='".$_GET["delete"]."'";
	mysqli_query($mysqli,$sql);
	disconnect($mysqli);
	$_SESSION["validation_message"]="Record sucessfully deleted.";
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_GET["update"]))
	{
		$mysqli=connect();
		$sql="UPDATE `state` SET `country`='".$_POST["country"]."',`name`='".trim($_POST["name"])."',`slug`='".trim($_POST["slug"])."' where id='".$_GET["update"]."'";;
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Updated.";
		header("Location: ../home/state");
		exit();
	}
	else
	{
		$mysqli=connect();
		$sql="INSERT into `state` (`country`,`name`,`slug`)VALUES('".$_POST["country"]."','".trim($_POST["name"])."','".trim($_POST["slug"])."')";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Added.";
		header("Location: ../home/state");
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
  <td>Country</td>
   <td>Name</td>
   <td>Slug</td>
   <td>Update</td>
   <td>Delete</td>
  </thead>
<tbody>
<?php
$mysqli=connect();
//$sql="select * from state_country_view";
if(isset($_GET["view"]))
{
	$sql="select * from state_country_view where country_id='".$_GET["view"]."'";
}
else 
{
	$sql="select * from state_country_view";
}
$dr=mysqli_query($mysqli,$sql);
while($rec=mysqli_fetch_array($dr))
{
  echo "<tr>";
  echo "<td>".$rec["country"]."</td>";
  echo "<td>".$rec["name"]."</td>";
  echo "<td>".$rec["slug"]."</td>";
?>
  <td><a href="?update=<?php echo $rec["id"]; ?>"><span class="fa fa-pencil"></span></a></td>
  <td><a href="#" onClick="delete_record('<?php echo $rec["id"]; ?>','state')"><span class="fa fa-trash"></span></a></td>
    <?php
  echo "</tr>";
}
disconnect($mysqli);
?>
</tbody>
<tfoot>
<td>Country</td>
  <td>Name</td>
  <td>Slug</td>
  <td>Update</td>
  <td>Delete</td>
 </tfoot>
</table>

<?php } ?>

<?php if(isset($_GET["update"]) || isset($_GET["add"])){ ?>

<form name="myform" id="myform" onSubmit="return validate()" method="post" class="form">
<fieldset>
     <label>Country</label>
	 <?php
	$current="";
	  if(isset($_GET["update"])){$current= fetch_value("country","state",$_GET["update"]);}
	?>
    <?php select_option("country", "country", "name", "id", "name", "name", $current); ?>
  </fieldset>
  <fieldset>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php if(isset($_GET["update"])){echo fetch_value("name","state",$_GET["update"]);} ?>" required="required" maxlength="40">
  </fieldset>
  <fieldset>
    <label for="slug">Slug</label>
    <input type="text" id="slug" name="slug" value="<?php if(isset($_GET["update"])){echo fetch_value("slug","state",$_GET["update"]);} ?>" readonly="" required="required" maxlength="40">
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
		name:{
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
 


