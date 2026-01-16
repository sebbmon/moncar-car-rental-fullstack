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
    $error = '';
    $valid = true;

    if (isset($_POST['login'])) {
        $doesUserExist = $db->checkIfUserExists($_POST['login']);
        if ($doesUserExist) {
            $valid = false;
            $error = 'Uzytkownik o takim loginie istnieje.';
        }
    }
    
    if (isset($_POST['password1']) && isset($_POST['password2'])) {
        if($_POST['password1'] != $_POST['password2']) {
            $error = 'Komórki z hasłem róznią się!';
            $valid = false;
        }
    } else {
        $error = 'Uzupełnij obie komórki z hasłem!';
        $valid = false;
    }

    if ($valid) {
        $result = $db->createUser($_POST['login'], $_POST['password1']);
        header('Location: login.php');
    } else {
        $_SESSION['error'] = $error;
        header('Location: register.php');
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
            <form  class="register-form" method="POST" action="register.php">
                <input placeholder="Login" type="text" name="login"/>
                <input placeholder="Hasło" type="password" name="password1"/>
                <input placeholder="Powtórz hasło" type="password" name="password2"/>
                <input type="submit" class="button" value="zarejestruj">
                <?php if ($error): ?>
                    <p><?= $error ?></p>
                <?php endif ?>
            </form>
    </main>

    <?php include("utils/partials/footer.php") ?>
</body>
</html>