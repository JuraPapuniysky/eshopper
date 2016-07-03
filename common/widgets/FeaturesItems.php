<?php
/**
 * Created by PhpStorm.
 * User: wsst17
 * Date: 02.07.16
 * Time: 12:24
 */

namespace common\widgets;


use yii\bootstrap\Widget;

class FeaturesItems extends Widget
{

    public $products;
    public $images;
   
    public function run()
    {
        
        return $this->render('features_items',[
            'products' => $this->products,
            'images' => $this->images,
        ]);
    }


}