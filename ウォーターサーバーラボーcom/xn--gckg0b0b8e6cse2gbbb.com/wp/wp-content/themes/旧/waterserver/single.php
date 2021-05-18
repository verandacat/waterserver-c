<?php 
$post = $wp_query->post;

if ( in_category('campaign') ) {

 include( TEMPLATEPATH .'/single-campaign.php');

 } else {
 include(TEMPLATEPATH . '/single-link.php');

 }

?>