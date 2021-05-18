<?php
/* Template Name: リンククリック用 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />

</head>
<body>

<!-- Google Tag Manager -->
<?php the_field('google_tag_manager'); ?>
<!-- End Google Tag Manager -->

<?php
//_GETでデータを取得し、
//商品データからurl情報を取ってリダイレクトする
if(isset($_GET['link_id'])) {

	$link_id = $_GET['link_id'];
	$url = "";

	if (is_numeric($link_id)) {

		if (isset($_GET['type'])) {
			if ($_GET['type'] == "electric") {
        if( have_rows('mousikomi2',$link_id) ):
          while( have_rows('mousikomi2',$link_id) ): the_row();
      			$url = get_sub_field('url2');
      		endwhile;
      	endif;
			} else if ($_GET['type'] == "free") {
        if( have_rows('mousikomi3',$link_id) ):
          while( have_rows('mousikomi3',$link_id) ): the_row();
      			$url = get_sub_field('url3');
      		endwhile;
      	endif;
			}else if($_GET['type'] == "pickup"){
				$url = get_post_meta( $link_id, 'pickup_url', true );
			}
		}
		if ($url == "") {
      if( have_rows('mousikomi1',$link_id) ):
        while( have_rows('mousikomi1',$link_id) ): the_row();
    			$url = get_sub_field('url1');
    		endwhile;
    	endif;
		}
	}
	if ($url !== "") {
		//このページ噛ますように変更
		//header( "location: {$url}");
?>
公式サイトに移動します。
<script>
	setTimeout(function(){
		//alert("<?php echo $url; ?>");
		location.replace("<?php echo $url; ?>");
	}, 1000);
</script>
<?php
		//リダイレクト
	} else {
		//トップページへリダイレクト
		wp_redirect( home_url() ); exit;
	}
} else {
	//トップページへリダイレクト
	wp_redirect( home_url() ); exit;
}

?>

<?php the_field('ydn'); ?>

</body>
</html>