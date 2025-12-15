<?php
/**
 * Title: Featured Faction Section
 * Slug: voidraider/featured-faction
 * Categories: voidraider
 * Description: Spotlight section for a featured faction
 *
 * Refactoring improvements:
 * - Removed redundant metadata attributes (duplicates PHP header)
 * - Removed redundant margin: 0 declarations
 * - Removed fontStyle: normal (default value)
 * - Cleaned up indentation and spacing
 * - Normalized padding structure
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem","left":"1.5rem","right":"1.5rem"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:6rem;padding-right:1.5rem;padding-bottom:6rem;padding-left:1.5rem">

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
	<div class="wp-block-group">

		<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"700"},"spacing":{"margin":{"bottom":"3rem"}}},"textColor":"secondary","fontFamily":"headline"} -->
		<h2 class="wp-block-heading has-text-align-center has-secondary-color has-text-color has-headline-font-family" style="margin-bottom:3rem;font-size:3rem;font-weight:700">Featured Faction</h2>
		<!-- /wp:heading -->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem","left":"3rem","right":"3rem"}},"border":{"radius":"0.5rem","width":"1px"}},"backgroundColor":"card","borderColor":"border","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-border-color has-border-border-color has-card-background-color has-background" style="border-width:1px;border-radius:0.5rem;padding-top:3rem;padding-right:3rem;padding-bottom:3rem;padding-left:3rem">

			<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"3rem"}}}} -->
			<div class="wp-block-columns are-vertically-aligned-center">

				<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">

					<!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"0.5rem"}}} -->
					<figure class="wp-block-image size-large has-custom-border"><img src="http://void-raider.local/wp-content/uploads/2025/12/neon-syndicate-1024x559.png" alt="" style="border-radius:0.5rem" /></figure>
					<!-- /wp:image -->

				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"2.25rem","fontWeight":"700"},"spacing":{"margin":{"top":"0.5rem","bottom":"1rem"}}},"textColor":"accent","fontFamily":"headline"} -->
					<h3 class="wp-block-heading has-accent-color has-text-color has-headline-font-family" style="margin-top:0.5rem;margin-bottom:1rem;font-size:2.25rem;font-weight:700">The Neon Syndicate</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"1rem","bottom":"1.5rem"}},"typography":{"fontSize":"1.125rem","lineHeight":"1.7"}},"textColor":"muted-foreground"} -->
					<p class="has-muted-foreground-color has-text-color" style="margin-top:1rem;margin-bottom:1.5rem;font-size:1.125rem;line-height:1.7">An elite crew of masked enforcers wielding glitch-tech and brutality, carving territory through the city's neon haze and shifting Void zones.</p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="wp-block-buttons">

						<!-- wp:button {"backgroundColor":"primary","textColor":"primary-foreground","style":{"spacing":{"padding":{"top":"0.75rem","bottom":"0.75rem","left":"1.5rem","right":"1.5rem"}},"border":{"radius":"0.5rem"}},"fontFamily":"headline"} -->
						<div class="wp-block-button">
							<a class="wp-block-button__link has-primary-foreground-color has-primary-background-color has-text-color has-background has-headline-font-family wp-element-button" style="border-radius:0.5rem;padding-top:0.75rem;padding-right:1.5rem;padding-bottom:0.75rem;padding-left:1.5rem">View All Factions</a>
						</div>
						<!-- /wp:button -->

					</div>
					<!-- /wp:buttons -->

				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
