<?php
ob_start();
require_once("../inc/function.php");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<?php require_once("../inc/meta.php"); ?>
<?php require_once("../inc/head.php"); ?>
</head>
<body class="login">
<?php require_once("../inc/head_script.php"); ?>
<section> <img src="../img/logo.png" id="logo">
  <h1>Sign in to your CRM account.</h1>
  <form method="post" name="login_form" id="login_form" action="../auth">
    <div class="validation"></div>
    <fieldset>
      <label class="fa fa-user"></label>
      <input type="text" placeholder="Username/Email" name="username" id="username">
    </fieldset>
    <fieldset>
      <label class="fa fa-unlock-alt"></label>
      <input type="password" placeholder="Password" name="password" id="password">
    </fieldset>
    <input type="hidden" name="authcode" id="authcode" value="">
    <button type="submit" class="clear"> Login<span class="fa fa-sign-in"></span> </button>
  </form>
  <script>
   
   $("#login_form").submit(function(){
	   $("#username").parent("fieldset").removeClass("error");
	   $("#password").parent("fieldset").removeClass("error");
	   if($("#username").val()=="" && $("#password").val()==""){
		   $("#username").parent("fieldset").addClass("error");
		   $("#password").parent("fieldset").addClass("error");
		   $("#username").focus();
		   $(".validation").html("Please enter the username &amp; password.");
		   return false;
	   }
	   else if($("#username").val()==""){ 
		   $("#username").parent("fieldset").addClass("error");
		   $("#username").focus();
		   $(".validation").html("Please enter your username.");
		   return false;
	   }
	   else if($("#password").val()==""){
		   $("#password").parent("fieldset").addClass("error");
		   $("#password").focus();
		   $(".validation").html("Please enter your password.");
		   return false;
	   }
   });
  </script> 
</section>
<?php require_once("../inc/foot_script.php"); ?>
</body>
</html>
<?php ob_flush(); ?>