<?php include 'database.php'; ?>
<?php session_start(); ?>

<?php
    //All queries and PHP logic here. Function of controller? in MVC
    //Get number of the question
    $number = (int) $_GET['n'];

    //Run first query
    $query1 = "SELECT * FROM `questions` WHERE question_number = $number";
    $result1 = $mysqli->query($query1) or die($mysqli->error.__LINE__);
    $question = $result1->fetch_assoc();     //Returns associative array
    //Run second query
    $query2 = "SELECT * FROM `choices` WHERE question_number = $number ORDER BY id";
    $choices = $mysqli->query($query2) or die($mysqli->error.__LINE__);
    
    $query = "SELECT * FROM `questions`";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $result->num_rows;

?>
<?php include("includes/header.php"); ?>

<main class="">
    <div class="container-fluid text-center">
        <h2 class="bg-info">Question <?php echo $number." of ".$total; ?>:</h2>
        <p><?php echo $question['text']; ?></p>
        <form action="process.php" method="post">
            <ul class="text-left">
                <?php while($row = $choices->fetch_assoc()): ?>
                    <li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"> <?php echo $row['text']; ?> </li>
                <?php endwhile; ?>
            </ul>
            <input type="submit" value="Submit" class="btn btn-primary" />
            <input type="hidden" name="number" value="<?php echo $number; ?>" />
        </form>
    </div>
</main>


<?php include("includes/footer.php"); ?>
