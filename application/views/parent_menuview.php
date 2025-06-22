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
                                                        <li><a href="<?php echo base_url('category_controller/child_menu/'.$sub['id'])?>"><?php echo $sub['name']; ?> </a></li>
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
                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>

                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?php $c = 0;
                                foreach ($brands as $brand) {
                                    foreach ($product as $item) {
                                        if ($brand->id == $item['brand_id']) {
                                            $c++;
                                        }
                                    } ?>
                                    <li><a href="<?php echo base_url('brand_items/view/'.$brand->id)?>"> <span
                                                class="pull-right"><?php echo $c; ?></span><?php echo ucwords($brand->name) ?>
                                        </a></li>
                                    <?php $c = 0;
                                } ?>

                            </ul>
                        </div>
                    </div>
                    <!--/brands_products-->


                    <div class="shipping text-center"><!--shipping-->
                        <img src="<?php echo base_url('images/home/gallery3.jpg') ?>" alt=""/>
                    </div>
                    <!--/shipping-->

                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <h2 class="title text-center"><?php echo ucwords($cat_list['name']); ?></h2>
                <?php foreach ($categories as $category) { ?>
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center"><?php echo ucwords($category['name']); ?></h2>

                            <?php foreach ($product as $item) {
                                if ($category['id'] == $item['cat_id']) {
                                    ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">

                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo base_url('images/' . $item['cover_image']); ?>"
                                                         style="height:270px; width:250px; alt=""/>

                                                    <h2>NRs. <?php echo $item['price']; ?></h2>

                                                    <p><?php echo $item['name']; ?></p>
                                                    <a href="<?php echo base_url('single_product/details/' . $item['id']) ?>"
                                                       class="btn btn-default add-to-cart"><i class="fa fa-plus-square"></i>View
                                                        Details
                                                    </a>
                                                    <!--?php
/*                                                    echo form_open('shopping/add');

                                                    echo form_hidden('id', $item['id']);
                                                    echo form_hidden('user_id', $user_id);
                                                    echo form_hidden('name', $item['name']);
                                                    echo form_hidden('price', $item['price']);
                                                    echo form_hidden('cover_image', $item['cover_image']);
                                                    */?><!--
                                                    <div id='add_button'>
                                                        <button type="submit" class="btn btn- default add-to-cart"
                                                                value="Add to Cart" name="action">
                                                            <i class="fa fa-shopping-cart"></i>Add to Cart
                                                        </button>
                                                        --><!--?php
/*                                                        echo form_close();
                                                        */?-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to
                                                            wishlist</a></li>

                                                </ul>
                                            </div>
                                        </div>


                                <?php }
                            }
                            ?>
                        </div>
                    <br>
                <?php } ?>

                <!-- <ul class="pagination">
                     <li class="active"><a href="">1</a></li>
                     <li><a href="">2</a></li>
                     <li><a href="">3</a></li>
                     <li><a href="">&raquo;</a></li>
                 </ul>-->
            </div>
        </div>
    </div>
</section>

