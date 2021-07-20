<?php
include '../config.php';


// Start the session and initialize the result array

//$_SESSION["quiz-ckue-results"] = array();

// Get quiz data
//$quizData = qchris_data();

$pageData = reportDataFromDB($_SESSION['quizID']);
// Session object: Update number of achieved points
// var_dump($_POST);
if (isset($_POST['radio'])) {
    $_SESSION['achievedPoints'] = $_SESSION['achievedPoints'] + $_POST['radio'];
}


//$_SESSION['achievedPoints'] = $_SESSION['achievedPoints'] + $_POST['radio'];
$questionNum = questionNumFromDB($_SESSION['quizID']);
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
                $percentage = $_SESSION['achievedPoints'] / $questionNum * 100;

                echo '<a href="/index.php">' . $pageData['Title'] . '<br>' . $pageData['Text'] . '<br>' . '</a>' . '<br>';
                echo '<p>You have answered' . '<br>' . $_SESSION['achievedPoints'] . '<br>';
                echo 'question(s) correctly (' . $percentage . '%).' . '</p>';

                if ($percentage >= 80) {
                    echo '<p>' . $pageData['feedback_80'] . '</p>';
                } else if ($percentage >= 60) {
                    echo '<p>' . $pageData['feedback_60'] . '</p>';
                } else {
                    echo '<p>' . $pageData['feedback_40'] . '</p>';
                }

                // echo '<a href="/index.php">' . $pageData['title'] . '</a>';
                // echo '<p>' . resultsMessage($_SESSION['achievedPoints'], $pageData) . '</p>';
                // echo '<p>You have answered ' . $_SESSION['achievedPoints'] . ' question(s) correctly.</p>';
                ?>
            </span>
            <a href="/index.php">Home</a>
        </div>
    </div>
</body>


</html>