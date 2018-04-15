<?php
/**
* Template Name: Infinum_naslovna
*
* Template for displaying a page without sidebar even if a sidebar widget is published.
*
* @package understrap
*/
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="wrapper" id="full-width-page-wrapper">
	<div class="row">
		<div class="col-md-12 py-5">
			<h2 class="text-center text-pink">The Unicorn & Duck</h2>
			
			<div style="margin:0 auto" class="col-md-3 text-center">
				<?php get_search_form( ) ?>
			</div>
		</div>
		
	</div>
	

	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<!-- ****************************
			POČETNA__1. AKTUALNO
		*******************************-->
		<div class="row">
			
				
				
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

						<div class="col-md-6">
							<?php the_post_thumbnail(''); ?>
						</div>

						<div class="col-md-6">
							<p><?php the_date( ) ?></p>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt() ?></p>
							<p><?php the_tags() ?></p>
							<p> <?php comments_number( ); ?> </p>
						</div>
					
					
				
					
					
					
					<?php endwhile; wp_reset_query(); ?>
			
				
		
		<?php

		          $ourCurrentPage = get_query_var('paged');

		          $aboutPosts = new WP_Query(array(
		            'posts_per_page'	=> 6,
					'post_type'			=> 'post',
					'offset' => 1,
					
		            'paged' => $ourCurrentPage
		          ));

			          if ($aboutPosts->have_posts()) :
			            while ($aboutPosts->have_posts()) :
			              $aboutPosts->the_post();
			              ?> 

			              		<div  class="col-md-4">

										<?php the_post_thumbnail('category-thumb'); ?>
										<p class="mb-0 py-2"><?php echo get_the_date(); ?></p>
										
										<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										
										<p><?php the_excerpt() ?></p>
										<p><?php the_tags( ) ?></p>	
										
									
									</div>
			              <?php
			            endwhile;

			             echo paginate_links(array(
			              'total' => $aboutPosts->max_num_pages
			            ));

			          endif;

			        ?>
			
		</div>
		<!-- ****************************
			POČETNA__2. INVESTICIJSKI FONDOVI
		*******************************-->
	
		<!-- ****************************
						POČETNA__3. U FOKUSU

						<div class="row">
			
			<div class="col-md-12">
				
				
					
				<?php
				$posts = get_posts(array(
					'posts_per_page'	=> -1,
									'post_type'			=> 'post',
				
				));
				if( $posts ): ?>
				
				<div class="row">
						
					<?php foreach( $posts as $post ): 
						
						setup_postdata( $post );
						
						?>
						<div  class="col-md-4">

							<?php the_post_thumbnail('category-thumb'); ?>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_date( ) ?></p>	
							<p><?php the_excerpt() ?></p>
							<p><?php the_tags( ) ?></p>	
							
						
						</div>
					<?php endforeach; ?>
					
					
					</div>
					<?php wp_reset_postdata(); ?>
					
					<?php endif; ?>
				
			</div>
			
		</div>
		*******************************-->
		
	
		
		</div>
			<div id="newsletter">
				<?php  dynamic_sidebar('newsletter')  ?>

			</div>


			
			
				
				
				</div><!-- Container end -->
				</div><!-- Wrapper end -->
				
				<?php get_footer(); ?>