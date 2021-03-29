<?php 

add_action( 'init', 'create_waterserver_post_type' );
function create_waterserver_post_type() {

	//ウォーターサーバー
    register_post_type( 'waterserver',
        array(
        'labels' => array(
        'name' => __( '商品' ),
        'singular_name' => __( '商品' ),
        'add_new_item' => '商品を追加',
        'add_new' => '新規追加',
        'new_item' => '新規商品',
        'view_item' => '商品を表示',
        'not_found' => '商品は見つかりませんでした',
        'not_found_in_trash' => 'ゴミ箱に商品はありません。',
       'search_items' => '商品を検索',
        ),
        'public' => true,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'has_archive' => true,
        'menu_position' => 95,
        'supports' => array('title','thumbnail')
        )
    );

}
?>