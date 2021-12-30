<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property string $Email
 * @property string $Password
 * @property string $Create_time
 * @property int $Status
 * @property string $Name
 * @property string $Last_name
 * @property string|null $Birth_year
 * @property int|null $IsAdmin
 *
 * @property Client $client
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Email', 'Password', 'Name', 'Last_name'], 'required'],
            [['Create_time'], 'safe'],
            [['Status', 'IsAdmin'], 'integer'],
            [['Email'], 'string', 'max' => 255],
            [['Password'], 'string', 'max' => 32],
            [['Name', 'Last_name', 'Birth_year'], 'string', 'max' => 45],
            [['Email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Email' => 'Email',
            'Password' => 'Password',
            'Create_time' => 'Create Time',
            'Status' => 'Status',
            'Name' => 'Name',
            'Last_name' => 'Last Name',
            'Birth_year' => 'Birth Year',
            'IsAdmin' => 'Is Admin',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['User_email' => 'Email']);
    }
}
