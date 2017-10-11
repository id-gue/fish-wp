<?php
/**
 * Available Cocoa Custom Widgets
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Quote Widget
/*-----------------------------------------------------------------------------------*/

class cocoa_quote extends WP_Widget {

	function cocoa_quote() {
		$widget_ops = array('description' => 'Widget to include a big quote or slogan above the footer area.' , 'cocoa');

		parent::WP_Widget(false, __('Quote (Cocoa)', 'cocoa'),$widget_ops);
	}

	function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$quotetext = $instance['quotetext'];
		$quoteauthor = $instance['quoteauthor'];

		echo $before_widget; ?>

		<?php if($title != '')
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>

			<div class="quote-wrap">
			<blockquote class="quote-text"><?php echo ( wp_kses_post(wpautop($quotetext))  ); ?>
			<?php if($quoteauthor != '') {
				echo '<cite class="quote-author"> ' . ( wp_kses_post($quoteauthor) ) . ' </cite>';
			}
			?>
			</blockquote>
			</div><!-- end .quote-wrap -->

	   <?php
	   echo $after_widget;

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();
	   }

   function update($new_instance, $old_instance) {

   		$instance['title'] = $new_instance['title'];
   		$instance['quotetext'] = $new_instance['quotetext'];
   		$instance['quoteauthor'] = $new_instance['quoteauthor'];

       return $new_instance;
   }

   function form($instance) {
   		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
   		$quotetext = isset( $instance['quotetext'] ) ? esc_attr( $instance['quotetext'] ) : '';
   		$quoteauthor = isset( $instance['quoteauthor'] ) ? esc_attr( $instance['quoteauthor'] ) : '';
	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','cocoa'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('quotetext'); ?>"><?php _e('Quote Text:','cocoa'); ?></label>
		<textarea name="<?php echo $this->get_field_name('quotetext'); ?>" class="widefat" rows="8" cols="12" id="<?php echo $this->get_field_id('quotetext'); ?>"><?php echo( $quotetext ); ?></textarea>
	</p>

	<p>
	<label for="<?php echo $this->get_field_id('quoteauthor'); ?>"><?php _e('Quote Author (optional):','cocoa'); ?></label>
	<input type="text" name="<?php echo $this->get_field_name('quoteauthor'); ?>" value="<?php echo esc_attr($quoteauthor); ?>" class="widefat" id="<?php echo $this->get_field_id('quoteauthor'); ?>" />
	</p>

	<?php
	}
}

register_widget('cocoa_quote');


/*-----------------------------------------------------------------------------------*/
/* About Widget
/*-----------------------------------------------------------------------------------*/

class cocoa_about extends WP_Widget {

	function cocoa_about() {
		$widget_ops = array('description' => 'About widget to include an About image, intro text, description text and image caption in your header or footer widget area.' , 'cocoa');

		parent::WP_Widget(false, __('About (Cocoa)', 'cocoa'),$widget_ops);
	}

	function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$imageurl = $instance['imageurl'];
		$imagewidth = $instance['imagewidth'];
		$imageheight = $instance['imageheight'];
		$aboutimgcaption = $instance['aboutimgcaption'];
		$aboutslogan = $instance['aboutslogan'];
		$abouttext = $instance['abouttext'];

		echo $args['before_widget']; ?>


		<?php if($title != '')
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>

		<div class="about-wrap">
		<?php if($imageurl != '') : ?>
			<div class="about-img-wrap">
			<div class="about-img">
				<img src="<?php echo esc_url($imageurl); ?>" width="<?php echo absint($imagewidth); ?>" height="<?php echo absint($imageheight); ?>">
			</div>
			<?php if($abouttext != '') {
					echo '<div class="about-text"> ' . ( wp_kses_post(wpautop($abouttext)) ) . ' </div>';
				}
			?>
			</div><!-- end .about-img-wrap -->
		<?php endif; ?>
			<div class="about-text-wrap cf">
			<?php if($aboutslogan != '') {
				echo '<div class="about-slogan"> ' . ( wp_kses_post(wpautop($aboutslogan)) ) . ' </div>';
			}
			?>
			<?php if($aboutimgcaption != '') {
				echo '<div class="about-caption"> ' . ( wp_kses_post(wpautop($aboutimgcaption)) ) . ' </div>';
				}
			?>
			</div><!-- end .about-text-wrap -->
		</div><!-- end .about-wrap -->

	   <?php
	   echo $args['after_widget'];

