<?php if(!isset($_GET["add"])){ ?>
<a class="add_button" href="../home/user_type?add">Add New User Type</a>
<?php } ?>
<?php if(isset($_GET["add"]) || isset($_GET["update"])){ ?>
<a class="add_button" href="../home/user_type">Show User Type</a>
<?php $_SESSION["validation_message"]=""; ?>
<?php } ?>
<h1>User Type</h1>
<div class="clear"></div>
<?php
if(isset($_GET["delete"]))
{
	$mysqli=connect();
	$sql="DELETE FROM `user_type` where `id`='".$_GET["delete"]."'";
	mysqli_query($mysqli,$sql);
	disconnect($mysqli);
	$_SESSION["validation_message"]="Record sucessfully deleted.";
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	if(isset($_GET["update"]))
	{
		$mysqli=connect();
		$sql="UPDATE `user_type` SET `name`='".trim($_POST["name"])."',`slug`='".trim($_POST["slug"])."',`order`='".trim($_POST["order"])."' where id='".$_GET["update"]."'";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validate"]="Record Sucessfully Updated.";
		header("Location: ../home/user_type");
		exit();
	}
	else
	{
		$mysqli=connect();
		$sql="INSERT into `user_type` (`name`,`slug`,`order`)VALUES('".trim($_POST["name"])."','".trim($_POST["slug"])."','".trim($_POST["order"])."')";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validate"]="Record Sucessfully Added.";
		header("Location: ../home/user_type");
		exit();
	}
}
?>

<?php
if(isset($_SESSION["validate"])){
	if($_SESSION["validate"]!=""){ ?>
    <div class="bar_error">
     <span class="fa fa-exclamation-circle"></span>
	 <?php  echo $_SESSION["validate"]; $_SESSION["validate"]=""; ?></div><?php }} ?>
     
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
$sql="select * from user_type";
$dr=mysqli_query($mysqli,$sql);
while($rec=mysqli_fetch_array($dr))
{
  echo "<tr>";
  echo "<td>".$rec["name"]."</td>";
  echo "<td>".$rec["slug"]."</td>";
  echo "<td>".$rec["order"]."</td>";
?>
  <td><a href="?update=<?php echo $rec["id"]; ?>"><span class="fa fa-pencil"></span></a></td>
  <td><a href="#" onClick="delete_record('<?php echo $rec["id"]; ?>','user_type')"><span class="fa fa-trash"></span></a></td>
   <td><a href="../home/users?view=<?php echo $rec["id"]; ?>"><span class="fa fa-eye"></span></a></td> 
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
    <input type="text" id="name" name="name" value="<?php if(isset($_GET["update"])){echo fetch_value("name","user_type",$_GET["update"]);} ?>" required="required" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="slug">Slug</label>
    <input type="text" id="slug" name="slug" value="<?php if(isset($_GET["update"])){echo fetch_value("slug","user_type",$_GET["update"]);} ?>"  readonly="" required="required" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="order">Order</label>
    <input type="text" id="order" name="order" value="<?php if(isset($_GET["update"])){echo fetch_value("order","user_type",$_GET["update"]);} ?>" required="required" maxlength="11">
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
 


