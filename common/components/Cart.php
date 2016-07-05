<?php
/**
 * Created by PhpStorm.
 * User: wsst17
 * Date: 05.07.16
 * Time: 10:41
 */

namespace common\components;


use yii\base\Component;

class Cart extends Component
{
    public function add($productId, $count)
    {
        $link = OrderProduct::findOne(['product_id' => $productId, 'order_id' => $this->order->id]);
        if (!$link) {
            $link = new OrderProduct();
        }
        $link->product_id = $productId;
        $link->order_id = $this->order->id;
        $link->count += $count;
        return $link->save();
    }
}