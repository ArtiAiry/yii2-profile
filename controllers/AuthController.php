<?php
/**
 * Created by PhpStorm.
 * User: mint2
 * Date: 27.07.17
 * Time: 11:45
 */

namespace app\controllers;


use app\models\LoginForm;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();



        if ($model->load(Yii::$app->request->post()) && $model->login()) {

         return $this->goBack();
       }
       return $this->render('login', [
            'model' => $model,
       ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


}