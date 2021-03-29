<!----検索フォーム ---->
<?php
$img_name = "/img/top/btn-search-more_off.jpg";
if (is_page('serversearch')) {

$img_name = "/img/search/btn-search-more-long_off.jpg";

}
?>
<form action="<?php bloginfo('url'); ?>/serversearch" id="form1" method="post">
<dl id="easy_search">
	<dt>
		<img src="<?php bloginfo('template_directory'); ?>/img/top/ttl-search.png" alt="利用目的にあったウォーターサーバー業者を簡単検索！" width="522" height="25" class="contents_title" />
		<img src="<?php bloginfo('template_directory'); ?>/img/top/txt-search-en.png" alt="SEARCH" width="53" height="12" class="contents_title_en" />
	</dt>
	<dd>
		<table>
			<tr>
				<th><img src="<?php bloginfo('template_directory'); ?>/img/top/ttl-search-filtering01.gif" alt="こだわり条件を選ぶ！" width="132" height="14" /></th>
				<td>
					<ul class="list_wide">
						<li>
							<input type="checkbox" name="low_price" value="1" id="filtering01_01" <?php if (isset($_POST['low_price'])) { echo 'checked="checked"'; } ?> />
							<label for="filtering01_01">お水の価格が安い</label>
						</li>
						<li>
							<input type="checkbox" name="save_electricity" value="1" id="filtering01_02"  <?php if (isset($_POST['save_electricity'])) { echo 'checked="checked"'; } ?> />
							<label for="filtering01_02">節電機能付き</label>
						</li>
						<li>
							<input type="checkbox" name="panajiumu" value="1" id="filtering01_03"  <?php if (isset($_POST['panajiumu'])) { echo 'checked="checked"'; } ?>/>
							<label for="filtering01_03">富士山のバナジウム天然水</label>
						</li>

						<li>
							<input type="checkbox" name="milk" value="1" id="filtering01_04"  <?php if (isset($_POST['milk'])) { echo 'checked="checked"'; } ?> />
							<label for="filtering01_04">赤ちゃんのミルク作りに最適</label>
						</li>

						<li>
							<input type="checkbox" name="shipping" value="1" id="filtering01_05"  <?php if (isset($_POST['shipping'])) { echo 'checked="checked"'; } ?> />
							<label for="filtering01_05">全国配送可能</label>
						</li>
						<li>
							<input type="checkbox" name="useful" value="1" id="filtering01_06"  <?php if (isset($_POST['useful'])) { echo 'checked="checked"'; } ?> />
							<label for="filtering01_06">とにかくラクラク便利♪</label>
						</li>
					</ul>
				</td>
			</tr>
			<tr>
				<th><img src="<?php bloginfo('template_directory'); ?>/img/top/ttl-search-filtering02.gif" alt="お水の種類" width="69" height="14" /></th>
				<td>
					<ul>
						<li>
							<input type="radio" name="water_type" id="filtering02_01" value="" <?php if ( ! isset($_POST['water_type']) || empty($_POST['water_type'])) { echo 'checked="checked"'; } ?> />
							<label for="filtering02_01">選択なし</label>
						</li>
						<li>
							<input type="radio" name="water_type" id="filtering02_02" value="natural" <?php if (isset($_POST['water_type']) && $_POST['water_type'] == 'natural') { echo 'checked="checked"'; } ?> />
							<label for="filtering02_02">天然水</label>
						</li>
						<li>
							<input type="radio" name="water_type" id="filtering02_03" value="ro" <?php if (isset($_POST['water_type']) && $_POST['water_type'] == 'ro') { echo 'checked="checked"'; } ?> />
							<label for="filtering02_03">RO水</label>
						</li>
					</ul>
				</td>
			</tr>
			<tr>
				<th><img src="<?php bloginfo('template_directory'); ?>/img/top/ttl-search-filtering03.gif" alt="ボトルの種類" width="83" height="13" /></th>
				<td>
					<ul class="list_wide">
						<li class="list_float_none">
							<input type="radio" name="bottle" id="filtering03_01" value="" <?php if ( ! isset($_POST['bottle']) || empty($_POST['bottle'])) { echo 'checked="checked"'; } ?> />
							<label for="filtering03_01">選択なし</label>
						</li>
						<li>
							<input type="radio" name="bottle" id="filtering03_02" value="disposable" <?php if (isset($_POST['bottle']) && $_POST['bottle'] == 'disposable') { echo 'checked="checked"'; } ?>/>
							<label for="filtering03_02">ワンウェイ（使い捨て）方式</label>
						</li>
						<li>
							<input type="radio" name="bottle" id="filtering03_03" value="returnable" <?php if (isset($_POST['bottle']) && $_POST['bottle'] == 'returnable') { echo 'checked="checked"'; } ?>/>
							<label for="filtering03_03">リターナブル（返却）方式</label>
						</li>
					</ul>
				</td>
			</tr>
			<tr>
				<th><img src="<?php bloginfo('template_directory'); ?>/img/top/ttl-search-filtering04.gif" alt="サーバーレンタル代&amp;メンテナンス代" width="125" height="33" /></th>
				<td>
					<ul>
						<li>
							<input type="radio" name="rental_fee" id="filtering04_01" value="" <?php if ( ! isset($_POST['rental_fee']) || empty($_POST['rental_fee'])) { echo 'checked="checked"'; } ?> />
							<label for="filtering04_01">選択なし</label>
						</li>
						<li>
							<input type="radio" name="rental_fee" id="filtering04_02" value="free" <?php if (isset($_POST['rental_fee']) && $_POST['rental_fee'] == 'free') { echo 'checked="checked"'; } ?>/>
							<label for="filtering04_02">無料</label>
						</li>
						<li>
							<input type="radio" name="rental_fee" id="filtering04_03" value="charge" <?php if (isset($_POST['rental_fee']) && $_POST['rental_fee'] == 'charge') { echo 'checked="checked"'; } ?>/>
							<label for="filtering04_03">有料</label>
						</li>
					</ul>
				</td>
			</tr>
			<tr>
				<th><img src="<?php bloginfo('template_directory'); ?>/img/top/ttl-search-filtering05.gif" alt="配送料" width="42" height="13" /></th>
				<td>
					<ul>
						<li>
							<input type="radio" name="shipping_fee" id="filtering05_01" value="free" checked="checked" />
							<label for="filtering05_01">無料</label>
						</li>
					</ul>
				</td>
			</tr>
		</table>

		<dl id="search_more">
			<dt><img src="<?php bloginfo('template_directory');  echo $img_name; ?>" alt="さらにこだわって選びたい方はこちら" width="686" height="40" /></dt>
			<dd>
				<ul class="list_wide">
					<li>
						<input type="checkbox" name="water_examination" value="1" id="filtering06_01" <?php if (isset($_POST['water_examination'])) { echo 'checked="checked"'; } ?>/>
						<label for="filtering06_01">お水の検査体制万全</label>
					</li>
					<li>
						<input type="checkbox" name="hygiene_management" value="1" id="filtering06_02" <?php if (isset($_POST['hygiene_management'])) { echo 'checked="checked"'; } ?>/>
						<label for="filtering06_02">衛生管理万全</label>
					</li>
					<li>
						<input type="checkbox" name="design" value="1" id="filtering06_03" <?php if (isset($_POST['design'])) { echo 'checked="checked"'; } ?>/>
						<label for="filtering06_03">デザインがおしゃれ</label>
					</li>
					<li>
						<input type="checkbox" name="monde_selection" value="1" id="filtering06_04" <?php if (isset($_POST['monde_selection'])) { echo 'checked="checked"'; } ?>/>
						<label for="filtering06_04">モンドセレクション受賞</label>
					</li>
					<li>
						<input type="checkbox" name="child-lock" value="1" id="filtering06_05" <?php if (isset($_POST['child-lock'])) { echo 'checked="checked"'; } ?>/>
						<label for="filtering06_05">チャイルドロック付き</label>
					</li>
					<li>
						<input type="checkbox" name="mineral" value="1" id="filtering06_06" <?php if (isset($_POST['mineral'])) { echo 'checked="checked"'; } ?>/>
						<label for="filtering06_06">ミネラル豊富</label>
					</li>
					<li>
						<input type="checkbox" name="desk_type" value="1" id="filtering06_07" <?php if (isset($_POST['desk_type'])) { echo 'checked="checked"'; } ?>/>
						<label for="filtering06_07">卓上タイプ有り</label>
					</li>
					<li>
						<input type="checkbox" name="server_type" value="1" id="filtering06_08" <?php if (isset($_POST['server_type'])) { echo 'checked="checked"'; } ?>/>
						<label for="filtering06_08">サーバーの種類が多い</label>
					</li>
					<li>
						<input type="checkbox" name="weight_light" value="1" id="filtering06_09" <?php if (isset($_POST['weight_light'])) { echo 'checked="checked"'; } ?>/>
						<label for="filtering06_09">容器が軽い</label>
					</li>
					<li>
						<input type="checkbox" name="delivery" value="1" id="filtering06_10" <?php if (isset($_POST['delivery'])) { echo 'checked="checked"'; } ?>/>
						<label for="filtering06_10">出荷が早い</label>
					</li>
					<li>
						<input type="checkbox" name="initial_cost_free" value="1" id="filtering06_11" <?php if (isset($_POST['initial_cost_free'])) { echo 'checked="checked"'; } ?>/>
						<label for="filtering06_11">初期費用無料</label>
					</li>
<!--
					<li>
						<input type="checkbox" name="disney" value="1" id="filtering06_12" <?php if (isset($_POST['disney'])) { echo 'checked="checked"'; } ?>/>
						<label for="filtering06_12">ディズニーキャラクターサーバー有り</label>
					</li>
-->
				</ul>
			</dd>
		</dl>

		<img src="<?php bloginfo('template_directory'); ?>/img/top/txt-search-start-en.gif" alt="SEARCH&nbsp;START" width="132" height="12" id="txt_search_start" />
		<a href="#" id="btn_search_start"><img src="<?php bloginfo('template_directory'); ?>/img/top/btn-search-start_off.jpg" alt="あなたにおすすめのウォーターサーバーを検索開始" width="610" height="60" /></a>
	</dd>
</dl>
<input type="hidden" name="o" />
<input type="hidden" name="d" />
</form>
<!----検索フォーム ---->