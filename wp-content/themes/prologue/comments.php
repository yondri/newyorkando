<?php
if( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'] ) )
	die( 'Please do not load this page directly. Thanks!' );

if ( post_password_required() ) { ?>
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
	return;
} // if post_password_required

if ( have_comments() ) {
	echo "<h3>Comments</h3>\n";
	echo "<ul id=\"comments\" class=\"commentlist\">\n";

	wp_list_comments(array('callback' => 'prologue_comment'));

	echo "</ul>\n";
	?>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<br />
	<?php 
} // if comments

function prologue_comment_fields($fields) {
	$comment_field = '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';
	
	$fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Name (required)' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
	
	$fields['email'] = '<p class="comment-form-email"><label for="email">' . __( 'Email (required)' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';	
	
	array_unshift( $fields, $comment_field );
	
	return $fields;
}
add_filter( 'comment_form_default_fields', 'prologue_comment_fields' );

function prologue_comment_form_defaults($defaults) {
	if ( ! is_user_logged_in() )
		$defaults['comment_field'] = '';
		
	$defaults['comment_notes_before'] = '';
	$defaults['comment_notes_after'] = '';
	
	return $defaults;
}
add_filter( 'comment_form_defaults', 'prologue_comment_form_defaults' );

comment_form();

