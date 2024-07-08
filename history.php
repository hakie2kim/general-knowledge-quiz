<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<style>	
		.question:not(.active){
  		display:none;
		}	
	</style>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <title>Singapore General Knowledge Quiz</title>
</head>
<body>
<?php require_once("view/header.html")?>
<h2 style="text-align:left">History</h2>
<?php 
// History questions read from a text file
if ((file_exists("data/history_questions.txt")) && (filesize("data/history_questions.txt") != 0)) {
	$questions = file("data/history_questions.txt", FILE_IGNORE_NEW_LINES);
	for ($i = 0; $i < count($questions); ++$i) {
		$cur_question = explode("~", $questions[$i]);

        if (sizeof($cur_question) == 2) { // Checking if it is a short answer question
            $keys_question[] = $cur_question[0];
            $values_question[] = $cur_question[1];
        }
        else { // Checking if it is a MCQ
            $keys_question[] = $cur_question[0];
            $choices = array($cur_question[1], $cur_question[2], $cur_question[3], $cur_question[4]);
            $values_question[] = $choices;
        }

	}
	$qna = array_combine($keys_question, $values_question);
	//print("<pre>".print_r($qna,true)."</pre>");
}

// Variables to use for whole session					  
$_SESSION['score'] = 0;
$_SESSION['correct'] = 0;
$_SESSION['wrong'] = 0;

// Setting attempt as 1
if (!isset($_SESSION['attempt'])) {
	$_SESSION['attempt'] = 1; 
}

// Setting overall as 0 to start
if (!isset($_SESSION['overall']))  {
	$_SESSION['overall'] = 0; 
}

