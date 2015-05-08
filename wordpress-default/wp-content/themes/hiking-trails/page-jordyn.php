<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package    WordPress
 * @subpackage Twenty_Fourteen
 * @since      Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id="main-content" class="main-content">

		<?php
		if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
			// Include the featured content template.
			get_template_part('featured-content');
		}
		?>
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
var_export($post);exit;
					// Include the page content template.
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php
						// Page thumbnail and title.
						the_title('<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->');
						?>

						<div class="entry-content">
							<?php
							the_content();
							wp_link_pages(array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'twentyfourteen') . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							));

							edit_post_link(__('Edit', 'twentyfourteen'), '<span class="edit-link">', '</span>');
							?>
						</div>
						<!-- .entry-content -->
					</article><!-- #post-## -->

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
				?>

			</div>
			<!-- #content -->
		</div>
		<!-- #primary -->
		<?php get_sidebar('content'); ?>
	</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
