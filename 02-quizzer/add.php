<?php include 'database.php'; ?>
<?php

if($_POST){
    // Get POST variables
    $question_number = $_POST['question_number'];
    $question_text = $_POST['question_text'];
    // Choices array
    $choices = array();
    $choices[1] = $_POST['choice1'];
    $choices[2] = $_POST['choice2'];
    $choices[3] = $_POST['choice3'];
    $choices[4] = $_POST['choice4'];
    $choices[5] = $_POST['choice5'];
    // Correct choice
    $correct_choice = $_POST['correct_choice'];
    
    $query = "INSERT INTO `questions`(question_number,text) VALUES ('$question_number','$question_text')";
    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

    // Validate the insert. If question inserted succesfully, then only insert choices
    if($insert_row){
        // Insert choices
        foreach($choices as $choice => $value) {
            if($value != ''){
                if($correct_choice == $choice) {
                    $is_correct = 1;
                } else {
                    $is_correct = 0;
                }
                // Insert choice into table
                $query = "INSERT INTO `choices`(question_number,is_correct,text) VALUES ('$question_number','$is_correct','$value')";
                $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
                // Validate the insert
                if($insert_row){
                    continue;
                } else {
                    die('Error in choices insertion loop: '.$mysqli->errno.': '.$mysqli->error);
                }
            }
        }
        $msg = "Question has been added.";
    } 

}

$query = "SELECT * FROM `questions`";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;
$next = $total+1;


?>
<?php include("includes/header.php"); ?>

<main class="">
    <div class="container-fluid text-left px-5">
        <h2 class="bg-info">Add New Questions:</h2>
        <?php if(isset($msg)) { 
            echo "<p class='bg-success'>".$msg."</p>";
        }
        ?>

        <p>Add new questions to the quiz here...</p>
        <form action="add.php" method="post" class="row">
            <div class="mb-3 col-md-3">
                <label for="question_number" class="form-label">Question Number: </label>
                <input type="number" name="question_number" required class="form-control" value="<?php echo $next; ?>">
            </div>
            <div class="mb-3 col-md-9">
                <label for="question_text" class="form-label">Question Text: </label>
                <input type="text" name="question_text" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="choice1" class="form-label">Choice #1: </label>
                <input type="text" name="choice1" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="choice2" class="form-label">Choice #2: </label>
                <input type="text" name="choice2" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="choice3" class="form-label">Choice #3: </label>
                <input type="text" name="choice3" class="form-control">
            </div>
            <div class="mb-3">
                <label for="choice4" class="form-label">Choice #4: </label>
                <input type="text" name="choice4" class="form-control">
            </div>
            <div class="mb-3">
                <label for="choice5" class="form-label">Choice #5: </label>
                <input type="text" name="choice5" class="form-control">
            </div>
            <div class="mb-3">
                <label for="correct_choice" class="form-label">Correct Choice Number (1-5): </label>
                <input type="number" min="1" max="5" name="correct_choice" class="form-control">
            </div>            
            <input type="submit" name="submit" required value="Submit" class="btn btn-primary" />
        </form>
    </div>
</main>

<?php include("includes/footer.php"); ?>
