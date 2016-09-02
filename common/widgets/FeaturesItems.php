<?php

namespace common\widgets;


use backend\models\Image;
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

    public $category_id;

    public $section_id;

    public $brand_id;


    /**
     * 
     */
    public function init()
    {
        $this->setData($this->category_id, $this->section_id, $this->brand_id);
        $this->pagination();
    }

    public function setData($category_id, $section_id, $brand_id)
    {

        if($section_id != null) {
           $this->getData(['section_id' => $section_id]);
        }elseif ($brand_id != null){
            $this->getData(['brand_id' => $brand_id]);
        }elseif ($category_id != null){
            $this->getData(['category_id' => $category_id]);
        }else{
            $this->getData();
        }


    }

    private function getData($condition = null)
    {
        $this->products = Product::find()->where($condition)->orderBy(['time_stamp' => SORT_DESC]);
    }

    public function pagination()
    {
        $this->pages = new Pagination(['totalCount' => $this->products->count(), 'pageSize' => static::PAGE_SIZE]);
        //$this->pages->pageSizeParam = false;
        $this->model = $this->products->offset($this->pages->offset)->limit($this->pages->limit)->all();
        foreach ($this->model as $product)
        {
            $this->images[$product['id']] = Image::findAll(['product_id' => $product['id'], 'description' => 0]);
        }
    }

    public function run()
    {

        return $this->render('features_items',[
            'products' => array_reverse($this->model),
            'pages' => $this->pages,
            'images' => $this->images,
            
        ]);
    }


}