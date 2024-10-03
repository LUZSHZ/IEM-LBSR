<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <header>
        <?php
        include_once("include/encabezado.php");
        ?>
    </header>
    <div class="container">
        <p>
            <?php
            echo $_SESSION['nombre'];
            echo " ";
            echo $_SESSION['paterno'];
            ?>
        </p>
    </div>
    <div class="container " style="text-align: center;">
        <h2> Reportes De Usuarios</h2>
        <div class="row">
            <div class="col">
                <a href="../cliente/R_usu_pdf.php">
                    <img src="img/pdf.jpg" width="150px" height="150px">
                </a>
            </div>
            <div class="col">
                <a href="../cliente/R_usu_excel.php">
                    <img src="img/execel.jpg" width="150px" height="150px">
                </a>
            </div>
            <div class="col">
                <a href="../cliente/R_usu_graf.php">
                    <img src="img/grafica.jpg" width="170px" height="150px">
                </a>
            </div>
        </div>
    </div>
    <div class="container " style="text-align: center;">
        <h2> Reportes De Categorias</h2>
        <div class="row">
            <div class="col">
                <a href="../cliente/R_cat_pdf.php">
                    <img src="img/pdf.jpg" width="150px" height="150px">
                </a>
            </div>
            <div class="col">
                <a href="../cliente/R_cat_excel.php">
                    <img src="img/execel.jpg" width="150px" height="150px">
                </a>
            </div>
            <div class="col">
                <a href="../cliente/R_cat_graf.php">
                    <img src="img/grafica.jpg" width="170px" height="150px">
                </a>
            </div>
        </div>
        <div class="container " style="text-align: center;">
            <h2> Reportes De Productos</h2>
            <div class="row">
                <div class="col">
                    <a href="../cliente/R_pro_pdf.php">
                        <img src="img/pdf.jpg" width="150px" height="150px">
                    </a>
                </div>
                <div class="col">
                    <a href="../cliente/R_pro_excel.php">
                        <img src="img/execel.jpg" width="150px" height="150px">
                    </a>
                </div>
                <div class="col">
                    <a href="../cliente/R_pro_graf.php">
                        <img src="img/grafica.jpg" width="170px" height="150px">
                    </a>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <?php
        include_once("include/pie.php");
        ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>