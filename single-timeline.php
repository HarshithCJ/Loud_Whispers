<?php get_header(); ?>

<div class="row">
	<div class="col-xs-12 col-sm-8">
		<?php 
		$args = array(
			'post_type' => 'timeline',
		);  
		$your_loop = new WP_Query( $args );
		if( $your_loop->have_posts() ):
			
			while( have_posts() ): the_post(); ?>
				<?php $meta = get_post_meta( $post->ID, 'your_fields', true ); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1>Text Input</h1>
					<?php echo $meta['text']; ?>
					<h1>Image</h1>
					<img src="<?php echo $meta['image']; ?>">

						<?php /*<h1>Select Menu</h1>
						<p>The actual value selected.</p>
						<?php echo $meta['select']; ?>

						<h1>Checkbox</h1>
						<?php if ( $meta['checkbox'] === 'checkbox') { ?>
						Checkbox is checked.
						<?php } else { ?> 
						Checkbox is not checked. 
						<?php } ?>

						<h1>Textarea</h1>
						<?php echo $meta['textarea']; ?>

						*/ ?>
				</article>

			<?php endwhile;
			
		endif;
				
		?>
	
	</div>
	
	<div class="col-xs-12 col-sm-4">
		<?php get_sidebar(); ?>
	</div>
	
</div>

<?php get_footer(); ?>