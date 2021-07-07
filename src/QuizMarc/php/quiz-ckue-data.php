<?php

function qchris_data()
{
    return array(
        'introduction' => qchris_introductionData(),
        'questions' => qchris_questionData(),
        'report' => qchris_reportData()
    );
}

function qchris_introductionData()
{
    return array(
        'title' => "My First Quiz",
        'description' => "Just do it ...",
        'imageURL' => "/QuizMarc/images/pic2.jpg",
        'nextAction' => 'question.php',
        'questionID' => 'q0'
    );
}

function qchris_questionData()
{
    return array(
        'q0' => qchris_q0(),
        'q1' => qchris_q1(),
        'q2' => qchris_q2(),
        'q3' => qchris_q3(),
        'q4' => qchris_q4()
    );
}

function qchris_q0()
{
    return array(
        'text' => "What kind of an animal is a Woodpecker?",
        'answers' => array(
            array("Reptile", 0),
            array("Mammal", 0),
            array("Bird", 1),
            array("Crustacean", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q1'
    );
}

function qchris_q1()
{
    return array(
        'text' => "What kind of an animal is a Wombat?",
        'answers' => array(
            array("Reptile", 0),
            array("Mammal", 0),
            array("Marsupial", 1),
            array("Bird", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q2'
    );
}

function qchris_q2()
{
    return array(
        'text' => "How many hands does a human have?",
        'answers' => array(
            array("One", 0),
            array("Three", 0),
            array("Two", 1),
            array("Six", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q3'
    );
}

function qchris_q3()
{
    return array(
        'text' => "What kind of an animal is an armadillo?",
        'answers' => array(
            array("Anteater", 1),
            array("Ape", 0),
            array("Bird", 0),
            array("Fish", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q4'
    );
}

function qchris_q4()
{
    return array(
        'text' => "How many wings has a beetle?",
        'answers' => array(
            array(2, 0),
            array(4, 1),
            array(8, 0),
            array(12, 0)
        ),
        'nextAction' => 'report.php'
    );
}

function qchris_reportData()
{
    return array(
        'title' => "Congratulations<br><br>",
        'text' => "That was a foul performance!",
        'feedback_40' => "lousy",
        'feedback_60' => "mediocre",
        'feedback_80' => "super!!!",
        'imageURL' => "/src/images/bild.jpg"
    );
}



function resultsMessage($points, $pData)
{

    if ($points == 5) {
        echo $pData["feedback_80"];
    } else if ($points >= 3) {
        echo $pData["feedback_60"];
    } else {
        echo $pData["feedback_40"];
    }
}
