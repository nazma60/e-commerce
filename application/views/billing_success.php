
       <div id='result_div'>


            <h2 class="title text-center">Thank You! Your order has been placed!</h2>
           <?php echo "<span id='go_back'><a class='btn btn-default update' href=" . base_url() . "homepage_controller>Go back</a></span>";?>
            <a class='btn btn-default update' href="<?php echo base_url('items/purchase/'.$order_id)?>">Continue to Pay via Paypal </a>
<br><br>
       </div>
