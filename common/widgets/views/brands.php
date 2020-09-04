<?php
use yii\helpers\Html;
?>
<div class="brands_products"><!--brands_products-->
    <h2>Brands</h2>
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
            <?php foreach ($data as $brand){ ?>
                <li><a href="/site/index?brand_id=<?= $brand['id'] ?>"> <span class="pull-right">(<?= $brand['count'] ?>)</span><?= $brand['name'] ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div><!--/brands_products-->
