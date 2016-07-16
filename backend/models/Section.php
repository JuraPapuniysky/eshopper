<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property string $time_stamp
 *
 * @property Product[] $products
 * @property Category $category
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['time_stamp'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'time_stamp' => 'Time Stamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['section_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCategories()
    {
        if($this->category_id == null) {
            return Category::find()->all();
        }else{
            return Category::findAll(['id' => $this->category_id]);
        }
    }
}
