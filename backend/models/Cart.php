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
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(Size::className(), ['id' => 'size_id']);
    }

    public function add()
    {
        $session = Yii::$app->session;
        if($session->isActive){
            if($session->has('user_token')){
                $this->saveProduct();
            }else{
                if(Yii::$app->user->isGuest) {
                    $session->set('user_token', time());
                }else{
                    $session->set('user_token', Yii::$app->user->id);
                }
                $this->saveProduct();
            }
        }
    }

    public function saveProduct()
    {
        $this->user_token = Yii::$app->session->get('user_token');
        $this->save();
    }
}
