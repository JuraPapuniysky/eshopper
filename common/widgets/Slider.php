<?php

namespace common\widgets;

use yii\bootstrap\Widget;

class Slider extends Widget
{
    public $model;

    public function init()
    {
      $model = new \common\models\Slider();
      $this->model = $model->find()->where(['status' => \common\models\Slider::STATUS_ACTIVE])->all();
    }

    public function run()
    {
       return $this->render('slider', [
           'model' => $this->model,
       ]);
    }
}