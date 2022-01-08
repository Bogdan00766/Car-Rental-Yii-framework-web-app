<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "engine".
 *
 * @property int $id
 * @property string $serial_number
 * @property string|null $fuel
 * @property int|null $power
 * @property int|null $cylinders
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
        return 'engine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'serial_number'], 'required'],
            [['id', 'power', 'cylinders'], 'integer'],
            [['serial_number'], 'string', 'max' => 25],
            [['fuel'], 'string', 'max' => 45],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial_number' => 'Serial Number',
            'fuel' => 'Fuel',
            'power' => 'Power',
            'cylinders' => 'Cylinders',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::className(), ['engine_id' => 'id']);
    }
}
