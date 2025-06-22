<?php
if ( !$items) :
    echo '<p>No products found!!!</p>';

else :
    echo '<h2>Products</h2>';
    echo '<ul>';
    foreach ( $items as $item ) {
        $segments = array( 'item', url_title( $item->name, 'dash', true ), $item->id );
        echo '<li>' . anchor( $segments, $item->name ) . ' &ndash; NRs. ' . $item->price . '</li>';
    }

    echo '</ul>';

endif;