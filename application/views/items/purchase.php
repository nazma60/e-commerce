<div class="contact-form">
    <h2 class="title text-center">Purchase: </h2>

    <?php /*$segments = array( 'item', url_title( $item->name, 'dash', true ), $item->id ); */ ?>
    <!--<p>To purchase &ldquo;<?php /*echo anchor( $segments, $item->name ); */?>&rdquo;, enter your email
        address below and click through to pay with PayPal. Upon confirmation of your payment, we will
        email you your download link to the address you enter below.</p>-->
    <p>To purchase, please enter your email address below and click through to pay with PayPal. </p>

    <?php
    $url_title = url_title( $item->serial, 'dash', true );
    echo form_open('purchase/' . $url_title . '/' . $item->serial);
    echo validation_errors('<p class="error">', '</p>');
    ?>


    <div class="contact-form">
    <div class="col-lg-12" style="padding:20px">
        <div class="form-group col-md-6">
            <!--        </div>
                <div class="form-group ">-->
            <input type="email" class="form-control" name="email" id="email" required="required" placeholder="Email"/>
        </div>
        <div class="form-group col-md-6">
            <input type="submit" class="btn btn-default update" value="Pay NRs. <?php echo $item->Sum; ?> via PayPal"/>
        </div>
    </div>
</div>
    </div>
</form>