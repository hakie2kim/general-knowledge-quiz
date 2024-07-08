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
<h2 style="text-align:left">Leader Board</h2>

<?php
if (isset($_GET['action'])) {
    // User info read from a text file
	if ((file_exists("data/users.txt")) && (filesize("data/users.txt") != 0)) {
        $users = file("data/users.txt", FILE_IGNORE_NEW_LINES);

        for ($i = 0; $i < count($users); ++$i) {
            $cur_user = explode("~", $users[$i]);

            $keys[] = $cur_user[0];
            $values[] = $cur_user[1];
        }
        $read_users = array_combine($keys, $values);

		switch ($_GET['action']) {
			case 'SortByName':
				ksort($read_users); // Sort by key
				break;
			case 'SortByScore':
				arsort($read_users); // Associative array reverse sort
				break;
		} // End of the switch statement
	}
    // Printing out users in user intended way
    echo "<table style=\"background-color:lightgray\" border=\"1\" width=\"100%\">\n";
    // Header
    echo "<tr>\n";
    echo "<td width=\"50%\" style=\"text-align:center\"><span style=\"font-weight:bold\">Name</span></td>\n";
    echo "<td width=\"50%\" style=\"text-align:center\"><span style=\"font-weight:bold\">Overall Score</span></td>\n";
    echo "<tr>\n";
    
    // Rest of contents
    foreach($read_users as $username => $overall) {
        echo "<tr>\n";
        echo "<td width=\"50\"><span style=\"font-weight:bold\">" . htmlentities($username) ."</span><br />";
        echo "<td width=\"50\"><span style=\"font-weight:bold\">" . htmlentities($overall) ."</span><br />";
        echo "</tr>\n"; 
    }
    echo "</table>";
}
?>
<p>
	<input type="button" value="Sort by Name" onclick="window.location.href='leader_board.php?action=SortByName'">
   	<input type="button" value="Sort by Score" onclick="window.location.href='leader_board.php?action=SortByScore'">
    <input type="button" value="Try History" onclick="window.location.href='history.php'">
	<input type="button" value="Try Georaphy" onclick="window.location.href='geography.php'">
 	<input type="button" value="Exit" onclick="window.location.href='exit.php'">
</p>
<?php require_once("view/footer.html")?>
</body>
</html>