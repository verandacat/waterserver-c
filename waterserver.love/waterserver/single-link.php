<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WSJ6LMZ');</script>
<!-- End Google Tag Manager -->
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />

</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSJ6LMZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php
$url = "";

	if (isset($_GET['type'])) {
		if ($_GET['type'] == "electric") {
			if( have_rows('mousikomi2',$link_id) ):
				while( have_rows('mousikomi2',$link_id) ): the_row();
				$url = get_sub_field('url2');
				endwhile;
			endif;
		}elseif ($_GET['type'] == "2") {
			if( have_rows('mousikomi2',$link_id) ):
				while( have_rows('mousikomi2',$link_id) ): the_row();
				$url = get_sub_field('url2');
				endwhile;
			endif;
		}elseif ($_GET['type'] == "3") {
			if( have_rows('mousikomi3',$link_id) ):
				while( have_rows('mousikomi3',$link_id) ): the_row();
				$url = get_sub_field('url3');
				endwhile;
			endif;
		}elseif ($_GET['type'] == "4") {
			if( have_rows('mousikomi4',$link_id) ):
				while( have_rows('mousikomi4',$link_id) ): the_row();
				$url = get_sub_field('url3');
				endwhile;
			endif;
		}elseif ($_GET['type'] == "5") {
			if( have_rows('mousikomi5',$link_id) ):
				while( have_rows('mousikomi5',$link_id) ): the_row();
				$url = get_sub_field('url5');
				endwhile;
			endif; 
		}elseif ($_GET['type'] == "free") {
			if( have_rows('mousikomi3',$link_id) ):
				while( have_rows('mousikomi3',$link_id) ): the_row();
				$url = get_sub_field('url3');
				endwhile;
			endif;
		}elseif($_GET['type'] == "pickup"){
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
?>
<!-- 計測タグ -->
<?php the_field('tagu'); ?>

</body>
</html>