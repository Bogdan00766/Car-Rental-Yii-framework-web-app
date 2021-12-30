<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Car".
 *
 * @property string $VIN
 * @property string $Brand
 * @property string $Model
 * @property string|null $Color
 * @property int|null $Seats
 * @property int $Status
 * @property int $Engine_Id
 *
 * @property Engine $engine
 * @property Issue[] $issues
 * @property Rent[] $rents
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VIN', 'Brand', 'Model', 'Status', 'Engine_Id'], 'required'],
            [['Seats', 'Status', 'Engine_Id'], 'integer'],
            [['VIN'], 'string', 'max' => 11],
            [['Brand', 'Model', 'Color'], 'string', 'max' => 45],
            [['VIN'], 'unique'],
            [['Engine_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Engine::className(), 'targetAttribute' => ['Engine_Id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'VIN' => 'Vin',
            'Brand' => 'Brand',
            'Model' => 'Model',
            'Color' => 'Color',
            'Seats' => 'Seats',
            'Status' => 'Status',
            'Engine_Id' => 'Engine  ID',
        ];
    }

    /**
     * Gets query for [[Engine]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEngine()
    {
        return $this->hasOne(Engine::className(), ['Id' => 'Engine_Id']);
    }

    /**
     * Gets query for [[Issues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIssues()
    {
        return $this->hasMany(Issue::className(), ['Car_VIN' => 'VIN']);
    }

    /**
     * Gets query for [[Rents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRents()
    {
        return $this->hasMany(Rent::className(), ['Car_VIN' => 'VIN']);
    }
}
