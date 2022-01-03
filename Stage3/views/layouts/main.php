<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $page string */
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    $page = "index";
    $file = "site/index";
    if(isset($_GET["r"])) {
        $page = $_GET['r'];
        $f = "site/$page";
        if(file_exists($f)){
            $file = $f;
        }
    }
    ?>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<div class="container-fluid header">
    <div class="row">
        <div class="col-sm-3 gokart-col">
            <a href="index.php?r=index">GO<br>KART</a>

        </div>

        <div class="col-sm-7 navbar-col">

            <nav class="navbar navbar-expand-lg navbar-css">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">

                        <a class="nav-link navbar-element <?php if($page=='site/index' || is_null($page)) echo("active")?>" href="index.php?r=site/index">Home</a>
                        <a class="nav-link navbar-element <?php if($page=='site/features') echo("active")?>" href="index.php?r=site/features">Features</a>
                        <a class="nav-link navbar-element <?php if($page=='site/vehicles') echo("active")?>" href="index.php?r=site/vehicles">Vehicles</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-sm-2 login-button">
            <a class="btn btn-primary" href="index.php?r=site/login">Log In</a>
        </div>
    </div>
</div>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
