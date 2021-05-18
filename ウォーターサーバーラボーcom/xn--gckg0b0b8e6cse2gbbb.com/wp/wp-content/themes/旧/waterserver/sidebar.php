<?php if(!is_mobile()){ ?>

<div id="sub_contents">
<?php
if (function_exists('dynamic_sidebar')) {
	//ウィジェットを使う場合はこちらのコメントアウトを取る。
	dynamic_sidebar('Sidebar Widgets');
}
 ?>

</div><!-- / sub contents box -->
<?php } ?>
