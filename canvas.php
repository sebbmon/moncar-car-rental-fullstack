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
    <div class="canvas-wrapper">
        <canvas id="canvas"></canvas>
    </div>
    <?php include("utils/partials/footer.php") ?>
    <script src="static/app.js"></script>
    <script>
        const canvas = document.getElementById("canvas");
        const ctx = canvas.getContext("2d");

        const wrapper = document.querySelector('.canvas-wrapper');

        canvas.setAttribute('width', wrapper.clientWidth + "px");
        canvas.setAttribute('height', wrapper.clientHeight + "px");
        let cw = canvas.width;
        let ch = canvas.height;

        window.addEventListener('resize', () => {
            canvas.setAttribute('width', wrapper.clientWidth + "px");
            canvas.setAttribute('height', wrapper.clientHeight + "px");
            cw = canvas.width;
            ch = canvas.height;
        });



        canvas.addEventListener('click', function(e) {
            squares.push({
                x: Math.random() * cw, y: Math.random() * ch
            });
        })

        const squares = [];


        function animate(time){
            ctx.clearRect(0, 0, cw, ch);

            squares.forEach((square, j) => {
                squares[j].y += 1;
                ctx.fillStyle = "#000";
                ctx.fillRect(square.x, square.y, 20, 20);
            })
            requestAnimationFrame(animate);
        }
        requestAnimationFrame(animate);

    </script>
</body>
</html>

