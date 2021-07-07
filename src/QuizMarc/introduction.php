<?php
// Preset path to include folder
set_include_path($_SERVER['DOCUMENT_ROOT'] . '/QuizMarc/php');

// start session and initialize achieved number of points
session_start();

// Page includes
include 'auth.php';
include 'quiz-ckue-data.php';




// Get quiz data
$quizData = qchris_data();
$pageData = $quizData['introduction'];

// Initialize achieved number of points
$_SESSION['achievedPoints'] = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <div class="bgimg-1">
        <div class="caption">
            <img src="<?php echo $pageData["imageURL"]; ?>">
            <span class="border">
                <?php
                echo '<a href="/index.php">' . $pageData['title'] . '</a>';
                ?></span>

            <form action="<?php echo $pageData['nextAction']; ?>" method="post">
                <input type="hidden" name="questionID" value="<?php echo $pageData['questionID']; ?>">
                <input type="submit" value="START">
            </form>
        </div>

    </div>

</body>

</html>