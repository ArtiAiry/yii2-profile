<?php
/**
 * Created by PhpStorm.
 * User: mint2
 * Date: 27.07.17
 * Time: 16:56
 */

namespace app\models\form;


use app\models\Profile;
use app\models\User;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repeat_password;
    public $skype;
    public $phone;
    public $country;
    public $city;
    public $age;
    public $gender;
    public $dob;

    public function rules()
    {
        return [
            [['username','email','password','repeat_password'],'required'],
            [['username'], 'string', 'min'=> 4, 'max'=> 255],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email', 'message'=>"This email has been already token."],
            [['email'], 'email'],
            [['email'], 'trim'],
            ['email', 'string', 'max' => 255],
            ['repeat_password', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match."],

        ];
    }

    public function signup()
    {
        if($this->validate())
        {
            $user = new User();

            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->save();

            $profile = new Profile();

            $profile->user_id = $user->id;

            $user->link('profile', $profile);

            $db = \Yii::$app->db;
            $transaction = $db->beginTransaction();
            if ($user->create() && $profile->save()) {

                $transaction->commit();
            } else {
                $transaction->rollback();
            }
            return $user->create() ? $user : null;

        }
        return null;

    }

    public function profileRegister()
    {
        if($this->validate())
        {
            $user = new User();

            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->save();

            $profile = new Profile();

            $profile->user_id = $user->id;
            $profile->skype = $this->skype;
            $profile->phone = $this->phone;
            $profile->country = $this->country;
            $profile->city = $this->city;
            $profile->age = $this->age;
            $profile->gender = $this->gender;

            $user->link('profile', $profile);

            $db = \Yii::$app->db;
            $transaction = $db->beginTransaction();
            if ($user->create() && $profile->save()) {

                $transaction->commit();
            } else {
                $transaction->rollback();
            }
            return $user->create() ? $user : null;

        }
        return null;

    }



}