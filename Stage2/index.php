<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Rental Website</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container header">
        <div class="row">
            <div class="col-md-3 gokart-col">
                <p>GO<br>KART</p>

            </div>

            <div class="col-md-7 navbar-col">

                <nav class="navbar navbar-expand-lg navbar-css">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="index.php?page=home">Home</a>
                            <a class="nav-link" href="index.php?page=features">Features</a>
                            <a class="nav-link" href="index.php?page=vehicles">Vehicles</a>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-md-2 login-button">
                <a class="btn btn-primary" href="index.php?page=login">Log In</a>
            </div>
        </div>

    </div>

    <div class="container main">
        <?php
        $file = "pages/home.php";
        if(isset($_GET["page"])) {
            $page = $_GET['page'];
            $f = "pages/$page.php";
            if(file_exists($f)){
                $file = $f;
            }
        }
        require_once $file;
        ?>

    </div>

    <script src="vendor/components/jquery/jquery.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>