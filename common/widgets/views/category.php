<?php
/* @var $data common/widgets/Category */
?>

<h2>Category</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->

    <?php foreach ($data as $dat){
        $category = $dat['category'];
        $brands = $dat['brands'];
        ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#<?= str_replace(' ', '_', $category['name'])?>">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    <?php echo $category['name']; ?>
                </a>
            </h4>
        </div>
        <div id="<?= str_replace(' ', '_', $category['name'])?>" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    <li><a href="#">All products of category</a></li>
                    <?php foreach($brands as $brand){ ?>
                    <li><a href="#"><?= $brand['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
<?php }?>
</div><!--/category-products-->



