<?php

/* @var $post \common\models\Post */
?>


<div class="blog-post-area">
    <h2 class="title text-center">Latest From our Blog</h2>
    <div class="single-blog-post">
        <h3><?= $post->title ?></h3>
        <div class="post-meta">
            <ul>
                <li><i class="fa fa-user"></i> <?= $post->author->username ?> </li>
                <li><i class="fa fa-clock-o"></i> <?= $post ->getTime() ?></li>
                <li><i class="fa fa-calendar"></i> <?= $post->getDate() ?> </li>
            </ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
        </div>
        <a href="">
            <img src="<?= $post->image ?>" alt="">
        </a>

        <?= $post->text ?>

        <div class="pager-area">
            <ul class="pager pull-right">
                <li><a href="#">Pre</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
    </div>
</div><!--/blog-post-area-->
