<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Engine".
 *
 * @property int $Id
 * @property string $Serial_Number
 * @property string $Fuel
 * @property int|null $Power
 * @property int|null $Cylinders
 *
 * @property Car[] $cars
 */
class Engine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Engine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Serial_Number', 'Fuel'], 'required'],
            [['Id', 'Power', 'Cylinders'], 'integer'],
            [['Serial_Number'], 'string', 'max' => 25],
            [['Fuel'], 'string', 'max' => 45],
            [['Id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Serial_Number' => 'Serial  Number',
            'Fuel' => 'Fuel',
            'Power' => 'Power',
            'Cylinders' => 'Cylinders',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::className(), ['Engine_Id' => 'Id']);
    }
}
