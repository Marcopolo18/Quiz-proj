<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>php pdo intro</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            font-size: larger;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
</head>

<body>
    <?php
    echo "hello";




    define('DB_NAME', getenv('DB_NAME'));
    define('DB_USER', getenv('DB_USER'));
    define('DB_PASSWORD', getenv('DB_PASSWORD'));
    define('DB_HOST', getenv('DB_HOST'));


    $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);

    $query      = $connection->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'demo'");
    $tables     = $query->fetchAll(PDO::FETCH_COLUMN);

    $quizID = 1;

    print "<h1>Introduction data</h1>";

    $query = $connection->prepare("SELECT * FROM Introduction WHERE quizID = ?");
    $query->bindValue(1, $quizID);
    $query->execute();

    $introduction = $query->fetch(PDO::FETCH_ASSOC);

    var_dump($introduction);
    echo '<p>-------------------------------------------------------------</p>';



    $questionID = 1;

    print "<h1>Question data</h1>";


    $query = $connection->prepare("SELECT * FROM Question WHERE quizID = ? AND questionID = ?");
    $query->bindValue(1, $quizID);
    $query->bindValue(2, $questionID);
    $query->execute();

    $question = $query->fetch(PDO::FETCH_ASSOC);

    var_dump($question);
    echo '<p>--------------------------------------------------</p>';




    print "<h1>Answer data</h1>";

    $query = $connection->prepare("SELECT text FROM Answer WHERE questionID = ?");
    $query->bindValue(1, $questionID);
    $query->execute();

    $answers = $query->fetchAll(PDO::FETCH_ASSOC);

    var_dump($answers);
    echo '<p>--------------------------------------------------</p>';


    print "<h1>Report data</h1>";

    $query = $connection->prepare("SELECT text FROM Report WHERE quizID = ?");
    $query->bindValue(1, $quizID);
    $query->execute();

    $report = $query->fetch(PDO::FETCH_ASSOC);

    var_dump($report);
    echo '<p>--------------------------------------------------</p>';


    exit;






    if (empty($tables)) {
        echo '<p class="center">There are no tables in database <code>demo</code>.</p>';
    } else {
        echo '<p class="center">Database <code>demo</code> contains the following tables:</p>';
        echo '<ul class="center">';
        foreach ($tables as $table) {
            echo "<li>{$table}</li>";
        }
        echo '</ul>';
    }

    //My Try


    //a
    /*$query = $connection->query("SELECT * from Introduction");
    $introduction = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($introduction as $intro) {
        $subQuery = $connection->prepare("SELECT * from Introduction where Introduction.introID = ?");
        $subQuery->bindValue(1, $intro['introID']);
        $subQuery->execute();
        $introduction = $subQuery->fetchAll(PDO::FETCH_ASSOC);
        //print_r("Answers are" . var_dump($introduction) . "<br>");
        echo $intro['Title'] . '<br>' . $intro['Text'] . '<br><br><br>';
    }

    //b
    $query = $connection->query("SELECT * from Question where Id = 4");
    $questions = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($questions as $ques) {
        $subQuery = $connection->prepare("SELECT * from Question where Id = ?");
        $subQuery->bindValue(1, $ques['Id']);
        $subQuery->execute();
        $introduction = $subQuery->fetchAll(PDO::FETCH_ASSOC);
        //print_r("Answers are" . var_dump($ques) . "<br>");
        echo $ques['Text'] . '<br><br>';
    }

    //c    
    $query = $connection->query("SELECT * from Answer where questionID = 4");
    $answer = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($answer as $ans) {
        $subQuery = $connection->prepare("SELECT * from Answer where questionID = ?");
        $subQuery->bindValue(1, $ans['questionID']);
        $subQuery->execute();
        $introduction = $subQuery->fetchAll(PDO::FETCH_ASSOC);
        //print_r("Answers are" . var_dump($ans) . "<br>");
        //print_r($ans);
        echo $ans['Text'] . '<br><br>';
    }

    //d
    $query = $connection->query("SELECT * from Report");
    $report = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($report as $rep) {
        $subQuery = $connection->prepare("SELECT * from Report where questionID = ?");
        //$subQuery->bindValue(1, $ans['questionID']);
        //$subQuery->execute();
        //$report = $subQuery->fetchAll(PDO::FETCH_ASSOC);
        //print_r("Answers are" . var_dump($ans) . "<br>");
        //print_r($ans);
        echo $rep['Title'] . '<br>' . $rep['Text'] . '<br><br>';
    }*/



    // //Anita
    // print "<h1>Example with FETCH_ASSOC</h1>";


    // $query  = $connection->query("SELECT * from Question");
    // $questions = $query->fetchAll(PDO::FETCH_ASSOC);
    // foreach ($questions as $question) {
    //     $subQuery  = $connection->prepare("SELECT * from Answer where Answer.QuestionId = ?");
    //     $subQuery->bindValue(1, $question['Id']);
    //     $subQuery->execute();
    //     $answers = $subQuery->fetchAll(PDO::FETCH_ASSOC);
    //     print_r("Answers are" . var_dump($answers) . "<br>");

    //     $question['Answer'] = $answers;
    //     print "<pre/>";
    //     print_r($question);
    //     //print_r($question['answers'][0]);
    // }

    // print "<h1>Example with FETCH_NUM</h1>";

    // $query  = $connection->query("SELECT * from Question");
    // $questions = $query->fetchAll(PDO::FETCH_NUM);
    // foreach ($questions as $question) {
    //     print "<pre/>";
    //     print_r($question);
    // }

    // print "<h1>Example with FETCH_BOTH</h1>";

    // $query  = $connection->query("SELECT * from Question");
    // $questions = $query->fetchAll(PDO::FETCH_BOTH);
    // foreach ($questions as $question) {
    //     print "<pre/>";
    //     print_r($question);
    // }






    ?>

    <div class="bgimg-1">
        <div class="caption">
            <span class="border">
                <?php
                //write hyperlink woth get parameters ?qid=1
                echo '<a href="/QuizMarc/introduction.php?qid=1">INTRODUCTION</a>';
                ?>
            </span>
        </div>
    </div>

</body>

</html>