if (isset($_POST['submit'])) { // After a user's submission 
	$answers = $_POST['ans'];
	// print("<pre>".print_r($answers,true)."</pre>");

	if (is_array($answers)) {
		foreach ($answers as $num => $response) {
			// print("<pre>".print_r($num,true)."</pre>");
			// print("<pre>".print_r($response,true)."</pre>");
			$response = stripslashes($response); // Removing backslashes
			if (strlen($response)>0) { // If a user answers,
				if (is_array($qna["$num"]) == true) { // If the question is a MCQ
					if ($response == 3) { // Last choice is always the answer
						$_SESSION['score']+=5;
						$_SESSION['correct']+=1;
						echo "<p>Correct! for question : $num : " . $qna[$num][$response] . "</p>\n";
					} else {
						$_SESSION['score']-=3;
						$_SESSION['wrong']+=1;
						echo "<p>Wrong! Correct answer for question : $num : is : " . $qna[$num][3] . " : your response : " . $qna[$num][$response] . " : is wrong" . ".</p>\n";
					}
				}
				else { // If the question is a short answer question
					if (strcasecmp($qna["$num"],$response)==0) { //user input matches answers in array 
						$_SESSION['score']+=5;
						$_SESSION['correct']+=1;
						echo "<p>Correct! for question : $num : " . $qna[$num] . "</p>\n";
					} 
					else {
						$_SESSION['score']-=3;
						$_SESSION['wrong']+=1;
						echo "<p>Wrong! Correct answer for question : $num : is : " . $qna[$num] . " : your response : " . $response . " : is wrong" . ".</p>\n";
					}		
				}				
			}
			else { // If a user did not answer,
				echo "<p>You did not answer for question : $num.</p>\n";
			}
		} 
		
		$_SESSION['attempt']++; // A number of attempts increases when user tries again
		$_SESSION['overall'] += $_SESSION['score']; // Overall score is keep accumulating from all attempts
		
		// User info read from a text file
		if ((file_exists("data/users.txt")) && (filesize("data/users.txt") != 0)) {
			$users = file("data/users.txt", FILE_IGNORE_NEW_LINES);
			// print("<pre>".print_r($users,true)."</pre>");

        	for ($i = 0; $i < count($users); ++$i) {
            	$cur_user = explode("~", $users[$i]);
				// print("<pre>".print_r($cur_user,true)."</pre>");

				// If user's overall beat an original overall, update the original overall
				if(strcasecmp($cur_user[0], $_SESSION['username']) == 0 && $cur_user[1] < $_SESSION['overall']) {
					$cur_user[1] = $_SESSION['overall'];
				}
            	
				$keys_user[] = $cur_user[0];
            	$values_user[] = $cur_user[1];
        	}
			$updated_users = array_combine($keys_user, $values_user);
        	// print("<pre>".print_r($updated_users,true)."</pre>");
		}

		// Rewrite whole user info
		$file = fopen("./data/users.txt", "w");
		foreach ($updated_users as $user => $overall) {
			$user_record = "$user~$overall\n";
			fwrite($file, $user_record);
		}
		if ($_SESSION['attempt'] == 1) {
			fwrite($file, $_SESSION['username']."~".$_SESSION['overall']);
			echo "check";
		}
		fclose($file);

		echo "Attempt " . $_SESSION['attempt'] . "<br><br>";
		echo $_SESSION['username']."<br>";
		echo "You have scored: " . $_SESSION['score']."<br>";
		echo "A number of correct questions: " . $_SESSION['correct']."<br>";
		echo "A number of wrong questions: " . $_SESSION['wrong']."<br>";
		echo "Your overall score is: " . $_SESSION['overall'] ."<br>";
	}?>
<p>
	<input type="button" value="Another Try" onclick="window.location.href='history.php'">
	<input type="button" value="Try Georaphy" onclick="window.location.href='geography.php'">
	<input type="button" value="Leader Board" onclick="window.location.href='leader_board.php?action=SortByName'">
	<input type="button" value="Exit" onclick="window.location.href='exit.php'">
</p>
<?php	
}
else { // Before a user's submission
	?>
	<form action='history.php' method='POST'>
	
    <?php
	// echo "Attempt " . $_SESSION['attempt'] . "<br><br>";
	$random = array_rand ($qna, 5); // Pick random 5 questions
	// print("<pre>".print_r($random,true)."</pre>");

	// To differentiate format btwn short answer question and MCQ
	function display_question($question, $questions_bank) {
		$random_index = array(0, 1, 2, 3);
		// print("<pre>".print_r($random_index,true)."</pre>");
		shuffle($random_index);
		// print("<pre>".print_r($random_index,true)."</pre>");

		if(is_array($questions_bank[$question]) == false) { // Short answer question
			echo $question."<br><input type='text' name='ans[$question]' />"."<br><br>";
		}
		else { // MCQ
			echo $question."<br>";
			?>
			<p>
				<input type="radio" id="choice1" name="ans[<?php echo $question?>]" value="<?php echo $random_index[0] ?>">
				<label for="choice1"><?php echo $questions_bank[$question][$random_index[0]];?></label>
				<input type="radio" id="choice2" name="ans[<?php echo $question?>]" value="<?php echo $random_index[1] ?>">
				<label for="choice2"><?php echo $questions_bank[$question][$random_index[1]];?></label>
				<input type="radio" id="choice3" name="ans[<?php echo $question?>]" value="<?php echo $random_index[2] ?>">
				<label for="choice3"><?php echo $questions_bank[$question][$random_index[2]];?></label>
				<input type="radio" id="answer" name="ans[<?php echo $question?>]" value="<?php echo $random_index[3] ?>">
				<label for="answer"><?php echo $questions_bank[$question][$random_index[3]];?></label>
			</p>
			<?php
		}
	}
	?>

	<div id="questions">
		<!--$random[] is question / $qna is questions read frm text file-->
    	<div class="question active">1. <?php display_question($random[0], $qna)."<br><br>"; ?></div>
    	<div class="question">2. <?php display_question($random[1], $qna)."<br><br>"; ?></div>
    	<div class="question">3. <?php display_question($random[2], $qna)."<br><br>"; ?></div>
    	<div class="question">4. <?php display_question($random[3], $qna)."<br><br>"; ?></div>
    	<div class="question">5. <?php display_question($random[4], $qna)."<br><br>"; ?></div>
	<button type="button" id="back">Back</button>
	<button type="button" id="next">Next</button>
	
	<input type='submit' name='submit' value='Check Answers' /> 
	<input type='reset' name='reset' value='Reset Answers' />
	</form>
	
	<?php
}
?>
<?php require_once("view/footer.html")?>
</body>
<!--Ajax googleapis jquery imported-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
		function setButtonDisplay(){
    		var hidePrev = $('#questions div:first').hasClass('active'),
        	hideNext = $('#questions div:last').hasClass('active');

    		$('#back')[hidePrev ? 'hide' : 'show']();
	    	$('#next')[hideNext ? 'hide' : 'show']();
		}
		setButtonDisplay();

		$('#next').click(function(){
	    	var $current = $('.question.active');
	    	if ($(".question").next().length != 0){
	    	      $('.question').removeClass('active');
	    	      $current.next().addClass('active');
	    	}
	    	setButtonDisplay();
		});

		$('#back').click(function(){
	    var $current = $('.question.active');
	     	if ($(".question").prev().length != 0){
	          	$('.question').removeClass('active');
	          	$current.prev().addClass('active');
	     	}
	    	setButtonDisplay();
		});
	</script>
</html>