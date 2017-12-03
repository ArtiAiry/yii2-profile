<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $skype
 * @property int $phone
 * @property string $country
 * @property string $city
 * @property int $age
 * @property string $gender
 * @property string $dob
 *
 * @property User $user
 */
class Profile extends ActiveRecord
{
    /**
     * @inheritdoc
     */

    const SCENARIO_UPDATE = 'update';


    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'phone', 'age'], 'integer'],
            [['dob'], 'safe'],
            [['skype'], 'string', 'max' => 255],
            [['country'], 'string', 'max' => 38],
            [['city'], 'string', 'max' => 178],
            [['gender'], 'string', 'max' => 7],
            [['skype'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'skype' => 'Skype',
            'phone' => 'Phone',
            'country' => 'Country',
            'city' => 'City',
            'age' => 'Age',
            'gender' => 'Gender',
            'dob' => 'Dob',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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
            $profile->dob = $this->dob;

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


//    public function beforeSave($insert)
//    {
//        if (parent::beforeSave($insert)) {
//
//
//
//            return true;
//        }
//        return false;
//    }






}
