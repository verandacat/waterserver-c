<?php get_header(); ?>
<div id="wrapper">
		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<div id="footmark">
					<a href="<?php bloginfo('url'); ?>/">トップページ</a><span>&nbsp;&gt;&nbsp;<?php the_category('column'); ?></span></div>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2>Archive for <?php the_time('F jS, Y'); ?></h2>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2>Archive for <?php the_time('F, Y'); ?></h2>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="pagetitle">Author Archive</h2>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="pagetitle">Blog Archives</h2>

			<?php } ?>

			<?php query_posts($query_string . "&order=ASC"); ?>
			<?php while (have_posts()) : the_post(); ?>

			<dl class="category-wrapper">

					<h2 class="column-title" id="post-<?php the_ID(); ?>">
							<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						</h2>
						
						<div class="flex-wrpper">
						<?php
							if(has_post_thumbnail()): ?>
							<div class="entry-img content-box">
								<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail(); ?>
								</a>
							</div>
							<?php else:
							
							endif;
							?>
							<div class="entry content-box">
							<?php the_excerpt(); ?>
							</div>
						</div>
			</dl>
		  
				
						

			<?php endwhile; ?>

			
			<?php
			if ( function_exists( 'pagination' ) ) :
				pagination( $wp_query->max_num_pages, get_query_var( 'paged' ) );
			endif; ?>

	<?php else : ?>

		<h2>お探しのページは見つかりませんでした。</h2>

	<?php endif; ?>
					
   

<?php get_footer(); ?>
</div><!-- / wrapper-->
</div><!-- / contents box -->
