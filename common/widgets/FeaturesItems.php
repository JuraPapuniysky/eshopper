<?php

namespace common\widgets;


use yii\bootstrap\Widget;
use yii\data\Pagination;

class FeaturesItems extends Widget
{
    const PAGE_SIZE = 18;

    public $products;

    public $pages;

    public $model;

    public function pagination()
    {
        $this->pages = new Pagination(['totalCount' => $this->products->count(), 'pageSize' => self::PAGE_SIZE]);
        $this->pages->pageSizeParam = false;
        $this->model = $this->products->offset($this->pages->offset)->limit($this->pages->limit)->all();
    }

    public function run()
    {
        $this->pagination();
        return $this->render('features_items',[
            'products' => $this->model,
            'pages' => $this->pages,
            
        ]);
    }


}