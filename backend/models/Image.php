<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $description
 * @property integer $product_id
 * @property string $src
 * @property string $time_stamp
 *
 * @property Product $product
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'product_id', 'src'], 'required'],
            [['product_id'], 'integer'],
            [['time_stamp'], 'safe'],
            [['description', 'src'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'product_id' => 'Product ID',
            'src' => 'Src',
            'time_stamp' => 'Time Stamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}