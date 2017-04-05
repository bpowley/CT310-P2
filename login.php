<?php
$pgTitle = "Log In";
include ('header.php');
?>

</head>

<?php include ('nav.php'); ?>

<!-- Start contents of main page here. -->


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<?php
function validateCredentials($user, $pass) {

	if($user=="dcresc" and md5($pass)=="482c811da5d5b4bc6d497ffa98491e38")	{
		return true;
	}
	else if($user=="bpowley" and md5($pass)=="aaa7d6afc57651e74da49e330a15041f") {
		return true;
	}
	else if($user=="ct310" and md5($pass)=="3aaec86181ee6974b99d893b4c1eb5b5") {
		return true;
	}
	else {
		return false;
	}
}

if (isset ( $_POST ['logout'] )) {
	$_SESSION ['sessionUser'] = "Guest";
	$_SESSION ['startTime'] = date ( "l d, M. g:i a", time () );
}

if($_SESSION['sessionUser'] != 'Guest'){?>

	<p style="text-align: center">Logged in as <strong>  <?php  echo  $_SESSION["sessionUser"] ?></strong></p>
	<p style="text-align: center">Logged in at: <?php  echo $_SESSION['startTime'] ?></p>
				
	<div style="display: block; text-align: center">	
		<form method="post" action="login.php">
			 <input type="hidden" value="true" name="logout">
			 <input type="submit" value="Logout" >
		</form>
	</div><?php
}
else {
	if (isset($_POST['op'])) {
		$username  = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$password  = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

		if (validateCredentials($username, $password)){
			$_SESSION["sessionUser"] = $username;
			$_SESSION['startTime'] = date ( "l d, M. g:i a", time () ); ?>
			
			<p style="text-align: center">Logged in as <strong>  <?php  echo  $_SESSION["sessionUser"] ?></strong></p>
			<p style="text-align: center">Logged in at: <?php  echo $_SESSION['startTime'] ?></p>
				
			<div style="display: block; text-align: center">	
				<form method="post" action="login.php">
					 <input type="hidden" value="true" name="logout">
					 <input type="submit" value="Logout" >
				</form>
			</div>
		<?php
		}
		else { ?>
			<div style="display: block; text-align: center">
			   <h2 style="color:red">Login Failed</h2>
			   <p>Enter your credentials below. </p>
			   <form method="post" action="login.php" >
				  Username:    <input type="text" name="username"    size="30"><br/>
				  Password&nbsp;: <input type="password" name="password" size="30"><br/>
				 <input type="hidden" value="done" name="op">
				 <input type="submit" value="Send" >
			   </form>
		   </div>
		   <?php
		}
	}
	else {
		?>
			<div style="display: block; text-align: center">
			   <h2>Please Log In</h2>
			   <p>Enter your credentials below. </p>
			   <form method="post" action="login.php" >
				  Username:    <input type="text" name="username"    size="30" ><br/>
				  Password&nbsp;: <input type="password" name="password" size="30" ><br/>
				 <input type="hidden" value="done" name="op">
				 <input type="submit" value="Send">
			   </form>
		   </div>
		<?php
	}
}
?>
	
</div>



<!-- End of contents -->
<?php include('footer.php'); ?>
