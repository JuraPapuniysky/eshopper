<?php

namespace common\widgets;

use backend\models\Brand;
use yii\bootstrap\Widget;

class Category extends Widget
{

    public function getWidgetData()
    {
        $dataWidget = [];

        foreach(\backend\models\Category::find()->all() as $category)
        {
            $dataWidget[$category['name']] = [
                'category' => $category,
                'brands' => Brand::find()->where(['category_id' => $category['id']])->all(),
            ];
        }
        return $dataWidget;
    }


    public function run()
    {
        return $this->render('/widgets/category',[
            'data' => $this->getWidgetData(),
            ]);
    }
}