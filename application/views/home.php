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


                                <p>View men's collections!</p>
                                <a href="<?php echo base_url('category_controller/parent_menu/8') ?>">
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </a>

                            </div>
                            <div class="col-sm-6">
                                <img src="<?php echo base_url('images/home/girl1.jpg') ?>" class="girl img-responsive"
                                     alt=""/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1>Voguish-villa</h1>

                                <h2>Shop for the best products...</h2>

                                <p>View women's collection! </p>
                                <a href="<?php echo base_url('category_controller/parent_menu/23') ?>">
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </a>


                            </div>
                            <div class="col-sm-6">
                                <img src="<?php echo base_url('images/home/girl2.jpg') ?>" class="girl img-responsive"
                                     alt=""/>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1>Voguish-villa</h1>

                                <h2>Shop for the best products...</h2>

                                <p>View children's collection! </p>
                                <a href="<?php echo base_url('category_controller/parent_menu/6') ?>">
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <img src="<?php echo base_url('images/home/girl3.jpg') ?>" class="girl img-responsive"
                                     alt=""/>
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
                                                        <li>
                                                            <a href="<?php echo base_url('category_controller/child_menu/' . $sub['id']) ?>"><?php echo $sub['name']; ?> </a>
                                                        </li>
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
                    <?php /*define('DB_SERVER', 'localhost');
                    define('DB_USERNAME', 'root');
                    define('DB_PASSWORD', '');
                    define('DB_DATABASE', 'db_voguish-villa');
                    $connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

                    if($_POST)
                    {
                    mysqli_real_escape_string($connection,$_POST['amount']);
                    $values = str_replace(' ','',$_POST['amount']);
                    $values = str_replace('$','',$values);
                    $values = explode('-',$values);
                    $min = $values[0];
                    $max = $values[1];
                    $res = mysqli_query($connection,'select `id`,`name`,`price`, DATE_FORMAT(`date`,"%D %b-%Y") as `date` from tbl_product where `price` BETWEEN "'.$min.'" AND "'.$max.'"');

                        $count  =   mysqli_num_rows($res);
                    $HTML='';
                    if($count > 0)
                    {
                    while($row=mysqli_fetch_array($res))
                    {
                    $id         = $row['id'];
                    $name    = $row['name'];
                    $price      = $row['price'];
                    $date       = $row['date'];

                    $HTML .= '<div>';
                        $HTML .= 'Product ID: '.$id;
                        $HTML .= '<br />Product Name: '.ucwords($name);
                        $HTML .= '<br />Price: <strong>$'.$price.'</strong> Posted on: '.$date;
                        $HTML .= '</div><br /><hr />';
                    }
                    }
                    else
                    {
                    $HTML='No Data Found';
                    }
                    }
                    else
                    {
                    $min = 30;
                    $max = 1000;
                    $HTML='Search Products in range.';
                    }*/ ?>

                    <script type="text/javascript" src="<?php echo base_url('js/jquery-1.8.0.min.js') ?>"></script>
                    <link rel="stylesheet"
                          href="<?php echo base_url('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css') ?>"/>
                    <script src="<?php echo base_url('js/jquery-ui.js') ?>"></script>
                    <script type="text/javascript">
                        $(function () {
                            $("#slider-range").slider({
                                range: true,
                                min: 0,
                                max: 1000,
                                values: [<?php echo $min; ?>, <?php echo $max; ?>],
                                slide: function (event, ui) {
                                    $("#amount").val("NRs. " + ui.values[0] + " - NRs. " + ui.values[1]);
                                }
                            });
                            $("#amount").val("NRs. " + $("#slider-range").slider("values", 0) +
                            " - NRs. " + $("#slider-range").slider("values", 1));
                        });
                    </script>
                    <div class="price-range"><!--price-range-->
                        <form action="<?php echo base_url('price/submit'); ?>" method="post" id="products">
                            <h2><label for="amount">Price range</label></h2>

                            <div class="well text-center">

                                <input type="text" id="amount" name="amount" class="span2" data-slider-min="0"
                                       data-slider-max="60000"
                                       data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>
                                <b class="pull-left">NRs. 0</b> <b class="pull-right">NRs. 60000</b>
                                <br><br>

                                <div id="slider-range" style="width:80%;"></div>
                                <br><br>
                                <input type="submit" value=" Show products "/>
                                <!--<br><br>
                                --><?php /*echo $HTML; */ ?>
                            </div>
                        </form>
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
                    <!--/brands_products-->


                    <div class="shipping text-center"><!--shipping-->
                        <img src="<?php echo base_url('images/home/gallery3.jpg') ?>" alt=""/>
                    </div>
                    <!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Featured Items</h2>
                    <?php $a = 0;
                    foreach ($product as $items) { ?>
                        <?php
                        if ($items['featured'] == 'yes') {
                            $a++;
                            if ($a <= 6) {
                                ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo base_url('images/' . $items['cover_image']) ?>"
                                                     alt=""
                                                     style="height:270px; width:250px;"/>

                                                <h2>NRs.<?php echo $items['price']; ?></h2>

                                                <p><?php echo ucwords($items['name']); ?></p>
                                                <a href="<?php echo base_url('single_product/details/' . $items['id']) ?>"
                                                   class="btn btn-default add-to-cart"><i class="fa fa-plus-square"></i>View
                                                    Details
                                                </a>

                                            </div>

                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a>
                                                </li>
                                        </div>
                                        </ul>

                                    </div>
                                </div>
                            <?php }
                        }
                    } ?>
                </div>
                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <?php foreach ($data as $category) {
                                if ($category['parent_id'] == 0) {

                                    if ($category['name'] == "Children") {
                                        ?>
                                        <li ><a href="#<?php echo $category['id']; ?>"
                                                              data-toggle="tab"><?php echo $category['name']; ?></a>
                                        </li>
<!--print_r($category);die;-->
                                    <?php }else ?>
                                        <li><a href="#<?php echo $category['id']; ?>"
                                               data-toggle="tab"><?php echo $category['name']; ?></a></li>
                                    <?php }

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

                                <?php $count = 0;
                                foreach ($data as $sub_category) {
                                    if ($category['id'] == $sub_category['parent_id']) {
                                        foreach ($product as $item) {
                                            if ($item['cat_id'] == $sub_category['id']) {
                                                $count++;
                                                if ($count <= 8) {
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
                                                                    <a href="<?php echo base_url('single_product/details/' . $item['id']) ?>"
                                                                       class="btn btn-default add-to-cart"><i
                                                                            class="fa fa-plus-square"></i>View
                                                                        Details
                                                                    </a>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            }
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

                    <!--features_items--><?php if ($logged_in == "yes") {?>
                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">Recommendations for you</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <?php foreach ($recommended as $product_id) {
                                    foreach ($product as $prod) {
                                    if ($product_id == $prod['id']) {?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?php echo base_url('images/' . $prod['cover_image']) ?>"
                                                         alt=""
                                                         style="height:270px; width:250px;"/>

                                                    <h2>NRs.<?php echo $prod['price']; ?></h2>

                                                    <p><?php echo ucwords($prod['name']); ?></p>
                                                    <a href="<?php echo base_url('single_product/details/' . $prod['id']) ?>"
                                                       class="btn btn-default add-to-cart"><i class="fa fa-plus-square"></i>View
                                                        Details
                                                    </a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php } }}?>
                                </div>

                            </div><!--<a class="left recommended-item-control" href="#recommended-item-carousel"
                                     data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                               data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a></div>-->
                            <!--/recommended_items-->

                            <!--?php /*foreach ($recommended as $product_id) {
                                foreach ($product as $prod) {
                                    if ($product_id == $prod['id']) {
                                        echo "Product Name: " . $prod['name'];
                                    }
                                }
                                // echo($product_id);

                            }; */?-->
                    </div><?php }?>
                </div>
            </div>
</section>