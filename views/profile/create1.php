<?php

use app\models\Profile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Create Profile';
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="profile-form">



        <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($model->user, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model->email, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model->password, 'password')->passwordInput() ?>

<!--        --><?//= $form->field($user, 'repeat_password')->passwordInput() ?>

        <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'age')->textInput() ?>

        <?= $form->field($model, 'gender')->dropDownList([
            '0' => 'Мужской',
            '1' => 'Женский',

        ])->label(''); ?>

        <?= $form->field($model, 'dob')->widget(
            DatePicker::className(),[
            'model' => $model,
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
