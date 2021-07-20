<?php
//start session and initialize achieved number of points
session_start();

//preset paths to standard include folders (concat them with PATH_SEPARATOR)
$incPaths = $_SERVER['DOCUMENT_ROOT'] . '/php';
$incPaths .= PATH_SEPARATOR;
$incPaths .= $_SERVER['DOCUMENT_ROOT'] . '/projects/QuizMarc/php';
set_include_path($incPaths);

//includes required for page templates
include 'auth.php';
include 'db_access.php';

//Tracing
define('TRACE_DB_ACCESS', true);//changed to true to work on pc

//echo $_SERVER['DOCUMENT_ROOT'];
