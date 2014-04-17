<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

global $commentCount;
$commentCount = 1;

function regulus_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	global $commentCount;
	extract($args, EXTR_SKIP);

	$class = bm_author_highlight();

	?>
	<dt id="comment-<?php comment_ID() ?>" <?php comment_class($class) ?>>
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php if ( $comment->comment_parent == 0 ) { 
		$comment_num = ( ( $args['page'] - 1 ) * $args['per_page'] ) + $commentCount; 
		echo $comment_num.'.'; 
		$commentCount++; 
	} ?>
	<?php comment_author_link() ?> - 
	<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_date(); ?></a> 
	<?php edit_comment_link( "[Edit]" ); ?>
	</dt>
	<dd <?php comment_class($class) ?>>
	<div class="comment" id="div-comment-<?php comment_ID() ?>">
	<?php
	comment_text();
	?>
	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	</div>
	</dd>
<?php
}

function regulus_end_comment($comment, $args, $depth) {
// null function here, to prevent extra div stuff at end of comment
}

if ( have_comments() || comments_open() ) { ?>
<div id="comments">
	<h2><?php _e('Comments'); if ( comments_open() ) : ?><a href="#postComment" title="leave a comment">&raquo;</a><?php endif; ?></h2>
<?php
	if ( post_password_required() ) { ?>
		<p>Enter your password to view comments</p>
 	<?php
	} else if ( have_comments() ) { ?>

		<dl class="commentlist">

		<?php wp_list_comments(array('callback'=>'regulus_comment', 'end-callback'=>'regulus_end_comment','style'=>'div')); 
		?>
		</dl>
		
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
		<br />

	<?php 
		if ( !comments_open() ) echo "<p>Sorry comments are closed for this entry</p>";
	} else { // If there are no comments yet
		if ( comments_open() ) echo "<p>No comments yet &#8212 be the first.</p>";
	} ?>
	
</div>

<?php
	function regulus_comment_fields($fields) {
		$comment_field = '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';
	
		array_unshift( $fields, $comment_field );
	
		return $fields;
	}
	add_filter( 'comment_form_default_fields', 'regulus_comment_fields' );

	function regulus_comment_form_defaults($defaults) {
		if ( ! is_user_logged_in() )
			$defaults['comment_field'] = '';
	
		return $defaults;
	}
	add_filter( 'comment_form_defaults', 'regulus_comment_form_defaults' );

	comment_form();
?>

<?php } ?>
