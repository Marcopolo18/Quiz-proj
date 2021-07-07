<?php
// Preset path to include folder 
echo $_SERVER['DOCUMENT_ROOT'];
set_include_path($_SERVER['DOCUMENT_ROOT'] . '/QuizMarc/php');

// Page includes
//include 'auth.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/QuizMarc/css/style.css">
</head>

<body>
    <div class="bgimg-1">
        <div class="caption">
            <span class="border">
                <?php
                echo '<a href="/QuizMarc/introduction.php">INTRODUCTION</a>';
                ?>
            </span>
        </div>
    </div>

</body>

</html>