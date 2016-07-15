<?php


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
            if($this->data != null)
            {
                return true;
            }else{
                return false;
            }
        }
    }

    public function run()
    {
        if($this->setData()) {
            return $this->render('tab_category', [
                'data' => $this->data,
            ]);
        }
    }
}