<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property string $Email
 * @property string $Password
 * @property string|null $Create_time
 * @property string $authKey
 * @property string|null $username
 * @property string|null $Last_name
 * @property string|null $accessToken
 * @property int $IsAdmin
 * @property int $Id
 *
 * @property Client[] $clients
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
            [['Email', 'Password', 'authKey'], 'required'],
            [['Create_time'], 'safe'],
            [['IsAdmin'], 'integer'],
            [['Email', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['Password'], 'string', 'max' => 32],
            [['username', 'Last_name'], 'string', 'max' => 45],
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
            'authKey' => 'Auth Key',
            'username' => 'Username',
            'Last_name' => 'Last Name',
            'accessToken' => 'Access Token',
            'IsAdmin' => 'Is Admin',
            'Id' => 'ID',
        ];
    }

    /**
     * Gets query for [[Clients]].
     *
     * @return User
     */
    public static function findIdentity($id) {
        $User = User::find()
            ->where([
                "Id" => $id
            ])
            ->one();
        if ($User === null) {
            return null;
        }
        return new static($User);
    }

    public function getId() {
        return $this->Id;
    }

    public static function findIdentityByAccessToken($token, $type = null) {

        $User = User::find()
            ->where(["accessToken" => $token])
            ->one();
        if (!count($User)) {
            return null;
        }
        return new static($User);
    }

    public static function findByUsername($username) {
        $User = User::find()
            ->where([
                "username" => $username
            ])
            ->one();
        if ($User === null) {
            return null;
        }
        return new static($User);
    }

    public function getAuthKey() {
        return $this->authKey;
    }

    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password) {
        return $this->Password === $password;
    }

    public function getClients()
    {
        return $this->hasMany(Client::className(), ['User_email' => 'Email']);
    }

    public function isAdmin()
    {
        if($this->IsAdmin === 1) return 1;
        else return 0;
    }
}
