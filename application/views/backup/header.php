<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title; ?></title>
    <!--<link rel="stylesheet" href="<?php /*echo base_url('css/font-awesome/css/font-awesome.min.css') */?>">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="<?php echo base_url('css/star.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/user/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/user/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/user/prettyPhoto.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/user/price-range.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/user/animate.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/user/main.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/user/responsive.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/details/etalage.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/details/owl.carousel.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/details/style.css') ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('js/user/html5shiv.js')?>"></script>
    <script src="<?php echo base_url('js/user/respond.min.js')?>"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo base_url('images/icons/favicon.ico') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?php echo base_url('images/icons/apple-touch-icon-144-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="<?php echo base_url('images/icons/apple-touch-icon-114-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="<?php echo base_url('images/icons/apple-touch-icon-72-precomposed.png"') ?>">
    <link rel="apple-touch-icon-precomposed"
          href="<?php echo base_url('images/icons/apple-touch-icon-57-precomposed.png') ?>">
</head>
<!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +977 01 5555236</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@voguish-villa.com</a></li>
                            <li><a href="#"><i class="fa fa-hand-peace-o"></i>
                            <?php if ($logged_in == "yes") {
                                  echo ("Welcome ") . ucwords($name);
                            } else echo '';?>
                               </a> </li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<?php echo base_url('homepage_controller');?>"><img src="<?php echo base_url('images/home/logo.png')?>" alt=""/></a>
                    </div>
                    <!-- <div class="btn-group pull-right">
                         <div class="btn-group">
                             <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                 USA
                                 <span class="caret"></span>
                             </button>
                             <ul class="dropdown-menu">
                                 <li><a href="#">Canada</a></li>
                                 <li><a href="#">UK</a></li>
                             </ul>
                         </div>

                         <div class="btn-group">
                             <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                 DOLLAR
                                 <span class="caret"></span>
                             </button>
                             <ul class="dropdown-menu">
                                 <li><a href="#">Canadian Dollar</a></li>
                                 <li><a href="#">Pound</a></li>
                             </ul>
                         </div>
                     </div><-->
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="<?php echo base_url('shopping/display_cart') ?>"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <?php if ($logged_in == "yes") { ?>
                                <li><a href="<?php echo base_url('user/login_manager/logout') ?>"><i
                                            class="fa fa-unlock"></i> LogOut</a></li>
                            <?php } else { ?>
                                <li><a href="<?php echo base_url('user/login_manager') ?>"><i class="fa fa-lock"></i>Login</a>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->


    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?php echo base_url('homepage_controller') ?>" class="active">Home</a></li>
                            <li><a href="<?php echo base_url('shopping') ?>" class="active">Shopping</a></li>
                            <?php foreach ($data as $category) { ?>
                                <?php if ($category['parent_id'] == 0) { ?>
                                    <li class="dropdown"><a
                                            href="<?php echo base_url('category_controller/parent_menu/'.$category['id'])?>"><?php echo ucwords($category['name']); ?>
                                            <i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <?php foreach ($data as $sub) { ?>
                                                <?php if ($sub['parent_id'] == $category['id']) { ?>
                                                    <li><a href="<?php echo base_url('category_controller/child_menu/'.$category['id'])?>"><?php echo ucwords($sub['name']); ?></a></li>

                                                <?php
                                                }
                                            } ?>
                                        </ul>
                                    </li>
                                <?php }
                            } ?>

                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->

</header>
<!--/header-->

