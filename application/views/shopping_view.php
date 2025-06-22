<script type="text/javascript">
    // To conform clear all data in cart.
    function clear_cart() {
        var result = confirm('Are you sure want to clear all bookings?');

        if (result) {
            window.location = "<?php echo base_url(); ?>shopping/remove/all";
        } else {
            return false; // cancel button
        }
    }

</script>

<?php if ($this->session->flashdata('message')) { ?>
    <div class="alert alert-warning">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
<?php } ?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><span><img src="<?php echo base_url('images/icons/cart_picture.png'); ?>"
                               style="height:50px;width:50px;" alt=""></span></li>
                <li><p>    </p></li>
                <li></li>
                <li><a href="<?php echo base_url('homepage_controller') ?>">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <div id="text">
                    <?php $cart_check = $this->cart->contents();

                    // If cart is empty, this will show below message.
                    if (empty($cart_check)) {
                        echo 'To add products to your shopping cart click on "Add to Cart" Button';
                    } ?> </div>

                <?php
                // All values of cart store in "$cart".
                if ($cart): ?>
                <tr class="cart_menu">
                    <td>S. No.</td>
                    <td class="image">Item</td>
                    <td>Name</td>

                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td>Cancel Product</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php
                // Create form and send all values in "shopping/update_cart" function.
                echo form_open('shopping/update_cart');
                $grand_total = 0;
                $i = 1;

                foreach ($cart as $item):

                //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                //  Will produce the following output.
                // <input type="hidden" name="cart[1][id]" value="1" />

                echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                echo form_hidden('cart[' . $item['id'] . '][qty_id]', $item['qty_id']);

                echo form_hidden('cart[' . $item['id'] . '][user_id]', $user_id);

                echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                echo form_hidden('cart[' . $item['id'] . '][avl_qty]', $item['avl_qty']);
                 //print_r($item['avl_qty']);die;

                ?>
                <tr>
                    <td>
                        <strong><?php echo $i++; ?></strong>
                    </td>
                    <td class="cart_product"><img src="<?php echo base_url('images/' . $item['cover_image']);?>"
                                                  style="height:300px;width:175px;" alt=""></td>

                    <td>
                        <strong><?php echo $item['name']; ?></strong>
                    </td>


                    <td class="cart_price">
                        <strong>NRs. <?php echo number_format($item['price'], 2); ?></strong>
                    </td>
                    <td>
                        Available Quantity: <?php echo $item['avl_qty'];?>
                        <strong><?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
                        </strong></td>
                    <strong><?php $grand_total = $grand_total + $item['subtotal']; ?></strong>
                    <td>
                        <strong>NRs. <?php echo number_format($item['subtotal'], 2) ?></strong>
                    </td>
                    <td>

                        <!-- cancel image-->
                        <a href="<?php echo base_url();?>shopping/remove/<?php echo $item['rowid'];?>">
                            <img src=" <?php echo base_url('images/icons/close_button_orange.png');?> " width='25px'
                                 height='25px'>
                        </a>

                    </td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><b>Order Total: NRs.<?php

                            //Grand Total.
                            echo number_format($grand_total, 2); ?></b></td>

                    <?php // "clear cart" button call javascript confirmation message ?>
                    <td colspan="5" align="right"><input type="button" class='btn btn-default update' value="Clear Cart"
                                                         onclick="clear_cart()">

                        <?php //submit button. ?>
                        <input type="submit" class='btn btn-default update' value="Update Cart">
                        <?php echo form_close(); ?>

                        <!-- "Place order button" on click send "billing" controller  -->
                        <input type="button" class='btn btn-default update' value="Check Out"
                               onclick="window.location = 'billing_view'">
                        <a href="<?php echo base_url('homepage_controller') ?>"><input type="button"
                                                                                       class='btn btn-default update'
                                                                                       value="Continue Shopping"></td>
                    </a>

                </tr>
                <?php endif; ?>
<!--?php print_r($cart);die;?>


                <!-- <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        <a class="cart_quantity_up" href=""> + </a>
                        <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                        <a class="cart_quantity_down" href=""> - </a>
                    </div>
                </td> -->

                <!-- <td class="cart_delete">
                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                </td> -->


                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>

            <p>Choose if you want to continue shopping or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-12">
                <div class="total_area"><?php if ($cart = $this->cart->contents()): ?>
                        <ul>
                            <li>Cart Grand Total <span><strong>NRs. <?php echo $grand_total ?></span></strong></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span><strong>NRs. <?php echo $grand_total ?></span></strong></li>
                        </ul>

                        <input type="button" class='btn btn-default check_out' value="Check Out"
                               onclick="window.location = 'billing_view'">
                        <a href="<?php echo base_url('homepage_controller') ?>"><input type="button"
                                                                                       class='btn btn-default update'
                                                                                       value="Continue Shopping"></td>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

