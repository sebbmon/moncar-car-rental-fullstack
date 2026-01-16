<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'utils/classes/Database.php';

$db = new Database();

$stars = (int)$_POST['stars'];

$opinion = $_POST['opinion'];

if (!isset($_SESSION['userId'])) return;

$db->addOpinion($_SESSION['userId'], $stars, $opinion);

header('Location: index.php');