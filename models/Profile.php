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
}
