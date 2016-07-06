<?php
/**
 * Created by PhpStorm.
 * User: wsst17
 * Date: 05.07.16
 * Time: 10:41
 */

namespace common\components;


use yii\base\Component;
use Yii;

class Cart extends Component
{
    public function add($productId, $size)
    {
        $session = Yii::$app->session;
        if(!$session->isActive)
        {
            $session->open();
        }
    }
}