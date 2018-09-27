<?php if(!isset($_GET["add"])){ ?>
<a class="add_button" href="../home/country?add">Add New Country</a>
<?php } ?>
<?php if(isset($_GET["add"]) || isset($_GET["update"])){ ?>
<a class="add_button" href="../home/country">Show Country</a>
<?php $_SESSION["validation_message"]=""; ?>
<?php } ?>
<h1>Country</h1>
<div class="clear"></div>
<?php
if(isset($_GET["delete"]))
{
	$mysqli=connect();
	$sql="DELETE FROM `country` where `id`='".$_GET["delete"]."'";
	mysqli_query($mysqli,$sql);
	disconnect($mysqli);
	$_SESSION["validation_message"]="Record sucessfully deleted.";
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	if(isset($_GET["update"]))
	{
		$mysqli=connect();
		$sql="UPDATE `country` SET `name`='".trim($_POST["name"])."',`country_code`='".trim($_POST["country_code"])."' where id='".$_GET["update"]."'";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Updated.";
		header("Location: ../home/country");
		exit();
	}
	else
	{
		$mysqli=connect();
		$sql="INSERT into `country` (`name`,`country_code`)VALUES('".trim($_POST["name"])."','".trim($_POST["country_code"])."')";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Added.";
		header("Location: ../home/country");
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
   <td>Name</td>
   <td>Country code</td>
   <td>Update</td>
   <td>Delete</td>
   <td>State</td>
   
  </thead>
<tbody>
<?php
$mysqli=connect();
$sql="select * from country";
$dr=mysqli_query($mysqli,$sql);
while($rec=mysqli_fetch_array($dr))
{
  echo "<tr>";
  echo "<td>".$rec["name"]."</td>";
   echo "<td>".$rec["country_code"]."</td>";
?>
  <td><a href="?update=<?php echo $rec["id"]; ?>"><span class="fa fa-pencil"></span></a></td>
  <td><a href="#" onClick="delete_record('<?php echo $rec["id"]; ?>','country')"><span class="fa fa-trash"></span></a></td>
    <td><a href="../home/state?view=<?php echo $rec["id"]; ?>"><span class="fa fa-eye"></span></a></td> 
    
    <?php
  echo "</tr>";
}
disconnect($mysqli);
?>
   
</tbody>
<tfoot>
  <td>Name</td>
  <td>Country</td>
  <td>Update</td>
  <td>Delete</td>
  <td>State</td>
  
 </tfoot>
</table>

<?php } ?>

<?php if(isset($_GET["update"]) || isset($_GET["add"])){ ?>

<form name="myform" id="myform" class="form" onSubmit="return validate()" method="post">
  <fieldset>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php if(isset($_GET["update"])){echo fetch_value("name","country",$_GET["update"]);} ?>" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="country_code">Country code</label>
    <input type="text" id="country_code" name="country_code" value="<?php if(isset($_GET["update"])){echo fetch_value("country_code","country",$_GET["update"]);} ?>" maxlength="5">
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
		country_code:{
			required:true,
			regex: /^[0-9]+$/
    }
  }
});

</script>
 <?php } ?>
 


