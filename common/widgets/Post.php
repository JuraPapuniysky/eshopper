<?php



namespace common\widgets;



use yii\bootstrap\Widget;

/**
 * Description of Post
 *
 * @author wsst17
 */
class Post extends Widget{

    public $post;

   
    
    public function run()
    {
        return $this->render('post', [
            'post' => $this->post,
        ]);
    }
}
