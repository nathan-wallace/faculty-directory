<?php
/**
 * Block Name: Promotion
 *
 * This is the template that displays the Gutenberg faculty profile block.
 */

// create id attribute for specific styling
$id = $block['id'];
$background_color = get_field('bg_color') ?:'#ffffff';
$text_color = get_field('text_color') ?:'#000000';
$accent_color = get_field('accent_color') ?:'#cc0000';
$post_objects = get_field('profiles');
if ( is_admin() ) {
	$post_objects = get_field('profiles');

	if( $post_objects ): ?>
		<style type="text/css">
			#<?php echo 'faculty-profile-'.$id; ?> .faculty-profile{
				background: <?php echo $background_color; ?>;
				color: <?php echo $text_color; ?>;
				border-color:<?php echo $accent_color; ?>;
				border-width:5px;
				border-style: solid;
			}
			
		</style>
		<div class="faculty-profile-block" id="faculty-profile-<?php echo $id; ?>">
		<?php foreach( $post_objects as $post_object): ?>
			<?php 
			$image = get_field('thumbnail_photo', $post_object->ID);
			$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
			
			?>
			
			<div class="faculty-profile">
				<?php 
				if( $image ) {
					echo '<div class="avatar">'. wp_get_attachment_image( $image, $size ).'</div>';
				}
				
				?>
				<h3><?php the_field('first_name', $post_object->ID); ?> <?php the_field('last_name', $post_object->ID); ?></h3>
				<h4><?php the_field('academic_title', $post_object->ID); ?></h4>
				
				<a href="<?php echo get_permalink($post_object->ID); ?>">View Profile></a>
			</div>
		<?php endforeach; ?>
		</div>
	<?php endif;
    /*echo '<div class="profile">
			<div class="content">
			<div class="back"></div>
			<div class="profilePic"></div>
			<h3>George Clooney</h3>
			<h4>Student web designer</h4>
			<p>I am a student from Sweden that designs and
			develops websites for the world
			wide web</p>
			<div class="rates">
			<div class="box boxview">
			<div class="iconCon">
			<svg class="icon icon-eye"><use xlink:href="#icon-eye"></use></svg>
			</div>
			<h4 class="counter">332</h4>
			</div>
			<div class="box boxbuddy">
			<div class="iconCon">
			<svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg>
			</div>
			<h4 class="counter">332</h4>
			</div>
			<div class="box boxhearth">
			<div class="iconCon">
			<svg class="icon icon-heart"><use xlink:href="#icon-heart"></use></svg>
			<div class="ball"></div>
			</div>
			<h4 class="counter h4h">332</h4>
			</div>
			</div>
			</div>
			</div>';*/
}
else{
	include( plugin_dir_path( dirname( __FILE__ ) ) ."admin/partials/content-{$slug}.php" );
    get_template_part( 'plugin_dir_path( dirname( __FILE__ ) ) ."admin/partials/content', 'profile' );
}
?>