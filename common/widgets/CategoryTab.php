<?php


namespace common\widgets;


use backend\models\Category;
use backend\models\Product;
use yii\bootstrap\Widget;

class CategoryTab extends Widget
{
    public $category_id;
    public $categories;
    public $products;
    public $images;


    public function setData()
    {
        $this->categories = Category::find()->all();

        if($this->category_id != null) {
            $this->products = Product::findAll(['category_id' => $this->category_id]);
        }elseif($this->category_id == null)
        {
            $category = $this->categories[0];
            $this->products = Product::findAll(['category_id' => $category['id']]);
        }

        foreach ($this->products as $product)
        {
            $this->images[$product->id] = $product->getMainImage();
        }
    }

    public function run()
    {
        $this->setData();
            return $this->render('tab_category', [
                'categories' => $this->categories,
                'products' => $this->products,
                'images' => $this->images,
                'category_id' => $this->category_id,
            ]);

    }
}