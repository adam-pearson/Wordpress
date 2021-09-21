<?php

function storefront_child_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'storefront_child_enqueue_styles', 99);


/**
 * Change price format from range to "From:"
 *
 * @param float $price
 * @param obj $product
 * @return str
 */
function iconic_variable_price_format( $price, $product ) {

    $prefix = sprintf('%s: ', __('From', 'iconic'));

    $min_price_regular = $product->get_variation_regular_price( 'min', true );
    $min_price_sale    = $product->get_variation_sale_price( 'min', true );
    $max_price = $product->get_variation_price( 'max', true );
    $min_price = $product->get_variation_price( 'min', true );

    $price = ( $min_price_sale == $min_price_regular ) ?
        wc_price( $min_price_regular ) :
        '<del>' . wc_price( $min_price_regular ) . '</del>' . '<ins>' . wc_price( $min_price_sale ) . '</ins>';

    return ( $min_price == $max_price ) ?
        $price :
        sprintf('%s%s', $prefix, $price);

}

add_filter( 'woocommerce_variable_sale_price_html', 'iconic_variable_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'iconic_variable_price_format', 10, 2 );



// Replace price with variable price

add_action('woocommerce_before_add_to_cart_form', 'selected_variation_price_replace_variable_price_range');
function selected_variation_price_replace_variable_price_range(){
    global $product;

    if( $product->is_type('variable') ):
    ?><style> .woocommerce-variation-price {display:none;} </style>
    <script>
    jQuery(function($) {
        var p = 'p.price'
            q = $(p).html();

        $('form.cart').on('show_variation', function( event, data ) {
            if ( data.price_html ) {
                $(p).html(data.price_html);
            }
        }).on('hide_variation', function( event ) {
            $(p).html(q);
        });
    });
    </script>
    <?php
    endif;
}



/**
 * Add + and - to single product page quantity
 */

add_action( 'woocommerce_after_add_to_cart_quantity', 'ts_quantity_plus_sign' );
 
function ts_quantity_plus_sign() {
   echo '<button type="button" class="plus" >+</button>';
}
 
add_action( 'woocommerce_before_add_to_cart_quantity', 'ts_quantity_minus_sign' );
function ts_quantity_minus_sign() {
   echo '<button type="button" class="minus" >-</button>';
}
 
add_action( 'wp_footer', 'ts_quantity_plus_minus' );
 
function ts_quantity_plus_minus() {
   // To run this on the single product page
   if ( ! is_product() ) return;
   ?>
   <script type="text/javascript">
          
      jQuery(document).ready(function($){   
          
            $('form.cart').on( 'click', 'button.plus, button.minus', function() {
 
            // Get current quantity values
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
 
            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } 
            else {
               qty.val( val + step );
                 }
            } 
            else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } 
               else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }
             
         });
          
      });
          
   </script>
   <?php
}