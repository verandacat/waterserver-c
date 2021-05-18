<!----検索フォーム ---->
<?php
$img_name = "/img/top/btn-search-more_off.jpg";
if (is_page('serversearch')) {

$img_name = "/img/search/btn-search-more-long_off.jpg";

}
?>
<form action="<?php bloginfo('url'); ?>/serversearch" id="newform" method="post">
<dl id="easy_search">
  <dt>
      <img src="<?php bloginfo('template_directory'); ?>/img/form_top.jpg" border="0" alt="利用目的にあったウォーターサーバー業者を簡単検索！" class="contents_title" />
  </dt>
  <dd>
  
    <table class="nformtable">
      <thead>
        <tr>
          <th><i class="fas fa-tint"></i> 水の種類</th>
          <th><i class="fas fa-tint"></i> ボトルの種類</th>
          <th><i class="fas fa-tint"></i> レンタル・メンテナンス代</th>
          <th><i class="fas fa-tint"></i> 配送料</th>
        </tr>
      </thead>
      <tbody class="ue">
      <tr>
        <td>
          <div class="selectdiv">
            <label>
              <select>
                <option name="water_type" id="filtering02_01" value="" <?php if ( ! isset($_POST['water_type']) || empty($_POST['water_type'])) { echo 'selected'; } ?>>選択なし</option>
                <option name="water_type" id="filtering02_02" value="natural" <?php if (isset($_POST['water_type']) && $_POST['water_type'] == 'natural') { echo 'selected'; } ?>>天然水</option>
                <option name="water_type" id="filtering02_03" value="ro" <?php if (isset($_POST['water_type']) && $_POST['water_type'] == 'ro') { echo 'selected'; } ?>>RO水</option>
              </select>
            </label>
          </div>  
        </td>
        
        <td>
          <div class="selectdiv">
            <label>
              <select>
                <option selected> ボトルの種類</option>
                <option name="bottle" id="filtering03_01" value="" <?php if ( ! isset($_POST['bottle']) || empty($_POST['bottle'])) { echo 'selected'; } ?>>選択なし</option>
                <option name="bottle" id="filtering03_02" value="disposable" <?php if (isset($_POST['bottle']) && $_POST['bottle'] == 'disposable') { echo 'selected'; } ?>>ワンウェイ（使い捨て）方式</option>
                <option name="bottle" id="filtering03_03" value="returnable" <?php if (isset($_POST['bottle']) && $_POST['bottle'] == 'returnable') { echo 'selected'; } ?>>リターナブル（返却）方式</option>
              </select>
            </label>
          </div>  
        </td>

        <td>
          <div class="selectdiv">
            <label>
              <select>
                <option selected> レンタル・メンテナンス代</option>
                <option  name="rental_fee" id="filtering04_01" value="" <?php if( !isset($_POST['rental_fee']) || empty($_POST['rental_fee'])) { echo 'selected'; } ?>>選択なし</option>
                <option name="rental_fee" id="filtering04_02" value="free" <?php if (isset($_POST['rental_fee']) && $_POST['rental_fee'] == 'free') { echo 'selected'; } ?>>無料</option>
                <option name="rental_fee" id="filtering04_03" value="charge" <?php if (isset($_POST['rental_fee']) && $_POST['rental_fee'] == 'charge') { echo 'selected'; } ?>>有料</option>
              </select>
            </label>
          </div>  
        </td>
        <td>
          <div class="selectdiv">
            <label>
              <select>
                <option selected> 配送料</option>
                <option  name="shipping_fee" id="filtering05_01" value="free" selected>無料</option>
              </select>
            </label>
          </div>  
        </td>
      </tr>
      </tbody>
      <tbody class="sita">
      <tr>
        <th><i class="fas fa-tint"></i> こだわり条件を選ぶ！</th>
        <td colspan="3" class="kod">
   		    <label>
            <input type="checkbox" name="price" value="1" id="filtering01_01" <?php if (isset($_POST['price'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            お水の価格が安い
          </label>
   		    <label>
            <input type="checkbox" name="total" value="1" id="filtering01_02" <?php if (isset($_POST['total'])) { echo 'checked="checked"'; } ?>  class="checkbox">
            <span class="checkbox-icon"></span>
            <?php if(!is_mobile()){ ?>１カ月当たりの<?php } ?>トータル費用が安い
          </label>
   		    <label>
            <input type="checkbox" name="panajiumu" value="1" id="filtering01_03"  <?php if (isset($_POST['panajiumu'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            <?php if(!is_mobile()){ ?>富士山の<?php } ?>バナジウム天然水
          </label>
   		    <label>
            <input type="checkbox" name="milk" value="1" id="filtering01_04"  <?php if (isset($_POST['milk'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            赤ちゃん・子供に最適
          </label>
   		    <label>
            <input type="checkbox" name="campaign" value="1" id="filtering01_05"  <?php if (isset($_POST['campaign'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            キャンペーンあり
          </label>
   		    <label>
            <input type="checkbox" name="transfer" value="1" id="filtering01_06"  <?php if (isset($_POST['transfer'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            乗り換え割あり
          </label>
        </td>
      </tr>
      <tr onclick="show_hide_row('hidden_row1');" class="hidrow">
        <th colspan="4"><i class="fas fa-arrow-down"></i> さらにこだわって選びたい方はこちら <i class="fas fa-arrow-down"></i></th>
      </tr>
      <tr id="hidden_row1" class="hidden_row">
        <td colspan="4" class="kod">
   		    <label>
            <input type="checkbox" name="water_examination" value="1" id="filtering06_01" <?php if (isset($_POST['water_examination'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            放射性物質チェック済み
          </label>
   		    <label>
            <input type="checkbox" name="hygiene_management" value="1" id="filtering06_02" <?php if (isset($_POST['hygiene_management'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            衛生管理万全
          </label>
   		    <label>
            <input type="checkbox" name="design" value="1" id="filtering06_03" <?php if (isset($_POST['design'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            グッドデザイン賞受賞
          </label>
   		    <label>
            <input type="checkbox" name="monde_selection" value="1" id="filtering06_04" <?php if (isset($_POST['monde_selection'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            モンドセレクション受賞
          </label>
   		    <label>
            <input type="checkbox" name="child-lock" value="1" id="filtering06_05" <?php if (isset($_POST['child-lock'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            チャイルドロック付き
          </label>
   		    <label>
            <input type="checkbox" name="mineral" value="1" id="filtering06_06" <?php if (isset($_POST['mineral'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            ミネラル豊富
          </label>
   		    <label>
            <input type="checkbox" name="desk_type" value="1" id="filtering06_07" <?php if (isset($_POST['desk_type'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            卓上タイプ有り
          </label>
   		    <label>
            <input type="checkbox" name="server_type" value="1" id="filtering06_08" <?php if (isset($_POST['server_type'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            サーバーの種類・色が豊富
          </label>
   		    <label>
            <input type="checkbox" name="weight_light" value="1" id="filtering06_09" <?php if (isset($_POST['weight_light'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            容器が軽い
          </label>
   		    <label>
            <input type="checkbox" name="delivery" value="1" id="filtering06_10" <?php if (isset($_POST['delivery'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            設置までが早い
          </label>
   		    <label>
            <input type="checkbox" name="type" value="1" id="filtering06_11" <?php if (isset($_POST['type'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            お水の種類が豊富
          </label>
   		    <label>
            <input type="checkbox" name="foot" value="1" id="filtering06_12" <?php if (isset($_POST['foot'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            足元で簡単にボトル交換できる
          </label>
   		    <label>
            <input type="checkbox" name="support" value="1" id="filtering06_13" <?php if (isset($_POST['support'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            サポート充実
          </label>
   		    <label>
            <input type="checkbox" name="silent" value="1" id="filtering06_14" <?php if (isset($_POST['silent'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            サーバーがスリム
          </label>
   		    <label>
            <input type="checkbox" name="sparkling" value="1" id="filtering06_15" <?php if (isset($_POST['sparkling'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            サーバー動作音が静か
          </label>
   		    <label>
            <input type="checkbox" name="sparkling" value="1" id="filtering06_16" <?php if (isset($_POST['sparkling'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            炭酸水が飲める
          </label>
   		    <label>
            <input type="checkbox" name="popular" value="1" id="filtering06_17" <?php if (isset($_POST['popular'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            人気がある
          </label>
   		    <label>
            <input type="checkbox" name="contract" value="1" id="filtering06_18" <?php if (isset($_POST['contract'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            契約プランが豊富
          </label>
   		    <label>
            <input type="checkbox" name="itqi" value="1" id="filtering06_19" <?php if (isset($_POST['itqi'])) { echo 'checked="checked"'; } ?> class="checkbox">
            <span class="checkbox-icon"></span>
            iTQi受賞
          </label>
      </td>
    </tr>
    </tbody>
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