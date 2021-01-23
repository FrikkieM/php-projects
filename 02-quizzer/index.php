<?php include 'database.php'; ?>
<?php
    //Get total number of questions
    //Run first query
    $query = "SELECT * FROM `questions`";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

?>

<?php include("includes/header.php"); ?>

<main>
    <div class="container-fluid text-center">
        <h2>Test your PHP knowledge</h2>
        <p>This is a multiple choice quiz to test your knowledge of PHP</p>
        <ul>
            <li><strong>Number of Questions: </strong><?php echo $total; ?></li>
            <li><strong>Type: </strong>Multiple Choice</li>
            <li><strong>Estimated Time: </strong><?php echo $total*0.5; ?> minutes</li>
        </ul>
        <a href="question.php?n=1" class="btn btn-primary"> Start Quiz </a>
    </div>
</main>

<?php include("includes/footer.php"); ?>
