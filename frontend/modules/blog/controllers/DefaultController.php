<?php

namespace frontend\modules\blog\controllers;

use yii\web\Controller;
use common\models\Post;

/**
 * Default controller for the `blog` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'model' => Post::find()->orderBy(['create_at' => SORT_DESC]),
        ]);
    }

    public function actionPost($id)
    {
        $post = Post::findAll(['id' => $id]);


        return $this->render('post', [
            'post' => $post,
            //'comment' => $comment,
        ]);
    }
}
