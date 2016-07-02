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
    public $sql = "SELECT product.id, product.name, product.price, image.src
FROM product
INNER JOIN image ON product.id = image.product_id
WHERE image.description = 0";

    public function run()
    {
        return $this->render('features_items',[
            'products' => $this->products,
            'images' => $this->images,
        ]);
    }


}