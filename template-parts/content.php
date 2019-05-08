<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package winerack
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    
	
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				winerack_posted_on();
				winerack_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
    
    <div class="uk-flex uk-flex-middle">
	<?php if ( has_post_thumbnail() )the_post_thumbnail('post');?> 

	<div class="entry-content uk-margin-remove">
		<?php
		
		the_excerpt();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'winerack' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	
    </div>

	<footer class="entry-footer">
		<?php winerack_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
