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

<?php
NavBar::begin(['brandLabel' => 'GO<br>KART']);
echo Nav::widget([
    'items' => [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Features', 'url' => ['/site/features']],
        ['label' => 'Vehicles', 'url' => ['/site/vehicles'], 'visible' => Yii::$app->user->isGuest],
        ['label' => 'Cars', 'url' => ['/car'], 'visible' => !Yii::$app->user->isGuest],
        ['label' => 'My rents', 'url' => ['/rent'], 'visible' => Yii::$app->user->can('client')],
        [
                'label' => 'Issues', 'url' => ['#'], 'visible'=> Yii::$app->user->can('client'),
                'items' => [
                    ['label' => 'My issues', 'url' => ['issue/index?IssueSearch%5Bid%5D=&IssueSearch%5Bexplanation%5D=&IssueSearch%5Bclient_id%5D=' . Yii::$app->user->getId()]], //I can do it better if I will have more time
                ],
        ],
        [
                'label' => 'Admin', 'url' => ['#'], 'visible'=> Yii::$app->user->can('admin'),
                'items' => [
                    ['label' => 'Engines', 'url' => ['/engine']],
                    ['label' => 'Issues', 'url' => ['/issue']],
                    ['label' => 'Clients', 'url' => ['/client']],
                    //['label' => 'Addresses', 'url' => ['/address']],
                    ['label' => 'Rents', 'url' => ['/rent'],],
                ],
        ],
        ['label' => 'Become admin(only for project evaluation)', 'url' => ['/client/admin'], 'visible' => Yii::$app->user->can('client')],
        Yii::$app->user->isGuest ? (
        ['label' => 'Login', 'url' => ['/user/login']]
        ) : (
            ['label' => 'Log out (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']]
        )

    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();

?>

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
