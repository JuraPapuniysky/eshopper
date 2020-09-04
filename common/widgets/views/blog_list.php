<?php


/* @var $post common/models/Post */

use yii\widgets\LinkPager;
use yii\helpers\Html;
?>
<div class="blog-post-area">
    <h2 class="title text-center">Latest From our Blog</h2>
    <?php foreach ($model as $post){ ?>
    <div class="single-blog-post">
            <h3><?= $post->title ?></h3>
            <div class="post-meta">
                    <ul>
                            <li><i class="fa fa-user"></i><?= $post->getAuthor()->one()->username ?></li>
                            <li><i class="fa fa-clock-o"></i> <?= $post->getTime() ?></li>
                            <li><i class="fa fa-calendar"></i> <?= $post->getDate() ?></li>
                    </ul>

            </div>
            <a href="">
                    <img src="<?= $post->image ?>" alt="">
            </a>
            <p><?= $post->text_preview ?></p>
        <?= Html::a('Read More', ['/blog/default/post', 'id' => $post->id], ['class' => 'btn btn-primary']) ?>

    </div>
    <?php }?>
   </div>
    <br />
    <br />
    <?php echo LinkPager::widget([
        'pagination' => $pages,
    ]); ?>




