
        <h2 class="title text-center"><?php echo ucwords($cat_list['name']); ?></h2>
        <?php foreach ($categories as $category) { ?>
        <div class="col-sm-9 padding-right">
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center"><?php echo ucwords($category['name']); ?></h2>

            <?php foreach ($product as $item) {
                if ($category['id'] == $item['cat_id']) {
                    foreach ($image_item as $image) {
                        if ($image['product_id'] == $item['id']) {
                            ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">

                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo base_url('images/' . $image['image']); ?> alt="" />
                                            <h2>NRs. <?php echo $item['price']; ?></h2>

                                            <p><?php echo $item['name']; ?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>NRs. <?php echo $item['price']; ?></h2>

                                                <p><?php echo $item['name']; ?></p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        <?php }
                    }
                }
            }
            ?>
            </div></div><br>
        <?php } ?>

        <ul class="pagination">
            <li class="active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">&raquo;</a></li>
        </ul>

