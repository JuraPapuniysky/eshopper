<?php
/**
 * Created by PhpStorm.
 * User: wsst17
 * Date: 06.07.16
 * Time: 15:36
 */

namespace common\widgets;


use backend\models\OrderProduct;
use yii\bootstrap\Widget;

class RecomendedItems extends Widget
{

    public $model;


    public function init()
    {
        $this->model = new OrderProduct();
        $this->model = $this->model->getRecommendedProducts()->all();
    }

    

    public function run()
    {
        return $this->render('recomended_items', [
            'model' => $this->model,
        ]);
    }
}