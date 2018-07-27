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
	<?php if( get_field('featured_text') ): ?>
	<div id="featured">
		<div class="container">
			
				<h1 class="featured_text text-center"><?php the_field('featured_text') ?></h1>	
		</div>
		
	</div>
	<?php endif; ?>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			
		
			<main class="site-main" id="main">
				
					
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

						<div class="kontejner2">
							<?php understrap_post_nav(); ?>
						</div>

				

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->


<?php get_template_part( 'page-templates/loadmore' ); ?>

			

			<!--  --><div class="test_apend">
				
			</div>
			

		<div class="owl-carousel owl-theme">
   <!-- <div class="item"><h4>1sdfs</h4></div>
    <div class="item"><h4>2dfsd</h4></div> --> 
   <!-- <div class="item"><h4>3fsd</h4></div>
    <div class="item"><h4>4f</h4></div>
    <div class="item"><h4>5sdfsd</h4></div>
    <div class="item"><h4>6</h4></div>
    <div class="item"><h4>7</h4></div>
    <div class="item"><h4>8</h4></div>
    <div class="item"><h4>9</h4></div>
    <div class="item"><h4>10</h4></div>
    <div class="item"><h4>11</h4></div>
    <div class="item"><h4>12</h4></div> --> 
</div>

	</div><!-- .row -->

	<div class="kontejner2">
					<?php
						//argumenti
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 1,
																	
						);
						//novi query
						$query = new WP_Query($args);
					while($query->have_posts()) : $query->the_post();
					?>
					
					
						<div class="row">
							<div class="col-md-6">
								<?php the_post_thumbnail() ?>
							</div>
							<div class="col-md-6">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php the_excerpt() ?></p>
							</div>
						</div>
						
						
					
					
					
					<?php endwhile; wp_reset_query(); ?>
				</div>
		<div id="newsletter">
				<?php  dynamic_sidebar('newsletter')  ?>

			</div>
</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
