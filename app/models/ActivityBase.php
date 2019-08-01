<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%activity_tbl}}".
 *
 * @property int $id_fld
 * @property string $title_fld
 * @property string $startDay_fld
 * @property string $endDay_fld
 * @property int $userID_fld
 * @property string $body_fld
 * @property int $isBlocked_fld
 * @property int $isRepeated_fld
 * @property string $repeatType_fld
 * @property string $email_fld
 * @property int $useNotification_fld
 * @property string $createAt_fld
 *
 * @property Users $userIDFld
 */
class ActivityBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%activity_tbl}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_fld', 'startDay_fld', 'endDay_fld', 'userID_fld', 'body_fld'], 'required'],
            [['startDay_fld', 'endDay_fld', 'createAt_fld'], 'safe'],
            [['userID_fld', 'isBlocked_fld', 'isRepeated_fld', 'useNotification_fld'], 'integer'],
            [['title_fld', 'email_fld'], 'string', 'max' => 150],
            [['body_fld'], 'string', 'max' => 455],
            [['repeatType_fld'], 'string', 'max' => 25],
            [['userID_fld'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userID_fld' => 'id_fld']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_fld' => Yii::t('app', 'Id'),
            'title_fld' => Yii::t('app', 'Title'),
            'startDay_fld' => Yii::t('app', 'Start Day'),
            'endDay_fld' => Yii::t('app', 'End Day'),
            'userID_fld' => Yii::t('app', 'User Id'),
            'body_fld' => Yii::t('app', 'Body'),
            'isBlocked_fld' => Yii::t('app', 'Is Blocked'),
            'isRepeated_fld' => Yii::t('app', 'Is Repeated'),
            'repeatType_fld' => Yii::t('app', 'Repeat Type'),
            'email_fld' => Yii::t('app', 'Email'),
            'useNotification_fld' => Yii::t('app', 'Use Notification'),
            'createAt_fld' => Yii::t('app', 'Create At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIDFld()
    {
        return $this->hasOne(Users::className(), ['id_fld' => 'userID_fld']);
    }
}
