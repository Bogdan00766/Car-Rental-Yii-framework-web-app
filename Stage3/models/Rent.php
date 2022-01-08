<?php

namespace app\models;

use Yii;
use yii\web\User;

/**
 * This is the model class for table "Rent".
 *
 * @property int $Id
 * @property string|null $Car_VIN
 * @property string|null $RentTime
 * @property int $user_id
 *
 * @property Car $carVIN
 * @property Issue[] $issues
 * @property User $user
 */
class Rent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Rent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['Car_VIN'], 'string', 'max' => 11],
            [['RentTime'], 'string', 'max' => 45],
            [['Car_VIN'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['Car_VIN' => 'VIN']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Car_VIN' => 'Car Vin',
            'RentTime' => 'Rent Time',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[CarVIN]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarVIN()
    {
        return $this->hasOne(Car::className(), ['VIN' => 'Car_VIN']);
    }

    /**
     * Gets query for [[Issues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIssues()
    {
        return $this->hasMany(Issue::className(), ['Rent_Id' => 'Id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
