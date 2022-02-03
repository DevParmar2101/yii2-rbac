<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sub_category".
 *
 * @property int $id
 * @property int $category_id
 * @property string $sub_category
 */
class SubCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id'], 'integer'],
            [['sub_category'], 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category Name',
            'sub_category' => 'Sub Category'
        ];
    }
    public function category(){
        return ArrayHelper::map(Category::find()->where(['status' => Category::ACTIVE])->all(),'id','category');
    }
}
