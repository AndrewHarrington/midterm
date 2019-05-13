<?php
//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require ("vendor/autoload.php");

$f3 = Base::instance();

$f3->route('GET|POST /', function (){
    echo '<h1>Midterm Survey</h1>';
    echo '<a href="survey.html">Take my midterm survey</a>';
});

$f3->run();
