<?php

function api_datas() {
    $api_datas = 'https://jsonplaceholder.typicode.com/users';
	$api_method = array('method'=>'GET');
	$content_datas = wp_remote_get( $api_datas, $api_method );

	if ( is_wp_error( $content_datas ) ) {
		$error_message = $content_datas->get_error_message();
		echo'Problem is '. $error_message .' Need to fix';
	}
	$datas = json_decode(wp_remote_retrieve_body($content_datas),true);
	foreach ($datas as $data)  {
		echo $data['name']. '<br>' ;
	}	
}
add_shortcode('api_practice', 'api_datas');

