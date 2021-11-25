<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Rental Website</title>
    <?php
    $file = "pages/home.php";
    if(isset($_GET["page"])) {
        $page = $_GET['page'];
        $f = "pages/$page.php";
        if(file_exists($f)){
            $file = $f;
        }
    }
    ?>

    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home_style.css">
    <link rel="stylesheet" href="css/vehicles_style.css">
    <link rel="stylesheet" href="css/features_style.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.css">

</head>
<body>
    <div class="container-fluid header">
        <div class="row">
            <div class="col-sm-3 gokart-col">
                <a href="index.php?page=home">GO<br>KART</a>

            </div>

            <div class="col-sm-7 navbar-col">

                <nav class="navbar navbar-expand-lg navbar-css">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">

                            <a class="nav-link navbar-element <?php if($page=='home' || is_null($page)) echo("active")?>" href="index.php?page=home">Home</a>
                            <a class="nav-link navbar-element <?php if($page=='features') echo("active")?>" href="index.php?page=features">Features</a>
                            <a class="nav-link navbar-element <?php if($page=='vehicles') echo("active")?>" href="index.php?page=vehicles">Vehicles</a>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-sm-2 login-button">
                <a class="btn btn-primary" href="index.php?page=login">Log In</a>
            </div>
        </div>

    </div>

    <div class="container-fluid main">
        <?php
        require_once $file;
        ?>

    </div>

    <script src="vendor/components/jquery/jquery.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>