<?php
function connect()
{
	return mysqli_connect("localhost","root","admin@123","trippingo.in");
}
function disconnect($mysqli)
{
	mysqli_close($mysqli);
}
$validation_message="";
if(isset($_GET["delete"]))
{
  execute_query("DELETE from `ankita` where `id`='".$_GET["delete"]."'");
  $validation_message="Records Sucessfully Deleted.";
  header("Location : ../ankita");
}
else if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if($_POST["name"]=="" && $_POST["slug"]=="" &&  $_POST["address"]=="" )
  {
    $validation_message="Enter your name,slug and address.";
  }
  else if($_POST["name"]=="")
  {
    $validation_message="Enter your name.";
  }
   else if($_POST["slug"]=="")
  {
    $validation_message="Enter slug.";
  }
   else if($_POST["address"]=="")
  {
    $validation_message="Enter address.";
  }
  else
  {
    if(isset($_GET["update"]))
    {
      execute_query("UPDATE ankita SET `name`='".$_POST["name"]."',`slug`='".$_POST["slug"]."',`address`='".$_POST["address"]."' where id='".$_GET["update"]."'");
    $validation_message="Records Sucessfully Updated.";
    header("Location : ../ankita");
    }
    else
    {
      execute_query("INSERT into ankita (`name`,`slug`,`address`)VALUES('".$_POST["name"]."','".$_POST["slug"]."','".$_POST["address"]."')");
    $validation_message="Records Sucessfully Added.";
    header("Location : ../ankita");
    }
  }
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>ankita</title>
</head>
<body>
<h1>ankita</h1>

<?php if(!isset($_GET["add"]) && !isset($_GET["update"])  ){ ?>
<a href="file:///C|/Users/Administrator/Documents/server/ankita?add">Add new record</a>
<table border="1">
  <thead>
  <td>Name</td>
    <td>Slug</td>
	<td>Address</td>
    <td>Action</td>
      </thead>
  <tbody>
<?php
$mysqli=connect();
$sql="select * from ankita";
$dr=mysqli_query($mysqli,$sql);
while($rec=mysqli_fetch_array($dr))
{
  echo "<tr>";
  echo "<td>".$rec["name"]."</td>";
  echo "<td>".$rec["slug"]."</td>";
   echo "<td>".$rec["address"]."</td>";
  ?>
  <td><a href="../?update=<?php echo $rec["id"]; ?>">Update</a> &bull; <a href="#" onClick="delete_record('<?php echo $rec["id"]; ?>')">Delete</a></td>
    <?php
  echo "</tr>";
}

disconnect($mysqli);

?>
      </tbody>
  <tfoot>
  <td>Name</td>
    <td>Slug</td>
	<td>Address</td>	
	<td>Action</td>
      </tfoot>
</table>
<?php } ?>
<?php if(isset($_GET["add"]) || isset($_GET["update"])){ ?>
<a href="file:///C|/Users/Administrator/Documents/server/ankita">View Records</a>
<form name="myform" id="myform" onSubmit="return validate()" method="post">
  <div class="validation_message"><?php echo $validation_message; ?></div>
  <fieldset>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php if(isset($_GET["update"])){  echo get_value("ankita","name",$_GET["update"]);  } ?>">
  </fieldset>
  <fieldset>
    <label for="slug">Slug</label>
    <input type="text" id="slug" name="slug"value="<?php if(isset($_GET["update"])){  echo get_value("ankita","slug",$_GET["update"]);  } ?>">
  </fieldset>
   <fieldset>
    <label for="address">address</label>
    <input type="text" id="address" name="address"value="<?php if(isset($_GET["update"])){  echo get_value("ankita","address",$_GET["update"]);  } ?>">
  </fieldset>
  <input type="submit" value="Submit">
</form>
<?php } ?>
<script>
 function validate()
 {
   if(document.getElementById("name").value=="")
   {
     alert("Enter your name.");
     document.getElementById("name").focus();
     return false;
   }
   else if(document.getElementById("slug").value=="")
   {
     alert("Enter your slug.");
     document.getElementById("slug").focus();
     return false;
   }
   else if(document.getElementById("address").value=="")
   {
     alert("Enter your address.");
     document.getElementById("address").focus();
     return false;
   }
 }
 function delete_record(id)
 {
   if (confirm("Do you really want to delete the record: "+id))
   {
     window.location.href="/ankita?delete="+id;
   }
 }
</script>
</body>
</html>
