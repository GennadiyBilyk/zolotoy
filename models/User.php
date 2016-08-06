<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property integer $role_id
 * @property string $name
 * @property string $email
 * @property string $password
 *
 * @property Roles $role
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    public static function confirm($code)
    {
        $user = self::findOne(['confirm_code' => $code]);

        if ($user) {
            $user->email_confirm = '1';
            if ($user->save()) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id'], 'integer'],
            [['name', 'email', 'password'], 'required'],
            [['name', 'email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 40],
            // [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Роль',
            'name' => 'Имя',
            'email' => 'Email',
            'email_confirm' => 'Подтверждение Email',
            'confirm_code' => 'Confirm Code',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::className(), ['id' => 'role_id']);
    }

    public function setPassword($password)
    {
        $this->password = sha1($password);
    }
}
