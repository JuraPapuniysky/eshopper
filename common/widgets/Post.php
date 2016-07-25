<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\widgets;



use yii\bootstrap\Widget;

/**
 * Description of Post
 *
 * @author wsst17
 */
class Post extends Widget{

    public $model;
    
    public function run()
    {
        return $this->render('post');
    }
}
