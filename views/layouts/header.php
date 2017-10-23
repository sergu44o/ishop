<?php
/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
<!--    <link href="css/style.css" type="text/css" rel="stylesheet">-->
    <?php echo $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header id="header">
    <div class="container">
        <a href="/index.php" id="logo" title="Diana’s jewelry">Diana’s jewelry</a>
        <div class="right-links">
            <ul>
                <li><a href="/index.php"><span class="ico-products"></span>3 products, $4 500.00</a></li>
                <li><a href="#"><span class="ico-account"></span>Account</a></li>
                <li><a href="#"><span class="ico-signout"></span>Sign out</a></li>
            </ul>
        </div>
    </div>
</header>

<article>
    <nav id="menu">
        <div class="container">
            <div class="trigger"></div>
            <ul>
                <li><a href="New collection">New collection</a></li>
                <li><a href="necklaces">necklaces</a></li>
                <li><a href="earrings">earrings</a></li>
                <li><a href="Rings">Rings</a></li>
                <li><a href="Gift cards">Gift cards</a></li>
                <li><a href="Promotions">Promotions</a></li>
            </ul>
        </div>
    </nav>