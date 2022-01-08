<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "issue".
 *
 * @property int $id
 * @property string|null $explanation
 * @property string $car_VIN
 * @property int|null $rent_id
 *
 * @property Car $carVIN
 * @property Rent $rent
 */
class Issue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'issue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_VIN'], 'required'],
            [['rent_id'], 'integer'],
            [['explanation'], 'string', 'max' => 9999],
            [['car_VIN'], 'string', 'max' => 11],
            [['car_VIN'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car_VIN' => 'VIN']],
            [['rent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rent::className(), 'targetAttribute' => ['rent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'explanation' => 'Explanation',
            'car_VIN' => 'Car Vin',
            'rent_id' => 'Rent ID',
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
     * Gets query for [[Rent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRent()
    {
        return $this->hasOne(Rent::className(), ['id' => 'rent_id']);
    }
}
