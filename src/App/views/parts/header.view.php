<footer>
    <header class="header-principal">
        <nav class="menu">
            <img src="../assets/MenuBurger.png" class="icono-menu" />
            <ul class="lista-desplegable">
                <?php foreach ($this->rutasMenuBurger as $item): ?>
                    <li><a href="<?= $item["href"] ?>"> <?= $item["name"] ?></a></li>
                <?php endforeach; ?>

            </ul>
        </nav>
        <h1>
            <?php $home = $this->rutasLogoHeader ?>
            <a href=" <?= $home["href"] ?>">
                <img src="../assets/Imagotipo.svg" alt="Paw Power" class="logo" />
            </a>
        </h1>
        <?php $carrito = $this->rutasHeaderDer[0] ?>
        <a href=" <?= $carrito["href"] ?>"><img src="../assets/<?= $carrito["name"] ?>.png"
                alt="<?= $carrito["name"] ?>" class="icono-<?= $carrito["name"] ?>" /></a>
        <?php $usuario = $this->rutasHeaderDer[1] ?>
        <a href=" <?= $usuario["href"] ?>"><img src="../assets/<?= $usuario["name"] ?>.png"
                alt="<?= $usuario["name"] ?>" class="icono-<?= $usuario["name"] ?>" /></a>
    </header>
</footer>