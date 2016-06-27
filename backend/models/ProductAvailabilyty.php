<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_availabilyty".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $size
 * @property string $time_stamp
 *
 * @property Product $product
 */
class ProductAvailabilyty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_availabilyty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'size'], 'required'],
            [['product_id'], 'integer'],
            [['time_stamp'], 'safe'],
            [['size'], 'string', 'max' => 255],
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
            'product_id' => 'Product ID',
            'size' => 'Size',
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
