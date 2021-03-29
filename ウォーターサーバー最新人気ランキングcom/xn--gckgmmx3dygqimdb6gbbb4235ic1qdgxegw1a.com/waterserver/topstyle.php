<style>
			@charset "shift_jis";
			@import url("https://ウォーターサーバー最新人気ランキング.com/css/tables.css");
			@import url("https://ウォーターサーバー最新人気ランキング.com/css/commonstyles.css");
    /* 基本スタイル */
    body {
        margin: 0px;
        padding: 0px;
        text-align: center;
        color: #333333;
        font-size: 0.9em;
        line-height: 140%;
        background-color: #F5F5F5;

    }

    div,
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0px;
        padding: 0px;
        display: block;
        text-align: left;
    }

    h1,
    h2,
    h3,
    h4,
    .title,
    .menutitle {
        font-family: 'HGP創英角ｺﾞｼｯｸUB', 'Hiragino Kaku Gothic Pro', 'ヒラギノ角ゴ Pro W6', sans-serif;
        font-weight: normal;
    }

    h1,
    h2,
    h3,
    h4 {
        clear: both;
    }




    /*
//見出しを通常のフォントにする場合は／* と *／ を削除
h3, h4 ,h5 ,h6{
	font-family: sans-serif;
	font-weight:bold;
}
*/

    .FloatEnd {
        clear: both;
        display: block;
        height: 1px;
    }





    /* -------- リンク */

    a,
    a:visited {
        color: #006699;
    }

    a:hover {
        color: #FF0000;
    }

    a img {
        border: none;
        text-decoration: none;
    }

    .txt-img img {
        margin-top: 0px;
        margin-right: 10px;
        margin-bottom: 10px;
        margin-left: 10px;
    }



    /* 文字装飾 */

    strong {
        margin: 0 0.2em;
        padding: 0;
        font-weight: bold;
    }

    em {
        margin: 0 0.2em;
        padding: 0;
        font-weight: normal;
        text-decoration: underline;
    }



    /* ---------------- リスト */

    ul,
    ol {
        display: block;
        _margin-left: 0;
        _margin-right: 0;
    }

    dl {
        margin: 0;
        padding: 0;
    }

    ul {
        margin-top: 10px;
        margin-bottom: 10px;
        _margin-left: 20px;
        _padding-left: 20px;
    }

    ol {
        list-style-type: decimal;
        margin-top: 10px;
        margin-right: 0;
        margin-bottom: 10px;
        margin-left: 0;
        _margin-left: 30px;
        _padding-left: 20px;
    }

    *:first-child+html ol {
        margin-left: 30px;
        padding-left: 20px;
    }

    li {
        display: list-item;
        margin: 0;
    }

    ul li {
        list-style-type: none;
        list-style-image: none !important;
    }


    p {
        width: auto;
        margin-right: auto;
        margin-left: auto;
        margin-top: 0px;
        margin-bottom: 0px;
    }



    /* 基本レイアウト */

    #container {
        width: 900px;
        _width: 910px;
        padding-top: 0px;
        padding-right: 5px;
        padding-bottom: 0px;
        padding-left: 5px;
        margin-right: auto;
        margin-left: auto;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/cnt_bg.png);
        background-repeat: repeat-y;
    }

    #header {
        height: 200px;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/header.jpg);
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: left top;
        width: auto;
        border-bottom: solid 1px #EBEBEB;
    }

    #header h2,
    #header .title {
        width: 550px;
        font-size: 36px;
        line-height: 36px;
        position: relative;
        left: 30px;
        top: 50px;
    }

    #header h2 a,
    #header h2 a:visited,
    #header .title a,
    #header .title a:visited {
        color: #006699;
        text-decoration: none;
    }

    #headertext {
        text-align: left;
        font-size: 11px;
        line-height: 130%;
        width: 550px;
        position: relative;
        left: 30px;
        top: 60px;
    }

    /* コンテンツ */

    #text1,
    #text2,
    #text3,
    #text4,
    #text5,
    #text6,
    #text7,
    #text8,
    #text9,
    #text10,
    #space1,
    #space2 {
        margin-bottom: 25px;
        padding: 10px 14px;
    }


    /* グローバルメニュー */

    #topmenu {
        background-repeat: repeat-x;
        height: 48px;
        line-height: 42px;
        width: 900px;
        position: absolute;
        top: 200px;
        margin: 0px;
        padding: 0px;
        background-image: url(img/topmenu.jpg);
        background-position: left top;
        font-size: 13px;
    }

    #topmenu span a {
        overflow: hidden;
        width: 20%;
        _width: 19.6%;
        text-align: center;
        color: #FFFFFF;
        font-weight: bold;
        text-decoration: none;
        float: left;
        height: 45px;
        _height: 47px;
        background-image: url(img/menu_item.jpg);
        background-repeat: repeat-x;
        margin: 0px;
        padding: 0px;
        padding-bottom: 3px;
        display: block;
    }

    #topmenu span a:hover {
        background-image: url(img/menu_item_hover.jpg);
        background-position: right top;
        color: #FFFFFF;
    }


    #siteNavi {
        font-size: 0.775em;
        line-height: 1.5em;
        margin-bottom: 15px;
    }

    #contents {
        _height: 10px;
        padding-top: 20px;
        padding-bottom: 20px;
        min-height: 400px;
        margin-top: 50px;
        margin-top: 0px;
    }

    #menu:after,
    #contents:after {
        height: 1px;
        overflow: hidden;
        content: "";
        display: block;
        clear: both;
    }

    /* フッター */

    #footer {
        text-align: center;
        color: #FFFFFF;
        line-height: 64px;
        height: 64px;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/footer.gif);
        background-repeat: repeat-x;
        background-position: left top;
    }

    #footer a {
        color: #FFFFFF;
        text-decoration: none;
    }

    #footlink {
        text-align: center;
        padding-top: 8px;
        padding-bottom: 8px;
        color: #666666;
        font-size: 12px;
        background-color: #E5E5E5;
    }

    #footlink a {
        color: #666666;
        margin-left: 5px;
        margin-right: 5px;
    }

    /* フリースペース */

    #space3,
    #space4,
    #space5,
    #space6 {
        background-color: #FFFFFF;
        text-align: center;
        line-height: 120%;
        font-size: 12px;
        padding: 8px;
    }

    /* レイアウト差分 */

    #contents {
        padding-right: 40px;
        padding-left: 40px;
        padding-bottom: 0px;
    }

    #main {
        width: auto;
    }

    #menu {
        width: auto;
        padding-top: 25px;
    }

    #text1 h3,
    #text2 h3,
    #text3 h3,
    #text4 h3,
    #text5 h3,
    #text6 h3,
    #text6 h3,
    #text7 h3,
    #text8 h3,
    #text9 h3,
    #text10 h3 {
        position: relative;
        left: -14px;
        width: 784px;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    #searchbox {
        position: absolute;
        top: 0px;
        width: 880px;
        padding-right: 10px;
        padding-left: 10px;
        text-align: right;
        line-height: 30px;
        height: 30px;
        font-size: 12px;
        padding-top: 6px;
    }

    #searchbox input {
        vertical-align: middle;
        margin-right: 2px;
        margin-left: 2px;
    }

    #searchbox form {
        padding: 0px;
        margin: 0px;
    }

    form input {
        vertical-align: middle;
    }

    /* 各種見出し */

    h1 {
        font-weight: normal;
        font-size: 12px;
        color: #666666;
        line-height: 16px;
        background-repeat: no-repeat;
        position: absolute;
        top: 5px;
        padding-right: 10px;
        padding-left: 10px;
        font-family: sans-serif;
    }

    #main h2,
    #main h3,
    .blog .title {
        font-size: 18px;
        line-height: 20px;
        background-repeat: no-repeat;
        background-position: left top;
        margin-bottom: 5px;
        margin-top: 5px;
        color: #FFF;
        padding-left: 35px;
        overflow: hidden;
        padding-top: 7px;
        padding-bottom: 7px;
        background-color: #333;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/h3.jpg);
    }

    .blog .title a {
        color: #2964AB;
    }



    #main h4 {
        font-size: 16px;
        line-height: 34px;
        background-image: url(img/h4.jpg);
        background-repeat: no-repeat;
        margin-top: 15px;
        margin-bottom: 10px;
        background-position: left bottom;
        padding-right: 8px;
        padding-left: 30px;
        padding-top: 0px;
        padding-bottom: 0px;
        color: #3D74B4;
    }

    /* #main h5 {
        background-image: url(img/h5.jpg);
        background-position: left 2px;
        background-repeat: no-repeat;
        font-size: 15px;
        line-height: 26px;
        text-indent: 25px;
        margin-top: 10px;
        margin-bottom: 3px;
    } */

    #main h6 {
        background-image: url(img/h6.jpg);
        background-repeat: no-repeat;
        background-position: left center;
        padding-left: 20px;
        font-size: 15px;
        line-height: 20px;
        margin-top: 6px;
        margin-bottom: 6px;
    }


    /* サイトマップ */

    #sitemaps {
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 10px;
    }

    #sitemaps ul {
        margin: 0;
        padding: 0;
    }

    #sitemaps li {
        list-style-type: none;
        list-style-image: none;
    }

    #sitemaps .sbox1,
    #sitemaps .sbox2 {
        width: 47%;
        margin-top: 5px;
        margin-bottom: 5px;
        padding: 5px;
    }

    #sitemaps .sbox1 {
        float: left;
        clear: left;
    }

    #sitemaps .sbox2 {
        float: right;
        clear: right;
    }

    #sitemaps .l1 {
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/sitemap_l1.jpg);
        line-height: 26px;
        height: 26px;
        font-weight: bold;
        margin-bottom: 5px;
        margin-top: 0px;
        background-repeat: no-repeat;
        background-position: 5px center;
        padding-left: 35px;
        overflow: hidden;
    }

    #sitemaps .l2 {
        background-image: url(img/sitemap_l2.jpg);
        background-repeat: no-repeat;
        background-position: left 4px;
        line-height: 20px;
        text-indent: 15px;
        margin-left: 22px;
        margin-bottom: 3px;
    }

    #sitemaps .l3 {
        background-image: url(img/sitemap_l3.jpg);
        background-repeat: no-repeat;
        background-position: left 4px;
        line-height: 20px;
        text-indent: 15px;
        margin-left: 38px;
        margin-bottom: 3px;
    }

    #whatsnew {
        border: 1px solid #CCCCCC;
        background-image: url(img/whats_top.jpg);
        background-repeat: no-repeat;
        background-position: left top;
        padding-top: 45px;
        padding-bottom: 10px;
        padding-right: 10px;
        padding-left: 10px;
    }

    #whatsnew li {
        line-height: 25px;
        list-style-image: url(img/whats_li.jpg);
        margin-right: 10px;
        margin-left: 10px;
    }

    /* カテゴリーリスト */

    #categorylist {
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    #categorylist .cbox {
        margin-bottom: 15px;
        font-size: 13px;
    }

    #categorylist .cbox:after {
        clear: both;
    }

    #categorylist h4 {
        clear: none;
        background-image: url(img/categorylist.jpg);
        background-repeat: no-repeat;
        font-size: 15px;
        height: 30px;
        padding-left: 25px;
        padding-bottom: 0px;
        padding-top: 0px;
        padding-right: 0px;
        line-height: 30px;
        background-position: left top;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 8px;
        margin-left: 0px;
        overflow: hidden;
    }

    #categorylist h4 a {
        color: #006699;
    }

    #categorylist .desc {
        font-size: 12px;
        line-height: 130%;
        color: #505050;
        padding: 10px;
    }

    #categorylist .more {
        text-align: right;
        padding-right: 10px;
        padding-left: 10px;
        padding-bottom: 5px;
    }

    #categorylist .bottom {
        background-image: url(img/categorylist_bottom.jpg);
        background-repeat: no-repeat;
        background-position: center bottom;
    }


    /* エントリーリスト */

    #entrylist {
        padding: 10px;
    }

    #entrylist dl {
        padding: 6px;
        display: block;
    }

    #main #entrylist h4 {
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/entlist_title.jpg);
        background-repeat: no-repeat;
        background-position: left bottom;
        padding-left: 30px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 10px;
        margin-left: 0px;
    }

    #entrylist dt {
        font-weight: bold;
        font-size: 14px;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/entlist.jpg);
        background-repeat: no-repeat;
        background-position: left 5px;
        line-height: 20px;
        padding-left: 15px;
    }

    #entrylist dd {
        margin-left: 15px;
        margin-bottom: 8px;
        font-size: 11px;
        color: #757575;
        line-height: 120%;
    }

    /* 記事スタイル */

    .txt-border {
        background-image: url(img/dott.gif);
        line-height: 22px;
        font-size: 13px;
        margin: 10px;
        padding: 0px;
        background-position: 0px 5px;
    }

    .txt-border p {
        line-height: 22px;
        font-size: 13px;
    }

    .txt-line {
        border: 2px solid #CCCCCC;
    }

    .txt-yellowback {
        background-color: #FFF9DF;
        border: 2px solid #CC0000;
    }

    .txt-grayback {
        border: 1px solid #D9D9D9;
        background-color: #F5F5F5;

    }

    .txt-colorback {
        border: solid 1px #FFB380;
        background-color: #FFF2DF;
    }

    .txt-frame {
        border: solid 2px #CCCCCC;
    }

    .txt-colorframe {
        border: solid 2px #CC0000;
    }

    .txt-rndbox .top {
        height: 15px;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/round.gif);
        background-repeat: no-repeat;
        background-position: left top;
    }

    .txt-rndbox .body {
        border-left: solid 1px #B4B4B4;
        border-right: solid 1px #B4B4B4;
        padding: 10px 30px;
    }

    .txt-rndbox .bottom {
        height: 15px;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/round.gif);
        background-repeat: no-repeat;
        background-position: left bottom;
    }

    .txt-decbox1 {
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/dec1_body.gif);
        background-repeat: repeat-y;
    }

    .txt-decbox1 .top {
        height: 50px;
        background-position: left top;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/decbox1.gif);
        background-repeat: no-repeat;
        padding-top: 30px;
        padding-right: 50px;
        padding-left: 50px;
        font-size: 30px;
    }

    .txt-decbox1 .body {
        padding-top: 5px;
        padding-right: 50px;
        padding-bottom: 0px;
        padding-left: 50px;
    }

    .txt-decbox1 .bottom {
        height: 70px;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/decbox1.gif);
        background-repeat: no-repeat;
        background-position: left bottom;
    }

    .txt-decbox2 {
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/dec2_body.gif);
        background-repeat: repeat-y;
    }

    .txt-decbox2 .top {
        height: 40px;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/decbox2.gif);
        background-repeat: no-repeat;
        background-position: left top;
        padding-top: 40px;
        padding-right: 50px;
        padding-left: 50px;
        font-size: 30px;
    }

    .txt-decbox2 .body {
        padding-top: 5px;
        padding-right: 50px;
        padding-bottom: 0px;
        padding-left: 50px;
    }

    .txt-decbox2 .bottom {
        height: 65px;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/decbox2.gif);
        background-repeat: no-repeat;
        background-position: left bottom;
    }

    #main .txt-grayback,
    #main .txt-colorback,
    #main .txt-line,
    #main .txt-frame,
    #main .txt-colorframe {
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 30px;
    }

    #main .txt-rndbox,
    #main .txt-decbox1,
    #main .txt-decbox2 {
        padding: 0px;
    }

    #main .txt-decbox1 h3,
    #main .txt-decbox2 h3,
    #main .txt-decbox1 h2,
    #main .txt-decbox2 h2 {
        width: auto;
        padding: 0px;
        position: static;
        background-image: none;
        border: none;
        font-size: 26px;
        text-align: center;
    }

    #main .txt-decbox1 h3 span,
    #main .txt-decbox2 h3 span {
        background-image: none;
    }

    /* 記事スタイル - 色差分 */

    .txt-colorback {
        border: solid 1px #FFB380;
        background-color: #FFF2DF;
    }

    .txt-colorframe {
        border: solid 2px #CC0000;
    }

    #main .txt-decbox1 h3,
    #main .txt-decbox2 h3,
    #main .txt-decbox1 h2,
    #main .txt-decbox2 h2 {
        color: #333;
        background-color: #FFF;
        line-height: 140%;
    }



    .hd {
        color: #333;
        text-decoration: none;
    }

    /* サイドメニュー */

    #menu ul,
    #rmenu ul {
        list-style-type: none;
        list-style-image: none;
        margin-top: 0;
        margin-right: 0;
        margin-bottom: 0px;
        margin-left: 0;
        padding: 5px;
    }

    #menu li,
    #rmenu li {
        list-style-type: none;
        list-style-image: none;
        margin: 0px;
        display: inline;
        _display: inline;
        background-image: url(img/line.gif);
        background-repeat: no-repeat;
        background-position: left center;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 6px;
    }

    #menu #newEntry,
    #rmenu #newEntry {
        padding-top: 10px;
        padding-right: 15px;
        padding-bottom: 10px;
        padding-left: 15px;
        margin: 0px;
    }

    #newEntry li {
        display: block;
        padding-bottom: 2px;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/newtext.gif);
        padding-left: 20px;
        background-repeat: no-repeat;
        background-position: 2px center;
        border-top-style: none;
        border-right-style: none;
        border-bottom-style: none;
        border-left-style: none;
        line-height: 22px;
    }

    #menu h4,
    #rmenu h4,
    .menutitle {
        line-height: 120%;
        font-size: 14px;
        color: #333333;
        text-align: left;
    }

    #menu .menubox,
    #rmenu .menubox {
        margin-bottom: 5px;
    }


    #menu li a,
    #rmenu li a {
        line-height: 16px;
        font-size: 12px;
        margin-top: 0;
        margin-right: 0;
        margin-bottom: 0px;
        margin-left: 0;
        padding-top: 5px;
        padding-right: 5px;
        padding-bottom: 5px;
        padding-left: 5px;
        color: #484848;
    }

    #menu li a:hover,
    #rmenu li a:hover {
        color: #FF0000;

    }




    #newEntry li a {
        color: #333333;
        display: inline;
        line-height: 18px;
        border: none;
        text-decoration: underline;
        background-image: none;
        padding: 0px;
    }

    #newEntry li a:hover {
        color: #FF0000;
        background-color: #FFF;
        background-image: none;
    }






    #searchresult {
        padding: 15px;
    }

    #searchresult dt {
        background-image: url(img/entlist.jpg);
        background-repeat: no-repeat;
        background-position: left center;
        margin-top: 15px;
        font-size: 14px;
        padding-left: 16px;
    }

    #searchresult dd {
        margin: 0px;
        line-height: 130%;
        font-size: 13px;
    }

    #linklist {
        padding: 15px;
    }

    #linklist dt {
        font-size: 14px;
        font-weight: bold;
        background-image: url(https://ウォーターサーバー最新人気ランキング.com/img/entlist.jpg);
        background-repeat: no-repeat;
        background-position: left center;
        padding-left: 18px;
    }

    #linklist dd {
        padding-left: 18px;
        margin-left: 0px;
        margin-bottom: 10px;
    }

    /* フリースペース */

    .grayline {
        border: 1px solid #CCCCCC;
    }

    #main .grayline {
        padding: 10px;
        margin-bottom: 15px;
    }

    #menu .grayline {
        font-size: 90%;
        padding: 8px;
        margin-bottom: 15px;
    }

    /* ブログモード */

    .blog {
        margin-bottom: 30px;
    }

    .blog .text {
        padding: 15px;
    }

    .blog .title a {
        color: #FFF;
        text-decoration: none;
    }

    .blog .title a:hover {
        color: #CC0000;
        text-decoration: underline;
    }

    .blog .detail {
        font-size: 15px;
        text-align: left;
        padding-right: 15px;
        padding-left: 15px;
        color: #666666;
        line-height: 30px;
        padding-top: 10px;
        border-top-width: 1px;
        border-top-style: dotted;
        border-top-color: #CCC;
    }

    .blog .more {
        float: right;
        padding-left: 15px;
        background-image: url(img/entlist.jpg);
        background-repeat: no-repeat;
        background-position: left center;
        font-weight: bold;
    }

    .blog .date {
        background-image: url(img/calender.jpg);
        background-repeat: no-repeat;
        background-position: left center;
        line-height: 22px;
        padding-left: 30px;
        height: 22px;
        font-weight: bold;
    }

    .blog .plist {
        margin-right: 3px;
        margin-left: 3px;
    }

    .blog .plist a {
        color: #666666;
        margin-right: 3px;
        margin-left: 3px;
    }


    <?php if (!is_mobile()) : ?>
        dl#easy_search {
        width: 700px;
        margin: 0 auto 26px;
        background: url(<?php bloginfo('template_directory'); ?>/img/common/bg-contents-body.jpg) repeat-y;
    }

    dl#easy_search dt {
        padding-bottom: 23px;
    }

    dl#easy_search dt {
        background: url(<?php bloginfo('template_directory'); ?>/img/top/bg-search-head.jpg) no-repeat;
    }

    dl#easy_search dd {
        padding: 0 0 45px;
        margin: 0;
        background: url(<?php bloginfo('template_directory'); ?>/img/top/bg-search-bottom.jpg) no-repeat bottom;
    }

    dl#easy_search table {
        width: 696px;
        margin: 0px auto 5px;
        border-top: 1px solid #e5e5e5;
    }

    dl#easy_search th {
        width: 160px;
    }

    <?php else  : ?>#easy_search dt {
        font-weight: bold;
        padding: 20px 20px 10px;
    }

    #easy_search table,
    #easy_search td,
    #easy_search th {
        border: none;
        line-height: 180%;
        font-size: 150%;
    }

    #easy_search select {
        font-size: 120%;
        width: 50%;
    }

    #easy_search input[type=checkbox],
    #easy_search input[type=radio] {
        width: 24px;
        height: 24px;
        -moz-transform: scale(1.4);
        -webkit-transform: scale(1.4);
        transform: scale(1.4);
    }

    <?php endif; ?>
    dl#easy_search th,
    dl#easy_search td {
        padding: 10px 20px;
        border-bottom: 1px solid #e5e5e5;
    }

    dl#easy_search th {
        border-right: 1px solid #e5e5e5;
    }

    dl#search_more {
        margin-bottom: 30px;
        background: none;
    }

    dl#search_more dt {
        display: block;
        padding: 0px;
        border: none;
        background: none;
        cursor: pointer;
    }

    dl#search_more dt img {
        display: block;
        width: 686px;
        height: 40px;
        margin: 0px auto 0px;
    }

    dl#easy_search ul:after {
        display: block;
        visibility: hidden;
        clear: both;
        height: 0;
        font-size: 0;
        content: " ";
    }

    dl#search_more dd {
        display: none;
        padding: 10px 20px;
        border-bottom: 1px solid #e5e5e5;
        background: none;
    }

    dl#easy_search th img {
        padding-left: 20px;
        background: url(<?php bloginfo('template_directory'); ?>/img/common/mark-arrow-yellow.png) no-repeat 0px center;
    }

    #easy_search dt img {
        padding: 20px 0 0 10px;
    }

    a#btn_search_start img {
        display: block;
        width: 610px;
        margin: 0 auto;
    }

    img#txt_search_start {
        display: block;
        width: 132px;
        margin: 10px auto;
    }

    dl#easy_search ul.list_wide {
        margin: 0px;
    }

    dl#easy_search ul.list_wide li {
        width: 200px;
        float: left;
        margin: 2px 0px;
    }
</style>