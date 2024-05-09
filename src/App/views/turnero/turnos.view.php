<!DOCTYPE html>
<html lang="en">
<head>
    <?php require __DIR__ . '\../parts/head.view.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/turnos.css" /> 
    
</head>
<body>
    <main>
    <header class="header-principal">
            <?php $home = $this->rutasLogoHeader ?>
            <a href=" <?= $home["href"] ?>">
                <img src="../assets/Imagotipo-blanco.png" alt="Paw Power" class="logo" />
            </a>
    </header>
    <section class="section-turnera">
        
        <section class="section-retiros">

            <div class="retiro"> <h2> A RETIRAR </h2> </div>
            
            <article >  0001A </article>
            <article >  00004A </article>
            <article >  0008B </article>

        </section>

        <section class="pedido-estado">
            <!-- tabla */-->
            <table>
                <tr>
                    <th>Pedido</th>
                    <th>Estado</th>
                </tr>
                <tr>
                    <td>0001A</td>
                    <td>Listo para retirar</td>
                </tr>
                <tr>
                    <td>0002B</td>
                    <td>En preparación</td>
                </tr>
                <tr>
                    <td>0003A</td>
                    <td>En preparación</td>
                </tr>
                <tr>
                    <td>0004A</td>
                    <td>Listo para retirar</td>
                </tr>
                <tr>
                    <td>0005A</td>
                    <td>En preparación</td>
                </tr>
                <tr>
                    <td>0006A</td>
                    <td>En preparación</td>
                </tr>
                <tr>
                    <td>0007A</td>
                    <td>En preparación</td>
                </tr>
                <tr>
                    <td>0008A</td>
                    <td>Listo para retirar</td>
                </tr>
                <tr>
                    <td>0009A</td>
                    <td>En preparación</td>
                </tr>
                <tr>
                    <td>0010A</td>
                    <td>En espera</td>
                </tr>
            </table>
        </section>


    </section>

    </main>
</body>
</html>