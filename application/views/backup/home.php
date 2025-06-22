<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1>Voguish-villa</h1>

                                <h2>Shop for the best products...</h2>


                                <p>View men's collection! </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="<?php echo base_url('images/home/girl1.jpg') ?>" class="girl img-responsive"
                                     alt=""/>
                               <!-- <img src="<?php /*echo base_url('images/home/pricing.png') */?>" class="pricing" alt=""/>-->
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1>Voguish-villa</h1>

                                <h2>Shop for the best products...</h2>

                                <p>View women's collections!</p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="<?php echo base_url('images/home/girl2.jpg') ?>" class="girl img-responsive"
                                     alt=""/>
                                <!--<img src="<?php /*echo base_url('images/home/pricing.png') */?>" class="pricing" alt=""/>-->
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1>Voguish-villa</h1>

                                <h2>Shop for the best products...</h2>

                                <p>View children's collection! </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="<?php echo base_url('images/home/girl3.jpg') ?>" class="girl img-responsive"
                                     alt=""/>
                                <!--<img src="<?php /*echo base_url('images/home/pricing.png') */?>" class="pricing" alt=""/>-->
                            </div>
                        </div>

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

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>

                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($data as $key => $item) {
                            if ($item['parent_id'] == 0) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordian"
                                               href="#<?php echo $key ?>">
                                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                <?php echo $item['name']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="<?php echo $key ?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <?php foreach ($data as $sub) {
                                                    if ($sub['parent_id'] == $item['id']) {
                                                        ?>
                                                        <li><a href="#"><?php echo $sub['name']; ?> </a></li>
                                                    <?php }
                                                } ?>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            <?php }
                        } ?>
                    </div>

                    <!--/category-products-->


                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>

                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="60000"
                                   data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>
                            <b class="pull-left">NRs. 0</b> <b class="pull-right">NRs. 60000</b>
                        </div>
                    </div>
                    <!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="<?php echo base_url('images/home/gallery3.jpg') ?>" alt=""/>
                    </div>
                    <!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    <?php foreach ($product as $items) { ?>
                        <?php
                        if ($items['featured'] == 'yes') {
                            ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo base_url('images/' . $items['cover_image']) ?>" alt=""
                                                 style="height:270px; width:250px;"/>

                                            <h2>NRs.<?php echo $items['price']; ?></h2>

                                            <p><?php echo ucwords($items['name']); ?></p>
                                            <a href="<?php echo base_url('single_product/details/' . $items['id']) ?>"
                                               class="btn btn-default add-to-cart"><i class="fa fa-plus-square"></i>View
                                                Details
                                            </a>
                                        </div>
                                        <!--<div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>NRs.<?php /*echo $items['price'];*/
                                        ?></h2>

                                            <p><?php /*echo ucwords($items['name']);*/
                                        ?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add
                                                to cart</a>
                                            <a href="<?php /*echo base_url('single_product/details/'.$items['id'])*/
                                        ?>">View details</a>
                                        </div>
                                    </div>-->
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i>Add to cart</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <?php foreach ($data as $category) {
                                if ($category['parent_id'] == 0) {
                                    if ($category['name'] == "Children") {
                                        ?>
                                        <li class="active"><a href="#<?php echo $category['id']; ?>"
                                                              data-toggle="tab"><?php echo $category['name']; ?></a>
                                        </li>
                                    <?php } else {
                                        ?>
                                        <li><a href="#<?php echo $category['id']; ?>"
                                               data-toggle="tab"><?php echo $category['name']; ?></a></li>
                                    <?php }
                                }
                            } ?>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <?php foreach ($data as $category) {
                        if ($category['parent_id'] == 0) {
                        if ($category['name'] == "Children"){
                        ?>
                        <div class="tab-pane fade active in" id="<?php echo $category['id']; ?>">
                            <?php } else { ?>
                            <div class="tab-pane fade" id="<?php echo $category['id']; ?>">
                                <?php } ?>

                                <?php foreach ($data as $sub_category) {
                                    if ($category['id'] == $sub_category['parent_id']) {
                                        foreach ($product as $item) {
                                            if ($item['cat_id'] == $sub_category['id']) {
                                                ?>
                                                <div class="col-sm-3">
                                                    <div class="product-image-wrapper">
                                                        <div class="single-products">
                                                            <div class="productinfo text-center">
                                                                <img
                                                                    src="<?php echo base_url('images/' . $item['cover_image']) ?>"
                                                                    alt="" style="height:185px; width:165px;"/>

                                                                <h2>NRs.<?php echo $item['price']; ?></h2>

                                                                <p><?php echo ucwords($item['name']); ?></p>
                                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <!--/category-tab-->

                    <!--features_items-->
                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo base_url('images/home/recommend1.jpg') ?>"
                                                         alt=""/>

                                                    <h2>$56</h2>

                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo base_url('images/home/recommend2.jpg') ?>"
                                                         alt=""/>

                                                    <h2>$56</h2>

                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo base_url('images/home/recommend3.jpg') ?>"
                                                         alt=""/>

                                                    <h2>$56</h2>

                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo base_url('images/home/recommend1.jpg') ?>"
                                                         alt=""/>

                                                    <h2>$56</h2>

                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo base_url('images/home/recommend2.jpg') ?>"
                                                         alt=""/>

                                                    <h2>$56</h2>

                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo base_url('images/home/recommend3.jpg') ?>"
                                                         alt=""/>

                                                    <h2>$56</h2>

                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel"
                               data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                               data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
</section>