
<h2><?php echo $item->name . '&ndash; NRs.' . $item->price; ?></h2>

<p><?php echo nl2br( $item->description ); ?></p>
<p><?php echo nl2br( $item->quantity ); ?></p>
<p><?php echo nl2br( $item->description ); ?></p>

<?php $segments = array( 'purchase', url_title( $item->name, 'dash', true ), $item->id ); ?><!--purchase/jeans/3 -->

<p class="purchase"><?php echo anchor( $segments, 'Pay via paypal' ); ?></p>
<a href="<?php echo base_url('user/shopping/buy_now/'.$item->id) ?>"><button class="btn btn-success ">Buy now</button>
</a>
