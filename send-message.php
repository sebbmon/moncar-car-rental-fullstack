<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'utils/classes/Database.php';

$db = new Database();

if (isset($_POST['email']) && isset($_POST['message'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if ($email) {
        $db->addMessage($email, $_POST['message']);
        $_SESSION['contact_message'] = 'Dziękujemy za wiadomość, skontaktujemy się z tobą!';
    } else {
        $_SESSION['contact_message'] = 'Podany adres e-mail jest nieprawidłowy!';
    }
}

header('Location: /~sebastian.mondel/contact.php');
