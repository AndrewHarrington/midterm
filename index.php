<?php
//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require ("vendor/autoload.php");
session_start();

$f3 = Base::instance();

$f3->route('GET|POST /', function (){
    echo '<h1>Midterm Survey</h1>';
    echo '<a href="328/midterm/survey/">Take my midterm survey</a>';
});

$f3->route('GET|POST /survey', function (){
    $boxes = array('a'=>'A', 'b'=>'B', 'c'=>'C');
    $_SESSION['boxes'] = $boxes;
    $thing = new Template();
    echo $thing->render('views/survey.php');
});

$f3->run();
