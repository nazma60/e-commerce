<html>
<head>
    <title>Login </title>
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/admin_style.css') ?>">
</head>
<body>

<div id="page-wrapper" style="border-right: 1px solid #e7e7e7; margin: 0 250px 0 250px; position: inherit;">

    <?php if ($this->session->flashdata('message')) { ?>
        <div class="alert alert-warning">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">LOGIN</h1>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><b>You have an account. SIGN IN </b></div>
            <div class="panel-body">
                <div class="row ">
                    <?php echo form_open('admin/login_manager/sign_in') ?>
                    <div class="input-group input-group-lg">
                        <span>Username: </span>
                        <input type="text" class="form-control" value="" name="username">

                        <div class="error"><?php echo form_error('username'); ?></div>
                    </div>
                    <div class=" input-group input-group-lg">
                        <span>Password: </span>
                        <input type="password" class="form-control" value="" name="password">

                        <div class="error"><?php echo form_error('password'); ?></div>
                    </div>
                    <button class="btn btn-primary"><b> SIGN IN</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('jquery/js.js') ?>"></script>
<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js') ?>"></script>

</body>
</html>

