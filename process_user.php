<?php
//session_start(); 
?>

<?php
$users_file = "users.txt";
if(isset($_POST['nickname']) && isset($_POST['topic'])) {
    $nickname = $_SESSION["username"];
    $topic = $_POST['topic'];

    $user_record = "$nickname~$topic\n";
    $file = fopen("./data/users.txt", "ab");// opens file for writing only and place the pointer at the end
	if ($file === FALSE) {
		echo "Error in starting quiz!\n";
    } else {
		fwrite($file, $user_record);
		fclose($file);
		echo "Success\n";
        header("Location: history.php");
	}
} 
else {
    echo "Please fill out form to start this quiz.";
    header("Location: start_page.php");
}
?>