<?php

namespace frontend\modules\blog\controllers;

use common\models\Comment;
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
        $post = Post::findOne(['id' => $id]);
        $comment = new Comment();
        if($comment->load(\Yii::$app->request->post()))
        {
            $comment->post_id = $id;
            if(!\Yii::$app->user->isGuest)
            {
                $comment->user_id = \Yii::$app->user->id;
            }
        }

        return $this->render('post', [
            'post' => $post,
            'comment' => $post->getComments()->all(),
            'comment_model' => $comment,
        ]);
    }
}
