<?php if(!isset($_GET["add"])){ ?>
<a class="add_button" href="../home/shifting_area?add">Add New Shifting Area</a>
<?php } ?>
<?php if(isset($_GET["add"]) || isset($_GET["update"])){ ?>
<a class="add_button" href="../home/shifting_area">Show Shifting Area</a>
<?php $_SESSION["validation_message"]=""; ?>
<?php } ?>
<h1>Shifting Area</h1>
<div class="clear"></div>
<?php
if(isset($_GET["delete"]))
{
	$mysqli=connect();
	$sql="DELETE FROM `shifting_area` where `id`='".$_GET["delete"]."'";
	mysqli_query($mysqli,$sql);
	disconnect($mysqli);
	$_SESSION["validation_message"]="Record sucessfully deleted.";
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	if(isset($_GET["update"]))
	{
		$mysqli=connect();
		$sql="UPDATE `shifting_area` SET `name`='".trim($_POST["name"])."',`slug`='".trim($_POST["slug"])."',`amount`='".trim($_POST["amount"])."',`shifting_type`='".$_POST["shifting_type"]."' where id='".$_GET["update"]."'";;
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Updated.";
		header("Location: ../home/shifting_area");
		exit();
	}
	else
	{
		$mysqli=connect();
		$sql="INSERT into `shifting_area` (`name`,`slug`,`amount`,`shifting_type`)VALUES('".trim($_POST["name"])."','".trim($_POST["slug"])."','".trim($_POST["amount"])."','".$_POST["shifting_type"]."')";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$_SESSION["validation_message"]="Record Sucessfully Added.";
		header("Location: ../home/shifting_area");
		exit();
	}
}
?>
<?php if(!isset($_GET["update"]) && !isset($_GET["add"])){ ?>

<table class="display">
  <thead>
   <td>Name</td>
   <td>Slug</td>
    <td>Amount</td>
  <td>Shifting Type</td>
   <td>Update</td>
   <td>Delete</td>
  </thead>
<tbody>
<?php
$mysqli=connect();
$sql="select * from shifting_area_view";
$dr=mysqli_query($mysqli,$sql);
while($rec=mysqli_fetch_array($dr))
{
  echo "<tr>";
  echo "<td>".$rec["name"]."</td>";
  echo "<td>".$rec["slug"]."</td>";
  echo "<td>".$rec["amount"]."</td>";
  echo "<td>".$rec["shifting_type"]."</td>";
?>
  <td><a href="?update=<?php echo $rec["id"]; ?>"><span class="fa fa-pencil"></span></a></td>
  <td><a href="#" onClick="delete_record('<?php echo $rec["id"]; ?>','shifting_area')"><span class="fa fa-trash"></span></a></td>
    <?php
  echo "</tr>";
}
disconnect($mysqli);
?>
</tbody>
<tfoot>
  <td>Name</td>
   <td>Slug</td>
   <td>Amount</td>
   <td>Shifting Type</td>
   <td>Update</td>
   <td>Delete</td>
 </tfoot>
</table>

<?php } ?>

<?php if(isset($_GET["update"]) || isset($_GET["add"])){ ?>

<form name="myform" id="myform" onSubmit="return validate()" method="post" class="form">
  <fieldset>
    <label for="name">Name</label>
   <input type="text" id="name" name="name" value="<?php if(isset($_GET["update"])){echo fetch_value("name","shifting_area",$_GET["update"]);} ?>" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="slug">Slug</label>
    <input type="text" id="slug" name="slug" value="<?php if(isset($_GET["update"])){echo fetch_value("slug","user_type",$_GET["update"]);} ?>"  readonly="" required="required" maxlength="30">
  </fieldset>
  <fieldset>
    <label for="amount">Amount</label>
     <input type="text" id="amount" name="amount" value="<?php if(isset($_GET["update"])){echo fetch_value("amount","shifting_area",$_GET["update"]);} ?>" maxlength="40">
  </fieldset>
  <fieldset>
     <label>Shifting Type</label>
 <?php
	$current="";
    if(isset($_GET["update"])){
		$current= fetch_value("shifting_type","shifting_area",$_GET["update"]);
	} ?>
    <?php select_option("shifting_type", "shifting_type", "name", "id", "name", "name", $current); ?>
</fieldset> 
    <fieldset>
  <input type="submit">
  </fieldset>
</form>
<script type="text/javascript">
$("#name").on('blur keypress keydown change focus focusout',function(){
		$("#slug").val(slug($("#name").val()));
	});
$("#myform").validate;
  $("#myform").validate({
    focusInvalid: false,
    focusCleanup: true,
    rules: {
      amount: {
		required:true,
			regex:/^[0-9]+$/
	 },
    	  name: {
      	required:true,
		regex: /^[a-zA-Z ]*$/
    },
     shifting_type : { // combobox
        required: true
      } 
	  }
	  });

 </script>
 
 <?php } ?>
 

