<?php


namespace common\models\cart;


use yii\base\Model;
/**
 * This is the model class for table "brand".
 *
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $size
 * @property integer $time
 *
 *
 *
 */
class Product extends Model
{

    public $size;
    public $product_id;

    public $quantity;



    public function rules()
    {
        return [
            [['quantity', 'product_id', 'size', ], 'required'],
            [['quantity', 'product_id', 'size', ], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'product_id' => 'Product_id',
            'quantity' => 'Quantity:',
            'size' => 'Size',
            'time' => 'Time',
        ];
    }
}