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
      <img src="<?php bloginfo('template_directory'); ?>/img/form_top.jpg" border="0" alt="利用目的にあったウォーターサーバー業者を簡単検索！" class="contents_title" />
  </dt>
  <dd>
    <table class="formtable">
      <tr>
        <th><i class="fas fa-tint"></i> お水の種類</th>
        <td>
          <ul class="list_widesp">
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
        <th><i class="fas fa-tint"></i> ボトルの種類</th>
        <td>
          <ul class="list_widesp">
            <li>
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
        <th><i class="fas fa-tint"></i> レンタル・メンテナンス代</th>
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
        <th><i class="fas fa-tint"></i> 配送料</th>
        <td>
          <ul>
            <li>
              <input type="radio" name="shipping_fee" id="filtering05_01" value="free" checked="checked" />
              <label for="filtering05_01">無料</label>
            </li>
          </ul>
        </td>
      </tr>
      <tr>
        <th><i class="fas fa-tint"></i> こだわり条件を選ぶ！</th>
        <td>
          <ul class="list_wide">
            <li>
              <input type="checkbox" name="price" value="1" id="filtering01_01" <?php if (isset($_POST['price'])) { echo 'checked="checked"'; } ?> />
              <label for="filtering01_01">お水の価格が安い</label>
            </li>
            <li>
              <input type="checkbox" name="total" value="1" id="filtering01_02"  <?php if (isset($_POST['total'])) { echo 'checked="checked"'; } ?> />
              <label for="filtering01_02"><?php if(!is_mobile()){ ?>１カ月当たりの<?php } ?>トータル費用が安い</label>
            </li>
            <li>
              <input type="checkbox" name="panajiumu" value="1" id="filtering01_03"  <?php if (isset($_POST['panajiumu'])) { echo 'checked="checked"'; } ?>/>
              <label for="filtering01_03"><?php if(!is_mobile()){ ?>
                富士山の
              <?php } ?>バナジウム天然水</label>
            </li>
            <li>
              <input type="checkbox" name="milk" value="1" id="filtering01_04"  <?php if (isset($_POST['milk'])) { echo 'checked="checked"'; } ?> />
              <label for="filtering01_04">赤ちゃん・子供に最適</label>
            </li>
            <li>
              <input type="checkbox" name="campaign" value="1" id="filtering01_05"  <?php if (isset($_POST['campaign'])) { echo 'checked="checked"'; } ?> />
              <label for="filtering01_05">キャンペーンあり</label>
            </li>
            <li>
              <input type="checkbox" name="transfer" value="1" id="filtering01_06"  <?php if (isset($_POST['transfer'])) { echo 'checked="checked"'; } ?> />
              <label for="filtering01_06">乗り換え割あり</label>
          </li>
          </ul>
        </td>
      </tr>
      <tr>
      <td colspan="2" class="bo0">
    <dl id="search_more">
      <dt>
        <div id="morebutton">
          <p class="pink right futo">
            さらにこだわって選びたい方はこちら ⇒
          </p>
        </div>
      </dt>
      <dd class="bo0">
      <ul class="list_wide">
        <li>
          <input type="checkbox" name="water_examination" value="1" id="filtering06_01" <?php if (isset($_POST['water_examination'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_01">放射性物質チェック済み</label>
        </li>
        <li>
          <input type="checkbox" name="hygiene_management" value="1" id="filtering06_02" <?php if (isset($_POST['hygiene_management'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_02">衛生管理万全</label>
        </li>
        <li>
          <input type="checkbox" name="design" value="1" id="filtering06_03" <?php if (isset($_POST['design'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_03">グッドデザイン賞受賞</label>
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
          <label for="filtering06_08">サーバーの種類・色が豊富</label>
        </li>
        <li>
          <input type="checkbox" name="weight_light" value="1" id="filtering06_09" <?php if (isset($_POST['weight_light'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_09">容器が軽い</label>
        </li>
        <li>
          <input type="checkbox" name="delivery" value="1" id="filtering06_10" <?php if (isset($_POST['delivery'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_10">設置までが早い</label>
        </li>
        <li>
          <input type="checkbox" name="type" value="1" id="filtering06_11" <?php if (isset($_POST['type'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_11">お水の種類が豊富</label>
        </li>
        <li>
          <input type="checkbox" name="foot" value="1" id="filtering06_12" <?php if (isset($_POST['foot'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_12">足元で簡単にボトル交換できる</label>
        </li>
        <li>
          <input type="checkbox" name="support" value="1" id="filtering06_13" <?php if (isset($_POST['support'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_13">サポート充実</label>
        </li>
        <li>
          <input type="checkbox" name="silent" value="1" id="filtering06_14" <?php if (isset($_POST['silent'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_14">サーバーがスリム</label>
        </li>
        <li>
          <input type="checkbox" name="sparkling" value="1" id="filtering06_15" <?php if (isset($_POST['sparkling'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_15">サーバー動作音が静か</label>
        </li>
        <li>
          <input type="checkbox" name="sparkling" value="1" id="filtering06_16" <?php if (isset($_POST['sparkling'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_16">炭酸水が飲める</label>
        </li>
        <li>
          <input type="checkbox" name="popular" value="1" id="filtering06_17" <?php if (isset($_POST['popular'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_17">人気がある</label>
        </li>
        <li>
          <input type="checkbox" name="contract" value="1" id="filtering06_18" <?php if (isset($_POST['contract'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_18">契約プランが豊富</label>
        </li>
        <li>
          <input type="checkbox" name="itqi" value="1" id="filtering06_19" <?php if (isset($_POST['itqi'])) { echo 'checked="checked"'; } ?>/>
          <label for="filtering06_19">iTQi受賞</label>
        </li>
        </ul>
      </dd>
    </dl>
    </td>
    </tr>
    </table>
     <a href="#" id="btn_search_start">
     <?php if(!is_mobile()){ ?>
      <img src="<?php bloginfo('template_directory'); ?>/img/form_bottom.jpg" alt="あなたにおすすめのウォーターサーバーを検索開始"/>
    <?php }else{ ?>
     <img src="<?php bloginfo('template_directory'); ?>/img/form_bottom_sp.jpg" alt="あなたにおすすめのウォーターサーバーを検索開始" />
    <?php } ?>
     </a>
  </dd>
</dl>
<input type="hidden" name="o" />
<input type="hidden" name="d" />
</form>
<!----検索フォーム ---->