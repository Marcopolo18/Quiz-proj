<?php
include '../config.php';


if (isset($_GET['qid'])) {
    $quizID = $_GET['qid'];
} else {
    $quizID = 1;
}

$_SESSION['quizID'] = $quizID;
$pageData = introductionDataFromDB($quizID);
$_SESSION['achievedPoints'] = 0;
//var_dump($pageData);


//my old code..pre-Chris
// Preset path to include folder
//set_include_path($_SERVER['DOCUMENT_ROOT'] . '/QuizMarc/php');

// start session and initialize achieved number of points
//session_start();

// Page includes
//include 'auth.php';
//include 'quiz-ckue-data.php';




// Get quiz data
//$quizData = qchris_data();
//$pageData = $quizData['introduction'];

// Initialize achieved number of points
//$_SESSION['achievedPoints'] = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="bgimg-1">
        <div class="caption">
            <span class="border">
                <?php
                echo $pageData['Title'];
                ?>
                <br>
                <br>
                <?php
                echo $pageData['Text'];
                ?>
            </span>

            <form action="<?php echo $pageData['nextAction']; ?>" method="post">
                <input type="hidden" name="nextQuestionID" value="<?php echo $pageData['nextQuestionID'] ?>">
                <input type="submit" value="START">
            </form>
        </div>

    </div>

</body>

</html>