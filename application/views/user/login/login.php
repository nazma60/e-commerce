<?php if ($this->session->flashdata('message')) { ?>
    <div class="alert alert-warning">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
<?php } ?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <?php echo form_open('user/login_manager/sign_in') ?>
                    <input type="text" placeholder="Name" name="name"/>

                    <div class="error"><?php echo form_error('name'); ?></div>

                    <input type="password" placeholder="password" name="password"/>

                    <div class="error"><?php echo form_error('password'); ?></div>

                    <input type="email" placeholder="Email Address" name="email"/>

                    <div class="error"><?php echo form_error('email'); ?></div>

							<span>
								<input type="checkbox" class="checkbox" name="status" value="1"/>
								Keep me signed in
							</span>
                    <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <?php echo form_open('user/login_manager/sign_up') ?>
                    <div class="col-lg-12">
                        <input type="text" placeholder="Name" name="name"/>

                        <div class="error"><?php echo form_error('name'); ?></div>

                        <input type="password" placeholder="Password" name="password"/>

                        <div class="error"><?php echo form_error('password'); ?></div>

                        <input type="email" placeholder="Email Address" name="email"/>
                        <div class="error"><?php echo form_error('email'); ?></div>

                        <input type="text" placeholder="Address" name="address"/>

                        <div class="error"><?php echo form_error('address'); ?></div>

                        <input type="text" placeholder="Phone Number" name="number"/>

                        <div class="error"><?php echo form_error('number'); ?></div>

                        <div class="col-sm-2">
                            <span>Male</span>
                            <input type="radio" name="gender" value="male"/>
                        </div>

                        <div class="col-sm-2">
                            <span> Female </span>
                            <input type="radio" name="gender" value="female"/>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->