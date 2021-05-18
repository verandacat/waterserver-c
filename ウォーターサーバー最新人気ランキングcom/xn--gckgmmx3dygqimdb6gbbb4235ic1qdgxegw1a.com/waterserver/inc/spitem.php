
	<dl class="result search_result_items box">
	<dd>
<div class="s_items">
	<div class="s_items_header">
		<div class="upper_left">
			<a target="_blank" href="<?php bloginfo('url'); ?>/links?link_id=<?php echo $post['id'];?>" class="prrrr"><img src="<?php echo $post['banner']; ?>" alt="<?php echo $post["product_name"]; ?>" width="125" height="125" />
			</a>
		</div>
		<h3 class="list_item_title">
			<a target="_blank" href="<?php bloginfo('url'); ?>/links?link_id=<?php echo $post['id'];?>" class="prrrr"><?php echo $post["product_name"]; ?></a>
		</h3>
	</div>
	<div class="s_items_body">
		<div class="s_items_upper">
			<div class="upper_right">
					<strong><?php echo $post["recommend_headline"];?></strong>
					<p><?php echo $post["recommend_description"];?></p>
			</div>
		</div>
		<div class="s_items_table quad">
			<table>
				<tr>
					<th>配送料</th>
					<td><?php echo $post["shipping_cost"];?></td>
					<th>お水の種類</th>
					<td><?php echo implode('、',$post['water_types']);?></td>
				</tr>
				<tr>
					<th class="vl">サーバー代/月</th>
					<td>
					<?php if(!preg_match("/[0-9]{4}/",$post["server_cost"])) : ?>
						<?php echo $post["server_cost"]; ?>
						<?php echo $post["server_cost2"]; ?>
						<?php else : ?>
						<?php echo number_format($post["server_cost"]); ?>円
						<?php echo $post["server_cost2"]; ?>
					<?php endif; ?>
					</td>
					<th>ボトルの種類</th>
					<td><?php echo $post["bottle"];?>タイプ</td>
				</tr>
			</table>
		</div>
		<div class="s_items_table">
			<table>
				<tr>
					<th>お水の価格</th>
					<td><?php echo number_format($post["water_cost"]); ?>円<?php echo $post["water_cost2"]; ?></td>
				</tr>
				<tr>
					<th>宅配エリア</th>
					<td><?php echo $post["shipping_area"];?></td>
				</tr>
				<tr>
					<th>電気代/月</th>
					<td>
					<?php if(!preg_match("/[0-9]{4}/",$post["electricity_cost"])) : ?>
					<?php echo $post["electricity_cost"]; ?>
						<?php echo $post["electricity_cost2"]; ?>
						<?php else : ?>
						<?php echo number_format($post["electricity_cost"]); ?>円
						<?php echo $post["electricity_cost2"]; ?>
					<?php endif; ?>
					</td>
				</tr>
			</table>
		</div>
		<div class="tokoshiki">

			<a href="<?php bloginfo('url'); ?>/links?link_id=<?php echo $post['id'];?>" rel="external nofollow" class="official_site prrrr">
				<span>公式サイトはこちら</span>
			</a>
		</div>
	</div>
</div>
</dd>
</dl>