<?php if ( post_password_required() ) : ?>
	<p><?php esc_attr_e( 'This post is password protected. Enter the password to view any comments.', 'materialise' ); ?></p>
	<?php return; endif; ?>
    <?php if ( have_comments() ) : ?>
	<div class="row w_comment" id="comments">
	<?php $materialise_num_comments = get_comments_number(); // get_comments_number returns only a numeric value

	if ( $materialise_num_comments == 0 ) {
		$materialise_comments = esc_attr__('No Comments','materialise');
	} elseif ( $materialise_num_comments > 1 ) {
		$materialise_comments = $materialise_num_comments . esc_attr__(' Comments','materialise');
	} else {
		$materialise_comments = esc_attr__('1 Comment','materialise');
	} ?>	
	<h2><?php echo esc_attr($materialise_comments); ?></h2>
	<?php wp_list_comments( array( 'callback' => 'materialise_comment' ) );
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="row blog-pagination">
			<div class="col-md-12 col-sm-12 col-xs-12 navi"><ul class="pager">
			<li class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'materialise' ) ); ?></li>
			<li class="next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'materialise' ) ); ?></li>
			</ul></div>
		</nav>
		<?php endif;  ?>
	</div>		
	<?php endif; ?>
	
<?php if ( comments_open() ) : ?>
	<div class="row w_comment_form">
	<?php $fields=array(
		'author' => '<div class="form-group col-md-6"><label id="name-label"><input name="author" id="name" type="text" class="form-control" placeholder="'. __( 'Name*','materialise').'"></label></div>',
		'email' => '<div class="form-group col-md-6"><label id="email-label"><input  name="email" id="email" type="text" class="form-control" placeholder="'. __( 'Email*','materialise').'"></label></div>',
	);
	function materialise_comment_fields($fields) { 
		return $fields;
	}
	add_filter('wl_comment_form_default_fields','materialise_comment_fields');
		$defaults = array(
		'fields'=> apply_filters( 'wl_comment_form_default_fields', $fields ),
		'comment_field'=> '<div class="form-group col-md-12"><label id="comment-label">
		<textarea id="comment" name="comment" class="form-control" rows="5" placeholder="'. __( 'Message*','materialise').'"></textarea></label></div>',		
		'logged_in_as' => '<p class="logged-in-as">' . __( "Logged in as ","materialise" ).'<a href="'. esc_url(admin_url( 'profile.php' )).'">'.$user_identity.'</a>'. '<a href="'. wp_logout_url( get_permalink() ).'" title="'. __('Log out of this account','materialise').'">'.__(" Log out?","materialise").'</a>' . '</p>',
		'class_submit' => 'btn',
		'label_submit'=>__( 'Post Comment','materialise'),
		'comment_notes_before'=> '',
		'comment_notes_after'=>'',
		'title_reply'=> __('Leave Your Comment Here','materialise'),		
		'role_form'=> 'form',		
		);
		comment_form($defaults); ?>	
</div>
<?php endif; // If registration required and not logged in ?>