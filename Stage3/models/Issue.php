<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Issue".
 *
 * @property int $Id
 * @property string|null $Explanation
 * @property string $Car_VIN
 * @property int $Rent_Id
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
        return 'Issue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Car_VIN', 'Rent_Id'], 'required'],
            [['Rent_Id'], 'integer'],
            [['Explanation'], 'string', 'max' => 9999],
            [['Car_VIN'], 'string', 'max' => 11],
            [['Car_VIN'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['Car_VIN' => 'VIN']],
            [['Rent_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Rent::className(), 'targetAttribute' => ['Rent_Id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Explanation' => 'Explanation',
            'Car_VIN' => 'Car  Vin',
            'Rent_Id' => 'Rent  ID',
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
     * Gets query for [[Rent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRent()
    {
        return $this->hasOne(Rent::className(), ['Id' => 'Rent_Id']);
    }
}
