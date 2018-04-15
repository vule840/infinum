<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">
	<div class="container-fluid p-0">
		<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
          
			  <div class="header-wrap" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;">
			     <header class="entry-header">
			    <h1 class="entry-title"><?php the_title(); ?></h1>
			     </header>
			  </div>  
	</div>


	<!-- Featurd tx -->
	<div id="featured">
		<div class="container"><h1 class="featured_text text-center"><?php the_field('featured_text') ?></h1></div>
		
	</div>
	
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			
		
			<main class="site-main" id="main">
				
					
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

						<?php understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		

	</div><!-- .row -->
		<div id="newsletter">
				<?php  dynamic_sidebar('newsletter')  ?>

			</div>
</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
