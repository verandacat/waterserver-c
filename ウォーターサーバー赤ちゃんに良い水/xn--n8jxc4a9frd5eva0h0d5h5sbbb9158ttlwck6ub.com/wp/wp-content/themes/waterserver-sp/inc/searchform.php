<!----検索フォーム ---->
	<section id="easy_search">
    <h2>利用目的にあった<br>
    ウォーターサーバー業者を簡単検索！</h2>
  
<form action="<?php bloginfo('url'); ?>/serversearch" id="form1" method="post">
  	<div id="easy_select">
    	<dl>
      	<dt><span>こだわり条件を選ぶ！</span></dt>
        <dd>
        	<ul>
						<li>
							<label><input type="checkbox" name="low_price" value="1">お水の価格が安い</label>
						</li>
						<li>
							<label><input type="checkbox"  name="save_electricity" value="1">節電機能付き</label>
						</li>
						<li>
							<label><input type="checkbox" name="panajiumu" value="1">富士山のバナジウム天然水</label>
						</li>
						<li>
							<label><input type="checkbox" name="milk" value="1">赤ちゃんのミルク作りに最適</label>
						</li>
						<li>
							<label><input type="checkbox" name="shipping" value="1">全国配送可能</label>
						</li>
						<li>
							<label><input type="checkbox" name="useful" value="1">とにかくラクラク便利♪</label>
						</li>
          </ul>
        </dd>
      </dl>

    	<dl>
      	<dt><span>お水の種類</span></dt>
        <dd>
        	<ul>
						<li>
							<label><input type="radio" name="water_type" value="" checked="checked">選択なし</label>
						</li>
						<li>
							<label><input type="radio" name="water_type" value="natural">天然水</label>
						</li>
						<li>
							<label><input type="radio" name="water_type" value="ro">RO水</label>
						</li>
          </ul>
        </dd>
      </dl>

    	<dl>
      	<dt><span>ボトルの種類</span></dt>
        <dd>
        	<ul>
						<li>
							<label><input type="radio" name="bottle" value="" checked="checked">選択なし</label>
						</li>
						<li>
							<label><input type="radio" name="bottle" value="disposable">ワンウェイ（使い捨て）方式</label>
						</li>
						<li>
							<label><input type="radio" name="bottle" value="returnable">リターナブル（返却）方式</label>
						</li>
          </ul>
        </dd>
      </dl>

    	<dl>
      	<dt><span>サーバーレンタル代&amp;メンテナンス代</span></dt>
        <dd>
        	<ul>
						<li>
							<label><input type="radio" name="rental_fee" value="" checked="checked">選択なし</label>
						</li>
						<li>
							<label><input type="radio" name="rental_fee" value="free">無料</label>
						</li>
						<li>
							<label><input type="radio" name="rental_fee" value="charge">有料</label>
						</li>
          </ul>
        </dd>
      </dl>

    	<dl>
      	<dt><span>配送料</span></dt>
        <dd>
        	<ul>
						<li>
							<label><input type="radio" name="shipping_fee" value="free" checked="checked">無料</label>
						</li>
          </ul>
        </dd>
      </dl>

    	<dl id="more_search">
      	<dt><span>さらにこだわって選びたい方はこちら</span></dt>
        <dd>
        	<ul>
						<li>
							<label><input type="checkbox" name="water_examination" value="1">お水の検査体制万全</label>
						</li>
						<li>
							<label><input type="checkbox" name="hygiene_management" value="1">衛生管理万全</label>
						</li>
						<li>
							<label><input type="checkbox" name="design" value="1">デザインがおしゃれ</label>
						</li>
						<li>
							<label><input type="checkbox" name="monde_selection" value="1">モンドセレクション受賞</label>
						</li>
						<li>
							<label><input type="checkbox" name="child-lock" value="1">チャイルドロック付き</label>
						</li>
						<li>
							<label><input type="checkbox" name="mineral" value="1">ミネラル豊富<</label>
						</li>
						<li>
							<label><input type="checkbox" name="desk_type" value="1">卓上タイプ有り</label>
						</li>
						<li>
							<label><input type="checkbox"  name="server_type" value="1">サーバーの種類が多い</label>
						</li>
						<li>
							<label><input type="checkbox" name="weight_light" value="1">容器が軽い</label>
						</li>
						<li>
							<label><input type="checkbox" name="delivery" value="1">出荷が早い</label>
						</li>
						<li>
							<label><input type="checkbox" name="initial_cost_free" value="1">初期費用無料</label>
						</li>
						<li>
							<label><input type="checkbox" name="disney" value="1">ディズニーキャラクターサーバー有り</label>
						</li>
          </ul>
        </dd>
      </dl>
    </div>
    <em><a href="#" id="btn_search_start"><img src="<?php bloginfo('template_directory'); ?>/img/btn-search_off.jpg" alt="検索開始" width="240" height="45"></a></em>
  </section><!-- Section [Easy Search] -->
</form>
<!----検索フォーム ---->