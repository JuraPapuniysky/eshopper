<?php

namespace common\widgets;


use backend\models\Section;
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
                'sections' => Section::findAll(['category_id' => $category['id']]),
            ];
        }
        return $dataWidget;
    }


    public function run()
    {
        return $this->render('category',[
            'data' => $this->getWidgetData(),
            ]);
    }
}