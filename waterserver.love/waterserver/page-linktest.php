

<?php

/* Template Name: リンククリック用 */

?>
<?php wp_reset_postdata();
                
                $args = array(
                    'posts_per_page' => '1',
                    'category_name' => 'all',
                    'post_type' => 'post',
                    'meta_key' => 'waterserver',
                    'orderby' => 'meta_value_num',
					'order' => 'asc',
                );
               

                $the_query = new WP_Query( $args );
                $i = 1;
                if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();
                $product_name = get_field('product_name');
                $reurl = get_field('url');
                $re_cam_endyear = get_field('re_cam_endyear');
                $re_cam_endmonth = get_field('re_cam_endmonth');
                $re_cam_endday = get_field('re_cam_endday');
                $re_cam_text1 = get_field('re_cam_text1');
                $re_cam_text2 = get_field('re_cam_text2');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<?php if(is_mobile()) : ?>
		<style>
		body {
            margin: 0;
            padding: 0;
			width:100%;
            height: 100vh;
            font-family:'メイリオ', 'Meiryo', sans-serif;
        }
        .re-campaign-box {
            margin: 30px auto 0;
            width: 95%;
            padding: 5px 10px;
            box-sizing: border-box;
            background:  #e8f7f9;
            text-align: center;
        }
        .re-campaign-box img {
			width: 90%;
            box-sizing: border-box;
            margin: 40px 0;
        }
        .re-campaign-box .timer-box {
            text-align: center;
            padding: 10px;
            /* background: #fff; */
        }
        .re-campaign-box .timer-box p {
            color: #444;
            font-weight: bold;
            margin: 5px;
			font-size: 3rem;
        }
        .re-campaign-box .timer-box #timer {
            background-color: #fff;
            border-radius: 10px;
            display: inline-block;
            padding: 10px 20px;
            color: rgb(246, 50, 50);
            /* border: 1px solid #444; */
            box-shadow: 0 2px 0 2px rgba(0,0,0,0.1);
        }
		.re-campaign-box .campaign-text {
            padding: 20px;
            text-align: center;
            border-bottom: 15px solid skyblue;
            border-top: 15px solid skyblue;
            margin-top: 80px;
            background: #fff;
        }
        .re-campaign-box .campaign-text h3 {
            font-size: 2.6em;
            font-weight: bold;
            color: red;
            text-align: left;
        }
		.re-campaign-box .campaign-text h3:before {
			content: '';
            display: inline-block;
			width: 20px;
			height: 20px;
			background: skyblue;
			margin-right: 20px;
		}
        .arrow-box {
            text-align: center;
            margin: 0 auto;
            position: relative;
            width: 30px;
            height: 30px;
        }
        
        .arrow-box:after {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            transform: translate(-50%, -50%) rotate(-45deg);
			width: 64px;
			height: 64px;
			background:  #e8f7f9;
			z-index: -1;
        }
        .re-text-box {
            margin: 60px auto;
            box-sizing: border-box;
            padding: 30px;
            background: #fff;
            width: 95%;
            text-align: center;
            z-index: -1;
            box-shadow: 2px 2px 0 2px rgba(0,0,0,0.1);
        }
        .re-text-box p {
            font-size: 2rem;
            text-align: left;
        }
		</style>
		<?php else : ?>
		<style>
        body {
            margin: 0;
            padding: 0;
			width:100%;
            height: 100vh;
            font-family:'メイリオ', 'Meiryo', sans-serif;
        }
        .re-campaign-box {
            margin: 30px auto;
            width: 500px;
            padding: 15px 20px;
            box-sizing: border-box;
            background:  #e8f7f9;
            text-align: center;
        }
        .re-campaign-box img {
			width: 90%;
            box-sizing: border-box;
			margin: 40px 0;
        }
        .re-campaign-box .timer-box {
            text-align: center;
            padding: 10px;
            /* background: #fff; */
        }
        .re-campaign-box .timer-box p {
            color: #444;
            font-weight: bold;
            margin: 5px;
            font-size: 1.2em;
        }
        .re-campaign-box .timer-box #timer {
            background-color: #fff;
            border-radius: 10px;
            display: inline-block;
            padding: 10px 20px;
            color: rgb(246, 50, 50);
            /* border: 1px solid #444; */
            box-shadow: 0 2px 0 2px rgba(0,0,0,0.1);
        }
		.re-campaign-box .campaign-text {
            padding: 20px;
            text-align: center;
            border-bottom: 10px solid skyblue;
            border-top: 10px solid skyblue;
            margin-top: 20px;
            background: #fff;
        }
        .re-campaign-box .campaign-text h3 {
            font-size: 1.2em;
            font-weight: bold;
            color: red;
			text-align: left;
        }
		.re-campaign-box .campaign-text h3:before {
			content: '';
            display: inline-block;
			width: 4px;
			height: 4px;
			background: skyblue;
			margin-right: 10px;
		}
        .arrow-box {
            text-align: center;
            margin: 0 auto;
            position: relative;
            width: 30px;
            height: 30px;
        }
        
        .arrow-box:after {
            content: '';
            position: absolute;
            left: 50%;
            top: -29px;
            transform: translate(-50%, -50%) rotate(-45deg);
            width: 20px;
            height: 20px;
            background:  #e8f7f9;
        }
        .re-text-box {
            margin: 20px auto;
            padding:20px 0;
            background: #fff;
            width: 100%;
            text-align: center;
            z-index: -1;
            box-shadow: 2px 2px 0 2px rgba(0,0,0,0.1);
        }
		
		</style>
		<?php endif; ?>
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
			if ($_GET['type'] == "electric" or $_GET['type'] == "mama") {
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

<?php if($re_cam_endyear || $re_cam_text1 ) : ?>

		<div class="re-campaign-box">
			<div class="timer-box">
                <?php if($re_cam_endyear || $re_cam_endmonth || $re_cam_endday) : ?>
                <p>キャンペーン終了まで、残り</p><p id="timer"></p></div>
                <?php else : ?>
                <?php endif; ?>

				<img src="<?php bloginfo('template_directory'); ?>/img/wk-logo.png" alt="">
			</div>
		</div>

		<div class="arrow-box">
			<span></span>
			<span></span>
		</div>
       
		<div class="re-text-box">
			<p><?php echo $product_name; ?>の公式サイトに安全に移動中です。</p>
			<p>ページが移動しない場合は<a href="<?php echo $reurl; ?>">こちらをクリック</a>してください。</p>
		</div>

<?php else : ?>
	<div class="re-campaign-box">
		<div class="timer-box">
			<img src="<?php bloginfo('template_directory'); ?>/img/wk-logo.png" alt="">
			<p>公式サイトに移動します。</p>
		</div>
	</div>
<?php endif; ?>


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

<script type="text/javascript" language="javascript">
/* <![CDATA[ */
var yahoo_retargeting_id = 'WWZH9Z0GMN';
var yahoo_retargeting_label = '';
/* ]]> */
</script>
<script type="text/javascript" language="javascript" src="//b92.yahoo.co.jp/js/s_retargeting.js"></script>
<script type="text/javascript">
    window.nex_rt_queue = window.nex_rt_queue || [];
    window.nex_rt_queue.push({
        advertiser_id: 276
    });
</script>
<script type="text/javascript" src="//st.nex8.net/js/nexRt.js"
async="async"></script>
<script>
        const countDownTimer = function (id, date) {
            var _vDate = new Date(date); 
            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;
            function showRemaining() {
                var now = new Date();
                var distDt = _vDate - now;
                if (distDt < 0) {
                    clearInterval(timer);
                    document.getElementById(id).textContent = 'キャンペーン終了しました。';
                    return;
                }
                var days = Math.floor(distDt / _day);
                var hours = Math.floor((distDt % _day) / _hour);
                var minutes = Math.floor((distDt % _hour) / _minute);
                var seconds = Math.floor((distDt % _minute) / _second);

                document.getElementById(id).textContent = days + '日';
                document.getElementById(id).textContent += hours + '時間';
                document.getElementById(id).textContent += minutes + '分';
                document.getElementById(id).textContent += seconds + '秒';

            } timer = setInterval(showRemaining, 0);
        }
        var dateObj = new Date();
        dateObj.setDate(dateObj.getDate() + 1);

      
        countDownTimer('timer', '<?php echo $re_cam_endmonth; ?>/<?php echo $re_cam_endday; ?>/<?php echo $re_cam_endyear; ?>'); 
		
		
	
    </script>

    

</body>
</html>
<?php $i++; endwhile; endif; wp_reset_postdata(); ?>