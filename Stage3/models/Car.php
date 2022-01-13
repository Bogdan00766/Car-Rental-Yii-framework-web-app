<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property string $VIN
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $color
 * @property int|null $seats
 * @property int|null $status
 * @property int $engine_id
 * @property string $id
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
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VIN', 'engine_id', 'id'], 'required'],
            [['seats', 'status', 'engine_id'], 'integer'],
            [['VIN'], 'string', 'max' => 11],
            [['brand', 'model', 'color', 'id'], 'string', 'max' => 45],
            [['VIN'], 'unique'],
            [['id'], 'unique'],
            [['engine_id'], 'exist', 'skipOnError' => true, 'targetClass' => Engine::className(), 'targetAttribute' => ['engine_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'VIN' => 'Vin',
            'brand' => 'Brand',
            'model' => 'Model',
            'color' => 'Color',
            'seats' => 'Seats',
            'status' => 'Status',
            'engine_id' => 'Engine ID',
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[Engine]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEngine()
    {
        return $this->hasOne(Engine::className(), ['id' => 'engine_id']);
    }

    /**
     * Gets query for [[Issues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIssues()
    {
        return $this->hasMany(Issue::className(), ['car_VIN' => 'VIN']);
    }

    /**
     * Gets query for [[Rents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRents()
    {
        return $this->hasMany(Rent::className(), ['car_VIN' => 'VIN']);
    }
}
