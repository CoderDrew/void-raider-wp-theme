<?php
/**
 * Title: Call to Action Section
 * Slug: voidraider/call-to-action
 * Categories: voidraider
 * Description: Final call-to-action section to engage visitors
 *
 * Refactoring improvements:
 * - Removed redundant metadata attributes (duplicates PHP header)
 * - Removed redundant margin: 0 declarations
 * - Removed fontStyle: normal (default value)
 * - Cleaned up indentation and spacing
 * - Normalized button padding and styling
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem","left":"1.5rem","right":"1.5rem"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:6rem;padding-right:1.5rem;padding-bottom:6rem;padding-left:1.5rem">

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
	<div class="wp-block-group">

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"3rem","right":"3rem"}},"border":{"radius":"0.5rem","width":"2px"}},"backgroundColor":"card","borderColor":"primary","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-border-color has-primary-border-color has-card-background-color has-background" style="border-width:2px;border-radius:0.5rem;padding-top:4rem;padding-right:3rem;padding-bottom:4rem;padding-left:3rem">

			<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"700"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"accent","fontFamily":"headline"} -->
			<h2 class="wp-block-heading has-text-align-center has-accent-color has-text-color has-headline-font-family" style="margin-bottom:1rem;font-size:3rem;font-weight:700">Ready to Jack In?</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"2rem"}},"typography":{"fontSize":"1.25rem","lineHeight":"1.6"}},"textColor":"muted-foreground"} -->
			<p class="has-text-align-center has-muted-foreground-color has-text-color" style="margin-bottom:2rem;font-size:1.25rem;line-height:1.6">Start your journey into the neon-lit streets of tomorrow. Download the rules, create your character, and begin your first Void Run.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"2rem"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons" style="margin-top:2rem">

				<!-- wp:button {"backgroundColor":"primary","textColor":"primary-foreground","style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"2.5rem","right":"2.5rem"}},"border":{"radius":"0.5rem"},"typography":{"fontSize":"1.125rem","fontWeight":"600"}}} -->
				<div class="wp-block-button">
					<a class="wp-block-button__link has-primary-foreground-color has-primary-background-color has-text-color has-background wp-element-button" style="border-radius:0.5rem;padding-top:1rem;padding-right:2.5rem;padding-bottom:1rem;padding-left:2.5rem;font-size:1.125rem;font-weight:600">Download Now</a>
				</div>
				<!-- /wp:button -->

				<!-- wp:button {"backgroundColor":"secondary","textColor":"secondary-foreground","style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"2.5rem","right":"2.5rem"}},"border":{"radius":"0.5rem"},"typography":{"fontSize":"1.125rem","fontWeight":"600"}}} -->
				<div class="wp-block-button">
					<a class="wp-block-button__link has-secondary-foreground-color has-secondary-background-color has-text-color has-background wp-element-button" style="border-radius:0.5rem;padding-top:1rem;padding-right:2.5rem;padding-bottom:1rem;padding-left:2.5rem;font-size:1.125rem;font-weight:600">Join Community</a>
				</div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
