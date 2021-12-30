<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Rent".
 *
 * @property int $Id
 * @property int $Client_Id
 * @property string $Car_VIN
 * @property string $Rent_start
 * @property string $Rent_end
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
        return 'Rent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Client_Id', 'Car_VIN', 'Rent_end'], 'required'],
            [['Client_Id'], 'integer'],
            [['Rent_start', 'Rent_end'], 'safe'],
            [['Car_VIN'], 'string', 'max' => 11],
            [['Client_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['Client_Id' => 'Id']],
            [['Car_VIN'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['Car_VIN' => 'VIN']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Client_Id' => 'Client  ID',
            'Car_VIN' => 'Car  Vin',
            'Rent_start' => 'Rent Start',
            'Rent_end' => 'Rent End',
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
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['Id' => 'Client_Id']);
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
}
