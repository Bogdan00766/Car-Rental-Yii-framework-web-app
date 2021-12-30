<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Client".
 *
 * @property int $Id
 * @property string $User_email
 * @property string $Create_time
 *
 * @property Rent[] $rents
 * @property User $userEmail
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_email'], 'required'],
            [['Create_time'], 'safe'],
            [['User_email'], 'string', 'max' => 255],
            [['User_email'], 'unique'],
            [['User_email'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_email' => 'Email']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'User_email' => 'User Email',
            'Create_time' => 'Create Time',
        ];
    }

    /**
     * Gets query for [[Rents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRents()
    {
        return $this->hasMany(Rent::className(), ['Client_Id' => 'Id']);
    }

    /**
     * Gets query for [[UserEmail]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserEmail()
    {
        return $this->hasOne(User::className(), ['Email' => 'User_email']);
    }
}
