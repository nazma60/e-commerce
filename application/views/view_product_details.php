<?php if ($this->session->flashdata('message')) { ?>
    <div class="alert alert-warning">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
<?php } ?>

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
                                    <li><a href="<?php echo base_url('brand_items/view/' . $brand->id) ?>"> <span
                                                class="pull-right"><?php echo $c; ?></span><?php echo ucwords($brand->name) ?>
                                        </a></li>
                                    <?php $c = 0;
                                } ?>

                            </ul>
                        </div>
                    </div>

                    <div class="shipping text-center"><!--shipping-->
                        <img src="<?php echo base_url('images/home/gallery3.jpg') ?>" alt=""/>
                    </div>
                    <!--/shipping-->

                </div>
            </div>

            <div class="content">
                <div class="container">
                    <div class="single">
                        <div class="col-md-9">
                            <div class="single_grid">
                                <div class="grid images_3_of_2">
                                    <ul id="etalage">
                                        <?php foreach ($image_item as $image) {
                                            if ($image['product_id'] == $items->id) {
                                                ?>
                                                <li>
                                                    <a href="optionallink.html">
                                                        <img class="etalage_thumb_image img-responsive"
                                                             src="<?php echo base_url() . 'images/' . $image['image'] ?>"
                                                             alt="">
                                                        <img class="etalage_source_image img-responsive"
                                                             src="<?php echo base_url() . 'images/' . $image['image'] ?>"
                                                             alt="">
                                                    </a>
                                                </li>
                                            <?php }
                                        } ?>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <!---->
                                <div class="span1_of_1_des">
                                    <div class="desc1">
                                        <h2 class="title"><?php echo ucwords($items->name); ?> </h2>

                                        <p><?php echo $items->description; ?></p>
                                        <?php echo form_open('shopping/add');?>
                                        <select name="color_size">
                                        <?php foreach($color_items as $color){?>
                                            <option value="<?php echo $color['color'].'/'.$color['size']?>">
                                                <strong>Color : </strong><?php echo ucwords($color['color'])?><?php echo str_repeat('&nbsp;', 5); ?><strong>Size : </strong><?php echo ucwords($color['size'])?>
                                                </option>
                                       <?php }?>
                                            </select>

                                        <div class="available">
                                            <!--<div class="form-in">-->
                                            <!-- <a href="#" class="btn btn-primary">Add To Cart</a>-->
                                            <div class="form-in">
                                                <?php
                                                echo form_hidden('id', $items->id);
                                                if(isset($user_id)){
                                                    $user_id=$user_id;
                                                }else{
                                                    $user_id='';
                                                }
                                                echo form_hidden('user_id', $user_id);
                                                echo form_hidden('name', $items->name);
                                                echo form_hidden('price', $items->price);
                                                echo form_hidden('cover_image', $items->cover_image);
                                                ?>
                                                <div id='add_button'>
                                                    <button type="submit" class="btn btn- default add-to-cart"
                                                            value="Add to Cart" name="action">
                                                        <i class="fa fa-shopping-cart"></i>Add to Cart
                                                    </button>
                                                    <?php
                                                    echo form_close();
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div> <?php echo form_open('single_product/addtowishlist') ?>
                                        <input type="hidden" name="productname"  value="<?php echo ucwords($items->name);?>" readonly
                                            >
                                        <input type="hidden" name="user_id"  value="<?php echo $user_id ?>" readonly
                                            >
                                        <input type="hidden" name="id"
                                               value="<?php echo $items->id;?>" readonly>

                                        <input type="hidden" name="price"
                                               value="<?php echo $items->price;?>" readonly>
                                    </div>
                                    <br>  <button class="btn btn-default cart "><i class="fa fa-star"> Add to Wishlist</i></button>

                                    <div class="share-desc">
                                            <div class="share">
                                                <h4>Share Product :</h4>
                                                <ul class="share_nav">
                                                    <li><a href="#"><img
                                                                src="<?php echo base_url(); ?>images/icons/facebook.png"
                                                                title="facebook"></a></li>
                                                    <li><a href="#"><img
                                                                src="<?php echo base_url(); ?>images/icons/twitter.png"
                                                                title="Twiiter"></a></li>
                                                    <li><a href="#"><img
                                                                src="<?php echo base_url(); ?>images/icons/rss.png"
                                                                title="Rss"></a></li>
                                                    <li><a href="#"><img
                                                                src="<?php echo base_url(); ?>images/icons/gpluse.png"
                                                                title="Google+"></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <a href="<?php echo base_url('single_product/wishlist/'.$items->id)?>"
                               class="btn btn-default cart"><i class="fa fa-pencil">
                                    Add to Wishlist</i></a>
                            <div class="col-sm-12">
                                <a href="<?php echo base_url('single_product/mywishlist/')?>"
                                   class="btn btn-default cart"><i class="fa fa-list">
                                        My Wishlists</i></a>
                            <!----- tabs-box ---->
                            <div class="category-tab shop-details-tab"><!--category-tab-->
                                <div class="col-sm-12">
                                    <ul class="nav nav-tabs">
                                        <li><a href="#details" data-toggle="tab">Details</a></li>
                                        <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                                        <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="details">
                                        <div class="col-sm-12">
                                            <p><?php echo $items->description; ?></p>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="companyprofile">
                                        <div class="col-sm-12">
                                            <p>

                                            <h3><?php echo $brands_details['name']; ?></h3></p>
                                            <p><?php echo $brands_details['description']; ?></p>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade active in" id="reviews">
                                        <div class="col-sm-12">
                                            <?php foreach ($review as $rev) { ?>
                                                <?php foreach ($users as $user) {
                                                    if ($rev['user_id'] == $user['user_id']) { ?>
                                                        <ul>
                                                            <li><a href=""><i
                                                                        class="fa fa-user"></i><?php echo ucwords($user['name']); ?>
                                                                </a></li>
                                                            <!--<li><a href=""><i
                                                                        class="fa fa-clock-o"></i><?php /*echo $rev['time']; */ ?>
                                                                </a></li>-->
                                                            <li><a href=""><i
                                                                        class="fa fa-calendar-o"></i><?php echo $rev['date']; ?>
                                                                </a></li>
                                                        </ul>
                                                        <p><?php echo $rev['review']; ?></p>

                                                        <?php
                                                        if (strpos($rev['rating'], ".") !== false) {
                                                            ?>
                                                            <span class="pull-right">
                                                            <?php for ($i = 0; $i < $rev['rating'] - .5; $i++) { ?>
                                                                <img
                                                                    src="<?php echo base_url('images/icons/fullstar.png') ?>"
                                                                    style="width:15px;height:15px;">
                                                            <?php } ?>
                                                                <img
                                                                    src="<?php echo base_url('images/icons/halfstar.png') ?>"
                                                                    style="width:15px;height:15px;">
                                                                </span>
                                                        <?php } else { ?>
                                                            <span class="pull-right">
                                                        <?php for ($i = 0; $i < $rev['rating']; $i++) { ?>
                                                            <img
                                                                src="<?php echo base_url('images/icons/fullstar.png') ?>"
                                                                style="width:15px;height:15px;">
                                                        <?php } ?>
                                                </span>
                                                        <?php }
                                                    }
                                                }
                                            }?>

                                            <p><b>Write Your Review</b></p>


                                            <?php echo form_open('single_product/review_product/' . $items->id) ?>
                                            <!--    <form id="main-contact-form" class="contact-form row" name="billing" method="post" action="
                                                <?php /*echo base_url() . 'single_product/review_product/'.$items->id */ ?>">-->

                                            <?php echo form_hidden('user_id', $user_id); ?>
                                            <?php if ($useremail!=NULL)foreach($useremail as $email)echo form_hidden('email', $email['email']); ?>





                                        <!--    <span>
                                                <input type="text" name="username" required="required"
                                                       placeholder="Name"/>

                                                <input type="email" name="user_email" required="required"
                                                       placeholder="E-mail"/>

										</span>-->


                                            <textarea name="textreview"></textarea>

                                            <br>
                                            <?php /*echo form_error('textreview'); */ ?><!--<textarea name="textreview" ></textarea>-->
                                            <b>Rating:
                                                <br>
                                                <center>
                                                    <fieldset class="rating">
                                                        <input type="radio" id="star5" name="rating"
                                                               value="5"/><label class="full" for="star5"
                                                                                 title="Awesome - 5 stars"></label>
                                                        <input type="radio" id="star4half" name="rating"
                                                               value="4.5"/><label class="half"
                                                                                   for="star4half"
                                                                                   title="Pretty good - 4.5 stars"></label>
                                                        <input type="radio" id="star4" name="rating"
                                                               value="4"/><label class="full" for="star4"
                                                                                 title="Very Good - 4 stars"></label>
                                                        <input type="radio" id="star3half" name="rating"
                                                               value="3.5"/><label class="half"
                                                                                   for="star3half"
                                                                                   title="Very Good- 3.5 stars"></label>
                                                        <input type="radio" id="star3" name="rating"
                                                               value="3"/><label class="full" for="star3"
                                                                                 title="Good - 3 stars"></label>
                                                        <input type="radio" id="star2half" name="rating"
                                                               value="2.5"/><label class="half"
                                                                                   for="star2half"
                                                                                   title="Good - 2.5 stars"></label>
                                                        <input type="radio" id="star2" name="rating"
                                                               value="2"/><label class="full" for="star2"
                                                                                 title="Fair - 2 stars"></label>
                                                        <input type="radio" id="star1half" name="rating"
                                                               value="1.5"/><label class="half"
                                                                                   for="star1half"
                                                                                   title="Fair - 1.5 stars"></label>
                                                        <input type="radio" id="star1" name="rating"
                                                               value="1"/><label class="full" for="star1"
                                                                                 title="Poor - 1 star"></label>
                                                        <input type="radio" id="starhalf" name="rating"
                                                               value="0.5"/><label class="half"
                                                                                   for="starhalf"
                                                                                   title="Worst - 0.5 stars"></label>
                                                    </fieldset>
                                                </center>
                                                <br>
                                                <br>

                                                <div class="btn-group btn-group-lg">
                                                    <button class="btn btn-default pull-right ">Submit</button>
                                                    <?php echo form_close(); ?>
                                                </div>
                                        </div>

                                    </div>
                                </div>
                                <!--/category-tab-->
                            </div>
                            <!---->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo base_url(); ?>images/home/recommend1.jpg" alt=""/>

                                                <h2>$56</h2>

                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo base_url(); ?>images/home/recommend2.jpg" alt=""/>

                                                <h2>$56</h2>

                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo base_url(); ?>images/home/recommend3.jpg" alt=""/>

                                                <h2>$56</h2>

                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
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
                                                <img src="<?php echo base_url(); ?>images/home/recommend1.jpg" alt=""/>

                                                <h2>$56</h2>

                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo base_url(); ?>images/home/recommend2.jpg" alt=""/>

                                                <h2>$56</h2>

                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo base_url(); ?>images/home/recommend3.jpg" alt=""/>

                                                <h2>$56</h2>

                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
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
    </div>
</section>
