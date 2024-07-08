<?php
session_start();
session_destroy();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <title>Singapore General Knowledge Quiz</title>
</head>
<body>
<?php require_once("view/header.html")?>
<h2 style="text-align:left">Welcome</h2>
<form action="start_page.php" method="POST">
<p>User name : <input type='text' name='name' size='20' /></p>
<input type="submit" name="user" value="Verify user name">
<?php 
if (isset($_POST['name'])) { // Check if user name has been entered by a user
	$_SESSION["username"] = $_POST['name'];
	echo $_SESSION["username"] . " is now your user name.";
}
else {
	$_SESSION["username"] = null;
	echo " Please enter your user name.";
}
?>
<p>Pick a topic : </p>
<p>
<input type="button" name="history" value="History" onclick="window.location.href='history.php'">
<input type="button" name="geography" value="Geography" onclick="window.location.href='geography.php'">
</p>
</form>
<?php require_once("view/footer.html")?>
</body>
</html>