<?php
$grand_total = 0;
// Calculate grand total.
if ($cart):
    foreach ($cart as $item):
        $grand_total = $grand_total + $item['subtotal'];
    endforeach;
endif;
?>

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">BILLING <strong> INFO </strong></h2>
                <br>
                <br> <br> <br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Confirm Details </h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="billing" method="post" action="<?php echo base_url() . 'shopping/save_order' ?>">

                        <?php echo form_hidden('user_id', $user_id); ?>
                        <?php echo form_hidden('sum', $grand_total); ?>
                        <input type="hidden" name="command"/>

                        <div class="form-group col-md-12">
                            <h3> <span>Order Total:</span>
                            <span><strong>NRs. <?php echo number_format($grand_total, 2); ?></strong></span></h3>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="city" class="form-control" required="required" placeholder="City">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="town" class="form-control" required="required" placeholder="Town">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="postalcode" class="form-control" required="required" placeholder="Postal Code">
                        </div>
                        <div class="form-group col-md-12">
                            <input name="addressdetail" required="required" class="form-control" rows="8" placeholder="Address Details">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="email" name="email" class="form-control" required="required" placeholder="E-mail">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="phone" class="form-control" required="required" placeholder="Phone Number">
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            // This button for redirect main page.
                            echo "<a class ='btn btn-primary pull-left' id='back' href=" . base_url() . "shopping/display_cart>Back</a>"; ?>
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Confirm Details">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>Voguish-villa</p>
                        <p>Jhamsikhel, Pulchowk, Lalitpur</p>
                        <p>Lalitpur, Nepal</p>
                        <p>Mobile: +977 9849832114</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: info@voguish-villa.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/#billing page-->

<!--<section>
<?php /*// Create form for enter user imformation and send values 'shopping/save_order' function*/?>
<form name="" method="post" action="<?php /*echo base_url() . 'shopping/save_order' */?>">
    <?php /*echo form_hidden('user_id', $user_id); */?>
    <?php /*echo form_hidden('sum', $grand_total); */?>

    <input type="hidden" name="command"/>

    <div id="bill_info" class="col-sm-8">billing
            <h2 class="title text-center">Billing Info</h2>
                <div class="form-group col-md-12">
                        <span>Order Total:</span>
                        <span><strong>NRs. <?php /*echo number_format($grand_total, 2); */?></strong></span>
                </div>
                <div class="form-group col-md-12">
                        <span>Your Name:</span>
                        <input type="text" class="form-control" placeholder="Enter your name ..." name="name"
                                   required=""/>

                </div>

                <div class="form-group col-md-12">
                        <span>City:</span>
                        <input type="text" class="form-control" placeholder="Enter your city ..." name="city"
                                   required=""/>
                </div>
                <div class="form-group col-md-12">
                        <span>Town:</span>
                        <input type="text" class="form-control" placeholder="Enter your town ..." name="town"
                                   required=""/>
                </div>
                <div class="form-group col-md-12">
                        <span>Postal Code:</span>
                        <input type="text" class="form-control" placeholder="Enter your postal address ..."
                                   name="postalcode"
                                   required=""/>
                </div>
                <div class="form-group col-md-12">
                        <span>Address detail:</span>
                        <input type="text" class="form-control"
                                   placeholder="Enter your shipping address in detail ..."
                                   name="addressdetail" required=""/>
                </div>
                <div class="form-group col-md-12">
                        <span>Phone:</span>
                        <input class="form-control" type="text" name="phone" required=""/></span>
                </div>

                <div class="form-group col-md-12">
                    <?php
/*                    // This button for redirect main page.
                    echo "<a class ='btn btn-default' id='back' href=" . base_url() . "shopping>Back</a>"; */?>
                    <input type="submit" class='btn btn-default' value="Confirm details"/>
                </div>

        </div>
</form>
</section>


-->