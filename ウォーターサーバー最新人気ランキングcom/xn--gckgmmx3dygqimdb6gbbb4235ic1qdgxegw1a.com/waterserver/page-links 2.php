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
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NHDMSC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NHDMSC');</script>
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
				$url = get_post_meta( $link_id, 'url2', true );
			} else if ($_GET['type'] == "free") {
				$url = get_post_meta( $link_id, 'url3', true );
			}else if($_GET['type'] == "pickup"){
				$url = get_post_meta( $link_id, 'pickup_url', true );
			}
		}
		if ($url == "") {
			$url = get_post_meta( $link_id, 'url', true );
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
		header( "location: " . home_url() );
	}
} else {
	//トップページへリダイレクト
	header( "location: " . home_url() );
}

?>
<!-- Yahoo Code for your Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var yahoo_conversion_id = 1000234680;
    var yahoo_conversion_label = "DIPACLu_9V4QnaL82wM";
    var yahoo_conversion_value = 0;
    /* ]]> */
</script>
<script type="text/javascript" src="https://s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="https://b91.yahoo.co.jp/pagead/conversion/1000234680/?value=0&label=DIPACLu_9V4QnaL82wM&guid=ON&script=0&disvt=true"/>
    </div>
</noscript>

<script type="text/javascript" language="javascript">
  /* <![CDATA[ */
  var yahoo_ydn_conv_io = "rEsqbpoOLDUnmH91wzha";
  var yahoo_ydn_conv_label = "";
  var yahoo_ydn_conv_transaction_id = "";
  var yahoo_ydn_conv_amount = "0";
  /* ]]> */
</script>
<script type="text/javascript" language="javascript" charset="UTF-8" src="https://b90.yahoo.co.jp/conv.js"></script>

<!-- Yahoo Code for your Target List -->
<script type="text/javascript" language="javascript">
/* <![CDATA[ */
var yahoo_retargeting_id = '8TA4YZWMTH';
var yahoo_retargeting_label = '';
var yahoo_retargeting_page_type = '';
var yahoo_retargeting_items = [{item_id: '', category_id: '', price: '', quantity: ''}];
/* ]]> */
</script>
<script type="text/javascript" language="javascript" src="https://b92.yahoo.co.jp/js/s_retargeting.js"></script>

<!-- Yahoo Code for your Target List -->
<script type="text/javascript">
/* <![CDATA[ */
var yahoo_ss_retargeting_id = 1000234680;
var yahoo_sstag_custom_params = window.yahoo_sstag_params;
var yahoo_ss_retargeting = true;
/* ]]> */
</script>
<script type="text/javascript" src="https://s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="https://b97.yahoo.co.jp/pagead/conversion/1000234680/?guid=ON&script=0&disvt=false"/>
</div>
</noscript>

</body>
</html>