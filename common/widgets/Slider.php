<?php

namespace common\widgets;

use yii\bootstrap\Widget;

class Slider extends Widget
{
    public function run()
    {
       return $this->render('/widgets/slider');
    }
}