<nav class="navbar">
        <a class="navbar-brand" href="index.php">MonCar</a>

        <div class="navbar-menu">
            <a class="navbar-menu-item" href="gallery.php">Galeria</a>
            <a class="navbar-menu-item" href="contact.php">Kontakt</a>
            <a class="navbar-menu-item" href="fleet.php">Oferta</a>
            <a class="navbar-menu-item" href="canvas.php">Canvas</a>
            <a class="navbar-menu-item" href="register.php">Rejestracja</a>
            <a class="navbar-menu-item" href="login.php">Logowanie</a>
			<?php if (isset($_SESSION['userId'])): ?>
		    <a class="navbar-menu-item" href="logout.php">Wyloguj</a>
            <?php endif ?>

        </div>

        <div class="navbar-toggle">
            <i class="fa-solid fa-bars"></i>
        </div>
</nav>