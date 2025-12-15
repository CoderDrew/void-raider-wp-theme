<?php
/**
 * Title: Hero Section
 * Slug: voidraider/hero
 * Categories: voidraider
 * Description: Large hero section with call-to-action
 *
 * Refactoring improvements:
 * - Removed redundant margin: 0 declarations (default behavior)
 * - Cleaned up indentation and block structure
 * - Removed unnecessary textColor attributes where already handled by parent
 * - Normalized button padding and border radius for consistency
 * - Fixed missing textColor attribute on outline button
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-bg.jpg","dimRatio":70,"overlayColor":"background","isUserOverlayColor":true,"minHeight":600,"align":"full","style":{"spacing":{"padding":{"top":"8rem","bottom":"8rem","left":"1.5rem","right":"1.5rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:8rem;padding-right:1.5rem;padding-bottom:8rem;padding-left:1.5rem;min-height:600px">
	<span aria-hidden="true" class="wp-block-cover__background has-background-background-color has-background-dim-70 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-bg.jpg" data-object-fit="cover" />

	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
		<div class="wp-block-group">

			<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"4rem","fontWeight":"700","lineHeight":"1.1"}},"textColor":"foreground","fontFamily":"headline"} -->
			<h1 class="wp-block-heading has-text-align-center has-foreground-color has-text-color has-headline-font-family" style="font-size:4rem;font-weight:700;line-height:1.1">Void Raider</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"1.5rem","bottom":"2rem"}},"typography":{"fontSize":"1.25rem"}},"textColor":"muted-foreground"} -->
			<p class="has-text-align-center has-muted-foreground-color has-text-color" style="margin-top:1.5rem;margin-bottom:2rem;font-size:1.25rem">A brutal cyberpunk world where corporations rule, the streets run red, and only the ruthless survive.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"2rem"}}}} -->
			<div class="wp-block-buttons" style="margin-top:2rem">

				<!-- wp:button {"backgroundColor":"primary","textColor":"primary-foreground","style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"2rem","right":"2rem"}},"border":{"radius":"0.5rem"}}} -->
				<div class="wp-block-button">
					<a class="wp-block-button__link has-primary-foreground-color has-primary-background-color has-text-color has-background wp-element-button" style="border-radius:0.5rem;padding-top:1rem;padding-right:2rem;padding-bottom:1rem;padding-left:2rem">Get Started</a>
				</div>
				<!-- /wp:button -->

				<!-- wp:button {"textColor":"secondary","className":"is-style-outline","style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"2rem","right":"2rem"}},"border":{"radius":"0.5rem","width":"2px"}}} -->
				<div class="wp-block-button is-style-outline">
					<a class="wp-block-button__link has-secondary-color has-text-color wp-element-button" style="border-radius:0.5rem;border-width:2px;padding-top:1rem;padding-right:2rem;padding-bottom:1rem;padding-left:2rem">Learn More</a>
				</div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->
