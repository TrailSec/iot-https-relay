<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$DEFAULT_URL = $_POST['url'];
$DEFAULT_TOKEN = $_POST['token'];
$DEFAULT_PATH = $_POST['path'];


require('firebase-php/firebaseInterface.php');
require('firebase-php/firebaseStub.php');
require('firebase-php/firebaseLib.php');


$firebase = new \Firebase\FirebaseLib($DEFAULT_URL, $DEFAULT_TOKEN);


// --- examples of how to use firebase-php ---
// --- storing an array ---
$test = array(
    "foo" => "bar",
    "i_love" => "lamp",
    "id" => 42
);
$dateTime = new DateTime();
$firebase->set($DEFAULT_PATH . '/' . $dateTime->format('c'), $test);

// --- storing a string ---
$firebase->set($DEFAULT_PATH . '/name/contact001', "John Doe");

// --- reading the stored string ---
$name = $firebase->get($DEFAULT_PATH . '/name/contact001');