	    // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();
	   }

   function update($new_instance, $old_instance) {

	   $instance['title'] = $new_instance['title'];
	   $instance['imageurl'] = $new_instance['imageurl'];
	   $instance['imagewidth'] = $new_instance['imagewidth'];
	   $instance['imageheight'] = $new_instance['imageheight'];
	   $instance['aboutimgcaption'] = $new_instance['aboutimgcaption'];
	   $instance['aboutslogan'] = $new_instance['aboutslogan'];
	   $instance['abouttext'] = $new_instance['abouttext'];

       return $instance;
   }

   function form($instance) {
	   $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	   $imageurl = isset( $instance['imageurl'] ) ? esc_attr( $instance['imageurl'] ) : '';
	   $imagewidth = isset( $instance['imagewidth'] ) ? esc_attr( $instance['imagewidth'] ) : '';
	   $imageheight = isset( $instance['imageheight'] ) ? esc_attr( $instance['imageheight'] ) : '';
	   $aboutimgcaption = isset( $instance['aboutimgcaption'] ) ? esc_attr( $instance['aboutimgcaption'] ) : '';
	   $aboutslogan = isset( $instance['aboutslogan'] ) ? esc_attr( $instance['aboutslogan'] ) : '';
	   $abouttext = isset( $instance['abouttext'] ) ? esc_attr( $instance['abouttext'] ) : '';

	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','cocoa'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('imageurl') ); ?>"><?php _e( 'About Image URL:', 'cocoa' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('imageurl') ); ?>" value="<?php echo esc_attr( $imageurl ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('imageurl') ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('imagewidth') ); ?>"><?php _e( 'About Image Width (at least 600):', 'cocoa' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('imagewidth') ); ?>" value="<?php echo esc_attr( $imagewidth ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('imagewidth') ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('imageheight') ); ?>"><?php _e( 'About Image Height (flexible, e.g. 793):', 'cocoa' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name('imageheight') ); ?>" value="<?php echo esc_attr( $imageheight ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('imageheight') ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('aboutimgcaption') ); ?>"><?php _e( 'Image Caption Text:', 'cocoa' ); ?></label>
		<textarea name="<?php echo esc_attr( $this->get_field_name('aboutimgcaption') ); ?>" class="widefat" rows="5" cols="20" id="<?php echo esc_attr( $this->get_field_id('aboutimgcaption') ); ?>"><?php echo esc_attr( $aboutimgcaption ); ?></textarea>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('aboutslogan') ); ?>"><?php _e( 'About Slogan:', 'cocoa' ); ?></label>
		<textarea name="<?php echo esc_attr( $this->get_field_name('aboutslogan') ); ?>" class="widefat" rows="3" cols="20" id="<?php echo esc_attr( $this->get_field_id('aboutslogan') ); ?>"><?php echo esc_attr( $aboutslogan ); ?></textarea>
	</p>

	<p>
	 	<label for="<?php echo esc_attr( $this->get_field_id('abouttext') ); ?>"><?php _e( 'About Text:', 'cocoa' ); ?></label>
		<textarea name="<?php echo esc_attr( $this->get_field_name('abouttext') ); ?>" class="widefat" rows="20" cols="20" id="<?php echo esc_attr( $this->get_field_id('abouttext') ); ?>"><?php echo esc_attr( $abouttext ); ?></textarea>
	</p>

	<?php
	}
}

register_widget('cocoa_about');


/*-----------------------------------------------------------------------------------*/
/* Recent Posts by Category Widget
/*-----------------------------------------------------------------------------------*/

class cocoa_recentposts extends WP_Widget {

	function cocoa_recentposts() {
		$widget_ops = array('description' => __( 'A number of Recent Posts filtered by category', 'cocoa') );

		parent::WP_Widget(false, __('Recent Posts by Categories (Cocoa)', 'cocoa'),$widget_ops);
	}

	function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$postnumber = $instance['postnumber'];
		$cat = apply_filters('widget_title', $instance['cat']);

		echo $before_widget; ?>
		<?php if($title != '')
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>

				<div class="recentpost-wrap cf">
				<?php
				global $post;
				$cocoa_post = $post;

				// get the category IDs and the number of posts and place them in an array
				if($cat) {
					$args = array(
						'posts_per_page' => $postnumber,
						'cat' => $cat,
					);
				} else {
					$args = array(
						'posts_per_page' => $postnumber,
					);
				}

				$myposts = get_posts( $args );
				foreach( $myposts as $post ) : setup_postdata($post); ?>

				<div class="rp-column">
					<?php if ( '' != get_the_post_thumbnail() ) : ?>
						<div class="entry-thumbnail">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'cocoa' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail('recentpost-thumb'); ?></a>
						</div><!-- end .entry-thumbnail -->
					<?php endif; ?>

					<header class="entry-header">
						<div class="entry-details">
							<div class="entry-date"><a href="<?php the_permalink(); ?>" class="entry-date"><?php echo get_the_date('M d, y'); ?></a></div>
							<?php edit_post_link( __( 'Edit', 'cocoa' ), '<div class="entry-edit">', '</div>' ); ?>
						</div>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'cocoa' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					</header><!--end .entry-header -->

					<div class="rp-summary">
						<?php cocoa_excerpt( 'cocoa_excerptlength_widget' ); ?>
					</div><!-- end .entry-summary -->
				</div><!-- end .rp-column -->

					<?php endforeach; ?>
					<?php $post = $cocoa_post; ?>
				</div><!-- end .recentpost-wrap -->

	   <?php
	   echo $after_widget;

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();

   }

   function update($new_instance, $old_instance) {
   		$instance['title'] = $new_instance['title'];
   		$instance['postnumber'] = $new_instance['postnumber'];
   		$instance['cat'] = $new_instance['cat'];



       return $new_instance;
   }

   function form($instance) {
   		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
   		$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '';
   		$cat = isset( $instance['cat'] ) ? esc_attr( $instance['cat'] ) : '';
   	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','cocoa'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php _e('Number of posts (3, 6 or 9):','cocoa'); ?></label>
		<select name="<?php echo $this->get_field_name( 'postnumber' ); ?>" id="<?php echo $this->get_field_id( 'postnumber' ); ?>" class="widefat">
			<option value="3"<?php selected( $instance['postnumber'], '3' ); ?>><?php esc_html_e( '3', 'cocoa' ); ?></option>
			<option value="6"<?php selected( $instance['postnumber'], '6' ); ?>><?php esc_html_e( '6', 'cocoa' ); ?></option>
			<option value="9"<?php selected( $instance['postnumber'], '9' ); ?>><?php esc_html_e( '9', 'cocoa' ); ?></option>
		</select>
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category ID numbers (choose which categories to include, optional):','cocoa'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('cat'); ?>" value="<?php echo esc_attr($cat); ?>" class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" />
	</p>

	<?php
	}
}

register_widget('cocoa_recentposts');

