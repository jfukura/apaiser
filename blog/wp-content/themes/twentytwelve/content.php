<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
    
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-top:20px;display:inline-block;padding-bottom:20px;">
		<?php if ( is_single() ) : ?>
		<div class="grid_9 alpha omega">
		<?php else : ?>
		<div class="grid_2 alpha">
            <?php the_post_thumbnail(); ?>
        </div>
		<div class="grid_7 omega">
        <?php endif; ?>
            
            <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
            <div class="featured-post">
                <?php _e( 'Featured post', 'twentytwelve' ); ?>
            </div>
            <?php endif; ?>
            <header class="entry-header">
                
                <?php if ( is_single() ) : ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php else : ?>
                <h1 class="entry-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h1>
                <?php endif; // is_single() ?>
                <div style="color:#fff !important;">
                <?php twentytwelve_entry_meta(); ?>
                <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
                <?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
                    <div class="author-info" style="color:#fff;">
                        <div class="author-avatar">
                            <?php
                            /** This filter is documented in author.php */
                            $author_bio_avatar_size = apply_filters( 'twentytwelve_author_bio_avatar_size', 68 );
                            echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
                            ?>
                        </div><!-- .author-avatar -->
                        <div class="author-description">
                            <h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
                            <p><?php the_author_meta( 'description' ); ?></p>
                            <div class="author-link">
                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                                    <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
                                </a>
                            </div><!-- .author-link	-->
                        </div><!-- .author-description -->
                    </div><!-- .author-info -->
                <?php endif; ?>
                </div>
            </header><!-- .entry-header -->
    
            <?php if ( is_search() ) : // Only display Excerpts for Search ?>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
            <?php else : ?>
            <div class="entry-content">
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
            </div><!-- .entry-content -->
            <?php endif; ?>

		</div>	
	</article><!-- #post -->
