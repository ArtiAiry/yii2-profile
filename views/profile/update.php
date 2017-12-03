<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $profile app\models\Profile */

$this->title = 'Update Profile:' . ' ' . $profile->user->username;;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $profile->id, 'url' => ['view', 'id' => $profile->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'user' => $user,
        'profile' => $profile,
    ]) ?>

</div>
