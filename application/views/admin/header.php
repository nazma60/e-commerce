<html>
<head>

    <title></title>
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('bootstrap/font-awesome/css/font-awesome.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/zabuto_calendar.css') ?>">
    <!--<link rel="stylesheet" type="text/css" href="<?php /*echo base_url('css/gritter/css/jquery.gritter.css')*/ ?>"/>-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/lineicons/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('fancybox/jquery.fancybox.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('fancybox/helpers/jquery.fancybox-buttons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('fancybox/helpers/jquery.fancybox-thumbs.css') ?>">
    <!--external css-->
    <link rel="stylesheet" href="<?php echo base_url('css/admin_style.css') ?>">
    <link href="<?php echo base_url('css/style-responsive.css" rel="stylesheet') ?>">

    <link href="<?php echo base_url('css/admin/dist/css/AdminLTE.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('css/admin/plugins/datatables/dataTables.bootstrap.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/jquery-ui/jquery-ui.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/jquery-ui/jquery.ui.theme.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/jquery-ui/jquery.ui.theme.font-awesome.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/elfinder/css/elfinder.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/elfinder/css/theme.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Custom styles for this template -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body>

<section id="container">

    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>

        <a href="<?php echo base_url('admin/category_manager') ?>" class="logo"><b>Voguish Villa</b></a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url('images/default-user.png') ?>" class="user-image" alt="<?php echo $name; ?>" width="160" height="160"/>
                        <span class="hidden-xs"><?php echo $name; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="<?php echo base_url('images/default-user.png') ?>" class="img-circle" alt="<?php echo $name; ?>" />
                            <p>
                                <?php echo $name;?> - Administrator
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?php echo base_url('admin/login_manager/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>


    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="#"><!--<img src="img/ui-sam.jpg" class="img-circle" width="60">--></a>
                </p>
                <h5 class="centered"><?php echo strtoupper($name);?></h5>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url('admin/category_manager/cat_table') ?>">View category</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bus"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url('admin/product') ?>">View Product list</a></li>
                        <li><a href="<?php echo base_url('admin/brand_manager')?>">Product Brands</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-globe"></i>
                        <span>Orders</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url('admin/order_manager') ?>">Ordered Products</a></li>
                        <li><a href="<?php echo base_url('admin/order_manager/view_pending_products') ?>">Pending Products</a></li>
                        <li><a href="<?php echo base_url('admin/order_manager/view_shipped_products') ?>">Shipped Products</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>Components</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url('admin/image_manager') ?>">Gallery</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Forms</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url('admin/news_manager/add_form') ?>">ADD</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Extra Pages</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url('admin/setting_manager/view_subscriber/') ?>">Subscribers</a>
                        </li>
                        <li><a href="<?php echo base_url('admin/setting_manager/view_setting') ?>">Settings</a></li>
                    </ul>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
