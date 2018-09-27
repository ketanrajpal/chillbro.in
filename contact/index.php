<?php
ob_start();
require_once("../config.php");
require_once("../admin/inc/function.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$mysqli=connect();
		$sql="INSERT into `contact` (`name`,`email`,`phone`,`message`,`title`,`date`,`time`,`ip`)VALUES('".trim($_POST["name"])."','".trim($_POST["email"])."','".trim($_POST["phone"])."','".trim($_POST["message"])."','".trim($_POST["title"])."',now(),now(),'".$_SERVER["REMOTE_ADDR"]."')";
		//echo $sql;
		mysqli_query($mysqli,$sql);
		disconnect($mysqli);
		header("Location:../contact_complete");
		exit();
}
?>
<!DOCTYPE HTML>
<html>
<?php head("Chillbro &bull; Contact"); ?>
<body>
<?php top_header(); ?>
<?php slider("contact"); ?>
<section id="content">

<h1>Contact</h1>
<p>You can write to us regarding any queries you may have regarding the services. You are also welcome to provide us with your valuable Feedback. We will respond to you within 24 hours' time.</p>

<form name="myform" id="myform" class="form" onSubmit="return validate()" method="post">
<article><fieldset>
      <input type="text" id="name" name="name" required placeholder="Enter your Full Name">
          <label for="name"> Name</label>
	</fieldset></article>
    <article><fieldset>
      <input type="text" id="email" name="email" required placeholder="Enter your Email Address">
	   <label for="email">Email</label>
    </fieldset></article>
    <article><fieldset>
      <input type="text" id="phone" name="phone" required placeholder="Enter your Phone Number">
	        <label for="phone">Phone</label>
    </fieldset></article>
    <div class="clear"></div>
    <fieldset style="width:95%;">
      <input type="text" id="title" name="title" required placeholder="Enter the Title for the Message">
	      <label for="title">Title</label>
    </fieldset>
    <fieldset style="width:95%;">
      <textarea id="message" name="message" placeholder="Enter your Message"></textarea>
	     <label for="message">Message</label>
    </fieldset>
    <br><br>
    <fieldset>
    <input type="submit">
  </fieldset>
   </form>
   </section>
    <script>
$("#myform").validate({
  rules: {
    name: {
      	required:true,
		regex: /^[a-zA-Z ]*$/
    },
		email: {
			required:true,
			regex: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/
		},
		phone: {
			required:true,
			regex:/^[0-9]+$/
		},
	  message: {
			required:true,
			regex:/^[a-zA-Z ]+$/
  },
	  title: {
			required:true,
			regex:/^[a-zA-Z ]+$/
  }
  }
});
</script>
<?php footer(); ?>
</body>
</html>
