<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <title>Singapore General Knowledge Quiz</title>
</head>
<body>
    <?php 
    require("view/header.html");

    session_start();

    // Arranging questions in text file
    if ((file_exists("data/history_questions.txt")) && (filesize("data/history_questions.txt") != 0)) {
        $quizzes = file("data/history_questions.txt");

	    for ($i = 0; $i < count($quizzes); ++$i) {
		    $cur_quiz[] = explode("~", $quizzes[$i]);
            $keys = array("question", "choice1", "choice2", "choice3", "answer");
            
            $arranged_quizzes[] = array_combine($keys, $cur_quiz[$i]);
        }
        print_r($arranged_quizzes);
        echo "<br>";
    }
    ?>

    <?php
    $random_quizzes = array_rand($arranged_quizzes, 5); // 5 questions from the array randomly 
    
    function display_quiz($number) {
        $question = $random_quizzes[$number]['question'];
        $choice1 = $random_quizzes[$number]['choice1'];
        $choice2 = $random_quizzes[$number]['choice2'];
        $choice3 = $random_quizzes[$number]['choice3'];
        $answer = $random_quizzes[$number]['answer'];    
        ?>
        
        <form action="score_quizzes.php" method="POST">
            <p>
                <h2><?php echo $question;?></h2>
                <input type="radio" id="choice1" name="question<?php $number?>" value="choice1">
                <label for="choice1"><?php echo $choice1;?></label>
                <input type="radio" id="choice2" name="question<?php $number?>" value="choice2">
                <label for="choice1"><?php echo $choice2;?></label>
                <input type="radio" id="choice3" name="question<?php $number?>" value="choice3">
                <label for="choice1"><?php echo $choice3;?></label>
                <input type="radio" id="answer" name="question<?php $number?>" value="answer">
                <label for="answer"><?php echo $answer;?></label>
            </p>
        </form>
        <input type="submit" name="submit" value="quizzes">
    <?php
    }

    $current_page = $_GET['number'];
    $next_page = $current_page + 1;
    $prev_page = $current_page - 1;
    $first_page = 1;
    $last_page = 5;

    echo '<a href="quiz.php?number='.$first_page.'"><button type="button">First question</button></a>'; 
    echo '<a href="quiz.php?number='.$previous_page.'"><button type="button">Previous question</button></a>'; 
    echo '<a href="quiz.php?number='.$next_page.'"><button type="button">Next question</button></a>'; 
    echo '<a href="quiz.php?number='.$last_page.'"><button type="button">Last question</button></a>'; 
    ?>
    <?php require("view/footer.html")?>
</body>
</html>