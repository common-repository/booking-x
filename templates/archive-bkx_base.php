<?php
/**
 * BookingX Archive Base Listing Template Page
 *
 * @link  https://dunskii.com
 * @since 1.0
 *
 * @package    Bookingx
 * @subpackage Bookingx/Templates
 */

defined( 'ABSPATH' ) || exit;
get_header( 'bkx_base' );
/**
 * bookingx_before_main_content hook.
 *
 * @hooked bookingx_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked bookingx_breadcrumb - 20
 */
do_action( 'bookingx_before_main_content' ); ?>
	<div class="booking-x-bkx-base container">
		<?php if ( apply_filters( 'booking_x_show_page_title', false ) ) : ?>
			<h1 class="booking-x-bkx-bases page-title h1"><?php booking_x_page_title(); ?></h1>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<div class="row">
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				/*
				* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				include 'content-bkx_base.php';
				// End the loop.
			endwhile;
			?>
			</div>
			<?php
			// If no content, include the "No posts found" template.
		else :
			do_action( 'booking_x_no_bkx_base_found' );
		endif;
		?>
	</div>
<?php
/**
 * bookingx_after_main_content hook.
 *
 * @hooked bookingx_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'bookingx_after_main_content' );
?>

<?php
/**
 * bookingx_sidebar hook.
 *
 * @hooked bookingx_get_sidebar - 10
 */
do_action( 'bookingx_sidebar' );
?>
<?php
get_footer( 'bkx_base' );
