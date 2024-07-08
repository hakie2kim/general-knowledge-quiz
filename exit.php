<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <title>Singapore General Knowledge Quiz</title>
</head>
<body>
<?php require_once("view/header.html")?>
<h2 style="text-align:left">Result</h2>

<?php 
echo "<p>Name: " . $_SESSION['username']."</p>"; 
echo "<p>Overall score: ". $_SESSION['overall']."</p><br>";
?>

<button type="button" name="restart" onclick="window.location.href='start_page.php'">Restart</button>
<?php require_once("view/footer.html")?>
</body>
</html>