<?php 
$db = $GLOBALS['db'];
$visitorCount = $db->getVisitorCount();
$db->incrementVisitorCount();
?>

<footer class="footer">
    <p>Ilość odwiedzin: <?= $visitorCount ?></p>
    <div class="footer-socials">
        <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
    </div>
</footer>