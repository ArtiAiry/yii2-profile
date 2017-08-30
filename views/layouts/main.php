<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <nav class="navbar-inverse navbar-fixed-top navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=Yii::$app->homeUrl ?>">My Company</a>
            </div>
            <div id="w0-collapse" class="collapse navbar-collapse">
                <ul id="w1"class="navbar-nav navbar-right nav">

                    <?php if(Yii::$app->user->isGuest):?>
                        <!--                        <li><a href="--><?//=  Url::toRoute(['site/login'])?><!--">Login</a></li>-->

                        <li><a href="<?= Url::toRoute(['auth/login'])?>">Login</a></li>
                        <li><a href="<?= Url::toRoute(['signup/index'])?>">Register</a></li>
                    <?php else: ?>
                        <li><a href="<?= Yii::$app->homeUrl?>">Home</a></li>
                        <li><a href="<?= Url::toRoute(['site/about'])?>">About</a></li>
                        <li><a href="<?=  Url::toRoute(['site/contact'])?>">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Tools
                                <b class="caret"></b>
                            </a>
<!--                            <ul class="dropdown-menu">-->
<!---->
<!--                                <li><a href="--><?//=  Url::toRoute(['/promocode/action/index'])?><!--">Actions</a></li>-->
<!--
<!---->
<!--                            </ul>-->

                        </li>
                        <li> <a href="<?= Url::toRoute(['profile/view','id'=>Yii::$app->user->identity->id]);?>" title="View" aria-label="View"><span class="glyphicon glyphicon-eye-open"></span></a></li>
                        <li><a href="<?= Url::toRoute(['auth/logout'])?>">Logout(<?=Yii::$app->user->identity->username?>)</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

    </nav>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
