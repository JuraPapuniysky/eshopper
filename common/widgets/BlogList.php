<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\widgets;

use yii\bootstrap\Widget;
use yii\data\Pagination;

/**
 * Description of BlogList
 *
 * @author wsst17
 */
class BlogList extends Widget{

    const PAGE_SIZE = 3;

    public $model;
    public $pages;
    
    public function init()
    {
        $this->pages = new Pagination(['totalCount' => $this->model->count(), 'pageSize' => static::PAGE_SIZE]);
        $this->pages->pageSizeParam = false;
        $this->model = $this->model->offset($this->pages->offset)->limit($this->pages->limit)->all();
    }

    public function run()
    {

        return $this->render('blog_list', [
            'model' => $this->model,
            'pages' => $this->pages,
        ]);
    }
}
