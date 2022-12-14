<?php
/**
 * The template for displaying the footer and copyrights
 *
 * Contains footer content and the closing of the main container, row and section. Also closing #canvas and #box_wrapper
 */
if ( ! is_page_template( 'page-templates/full-width.php' ) ) : ?>
				</div><!-- eof .row-->
			</div><!-- eof .container -->
		</section><!-- eof .page_content -->
	<?php
endif;

$footer = towy_get_predefined_template_part( 'footer' );
get_template_part( 'template-parts/footer/' . esc_attr( $footer ) );

$copyrights = towy_get_predefined_template_part( 'copyrights' );
get_template_part( 'template-parts/copyrights/' . esc_attr( $copyrights ) );

?>
	</div><!-- eof #box_wrapper -->
</div><!-- eof #canvas -->
<?php wp_footer(); ?>
</body>
</html>