<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (empty($_POST['firebaseUrl'])) {
    echo "Missing [firebaseUrl] param!";
    exit;
}

if (empty($_POST['method'])) {
    echo "Missing [method] param!";
    exit;
}

$DEFAULT_URL = $_POST['firebaseUrl'];
$DEFAULT_TOKEN = isset($_POST['token']) ? $_POST['token'] : "";
$DEFAULT_PATH = isset($_POST['path']) ? $_POST['path'] : "";
$RELAY_METHOD = $_POST['method'];
$RELAY_PAYLOAD = isset($_POST['data']) ? json_decode($_POST['data']) : "";
if ($RELAY_PAYLOAD != "" && $RELAY_PAYLOAD == null) {
    echo "Data not in JSON format: " . $_POST['data'];
    exit;
}

require('firebase-php/firebaseInterface.php');
require('firebase-php/firebaseStub.php');
require('firebase-php/firebaseLib.php');

$firebase = new \Firebase\FirebaseLib($DEFAULT_URL, $DEFAULT_TOKEN);

switch ($RELAY_METHOD) {
    case "GET":
        $result = $firebase->get($DEFAULT_PATH);
        echo $result;
        break;
    case "PUT":
        if ($RELAY_PAYLOAD == ""){
            echo "Cannot \"PUT\" when [data] is empty";
            break;
        }
        $result = $firebase->set($DEFAULT_PATH, $RELAY_PAYLOAD);
        echo $result;
        break;
    case "POST":
        $result = $firebase->push($DEFAULT_PATH, $RELAY_PAYLOAD);
        echo $result;
        break;
    case "PATCH":
        $result = $firebase->update($DEFAULT_PATH, $RELAY_PAYLOAD);
        echo $result;
        break;
    case "DELETE":
        $result = $firebase->delete($DEFAULT_PATH);
        echo $result;
        break;
    default:
        echo "Invalid Method: " . $RELAY_METHOD;
}
