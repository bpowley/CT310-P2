<?php
require_once "inc/page_setup.php";
$pgTitle = "Forgotten Password";

$db = new Database();
$users = $db->getUsers();

if(isset($_POST['mailing'])){
  $toMail = $_POST['username'];
  // echo "$toMail";

  $key = str_shuffle("abcdefghijklmnopqrstuvwxyz123456");
  $msg = "follow this link to reset your password: https://www.cs.colostate.edu/~bpowley/previous_assignments/PA6/passwordreset.php?key=" . $key;

  $_SESSION['url'] = $key;
  $_SESSION['sendTo'] = $_POST['username'];

  if(mail($toMail, 'password recovery', $msg));
}


include ('inc/header.php');
?>

</head>

<?php include ('inc/nav.php'); ?>

<!-- Start contents of main page here. -->

	<div class="header">
		<h2> Password Recovery </h2>
	</div>
	<div style="display: block; text-align: center">
		<p>Select your name and password please:</p>
		<p>why the fuck isn't anything happening0</p>

		<form action="fmp.php" method="post">
			<p>why the fuck isn't anything happening1</p>
			<select name="username">
				<p>why the fuck isn't anything happening2</p>
				<?php
				foreach ($users as $u) {
         	  	$flag = ($u['email'] == $_SESSION['mail']) ? 'selected' : '';
         	  	echo "\t\t\t\t<option value=\"$u->email\" $flag > $u->username </option>\n";
       	  }
				?>
			</select>
      <input type="hidden" value="done" name="mailing">
      <input type="submit" value="Send Email">
		</form>
	</div>



<!-- End of contents -->
<?php include('inc/footer.php'); ?>
