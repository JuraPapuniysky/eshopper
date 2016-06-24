<?php

namespace common\widgets;

use yii\bootstrap\Widget;

class Category extends Widget
{
    public function run()
    {
        $this->render('/widgets/category');
    }
}