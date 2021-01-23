<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
    $final_score = $_SESSION['score'];
    session_destroy();
?>

<?php include("includes/header.php"); ?>

<main>
    <div class="container-fluid text-center">
        <h2 class="bg-info">You're done!</h2>
        <p>Congratulations for completing the test.</p>
        <p>Final Score: <?php echo $final_score; ?></p>
        <p>
            <a href="question.php?n=1" class="btn btn-danger"> Retake Quiz </a>
        </p>
    </div>
</main>

<?php include("includes/footer.php"); ?>

