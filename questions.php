<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // History questions read from a text file
if ((file_exists("data/history_questions.txt")) && (filesize("data/history_questions.txt") != 0)) {
	$questions = file("data/history_questions.txt", FILE_IGNORE_NEW_LINES);
	for ($i = 0; $i < count($questions); ++$i) {
		$cur_question = explode("~", $questions[$i]);

        if (sizeof($cur_question) == 2) {
            $keys_question[] = $cur_question[0];
            $values_question[] = $cur_question[1];
        }
        else {
            $keys_question[] = $cur_question[0];
            $choices = array($cur_question[1], $cur_question[2], $cur_question[3], $cur_question[4]);
            $values_question[] = $choices;
        }

	}
	$qna = array_combine($keys_question, $values_question);
	print("<pre>".print_r($qna,true)."</pre>");
}

//echo "Attempt " . $_SESSION['attempt'] . "<br><br>";
$random = array_rand ($qna, 5); // Pick 5 questions from the array randomly
print("<pre>".print_r($random,true)."</pre>");

$random_index = array(0, 1, 2, 3);
print("<pre>".print_r($random_index,true)."</pre>");
shuffle($random_index);
print("<pre>".print_r($random_index,true)."</pre>");

function display_question($question, $questions_bank, $index) {
    if(is_array($questions_bank[$question]) == false) {
        echo $question."<br><input type='text' name='ans[$question]' />"."<br><br>";
    }
    else {
        echo $question."<br>";
        ?>
        <p>
            <input type="radio" id="choice1" name="ans[<?php echo $question?>]" value="<?php echo $index[0] ?>">
            <label for="choice1"><?php echo $questions_bank[$question][$index[0]];?></label>
            <input type="radio" id="choice2" name="ans[<?php echo $question?>]" value="<?php echo $index[1] ?>">
            <label for="choice2"><?php echo $questions_bank[$question][$index[1]];?></label>
            <input type="radio" id="choice3" name="ans[<?php echo $question?>]" value="<?php echo $index[2] ?>">
            <label for="choice3"><?php echo $questions_bank[$question][$index[2]];?></label>
            <input type="radio" id="answer" name="ans[<?php echo $question?>]" value="<?php echo $index[3] ?>">
            <label for="answer"><?php echo $questions_bank[$question][$index[3]];?></label>
        </p>
        
        <?php
    }
}


?>

<div id="questions">
    <div class="question active">1. <?php display_question($random[0], $qna, $random_index)."<br><br>"; ?></div>
    <div class="question">2. <?php display_question($random[1], $qna, $random_index)."<br><br>"; ?></div>
    <div class="question">3. <?php display_question($random[2], $qna, $random_index)."<br><br>"; ?></div>
    <div class="question">4. <?php display_question($random[3], $qna, $random_index)."<br><br>"; ?></div>
    <div class="question">5. <?php display_question($random[4], $qna, $random_index)."<br><br>"; ?></div>
<button type="button" id="back">Back</button>
<button type="button" id="next">Next</button>
</body>
</html>