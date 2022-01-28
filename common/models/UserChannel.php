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
 */
class UserChannel extends \yii\db\ActiveRecord
{
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
            [['user_id', 'channel_name', 'channel_category', 'channel_sub_category', 'channel_bio'], 'required'],
            [['user_id', 'channel_category', 'channel_sub_category'], 'integer'],
            [['channel_bio'], 'string'],
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
        ];
    }
}
