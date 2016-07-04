<?php

namespace common\widgets;


use backend\models\Product;
use yii\bootstrap\Widget;

class FeaturesItems extends Widget
{

    public $products;
   
   
    public function run()
    {
        
        return $this->render('features_items',[
            'products' => $this->products,
            
        ]);
    }


}