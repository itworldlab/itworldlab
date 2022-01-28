<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string|null $name
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property string|null $verification_token
 * @property string|null $phone
 * @property int|null $cat
 * @property string|null $avatar_image
 * @property int|null $status
 * @property int $created_at
 * @property int|null $updated_at
 * @property int|null $blocked_at
 * @property int|null $blocked_id
 * @property int|null $login_at
 * @property string|null $login_ip
 * @property string $access_token
 * @property string|null $created_ip

 *
 * @property Review[] $reviews
 */
class User extends \yii\db\ActiveRecord
{
    public $test = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'access_token'], 'required'],
            [['cat', 'status', 'created_at', 'updated_at', 'blocked_at', 'blocked_id', 'login_at'], 'integer'],
            [['username', 'name', 'password_hash', 'password_reset_token', 'email', 'verification_token', 'avatar_image', 'login_ip', 'access_token', 'created_ip'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 100],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'name' => Yii::t('app', 'Name'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'verification_token' => Yii::t('app', 'Verification Token'),
            'phone' => Yii::t('app', 'Phone'),
            'cat' => Yii::t('app', 'Cat'),
            'avatar_image' => Yii::t('app', 'Avatar Image'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'blocked_at' => Yii::t('app', 'Blocked At'),
            'blocked_id' => Yii::t('app', 'Blocked ID'),
            'login_at' => Yii::t('app', 'Login At'),
            'login_ip' => Yii::t('app', 'Login Ip'),
            'access_token' => Yii::t('app', 'Access Token'),
            'created_ip' => Yii::t('app', 'Created Ip'),
        ];
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['user_id' => 'id']);
    }
}
