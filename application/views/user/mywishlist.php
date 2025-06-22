       <h1 style="color:indigo"><center><u><strong><b>My Wishlists</b></strong></u></center></h1>
       <table class="table table-hover table-striped table-bordered">
            <tr><?php //echo nl2br( $data->price ); ?>
                <th><center>Serial No.</center></th>
                <th><center>Items</center></th>
                <th><center>Name</center></th>
                <th><center>Price</center></th>
                <th><center>Buy this</center></th>
                <th><center>Action</center></th>
                </tr>
<?php $i=0;?>
            <?php foreach($mywishlist as $data){?>

                <tr>
                    <td><center><b><?php echo ++$i; ?></b></center></td>
                     <td><img src="<?php echo base_url('images/' . $item['cover_image']);?>"
                              style="height:300px;width:175px;" alt=""></td>
                    <td><center><b><?php echo ucwords($data['name']);?></b></center></td>
                    <td><center><b>NRs. <?php echo $data['price']; ?>/-</b></center></td>
                                  <?php foreach($product as $items){
                                        if($items['id'] == $data['product_id'])
                                            {?>               
                    <td><center>
                    <?php
                // Create form and send values in 'shopping/add' function.
                echo form_open('single_product/addfromwishlist/'.$data['product_id']);

                echo form_hidden('id', $items['id']);
                echo form_hidden('user_id', $user_id);
                echo form_hidden('name', $items['name']);
                echo form_hidden('price', $items['price']);
                    echo form_hidden('cover_image', $items['cover_image']);
                ?> 
                  <div id='add_button'>
                <?php 
                $btn = array(
                 //   'class' => 'btn btn- default add-to-cart',
                    'title' => 'Add to Cart',
                    'class' => 'fa fa-shopping-cart',
                    'value' => 'Add to Cart',
                    'name' => 'action'
               
                );


                // Submit Button.
                echo form_submit($btn);
                echo form_close();
                ?></div></a></td>

                    <td><center><a href="<?php echo base_url('single_product/delete_product_from_wishlist/'.$data['product_id']) ?>" title="Remove this from wishlist"><i class="fa fa-trash-o fa-lg"></i></a></center></td>
                </tr>
              <?php }?>
              <?php }?>
              <?php }?></table>
              <p align="center">
<a href="<?php echo base_url('shopping') ?>" class = "btn btn- default add-to-cart"
                   title="Go to homepage"><i class="fa fa-shopping-cart"> Continue to Shopping</i></a>
<a href="<?php echo base_url('shopping/display_cart') ?>" class = "btn btn- default add-to-cart"
                   title="Go to homepage"><i class="fa fa-shopping-cart"> My Cart</i></a>
<?php echo "           "; ?>
<a href="<?php echo base_url('single_product/mywishlist') ?>" class = "btn btn- default add-to-cart" title="Update the wishlist"> <i class="fa fa-refresh"> Update Wishlists</i></a>
<a href="<?php echo base_url('homepage_controller') ?>" class = "btn btn- default add-to-cart" title="Go to homepage"> <i class="fa fa-arrow-circle-left"> Go Back</i></a>
  <a href="<?php echo base_url('single_product/delete_all_from_wishlist') ?>" class = "btn btn- default add-to-cart" title="Clear product from my wishlists"><i class="fa fa-trash-o "> Clear my wishlists</i></a>
                </p>