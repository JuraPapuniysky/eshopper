<?php

namespace common\widgets;


use backend\models\Product;
use yii\bootstrap\Widget;
use yii\data\Pagination;

class FeaturesItems extends Widget
{
    const PAGE_SIZE = 18;

    public $products;

    public $pages;

    public $model;

    public $images;

    public $product_section;

    private $_count;

    public function setData($product_section)
    {
        if($product_section != null) {
            $this->products = Product::findAll(['section_id' => $product_section]);
            $this->_count - Product::find()->where(['section_id' => $product_section])->count();
        }else{
            $this->products = Product::find();
            $this->_count - Product::find()->count();
        }
        foreach ($this->products as $product)
        {
            $this->images[$product->id] = $product->getMainImage();
        }
    }

    public function pagination()
    {
        $this->pages = new Pagination(['totalCount' => $this->products->count(), 'pageSize' => self::PAGE_SIZE]);
        $this->pages->pageSizeParam = false;
        $this->model = $this->products->offset($this->pages->offset)->limit($this->pages->limit)->all();
    }

    public function run()
    {
        $this->setData($this->product_section);
        $this->pagination();
        return $this->render('features_items',[
            'products' => $this->model,
            'pages' => $this->pages,
            'images' => $this->images,
            
        ]);
    }


}