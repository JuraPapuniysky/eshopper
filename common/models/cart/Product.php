<?php


namespace common\models\cart;


use yii\base\Model;

class Product extends Model
{

    public $productId;
    public $quantity;
    public $size;

    public function add($size)
    {
        $this->count++;
        $this->sizes[$this->count] = $size;
    }

    public function remove()
    {
        $this->count--;
    }

    

}