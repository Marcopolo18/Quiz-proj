<?
include '../config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <form id="feedForm" method="Post" action="feedback.php">
        <label for="Name">Name: </label>
        <input type="text" name="Name" required>

        <label for="Email">E-mail address: </label>
        <input type="email" name="Email" required>
        <br><br><br>
        <label for="Text">Message: </label><br>
        <textarea name="Text" required></textarea>
        <br>
        <input type="submit" value="Submit" name="submit_btn">

    </form>
</body>

<?php

if (isset($_POST['submit_btn'])) {

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";


    $user = getenv('DB_USER');
    $pass = getenv('DB_PASSWORD');

    $connect = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
        $user,
        $pass
    );



    //My try
    // $name = $_POST['Name'];
    // $mailFrom = $_POST['Email'];
    // $message = $_POST['Text'];

    // $insertQuery = $connect->prepare("INSERT INTO Feedback(Name, Email, Text) VALUES($name, $mailFrom, $message)");

    // if ($insertQuery->execute()) {
    //     echo "Thank you for your feedback!";
    //     exit();
    // }


    //Anita
    $insertQuery = $connect->prepare("INSERT INTO Feedback(Name, Email, Text) VALUES(:Name, :Email, :Text)");

    $insertQuery->bindParam("Name", $_POST['Name']);
    $insertQuery->bindParam("Email", $_POST['Email']);
    $insertQuery->bindParam("Text", $_POST['Text']);

    if ($insertQuery->execute()) {
        echo "Thank you for your feedback!";
        exit();
    }
}



// $mailTo = "marcopolo18@hotmail.com";
// $headers = "From" . $mailFrom;
// $text = "You have received mail from" . $name . '.' . "\n\n" . $message;

// mail($mailTo, $text, $headers);
//header("Location: index.php?mailsent");







// 

//Old code from me
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // collect value of input field
//     $name = $_POST['Name'];
//     if (empty($name)) {
//         echo "Name is empty" . '<br><br>';
//     } else {
//         echo $name . '<br><br>';
//     }

//     $email = $_POST['E-mail'];
//     if (empty($email)) {
//         echo "E-mail address is empty" . '<br><br>';
//     } else {
//         echo $email . '<br><br>';
//     }

//     $text = $_POST['Text'];
//     if (empty($text)) {
//         echo "Message is empty" . '<br><br>';
//     } else {
//         echo $text . '<br><br>';
//     }
// }

//square and cube table




?>

</html>