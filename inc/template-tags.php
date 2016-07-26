<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Liberty
 */

if ( ! function_exists( 'liberty_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function liberty_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	if ( is_single() ) {
		$posted_on = sprintf( esc_attr__( 'Posted on %1$s', 'liberty' ),
						'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
					);
	}
	else {
		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
	}

	if ( is_single() ) {
		$byline = sprintf( esc_html__( 'by %1$s', 'liberty' ),
					'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
				);
	}
	else {
		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
	}

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'liberty' ), esc_html__( '1 Comment', 'liberty' ), esc_html__( '% Comments', 'liberty' ) );
		echo '</span>';
	}

	if ( ! is_single() ) {
		edit_post_link( sprintf( esc_html__( 'Edit %1$s', 'liberty' ), '<span class="screen-reader-text">' . the_title_attribute( 'echo=0' ) . '</span>' ), '<span class="edit-link">', '</span>' );
	}
}
endif;

if ( ! function_exists( 'liberty_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function liberty_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'liberty' ) );
		if ( $categories_list && liberty_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'liberty' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'liberty' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'liberty' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	edit_post_link( sprintf( esc_html__( 'Edit %1$s', 'liberty' ), '<span class="screen-reader-text">' . the_title_attribute( 'echo=0' ) . '</span>' ), '<span class="edit-link">', '</span>' );
}
endif;

/*
 * Custom comments display to move Reply link,
 * used in comments.php
 */
function liberty_comments( $comment, $args, $depth ) {
?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-metadata">
						<span class="comment-author vcard">
							<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>

							<?php printf( '<b class="fn">%s</b>', get_comment_author_link() ); ?>
						</span>
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( '<span class="comment-date">%1$s</span><span class="comment-time screen-reader-text">%2$s</span>', get_comment_date(), get_comment_time() ); ?>
							</time>
						</a>
						<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="reply">',
							'after'     => '</span>'
						) ) );
						?>
						<?php edit_comment_link( esc_html__( 'Edit', 'liberty' ), '<span class="edit-link">', '</span>' ); ?>

					</div><!-- .comment-metadata -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'liberty' ); ?></p>
					<?php endif; ?>
				</footer><!-- .comment-meta -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

			</article><!-- .comment-body -->
<?php
}

if ( ! function_exists( 'liberty_footer_credits' ) ) :
/**
 * Adds footer credits, including credits, copyright and quotes.
 */
function liberty_footer_credits() {
	$credits = sprintf(
		esc_html__( 'Made with %1$s &amp; %2$s', 'liberty' ),
		'<a href="' . esc_url( 'https://wordpress.org' ) . '">' . 'WordPress' . '</a>',
		'<a href="' . esc_url( 'https://github.com/davidakennedy/liberty' ) . '">' . 'Liberty' . '</a>.'
	);

	$copyright = esc_html__( '&copy; 2009 – ' . date( 'Y' ) . ' David A. Kennedy.', 'liberty' );

	$quotes = array(
		esc_html__( 'Go Gators!' ),
		esc_html__( 'Probably eating a pb&amp;j.' ),
		esc_html__( 'Doing some burpees.' ),
		esc_html__( 'So many video games, so little time.' ),
	);

	echo $credits . ' ' . $copyright . ' ' . $quotes[rand( 0, count( $quotes ) - 1 )];
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function liberty_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'liberty_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'liberty_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so liberty_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so liberty_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in liberty_categorized_blog.
 */
function liberty_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'liberty_categories' );
}
add_action( 'edit_category', 'liberty_category_transient_flusher' );
add_action( 'save_post',     'liberty_category_transient_flusher' );
