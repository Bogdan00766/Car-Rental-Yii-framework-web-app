<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rent".
 *
 * @property int $id
 * @property string|null $car_VIN
 * @property string|null $rent_time
 * @property int $client_id
 *
 * @property Car $carVIN
 * @property Client $client
 * @property Issue[] $issues
 */
class Rent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id'], 'required'],
            [['client_id'], 'integer'],
            [['car_VIN'], 'string', 'max' => 11],
            [['rent_time'], 'string', 'max' => 45],
            [['car_VIN'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car_VIN' => 'VIN']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_VIN' => 'Car Vin',
            'rent_time' => 'Rent Time',
            'client_id' => 'Client ID',
        ];
    }

    /**
     * Gets query for [[CarVIN]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarVIN()
    {
        return $this->hasOne(Car::className(), ['VIN' => 'car_VIN']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Issues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIssues()
    {
        return $this->hasMany(Issue::className(), ['rent_id' => 'id']);
    }
}
