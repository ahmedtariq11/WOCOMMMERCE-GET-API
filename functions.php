

add_action( 'rest_api_init', function () {
 register_rest_route( 'productfiltercat/v1', '/product/category/(?P<slug>[^/]+)', array(
    'methods' => 'GET',
    'callback' => 'therich_func',
  ) );
} );
function therich_func( $data ) {
  
  $p = wc_get_products(array('status' => 'publish', 'category' => $data['slug']));
     $products = array();
  
   
     foreach ($p as $product) {
    
    
    $products[] = $product->get_data();
    
    
     }
   
     return new WP_REST_Response($products, 200);
}
