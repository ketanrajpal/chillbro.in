<?php
function connect()
{
	return mysqli_connect("localhost","root","admin@123","trippingo.in");
}
function disconnect($mysqli)
{
	mysqli_close($mysqli);
}
function fetch_value($field)
{
	$sql="select ".$field." from `ankita` where `id`='".$_GET["update"]."'";
	$mysqli=connect();
	$com=mysqli_query($mysqli, $sql);
	$dr=mysqli_fetch_array($com);
	disconnect($mysqli);
	return $dr[0]; 
}
$validate="";
if(isset($_GET["delete"]))
{
	$mysqli=connect();
	$sql="DELETE FROM `ankita` where `id`='".$_GET["delete"]."'";
	mysqli_query($mysqli,$sql);
	disconnect($mysqli);
	$validate="Values Deleted Sucessfully.";
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if($_POST["name"]=="" && $_POST["slug"]=="")
	{
		$validate="Enter your name and slug";
	}
	else if($_POST["name"]=="")
	{
		$validate="Enter your name.";
	}
	else if($_POST["slug"]=="")
	{
		$validate="Enter your slug.";
	}
	else if($_POST["address"]=="")
	{
		$validate="Enter your address.";
	}
	else if(isset($_GET["update"]))
	{
		$mysqli=connect();
		$sql="UPDATE `ankita` SET `name`='".$_POST["name"]."',`slug`='".$_POST["slug"]."',`address`='".$_POST["address"]."' where id='".$_GET["update"]."'";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$validate="Values Updated Sucessfully.";
	}
	else
	{
		$mysqli=connect();
		$sql="INSERT into `ankita` (`name`,`slug`,`address`)VALUES('".$_POST["name"]."','".$_POST["slug"]."','".$_POST["address"]."')";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$validate="Values Inserted Sucessfully.";
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>user type</title>
</head>
<body>
<a class="add_button" href="">Add New User Type</a>
<header class="clear"> <img src="file:///C|/Users/Administrator/Documents/server/img/logo-small.png">

<table border="1">
<div class="clear"></div>
  <thead>
  <td>Name</td>
    <td>Slug</td>
	<td>address</td>
    <td>Action</td>
      </thead>
  <tbody>
    <?php
   $mysqli=connect();
   $sql="select * from ankita";
   $com=mysqli_query($mysqli,$sql);
   while($dr=mysqli_fetch_array($com))
   {
	   echo "<tr>";
	   echo "<td>".$dr["name"]."</td>";
	   echo "<td>".$dr["slug"]."</td>";
	   echo "<td>".$dr["address"]."</td>";
	   echo "<td><a href='?update=".$dr["id"]."'>UPDATE</a> | <a href='?delete=".$dr["id"]."'>DELETE</a></td>";
	   echo "</tr>";
   }
   disconnect($mysqli);
   ?>
  </tbody>
  <tfoot>
  <td>Name</td>
    <td>Slug</td>
	<td>address</td>
    <td>Action</td>
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
    <label for="address">address</label>
    <input type="text" id="address" name="address" value="<?php if(isset($_GET["update"])){echo fetch_value("address");} ?>">
  </fieldset>
    <fieldset>
  <input type="submit">
</form>
<script>
  function validate()
  {
	  if(document.getElementaddressId("name").value=="" && document.getElementaddressId("slug").value=="" && document.getElementaddressId("address").value=="")
	  {
		  alert("Enter specified fields");
		  document.getElementaddressId("name").focus();
		  return false;
	  }
	  else if(document.getElementaddressId("name").value=="")
	  {
		  alert("Enter your name.");
		  document.getElementaddressId("name").focus();
		  return false;
	  }
	  else if(document.getElementaddressId("slug").value=="")
	  {
		  alert("Enter your slug.");
		  document.getElementaddressId("slug").focus();
		  return false;
	  }
	    else if(document.getElementaddressId("address").value=="")
	  {
		  alert("Enter your address.");
		  document.getElementaddressId("address").focus();
		  return false;
	  }
  }


 
 function slug(a){return a.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();}

</script>
</body>
</html>