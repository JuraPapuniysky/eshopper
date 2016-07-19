<?php

namespace common\widgets;

use backend\models\Brand;
use backend\models\Product;
use yii\bootstrap\Widget;

class Brands extends Widget
{

    public function getDataWidget()
    {
        $dataWidget = [];
        foreach (Brand::find()->all() as $brand)
        {
            $dataWidget[$brand['name']] = [
                'id' => $brand['id'],
                'name' => $brand['name'],
                'count' => Product::find()->where(['brand_id' => $brand['id']])->count(),
            ];
        }
        return $dataWidget;
    }

    public function run()
    {
       return $this->render('brands', [
            'data' => $this->getDataWidget(),
       ]);
    }
}