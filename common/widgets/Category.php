<?php

namespace common\widgets;

use yii\bootstrap\Widget;

class Category extends Widget
{
    public function run()
    {
        return $this->render('/widgets/category');
    }
}