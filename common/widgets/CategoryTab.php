<?php
/**
 * Created by PhpStorm.
 * User: wsst17
 * Date: 04.07.16
 * Time: 10:49
 */

namespace common\widgets;


use yii\bootstrap\Widget;

class CategoryTab extends Widget
{

    public $product;

    public function run()
    {
        return $this->render('tab_category');
    }
}