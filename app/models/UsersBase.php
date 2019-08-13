<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users_tbl}}".
 *
 * @property int $id_fld
 * @property string $email_fld
 * @property string $pass_hash_fld
 * @property string $token_fld
 * @property string $auth_key
 * @property string $createAt_fld
 *
 * @property Activity[] $activity
 */
class UsersBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users_tbl}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email_fld', 'pass_hash_fld'], 'required'],
            [['createAt_fld'], 'safe'],
            [['email_fld', 'token_fld', 'auth_key'], 'string', 'max' => 150],
            [['pass_hash_fld'], 'string', 'max' => 300]

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_fld' => Yii::t('app', 'Id'),
            'email_fld' => Yii::t('app', 'Email'),
            'pass_hash_fld' => Yii::t('app', 'Pass Hash'),
            'token_fld' => Yii::t('app', 'Token'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'createAt_fld' => Yii::t('app', 'Create At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasMany(Activity::className(), ['userID_fld' => 'id_fld']);
    }
}
