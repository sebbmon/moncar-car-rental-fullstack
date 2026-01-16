<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'utils/classes/Database.php';

$db = new Database();
$GLOBALS['db'] = $db;

$cars = $db->getCars();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moncar - oferta</title>
    <link rel="stylesheet" href="static/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
</head>
<body>
    <?php include("utils/partials/navbar.php") ?>
	
	<h2 class="text-header">
        Oferta
    </h2>
    <div class="text-section">
        <div class="text-section-text">
            <p>
                Zapraszamy do zapoznania się z naszą bogatą ofertą wynajmu samochodów. Oferujemy szeroki wybór pojazdów dostosowanych do potrzeb każdego klienta. U nas wynajmiesz samochód na krótki lub długi okres, bez ograniczeń kilometrów i ukrytych kosztów.
            </p>
			</div>
			<div class="text-section-text">
			<p>
                Posiadamy różnorodne klasy samochodów, w tym miejskie auta idealne do poruszania się po mieście, przestronne kombi a nawet luksusowe limuzyny. Dostarczamy samochody w wybrane miejsce i odbieramy je po zakończeniu wynajmu.
            </p>
		</div>
	</div>

    <main class="car-wrapper">
        <?php while ($row = $cars->fetch_assoc()): ?>
            <div class="car">
                <img src="<?= $row['image'] ?>" alt="<?= $row['name'] ?>" />
                
                <div class="car-content">
                    <h3><?= $row['name'] ?></h3>
                    <div class="car-spec">
                        <i class="fa-solid fa-horse"></i> <?= $row['horsepower'] ?>
                    </div>
                    <div class="car-spec">
                        <i class="fa-solid fa-calendar-days"></i> <?= $row['year_of_production'] ?>
                    </div>
                    <div class="car-spec">
                        <i class="fa-solid fa-money-bill"></i> 
                        <?= $row['price'] ?> PLN
                    </div>
                    <div class="car-spec">
                        <i class="fa-solid fa-gas-pump"></i>
                        <?= $row['petrol'] ?>l / 100km
                    </div> 

                    <button class="button">Zadzwoń do nas aby zamówić</button>
                </div>
            </div>
        <?php endwhile ?>
    </main>

    <?php include("utils/partials/footer.php") ?>
</body>
</html>