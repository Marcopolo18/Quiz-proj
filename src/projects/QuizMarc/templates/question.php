<?php
include '../config.php';

$pageData = introductionDataFromDB($_POST['nextQuestionID']);
//var_dump($pageData);
// Get quiz data
//$quizData = qchris_data();

// Get the ID of the question from the post object
// Get the question data for the given ID
if (isset($_POST['nextQuestionID'])) {
    $questionID = $_POST['nextQuestionID'];
    $pageData = questionDataFromDB($_SESSION['quizID'], $questionID);

    //$query = DBConnection()->query('SELECT * from Question');
    //$questions = $query->fetchAll(PDO::FETCH_ASSOC);
    // $questionID;
    //echo $questions[$questionID - 1]['Text'];
}
//echo 'testing <br>';
//var_dump($_POST);


// if (!isset($pageData)) {
//     echo 'Question data for questionID="' . $questionID . '" not available.';
// }

// Session object: Update number of achieved points
// var_dump($_POST);
if (isset($_POST['radio'])) {
    $_SESSION['achievedPoints'] = $_SESSION['achievedPoints'] + $_POST['radio'];
}

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
                echo '<a href="/index.php">' . $pageData['Text'] . '</a>';
                ?>
            </span>



            <form action="<?php echo $pageData['nextAction']; ?>" method="post">


                <?php
                //generate HTML for answers using echo commands

                $answers = $pageData['answers'];

                //var_dump(['answers']);

                $answersCount = 0;

                foreach ($answers as $answer) {

                    echo '<input type="radio" id="answers' . $answersCount . '" name="radio" value="' . $answer['Iscorrect'] . '">';
                    echo PHP_EOL; // echo a hard line break to format the generated HTML.

                    // ... a label ...
                    echo '<label for="answers' . $answersCount . '">' . $answer['text'] . '</label>';

                    // ... and a line break at the end.
                    echo '<br>' . PHP_EOL; // Also add a hard line break to format the generated HTML.

                    // prepare next answer id
                    $answersCount++;
                }


                ?>


                <input type="hidden" name="nextQuestionID" value="<?php
                                                                    if (isset($pageData['nextQuestionID'])) {
                                                                        echo $pageData['nextQuestionID'];
                                                                    }
                                                                    ?>">
                <input type="submit" value="NEXT">

            </form>
        </div>
    </div>
</body>

</html>