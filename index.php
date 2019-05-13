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

$f3->route('GET|POST /survey', function ($f3){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $f3->set('name', $_POST['name']);
        $f3->set('checked', $_POST['boxes']);
        $errors = false;
        if($_POST['name'] == ''){
            $f3->set('errors["nameERR"]' , 'You forget to enter your name');
            $errors = true;
        }
        else{
            $_SESSION['name'] = $_POST['name'];
        }
        $checked = $_POST['boxes'];
        if(empty($checked)){
            $f3->set("errors['boxERR']" , 'You forget to select at least one box');
            $errors = true;
        }
        else{
            $_SESSION['checkedBoxes'] = $_POST['boxes'];
        }

        if(!$errors){
            $f3->reroute('summary');
        }
    }
    $boxes = array('a'=>'A', 'b'=>'B', 'c'=>'C');
    $_SESSION['boxes'] = $boxes;
    $thing = new Template();
    echo $thing->render('views/survey.php');
});

$f3->route('GET|POST /summary', function (){
    $thing = new Template();
    echo $thing->render('views/summary.html');
});

$f3->run();
