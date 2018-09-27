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
	$sql="select ".$field." from `user_type` where `id`='".$_GET["update"]."'";
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
	$sql="DELETE FROM `user_type` where `id`='".$_GET["delete"]."'";
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
	else if(isset($_GET["update"]))
	{
		$mysqli=connect();
		$sql="UPDATE `user_type` SET `name`='".$_POST["name"]."',`slug`='".$_POST["slug"]."',`by`='".$_POST["by"]."' where id='".$_GET["update"]."'";
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		$validate="Values Updated Sucessfully.";
	}
	else
	{
		$mysqli=connect();
		$sql="INSERT into `user_type` (`name`,`slug`,`by`,`date`,`time`,`ip`)VALUES('".$_POST["name"]."','".$_POST["slug"]."','".$_POST["by"]."',now(),now(),'".$_SERVER["REMOTE_ADDR"]."')";
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
<header class="clear"> <img src="../img/logo-small.png">

<table border="1">
<div class="clear"></div>
  <thead>
  <td>Name</td>
    <td>Slug</td>
	<td>By</td>
    <td>Action</td>
      </thead>
  <tbody>
    <?php
   $mysqli=connect();
   $sql="select * from user_type";
   $com=mysqli_query($mysqli,$sql);
   while($dr=mysqli_fetch_array($com))
   {
	   echo "<tr>";
	   echo "<td>".$dr["name"]."</td>";
	   echo "<td>".$dr["slug"]."</td>";
	   echo "<td>".$dr["by"]."</td>";
	   echo "<td><a href='?update=".$dr["id"]."'>UPDATE</a> | <a href='?delete=".$dr["id"]."'>DELETE</a></td>";
	   echo "</tr>";
   }
   disconnect($mysqli);
   ?>
  </tbody>
  <tfoot>
  <td>Name</td>
    <td>Slug</td>
	<td>By</td>
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
    <label for="by">By</label>
    <input type="text" id="by" name="by" value="<?php if(isset($_GET["update"])){echo fetch_value("by");} ?>">
  </fieldset>
    <fieldset>
  <input type="submit">
</form>
<script type="text/javascript">
  function validate()
  {
	  if(document.getElementById("name").value=="" && document.getElementById("slug").value=="" && document.getElementById("by").value=="")
	  {
		  alert("Enter specified fields");
		  document.getElementById("name").focus();
		  return false;
	  }
	  else if(document.getElementById("name").value=="")
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
	    else if(document.getElementById("by").value=="")
	  {
		  alert("Enter your by.");
		  document.getElementById("by").focus();
		  return false;
	  }
  }
  </script>

	</article>
  
  </section>
</section>
<script>
$("#name").on('blur keypress keydown change focus focusout',function(){
		$("#slug").val(slug($("#name").val()));
	});
	
 $(".trigger a").click(function(e){
	 $(this).children("span:nth-child(2)").toggleClass("fa-rotate-90");
	 $(this).siblings("ul").slideToggle("fast");
 });
 
 $(".drop").first().parent("a").click(function(e){
	 e.preventDefault();
 });
 
 function slug(a){return a.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();}
 function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
}
   
 
 function slug(a){return a.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();}
    </script>
 

</script>
</body>
</html>