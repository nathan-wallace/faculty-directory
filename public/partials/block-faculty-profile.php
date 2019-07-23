<?php
/**
 * Block Name: Faculty Profile
 *
 * This is the template that displays the public faculty profile block.
 */

// create id attribute for specific styling
$id = $block['id'];
$background_color = get_field('bg_color') ?:'#ffffff';
$text_color = get_field('text_color') ?:'#3d3d3d';
$accent_color = get_field('accent_color') ?:'#cc0000';
$profile_style = get_field('profile_style') ?:'circle-1';
$post_objects = get_field('profiles');
	$post_objects = get_field('profiles');

	if( $post_objects ): ?>
		<style type="text/css">
			.circle-1 > .fp-card, .square-1 > .fp-card, .circle-2 > .fp-card, .square-2 > .fp-card{
				background-color: <?php echo $background_color; ?>;
				color: <?php echo $text_color; ?>;
			}
			#<?php echo $id; ?> .fp-card h4{
				color:<?php echo $accent_color; ?>;
			}
			
			@media only screen and (min-width: 768px){
				.circle-1 > .fp-card, .square-1 > .fp-card {
					background-color: transparent;
				}
				.circle-1 > .fp-card >.profile-content, .square-1 > .fp-card >.profile-content, .circle-2 > .fp-card, .square-2 > .fp-card{
					background-color: <?php echo $background_color; ?>;
					color: <?php echo $text_color; ?>;
				}
			}
		
		</style>
		<div class="fp-block <?php echo $profile_style; ?>" id="<?php echo $id; ?>">
		<?php foreach( $post_objects as $post_object): ?>
			
			<div class="fp-card">
				<?php 
				if( get_field('fd_image', $post_object->ID) ): ?>
					<div class="profile-img" style="background-image: url(<?php echo get_field('fd_image', $post_object->ID); ?>);"></div>
				<?php else: ?>
				<div class="profile-img"><span class="dashicons dashicons-admin-users"></span></div>
				<?php endif; ?>
				<div class="profile-content">
					<h4><?php the_field('fd_first_name', $post_object->ID); ?> <?php the_field('fd_last_name', $post_object->ID); ?></h4>
					<h5><?php the_field('fd_academic_title', $post_object->ID); ?></h5>
				<?php if( get_field('fd_email', $post_object->ID) ): ?>
					<small><span class="dashicons dashicons-email-alt"></span> <?php the_field('fd_email', $post_object->ID); ?></small>
				<?php endif; ?>
					<?php if( get_field('fd_phone_number', $post_object->ID) ): ?>
					<small><span class="dashicons dashicons-phone"></span> <?php the_field('fd_phone_number', $post_object->ID); ?></small>
				<?php endif; ?>
					<a href="<?php echo get_permalink($post_object->ID); ?>" title="Link to <?php the_field('fd_first_name', $post_object->ID); ?> <?php the_field('fd_last_name', $post_object->ID); ?>'s profile page">View Profile ></a>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	<?php endif;
?>