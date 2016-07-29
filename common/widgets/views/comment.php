<?php

/* @var $item  \common\models\Comment */

?>


<div class="response-area">
    <h2><?= count($comment)?> RESPONSES</h2>
    <ul class="media-list">
        <?php foreach ($comment as $item){ ?>
        <li class="media">

            <a class="pull-left" href="#">
                <img class="media-object" src="" alt="">
            </a>
            <div class="media-body">
                <ul class="sinlge-post-meta">
                    <li><i class="fa fa-user"></i><?= $item->name ?></li>
                    <li><i class="fa fa-clock-o"></i><?= $item->getTime()?></li>
                    <li><i class="fa fa-calendar"></i><?= $item->getDate()?></li>
                </ul>
                <p><?= $item->text ?></p>

            </div>
        </li>
       <?php } ?>
       
    </ul>
</div><!--/Response-area-->
