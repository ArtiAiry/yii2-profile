<?php

use app\models\Profile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $profile app\models\Profile */
/* @var $user app\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Create Profile';
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="profile-form">



        <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($user, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($user, 'password')->passwordInput() ?>

<!--        --><?//= $form->field($user, 'repeat_password')->passwordInput() ?>

        <?= $form->field($profile, 'skype')->textInput(['maxlength' => true]) ?>

        <?= $form->field($profile, 'phone')->textInput() ?>

        <?= $form->field($profile, 'country')->textInput(['maxlength' => true]) ?>

        <?= $form->field($profile, 'city')->textInput(['maxlength' => true]) ?>

        <?= $form->field($profile, 'age')->textInput() ?>

        <?= $form->field($profile, 'gender')->dropDownList([
            '0' => 'Мужской',
            '1' => 'Женский',

        ])->label(''); ?>

        <?= $form->field($profile, 'dob')->widget(
            DatePicker::className(),[
            'model' => $profile,
            'inline' => false,
            'language' => 'ru',
            'size' => 'ms',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-dd',
            ]
        ]);?>

        <div class="form-group">
            <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
