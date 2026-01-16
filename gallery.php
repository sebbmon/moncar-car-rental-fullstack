<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'utils/classes/Database.php';

$db = new Database();
$GLOBALS['db'] = $db;
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moncar</title>
    <link rel="stylesheet" href="static/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
</head>
<body>
    <?php include("utils/partials/navbar.php") ?>
	
	<h2 class="text-header">
        Galeria
    </h2>
    <div class="text-section">
        <div class="text-section-text">
            <p>
                Zapraszamy do zapoznania się z naszą galerią zdjęć, w której prezentujemy naszą flotę samochodową oraz zadowolonych klientów. Znajdziesz tu fotografie naszych najnowszych modeli samochodów, które są dostępne do wynajęcia. Jeśli któryś z pojazdów przykuł twoje oko, zapraszamy do kontaktu!
            </p>
		</div>
		<div class="text-section-text">
			<p>
                Nasze samochody prezentują się doskonale na zdjęciach, jednak to tylko wierzchołek góry lodowej. Nasza flota samochodowa zapewnia najwyższy komfort jazdy oraz bezpieczeństwo na drodze. Wszystkie pojazdy są regularnie serwisowane i sprawdzane przed wynajmem, co zapewnia naszym klientom najwyższą jakość i niezawodność naszych usług.
            </p>
		</div>
	</div>

    <div class="gallery">   
        <div class="gallery-main">
            <img class="gallery-main-image" src="static/images/1.jpg" />
        </div>
        <div class="gallery-preview">
            <img src="static/images/1.jpg" alt="Obrazek z galerii" />
            <img src="static/images/2.jpg" alt="Obrazek z galerii" />
            <img src="static/images/3.jpg" alt="Obrazek z galerii" />
            <img src="static/images/4.jpg" alt="Obrazek z galerii" />
            <img src="static/images/5.jpg" alt="Obrazek z galerii" />
			<img src="static/images/amggt.jpg" alt="Obrazek z galerii" />
            <img src="static/images/continental.jpg" alt="Obrazek z galerii" />
            <img src="static/images/urus.jpg" alt="Obrazek z galerii" />
            <img src="static/images/m2.jpg" alt="Obrazek z galerii" />
            <img src="static/images/golfr.jpg" alt="Obrazek z galerii" />
			<img src="static/images/skyline.jpg" alt="Obrazek z galerii" />
			<img src="static/images/serwis1.jpg" alt="Obrazek z galerii" />
            <img src="static/images/serwis2.jpg" alt="Obrazek z galerii" />
            <img src="static/images/serwis3.jpg" alt="Obrazek z galerii" />
			<img src="static/images/serwis4.jpeg" alt="Obrazek z galerii" />
        </div>
    </div>

    <?php include("utils/partials/footer.php") ?>
    <script src="static/app.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const main = document.querySelector('.gallery-main-image');
            const images = document.querySelectorAll('.gallery-preview img');
            console.log(images)
            images.forEach(item => {
                item.addEventListener('click', function () {
                    const src = this.getAttribute('src');
                    console.log(src)
                    main.src = src;
                })
            })
        });
    </script>
</body>
</html>