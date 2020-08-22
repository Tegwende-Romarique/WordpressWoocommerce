<?php 
// code for comment
function materialise_comment( $comment, $args, $depth ) 
{ global $comment_data;
	//translations
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : 
	__('Reply','materialise'); ?>
    <div id="comment-<?php echo esc_attr($comment->comment_ID); ?>" class="col-xs-12 comment-detail" >
			<div class="col-xs-2 comments-pics">
            <?php echo get_avatar($comment,$size = '80'); ?>
            </div>
           <div class="col-xs-10 comments-text">
				<h3><?php comment_author();?> </h3>
				<span>
				<?php if ( ('d M  y') == get_option( 'date_format' ) ) : ?>				
				<?php comment_date('F j, Y');?>
				<?php else : ?>
				<?php comment_date(); ?>
				<?php endif; ?>
				<?php esc_attr_e('at','materialise');?>&nbsp;<?php comment_time('g:i a'); ?></span>
				<?php comment_text();
				comment_reply_link( 
                    array_merge( 
                        $args, 
                        array(
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                );
				if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'materialise' ); ?></em>
				<br/>
				<?php endif; ?>
				</div>
			</div>
<?php
} ?>