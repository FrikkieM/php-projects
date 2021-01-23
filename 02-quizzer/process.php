<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php

// Process answer and add to score session variable, then redirect
// Check to see if score is set
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}

if($_POST){
    // Get question number and selected choice
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $number+1;

    $query = "SELECT * FROM `questions`";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $result->num_rows;

    // Get correct choice
    $query = "SELECT * FROM `choices` WHERE question_number = $number AND is_correct = 1";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    $row = $result->fetch_assoc();

    $correct_choice = $row['id'];

    if($selected_choice == $correct_choice) {
        // Answer is correct
        $_SESSION['score']++;
    }

    // Check to see if it is the last question to go to final page

    if($number == $total){
        header("Location: final.php");
        exit();
    } else {
        header("Location: question.php?n=".$next);
    }


}


?>

