<?php if(is_mobile()){ ?>
<div id="menu">

<h4><span>メニュー</span></h4>
<div class="menulist"><ul id="menu1">
<?php if(strstr($_SERVER['HTTP_REFERER'],"new1")){ ?>
<li><a href="https://ウォーターサーバー最新人気ランキング.com/new_1/iphone/office.php">運営者情報</a></li>
<?php }else{ ?>
<li><a href="https://ウォーターサーバー最新人気ランキング.com/iphone/chousa.html">調査概要について</a></li>
<li><a href="https://ウォーターサーバー最新人気ランキング.com/iphone/privacy.html">個人情報保護方針</a></li>
<li><a href="https://ウォーターサーバー最新人気ランキング.com/iphone/unei.html">運営者情報</a></li>
<li><a href="https://ウォーターサーバー最新人気ランキング.com/contact.php">お水選び相談窓口</a></li>
<li><a href="https://xn--gckgmmx3dygqimdb6gbbb4235ic1qdgxegw1a.com/category/column/">コラム一覧</a></li>

<?php } ?>
</ul></div>

</div>
<style>
#menu{
background:#fff;
}
#menu h4{
    font-family: "メイリオ","Meiryo","ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro","ＭＳ Ｐゴシック", "MS P Gothic","Osaka", Verdana,Arial, Helvetica, sans-serif;
    font-weight: bold;
    display: block;
}
#menu h4 {
background:#EDF4FC;
    background-image: url(https://ウォーターサーバー最新人気ランキング.com/wp/wp-content/themes/waterserver/imgi/menu_h4.gif);
    background-position: left top;
    background-repeat: repeat;
    -webkit-background-size: 13px 15px;
    background-size: 13px 15px;
    -webkit-border-top-left-radius: 8px;
    -webkit-border-top-right-radius: 8px;
    -webkit-border-bottom-right-radius: 0;
    -webkit-border-bottom-left-radius: 0;
    border-radius: 8px 8px 0 0;
    border: 1px solid #abd3f5;
    -webkit-box-shadow: 0 3px 3px rgba(0, 0, 0, 0.08);
    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    padding: 10px;
    position: relative;
    text-align: center;
    font-size: 15px;
}
.menulist {
    background-color: #FFFFFF;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    -webkit-border-top-left-radius: 0;
    -webkit-border-top-right-radius: 0;
    -webkit-border-bottom-right-radius: 8px;
    -webkit-border-bottom-left-radius: 8px;
    border-radius: 0 0 8px 8px;
    border-bottom: 1px solid #abd3f5;
    border-left: 1px solid #abd3f5;
    border-right: 1px solid #abd3f5;
    -webkit-box-shadow: 0 3px 3px rgba(0, 0, 0, 0.08);
    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.08);
    margin-bottom: 20px;
    overflow: hidden;
}
.menulist ul {
    -webkit-border-top-left-radius: 0;
    -webkit-border-top-right-radius: 0;
    -webkit-border-bottom-right-radius: 7px;
    -webkit-border-bottom-left-radius: 7px;
    border-radius: 0 0 7px 7px;
    overflow: hidden;
    padding: 0;
}
.menulist li a:before {
    background-image: url(https://ウォーターサーバー最新人気ランキング.com/wp/wp-content/themes/waterserver/imgi/menu_bg.png);
    background-position: right center;
    background-repeat: no-repeat;
    -webkit-background-size: 16px 16px;
    background-size: 16px 16px;
    bottom: 0;
    content: "";
    position: absolute;
    right: 15px;
    top: 0;
    width: 100%;
}
ul li {
    background-image: url(https://ウォーターサーバー最新人気ランキング.com/wp/wp-content/themes/waterserver/imgi/li.png);
    background-position: 3px 4px;
    background-repeat: no-repeat;
    -webkit-background-size: 14px 13px;
    background-size: 14px 13px;
    padding: 1px 0 1px 24px;
}
.menulist li {
    background-image: url(https://ウォーターサーバー最新人気ランキング.com/wp/wp-content/themes/waterserver/imgi/menulist_li_bg.gif);
    background-position: left top;
    background-repeat: repeat;
    -webkit-background-size: 13px 15px;
    background-size: 13px 15px;
    border-bottom: 1px solid #abd3f5;
    overflow: hidden;
    padding: 0;
}
.menulist li a {
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(255,255,255,0)));
    background-image: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%);
    background-position: 0 0;
    background-repeat: no-repeat;
    -webkit-background-size: auto;
    background-size: auto;
    color: #4994d1;
    display: block;
    font-size: 14px;
    overflow: hidden;
    padding: 12px 46px 12px 15px;
    position: relative;
    text-decoration: none;
}
</style>
<?php }else{ ?>
<style>
#menu {
    width: auto;
    padding: 25px;
}
#menu h4, #rmenu h4, .menutitle {
    line-height: 120%;
    font-size: 14px;
    color: #333333;
    text-align: left;
    font-weight: bold;
}
.menubox {
    padding: 10px;
}
ul#menu1 li {
    display: inline-block;
    margin-right: 20px;
}

ul#menu1 li a {
    color: #484848;
}

ul#menu1 li a:after {
    content:"|";
    display: inline-block;
    margin-left: 20px;
}


</style>

<div id="menu">
    <h4>メニュー</h4>
    <div class="menubox">
        <ul id="menu1">
            <?php if(strstr($_SERVER['HTTP_REFERER'],"new1")){ ?>
            <li><a href="https://ウォーターサーバー最新人気ランキング.com/new_1/office.php">運営者情報</a></li>
            <?php }else{ ?>
            <li><a href="https://ウォーターサーバー最新人気ランキング.com/chousa.html">調査概要について</a></li>
            <li><a href="https://ウォーターサーバー最新人気ランキング.com/privacy.html">個人情報保護方針</a></li>
            <li><a href="https://ウォーターサーバー最新人気ランキング.com/unei.html">運営者情報</a></li>
            <li><a href="https://ウォーターサーバー最新人気ランキング.com/contact.php">お水選び相談窓口</a></li>
            <li><a href="https://xn--gckgmmx3dygqimdb6gbbb4235ic1qdgxegw1a.com/category/column/">コラム一覧</a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<?php } ?>


<div id="footer">Copyright (C) 2018 <a href="<?php echo esc_url( get_home_url() ); ?>">ウォーターサーバー ランキング</a> All Rights Reserved.<!--shinobi1-->
<style>
#footer {
    text-align: center;
    color: #FFFFFF;
    line-height: 64px;
    height: 64px;
    background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/footer.gif);
    background-repeat: repeat-x;
    background-position: left top;
}
#footer a{
color:#fff;
}
</style>
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
<script type="text/javascript">!function(){var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src="//configjp2.veinteractive.com/tags/E65E7338/08DC/4DF1/BC6B/907613B412E7/tag.js";var b=document.getElementsByTagName("head")[0];if(b)b.appendChild(a,b);else{var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}}();</script>
</body>
</html>