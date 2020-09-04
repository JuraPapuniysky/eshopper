<?php


namespace common\widgets;


use yii\bootstrap\Widget;

class Comment extends Widget
{
    public $comment;

    public function run()
    {
        return $this->render('comment', [
           'comment' => $this->comment,
        ]);
    }
}