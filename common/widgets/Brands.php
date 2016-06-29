<?php

namespace common\widgets;

use yii\bootstrap\Widget;

class Brands extends Widget
{
    public function run()
    {
       return $this->render('/widgets/brands');
    }
}