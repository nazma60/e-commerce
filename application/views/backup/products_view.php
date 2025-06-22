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
                        <img src="images/home/gallery3.jpg" alt=""/>
                    </div>
                    <!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Featured Items</h2>

                    <?php foreach ($image_item as $images) { ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo base_url('images/' . $images['image']) ?>" alt=""/>
                                        <?php foreach ($product as $items){
                                        if ($items['id'] == $images['product_id']){
                                        ?>
                                        <p><?php echo ucwords($items['name']);?></p>

                                        <h2>NRs.<?php echo $items['price'];?></h2>
                                        <h4>Description:</h4>

                                        <p> <?php echo $items['description'];?></p>
                                        <?php

                                        // Create form and send values in 'shopping/add' function.
                                        echo form_open('shopping/add');

                                        echo form_hidden('id', $items['id']);
                                        echo form_hidden('user_id', $user_id);
                                        echo form_hidden('name', $items['name']);
                                        echo form_hidden('cover_image', $items['cover_image']);
                                        echo form_hidden('price', $items['price']);
                                        ?>
                                        <div id='add_button'>
                                            <?php
                                            $btn = array(
                                                'class' => 'btn btn- default add-to-cart',
                                                'value' => 'Add to Cart',
                                                'name' => 'action'
                                            );

                                            // Submit Button.
                                            echo form_submit($btn);
                                            echo form_close();
                                            ?>
                                        </div>

                                    </div>
                                    <!-- <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>NRs.<?php echo $items['price'];?></h2>

                                            <p><?php echo ucwords($items['name']);?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add
                                                to cart</a>
                                            <a href="<?php echo base_url('product_details/details/' . $items['id'])?>">View details</a>
                                        </div>
                                    </div> -->
                                </div>
                                <?php }
                                } ?>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
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
                                                <img src="images/home/recommend1.jpg" alt=""/>

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
                                                <img src="images/home/recommend2.jpg" alt=""/>

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
                                                <img src="images/home/recommend3.jpg" alt=""/>

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
                                                <img src="images/home/recommend1.jpg" alt=""/>

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
                                                <img src="images/home/recommend2.jpg" alt=""/>

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
                                                <img src="images/home/recommend3.jpg" alt=""/>

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
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>