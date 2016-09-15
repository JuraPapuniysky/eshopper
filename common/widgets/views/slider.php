<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $i = 0; foreach ($model as $item){?>
                        <li data-target="#slider-carousel" data-slide-to="<?= $i ?>" <?php if($i == 0){echo 'class="active"';}?> ></li>
                        <?php $i++; } ?>
                    </ol>

                    <div class="carousel-inner">
                        <?php $i = 0; foreach ($model as $item) {
                        $title = $item->getTitle();
                        ?>
                        <?php if($i == 0){?>
                        <div class="item active">
                            <?php }else{ ?>
                            <div class="item">
                            <?php }?>
                            <div class="col-sm-6">
                                <h1><span><?= $title[0] ?></span>-<?= $title[1] ?></h1>
                                <h2><?= $item->subtitle ?></h2>
                                <p><?= $item->text ?></p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="<?= $item->getSliderImage()->src ?>" class="girl img-responsive" alt="" />
                                <img src="<?= $item->getSliderPricing()->src ?>"  class="pricing" alt="" />
                            </div>
                        </div>
                        <?php $i++; }?>
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->