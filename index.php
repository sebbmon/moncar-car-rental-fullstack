<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'utils/classes/Database.php';

$db = new Database();
$GLOBALS['db'] = $db;

$heroCar = $db->getHeroCar();

$opinions = $db->getOpinions();
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

    <div class="hero" style="background: linear-gradient(
          rgba(0, 0, 0, 0.3), 
          rgba(0, 0, 0, 0.3)
        ), url('<?= $heroCar['image'] ?>');">
        <div class="hero-info">
            <div class="hero-text">
                <h2><?= $heroCar['catch_phrase'] ?></h2>
                <h4><?= $heroCar['name'] ?></h4>
                <div class="hero-spec-wrapper">
                    <div class="hero-spec">
                        <i class="fa-solid fa-calendar-days"></i>
                        <p><?= $heroCar['year_of_production'] ?></p>
                    </div> 
                    <div class="hero-spec">
                        <i class="fa-solid fa-gas-pump"></i>
                        <p><?= $heroCar['petrol'] ?>l / 100km</p>
                    </div>  
                    <div class="hero-spec">
                        <i class="fa-solid fa-money-bill"></i>
                        <p><?= $heroCar['price'] ?>PLN</p>
                    </div>  
                    <div class="hero-spec">
                        <i class="fa-solid fa-horse"></i>
                        <p><?= $heroCar['horsepower'] ?>KM</p>
                    </div>  
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-header">
        O nas
    </h2>
    <div class="text-section">
        <div class="text-section-text">
            <p>
                MonCar to wypożyczalnia samochodów oferująca szeroki wybór pojazdów dla różnych potrzeb i wymagań klientów. Zapewniamy wysokiej jakości usługi wynajmu samochodów, które są dostępne w atrakcyjnych cenach. Oferujemy wiele różnych modeli samochodów, w tym małe auta miejskie, luksusowe samochody, samochody rodzinne, SUV-y oraz vany.
            </p>
		</div>

		<div class="text-section-text">
            <p>Wypożyczalnia oferuje również różne dodatkowe opcje i usługi, takie jak ubezpieczenia, GPS, a także możliwość wynajęcia dodatkowego kierowcy. Dzięki temu klienci mogą dostosować swoje wynajmy samochodów do swoich potrzeb i preferencji. Klienci mogą wybrać spośród różnych marek samochodów, takich jak BMW, Mercedes-Benz, Audi, Volkswagen czy Nissan.</p>
        </div>

        <div class="list">
            <div class="list-item">
                <div class="list-circle"><i class="fa-solid fa-car"></i></div>
                Szeroki wybór samochodów
            </div>
            <div class="list-item"> 
                <div class="list-circle"><i class="fa-solid fa-handshake"></i></div>    
                Elastyczne warunki wynajmu</div>
            <div class="list-item">
                <div class="list-circle"><i class="fa-solid fa-person"></i></div>
                Profesjonalna obsługa klienta</div>
            <div class="list-item">
                <div class="list-circle"><i class="fa-solid fa-money-bill"></i></div>
                Niskie ceny</div>
            <div class="list-item">
                <div class="list-circle"><i class="fa-solid fa-money-bill"></i></div>
                Dodatkowe opcje i usługi
            </div>
        </div>
    </div>

    <h2 class="opinions-header">Opinie</h2>
    <div class="opinions">
        <?php $first = true; ?>
        <div class="opinion-arrow opinion-arrow-left">
        <i class="fa-solid fa-arrow-left"></i>
        </div>
        <div class="opinion-arrow opinion-arrow-right">
        <i class="fa-solid fa-arrow-right"></i>
        </div>
        <?php while ($row = $opinions->fetch_assoc()): ?>
            <div class="opinions-opinion <?php echo ($first) ? 'active' : ''; ?>">
            <?php $first = false ?>
                <div class="opinions-stars">
                    <?php for ($i = 0; $i < $row['stars']; $i++): ?>
                        <i class="fa-solid fa-star"></i>
                    <?php endfor ?>
                </div>
                <p class="opinions-opinion-content">
                    <?= $row['opinion'] ?>
                </p>
            </div>
        <?php endwhile ?>
    </div>

    <?php if(isset($_SESSION['userId'])): ?>
    <div class="add-opinion">
        <div class="add-opinion-text">
            <h2>Jesteś zadowolony z naszych usług?</h2>
            <p>Wystaw opinie, aby pomóc nam budować prawdziwy wizerunek naszej firmy.</p>
        </div>
        <form action="add-opinion.php" method="POST" class="add-opinion-form">
            <select name="stars">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <textarea placeholder="Twoja opinia" name="opinion"></textarea>
            <input type="submit" value="Wyślij" class="button">
        </form>
    </div>
    <?php endif ?>

    <?php include("utils/partials/footer.php") ?>
    <script src="static/app.js"></script>
</body>
</html>