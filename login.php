<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'utils/classes/Database.php';

$db = new Database();
$GLOBALS['db'] = $db;
$error = '';

if(isset($_SESSION['userId'])) {
    header('Location: index.php');
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    session_unset();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['login'])) {
        $exists = $db->checkIfUserExists($_POST['login']);

        if (!$exists) {
            $error = 'Uzytkownik nie istnieje.';
        } else if(isset($_POST['password'])) {
            $valid = $db->authorizeUser($_POST['login'], $_POST['password']);
            if ($valid) {
                $_SESSION['userId'] = $valid;
                $_SESSION['user'] = $_POST['login'];
                header('Location: index.php');
            } else {
                $error = 'Dane logowania nie poprawne!';
            }
        }

        if ($error) $_SESSION['error'] = $error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moncar - rejestracja</title>
    <link rel="stylesheet" href="static/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
</head>
<body>
    <?php include("utils/partials/navbar.php") ?>

    <main class="register-form-wrapper">
            <form  class="register-form" method="POST" action="login.php">
                <input placeholder="Login" type="text" name="login"/>
                <input placeholder="Hasło" type="password" name="password"/>
                <input type="submit" class="button" value="zaloguj">
                <?php if ($error): ?>
                    <p><?= $error ?></p>
                <?php endif ?>
            </form>
    </main>

    <?php include("utils/partials/footer.php") ?>
</body>
</html>