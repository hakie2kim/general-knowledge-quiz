<?php
// History questions read from a text file
if ((file_exists("data/history_questions_mixed.txt")) && (filesize("data/history_questions_mixed.txt") != 0)) {
	$questions = file("data/history_questions_mixed.txt", FILE_IGNORE_NEW_LINES);
	print("<pre>".print_r($questions,true)."</pre>");
	for ($i = 0; $i < count($questions); ++$i) {
		$cur_question = explode("~", $questions[$i]);
		print("<pre>".print_r($cur_question,true)."</pre>");

        if (sizeof($cur_question) == 2) {
            $keys[] = $cur_question[0];
            $values[] = $cur_question[1];
        }
        else {
            $keys[] = $cur_question[0];
            $choices = array($cur_question[1], $cur_question[2], $cur_question[3], $cur_question[4]);
            $values[] = $choices;
        }

	}
	$qna = array_combine($keys, $values);
	print("<pre>".print_r($qna,true)."</pre>");
}
?>