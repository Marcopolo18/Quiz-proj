<?php

//strpos() can return false, 0 or any number > 0
if (strpos($_SERVER['HTTP_HOST'], 'localhost:') !== true) { //changed to true to work on pc
    //define db constants
    define('DB_NAME', getenv('DB_NAME'));
    define('DB_USER', getenv('DB_USER'));
    define('DB_PASSWORD', getenv('DB_PASSWORD'));
    define('DB_HOST', getenv('DB_HOST'));
} else {
    define('DB_HOST', 'ipiluwig.mysql.db.internal');
    define('DB_NAME', 'ipiluwig_cm');
    define('DB_USER', 'ipiluwig_18');
    define('DB_PASSWORD', 'Opport2021');
}

//create function 
function DBConnection()
{

    //reuse single connection object if available
    //if(isset($_dbconnection)) return $_dbconnection;



    // PHP data objects extension

    try {
        //versuch mal zu...
        $connection = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER,
            DB_PASSWORD
        );

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo '<p>DB cpnnection failed: ' . $e->getMessage() . '</p>';
        echo 'HTTP_HOST =' . $_SERVER['HTTP_HOST'] . '<br>';
        echo 'DB_NAME=' . DB_NAME . '<br>';
        echo 'DB_USER=' . DB_USER . '<br>';
        echo 'DB_PASSWORD=' . DB_PASSWORD . '<br>';
        echo 'DB_HOST=' . DB_HOST . '<br>';
        exit;
        // oops, dass hat nicht geklappt

    }

    return $connection;
}



function introductionDataFromDB($quizID)
{
    if (TRACE_DB_ACCESS) //print "<h1>Introduction data</h1>";

        $query = DBConnection()->prepare("SELECT * FROM Introduction WHERE quizID = ?");
    $query->bindValue(1, $quizID);

    $query->execute();

    $introduction = $query->fetch(PDO::FETCH_ASSOC);

    if (TRACE_DB_ACCESS) {
        //var_dump($introduction);
        // echo '<p>-------------------------------------------------------------</p>';
    }

    return $introduction;
}



function questionDataFromDB($quizID, $questionID)
{
    if (TRACE_DB_ACCESS) {
        //print "<h1>Question data</h1>";
    }

    $query = DBConnection()->prepare("SELECT * FROM Question WHERE quizID = ? AND quesID = ?");
    $query->bindValue(1, $quizID);
    $query->bindValue(2, $questionID);
    $query->execute();

    $data = $query->fetch(PDO::FETCH_ASSOC);

    if (TRACE_DB_ACCESS) {
        //var_dump($data);
        //echo '<p>-------------------------------------------------------------</p>';
    }

    $data['answers'] = answerDataFromDB($questionID);

    return $data;
}

function answerDataFromDB($questionID)
{

    if (TRACE_DB_ACCESS) {
        //print "<h1>Answer data</h1>";
    }

    $query = DBConnection()->prepare("SELECT text, Iscorrect FROM Answer WHERE questionID = ?");
    $query->bindValue(1, $questionID);
    $query->execute();

    $answers = $query->fetchAll(PDO::FETCH_ASSOC);


    if (TRACE_DB_ACCESS) {
        //var_dump($answers);
        //echo '<p>-------------------------------------------------------------</p>';
    }

    return $answers;
}

function reportDataFromDB($quizID)
{
    $query = DBConnection()->prepare("SELECT * FROM Report WHERE repID = ?");
    $query->bindValue(1, $quizID);
    $query->execute();

    $data = $query->fetch(PDO::FETCH_ASSOC);


    //$query = DBConnection()->query("SELECT * FROM Report WHERE quizID = ?");
    //$results = $query->fetchAll(PDO::FETCH_ASSOC);

    // if ($score == 5) {
    //     echo $results[0]['feedback_80'];
    // } elseif ($score == 3 && 4) {
    //     echo $results[0]['feedback_60'];
    // } else {
    //     echo $results[0]['feedback_40'];
    // }


    // echo '<pre>';
    //var_dump($results);
    // echo '</pre>';



    //$reports['reports'] = reportDataFromDB($score);
    if (TRACE_DB_ACCESS) {
        //print "<h1>Report Data</h1>";
        //var_dump($data);
        //echo '<p>-------------------------------------------------------------</p>';
    }


    return $data;
}


function questionIdsFromDB($quizID)
{

    $query = DBConnection()->prepare("SELECT quesID FROM Question WHERE quizID = ?");
    $query->bindValue(1, $quizID);
    $query->execute();

    $questionIds = $query->fetchAll(PDO::FETCH_COLUMN, 0);

    $reports['reports'] = reportDataFromDB($questionIds); //changed from $questionID
    if (TRACE_DB_ACCESS) {
        //print "<h1>Question Ids</h1>";
        //var_dump($questionIds);
        //echo '<p>-------------------------------------------------------------</p>';
    }

    return $questionIds;
}

function questionNumFromDB($quizID)
{
    return count(questionIdsFromDB($quizID));
}
