<?php
$validate="";
if(isset($_GET["delete"]))
{
	$mysqli=connect();
	$sql="DELETE FROM `user_type` where `id`='".$_GET["delete"]."'";
	mysqli_query($mysqli,$sql);
	disconnect($mysqli);
	$validate="Values Deleted Sucessfully.";
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if($_POST["name"]=="" && $_POST["slug"]=="" && $_POST["users"]=="")
	{
		$validate="Enter your name , slug and users";
	}
	else if($_POST["name"]=="")
	{
		$validate="Enter your name.";
	}
	else if($_POST["slug"]=="")
	{
		$validate="Enter your slug.";
	}	
	else if(isset($_GET["update"]))
	{
		$mysqli=connect();
		$sql="UPDATE `user_type` SET `name`='".$_POST["name"]."',`slug`='".$_POST["slug"]."',`users`='".$_SESSION["users"]."',`date`='".$_SESSION["date"]."',`time`='".$_SESSION["time"]."',`ip`='".$_SESSION["ip"]."' where id='".$_GET["update"]."'";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$validate="Values Updated Sucessfully.";
	}
	else
	{
		$mysqli=connect();
		$sql="INSERT into `user_type` (`name`,`slug`,`users`,`date`,`time`,`ip`)VALUES('".$_POST["name"]."','".$_POST["slug"]."','".$_POST["users"]."',now(),now(),'".$_SERVER["REMOTE_ADDR"]."')";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$validate="Values Inserted Sucessfully.";
	}
}
?>
<a class="add_button" href="">Add New User Type</a>
  <thead>
   <td>Name</td>
   <td>Slug</td>
   <td>Update</td>
   <td>Delete</td>
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
?>
  <td><a href="?update=<?php echo $rec["id"]; ?>"><span class="fa fa-pencil"></span></a></td>
  <td><a href="#" onClick="delete_record('<?php echo $rec["id"]; ?>')"><span class="fa fa-trash"></span></a></td>
    <?php
  echo "</tr>";
}
disconnect($mysqli);
?>
</tbody>
<tfoot>
  <td>Name</td>
  <td>Slug</td>
  <td>Update</td>
  <td>Delete</td>
 </tfoot>
</table>
<?php echo $validate; ?>
<form name="myform" id="myform" onSubmit="return validate()" method="post">
  <fieldset>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php if(isset($_GET["update"])){echo fetch_value("name");} ?>">
  </fieldset>
  <fieldset>
    <label for="slug">Slug</label>
    <input type="text" id="slug" name="slug" value="<?php if(isset($_GET["update"])){echo fetch_value("slug");} ?>">
  </fieldset>
    <fieldset>
  <input type="submit">
  </fieldset>
</form>
<script>
  function validate()
  {
	  if(document.getElementusersId("name").value=="" && document.getElementusersId("slug").value=="" && document.getElementusersId("users").value=="")
	  {
		  alert("Enter specified fields");
		  document.getElementusersId("name").focus();
		  return false;
	  }
	  else if(document.getElementusersId("name").value=="")
	  {
		  alert("Enter your name.");
		  document.getElementusersId("name").focus();
		  return false;
	  }
	  else if(document.getElementusersId("slug").value=="")
	  {
		  alert("Enter your slug.");
		  document.getElementusersId("slug").focus();
		  return false;
	  }
	    else if(document.getElementusersId("users").value=="")
	  {
		  alert("Enter your users.");
		  document.getElementusersId("users").focus();
		  return false;
	  }
  }
 </script>
 


