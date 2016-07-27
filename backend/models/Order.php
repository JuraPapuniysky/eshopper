<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $addres
 * @property integer $status
 * @property string $time_stamp
 * @property string $order_number
 *
 * @property OrderProduct[] $orderProducts
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'phone', 'addres', 'order_number'], 'required'],
            [['status'], 'integer'],
            [['time_stamp'], 'safe'],
            [['first_name', 'last_name', 'email', 'phone', 'addres', 'order_number'], 'string', 'max' => 255],
            [['email'], 'email'],
            ['phone', 'match', 'pattern' => '/^\d+$/', 'message' => 'Номер телефона содержит только цифры'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'phone' => '',
            'addres' => '',
            'status' => 'Status',
            'time_stamp' => 'Time Stamp',
            'order_number' => 'Order Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::className(), ['order_id' => 'id']);
    }

    public function add($order_number)
    {
        $this->order_number = (string)$order_number;
        $this->status = 0;
        if($this->validate() && $this->save())
        {
            $order = $this->findOne(['order_number' => $order_number]);
            $products = Cart::findAll(['user_token' => $order_number]);

            foreach ($products as $product)
            {
                $order_product = new OrderProduct();
                $order_product->order_id = $order->id;
                $order_product->product_id = $product->product_id;
                $order_product->size_id = $product->size_id;
                $order_product->count = $product->quantity;

                if($order_product->save())
                {
                    unset($order_product);
                    $product->delete();
                }
            }
        }
    }
}

