<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_channel".
 *
 * @property int $channel_id
 * @property int $user_id
 * @property string $channel_name
 * @property int $channel_category
 * @property int $channel_sub_category
 * @property string $channel_bio
 * @property string $channel_profile
 * @property string $channel_banner
 * @property int $status
 * @property string $created_at
 *
 * @property Category $category
 * @property Category $sub
 */
class UserChannel extends \yii\db\ActiveRecord
{
    const ACTIVE = 1;
    const INACTIVE = 0;
    const IS_ACTIVE = 'Active';
    const IS_INACTIVE = 'Inactive';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_channel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'channel_name', 'channel_category', 'channel_sub_category', 'channel_bio', 'channel_profile', 'status'], 'required'],
            [['user_id', 'channel_category', 'channel_sub_category', 'status'], 'integer'],
            [['channel_bio'], 'string'],
            [['created_at'], 'safe'],
            [['channel_name'], 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['status'],'integer','max' => 2],
            [['channel_name'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'channel_id' => 'Channel ID',
            'user_id' => 'User ID',
            'channel_name' => 'Channel Name',
            'channel_category' => 'Channel Category',
            'channel_sub_category' => 'Channel Sub Category',
            'channel_bio' => 'Channel Bio',
            'channel_profile' => 'Channel Profile',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);

    }
    public function status()
    {
        return [
            UserChannel::INACTIVE => UserChannel::IS_INACTIVE,
            UserChannel::ACTIVE => UserChannel::IS_ACTIVE,
            ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'channel_category']);
    }
    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSub()
    {
        return $this->hasOne(SubCategory::className(), ['id' => 'channel_sub_category']);
    }
}
