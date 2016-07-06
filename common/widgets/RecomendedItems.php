<?php
/**
 * Created by PhpStorm.
 * User: wsst17
 * Date: 06.07.16
 * Time: 15:36
 */

namespace common\widgets;


use yii\bootstrap\Widget;

class RecomendedItems extends Widget
{

    public function run()
    {
        return $this->render('recomended_items');
    }
}