<h1>Contact</h1>
<div class="clear"></div>
<?php
if(isset($_GET["delete"]))
{
	$mysqli=connect();
	$sql="DELETE FROM `contact` where `id`='".$_GET["delete"]."'";
	mysqli_query($mysqli,$sql);
	disconnect($mysqli);
	$_SESSION["validation_message"]="Record sucessfully deleted.";
}
?>
<?php if(!isset($_GET["add"])){ ?>

<table class="display">
  <thead>
   <td>Name</td>
   <td>Email</td>
   <td>Phone</td>
   <td>Message</td>
   <td>Title</td>
   <td>Delete</td>
  </thead>
<tbody>
<?php
$mysqli=connect();
$sql="select * from contact";
$dr=mysqli_query($mysqli,$sql);
while($rec=mysqli_fetch_array($dr))
{
  echo "<tr>";
  echo "<td>".$rec["name"]."</td>";
   echo "<td>".$rec["email"]."</td>";
   echo "<td>".$rec["phone"]."</td>";
   echo "<td>".$rec["message"]."</td>";
   echo "<td>".$rec["title"]."</td>";
?>
 <td><a href="#" onClick="delete_record('<?php echo $rec["id"]; ?>','contact')"><span class="fa fa-trash"></span></a></td>
    <?php
  echo "</tr>";
}
disconnect($mysqli);
?>

</tbody>
<tfoot>
   <td>Name</td>
   <td>Email</td>
   <td>Phone</td>
   <td>Message</td>
   <td>Title</td>
   <td>Delete</td>
 </tfoot>
</table>

<?php } ?>
