<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property string $user_token
 * @property integer $product_id
 * @property integer $size_id
 * @property integer $quantity
 *
 * @property Product $product
 * @property Size $size
 */
class Cart extends \yii\db\ActiveRecord
{

    public static $total_price;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_token', 'product_id', 'size_id', 'quantity'], 'required'],
            [['product_id', 'size_id', 'quantity'], 'integer'],
            [['user_token'], 'string', 'max' => 255],
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
            'id' => 'ID',
            'user_token' => 'User Token',
            'product_id' => 'Product ID',
            'size_id' => 'Size ID',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return int
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(Size::className(), ['id' => 'size_id']);
    }

    public function add()
    {
        $session = Yii::$app->session;
        if(!$session->isActive) {

            $session->open();
        }
        if($session->has('user_token')){
                $this->setUserToken();
            }else{
                if(Yii::$app->user->isGuest) {
                    $session->set('user_token', date('YmdHis'));
                }else{
                    $session->set('user_token', Yii::$app->user->id);
                }
                $this->setUserToken();
            }

    }

    /**
     *
     */
    public function setUserToken()
    {
        $this->user_token = (string)Yii::$app->session->get('user_token');
    }


    /**
     * @param $user_token
     * @return array
     */
    public static function getCartProduct()
    {
        $session = Yii::$app->session;
        $user_token = $session->get('user_token');
        $cartProducts = static::findAll(['user_token'=>$user_token]);
        $product = [];
        $count = 0;
        $tmp = 0;
        foreach ($cartProducts as $cartProduct)
        {
            $prod = Product::findProductById($cartProduct->product_id);
            $product[$count] = [
                'cart_id' => $cartProduct->id,
                'product_id' => $cartProduct->product_id,
                'product_name' => $prod->name,
                'product_image' => str_replace(
                    '/images/products/',
                    '/mini-images/products/',
                    Image::findOne(
                    [
                        'product_id' => $cartProduct->product_id,
                        'description' => 0
                    ])->src),
                'product_size' => Size::findOne(['id' => $cartProduct->size_id])->size,
                'product_price' => money_format('%i', $prod->price),
                'product_quantity' => $cartProduct->quantity,
                'product_total_price' => $prod->price * $cartProduct->quantity,
            ];
            $count++;
            $tmp = $prod->price * $cartProduct->quantity;

            self::$total_price = self::$total_price + $tmp;
        }
        return $product;
    }

    public static function action($id, $action)
    {
        $product = static::findOne([
            'id' => $id,
            'user_token' => Yii::$app->session->get('user_token')]);

        switch ($action) {
            case 'delete':
                $product->delete();
                break;
            case 'quantity_up':
                $product->quantity++;
                $product->save();
                break;
            case 'quantity_down':
                $product->quantity--;
                $product->save();
                break;
        }

    }
}
