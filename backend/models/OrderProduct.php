<?php

namespace backend\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\Query;

/**
 * This is the model class for table "order_product".
 *
 * @property integer $product_id
 * @property integer $size_id
 * @property integer $order_id
 * @property integer $count
 *
 * @property Order $order
 * @property Product $product
 * @property Size $size
 */
class OrderProduct extends \yii\db\ActiveRecord
{

 

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'size_id', 'order_id', 'count'], 'required'],
            [['product_id', 'size_id', 'order_id', 'count'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => Size::className(), 'targetAttribute' => ['size_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'size_id' => 'Size ID',
            'order_id' => 'Order ID',
            'count' => 'Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getProductName()
    {
        $product = Product::find()->where(['id' => $this->product_id]);
        return $product->name;
    }

    public function getProductSize()
    {
        $size = Size::find()->where(['id' => $this->size_id])->all();
        return $size['size'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(Size::className(), ['id' => 'size_id']);
    }
    
    public function getRecommendedProducts()
    {
        return (new Query())
            ->select(['order_product.product_id', 'product.name', 'product.price', 'image.src'])
            ->distinct(['order_product.product_id'])
            ->from(['order_product'])
            ->innerJoin('product', 'product.id = order_product.product_id')
            ->innerJoin('image', 'image.product_id = order_product.product_id')
            ->where(['image.description' => 0])
            ->groupBy(['order_product.product_id', 'product.name', 'product.price', 'image.src'])
            ->orderBy(['count(order_product.product_id)' => SORT_DESC]);
    }
}
