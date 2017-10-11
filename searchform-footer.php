<?php
/**
 * Template for displaying the standard search forms
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */
?>

<form role="search" method="get" id="searchform-footer" class="searchform-footer" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="s-footer" class="screen-reader-text"><span><?php _e( 'Search', 'cocoa' ); ?></span></label>
	<input type="text" class="search-field" name="s" id="s-footer" placeholder="<?php echo esc_attr_x( 'Type to search&hellip;', 'placeholder', 'cocoa' ); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'cocoa' ); ?>" />
</form>