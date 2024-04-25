<header class="header-principal">
    <nav class="menu">
        <img src="../assets/MenuBurger.png" class="icono-menu" />
        <ul class="lista-desplegable">
            <?php $contador = 0;
            foreach ($this->rutas as $item):
                if ($contador < 3): ?>

                    <li><a href="<?= $item["href"] ?>"> <?= $item["name"] ?></a></li>
                    <?php
                    $contador++;
                else:
                    break;
                endif; ?>
            <?php endforeach; ?>

        </ul>
    </nav>
    <h1>
        <?php $home = $this->rutas[3] ?>
        <a href=" <?= $home["href"] ?>">
            <img src="../assets/Imagotipo.svg" alt="Paw Power" class="logo" />
        </a>
    </h1>
    <?php $carrito = $this->rutas[4] ?>
    <a href=" <?= $carrito["href"] ?>"><img src="../assets/<?= $carrito["name"] ?>.png" alt="<?= $carrito["name"] ?>"
            class="icono-<?= $carrito["name"] ?>" /></a>
    <?php $usuario = $this->rutas[5] ?>
    <a href=" <?= $usuario["href"] ?>"><img src="../assets/<?= $usuario["name"] ?>.png" alt="<?= $usuario["name"] ?>"
            class="icono-<?= $usuario["name"] ?>" /></a>
</header>