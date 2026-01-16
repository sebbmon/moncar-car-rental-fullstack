<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'utils/classes/Database.php';

$db = new Database();
$GLOBALS['db'] = $db;
$message = '';

if (isset($_SESSION['contact_message'])){
    $message = $_SESSION['contact_message'];
    $_SESSION['contact_message'] = '';
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MonCar - Kontakt</title>
    <link rel="stylesheet" href="static/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
</head>
<body>
    <?php include("utils/partials/navbar.php") ?>

	<h2 class="text-header">
        Kontakt
    </h2>
    <div class="text-section">
        <div class="text-section-text">
            <p>
                Nasz zespół wypożyczalni samochodowej z przyjemnością pomoże Ci w każdej kwestii związanej z wynajmem samochodu. Jeśli masz jakieś pytania dotyczące naszych usług, prosimy o kontakt z nami za pośrednictwem jednego z poniższych sposobów.
            </p>
		</div>
		<div class="text-section-text">
            <p>Nasz zespół odpowie na Twoje pytania i pomoże Ci w wyborze odpowiedniego samochodu, który spełni Twoje potrzeby. Wypożyczalnia samochodowa czynna jest od poniedziałku do piątku w godzinach od 8:00 do 18:00 oraz w soboty od 9:00 do 13:00.</p>
        </div>

		<div class="list">
            <div class="list-item">
                <div class="list-circle"><i class="fa-solid fa-location-dot"></i></div>
                Limanowskiego 47, Kraków
            </div>
            <div class="list-item"> 
                <div class="list-circle"><i class="fa-solid fa-phone"></i></div>    
                792 834 115</div>
            <div class="list-item">
                <div class="list-circle"><i class="fa-solid fa-envelope"></i></div>
                moncar@gmail.com</div>
			<div class="list-item">
                <div class="list-circle"><i class="fa-solid fa-calendar-days"></i></div>
                Dostępność bez kompromisów</div>
        </div>

    </div>


    <div class="contact-wrapper">
        <div>
            <h2 class="contact-form-title">Masz pytanie? Napisz do nas!</h2>
            <form action="send-message.php" method="POST" class="contact-form">
                <input placeholder="E-mail" type="text" name="email" />
                <textarea placeholder="Wiadomość" name="message"></textarea>
                <input type="submit" value="Wyślij" class="button">
                <?php if ($message): ?>
                    <p><?= $message ?></p>
                <?php endif ?>
            </form>
        </div>
        <div>
            <h2 class="contact-form-title">Kontakt</h2>
            <p>
                Numer telefonu: <a href="tel:792 834 115">792 834 115</a>
            </p>
            <p>
                Adres email: <a href="mailto:moncar@gmail.com">moncar@gmail.com</a>
            </p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2562.2992215794025!2d19.958025815583742!3d50.043225779421256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165b4fb1496e5f%3A0x1c07ef5d96f394e1!2sBoles%C5%82awa%20Limanowskiego%2047%2C%2030-551%20Krak%C3%B3w!5e0!3m2!1spl!2spl!4v1678961910725!5m2!1spl!2spl" width="80%"></iframe>
        </div>
    </div>

    <?php include("utils/partials/footer.php") ?>
    <script src="static/app.js"></script>
 
</body>
</html>