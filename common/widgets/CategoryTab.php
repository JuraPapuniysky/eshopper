<?php
/**
 * Created by PhpStorm.
 * User: wsst17
 * Date: 04.07.16
 * Time: 10:49
 */

namespace common\widgets;


use backend\models\Category;
use backend\models\Product;
use yii\bootstrap\Widget;

class CategoryTab extends Widget
{

    public $data;

   
    public function setData()
    {

        foreach( Category::find()->all() as $category)
        {
            $query = Product::getProductsImages();
            $this->data[$category['name']] = $query->andWhere(['product.category_id' => $category->id])->all();
        }
    }

    public function run()
    {
        $this->setData();
        return $this->render('tab_category',[
            'data' => $this->data,
        ]);
    }
}