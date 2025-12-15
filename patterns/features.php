<?php
/**
 * Title: Features Section
 * Slug: voidraider/features
 * Categories: voidraider
 * Description: Game features showcase in a grid layout
 *
 * Refactoring improvements:
 * - Removed redundant metadata attributes (duplicates PHP header)
 * - Removed redundant margin: 0 declarations
 * - Removed fontStyle: normal (default value)
 * - Removed redundant link color declarations
 * - Simplified border radius notation
 * - Cleaned up indentation and spacing
 * - Normalized padding structure across cards
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem","left":"1.5rem","right":"1.5rem"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:6rem;padding-right:1.5rem;padding-bottom:6rem;padding-left:1.5rem">

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
	<div class="wp-block-group">

		<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"700"},"spacing":{"margin":{"bottom":"0.5rem"}}},"textColor":"secondary","fontFamily":"headline"} -->
		<h2 class="wp-block-heading has-text-align-center has-secondary-color has-text-color has-headline-font-family" style="margin-bottom:0.5rem;font-size:3rem;font-weight:700">Core Features</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0","bottom":"3rem"}}},"textColor":"muted-foreground"} -->
		<p class="has-text-align-center has-muted-foreground-color has-text-color" style="margin-top:0;margin-bottom:3rem">A rules-light cyberpunk world built for dangerous dives, desperate crews, and neon-soaked storytelling.</p>
		<!-- /wp:paragraph -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"2rem"}}}} -->
		<div class="wp-block-columns">

			<!-- wp:column -->
			<div class="wp-block-column">

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"2rem","left":"0","right":"0"}},"border":{"radius":"0.5rem"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-card-background-color has-background" style="border-radius:0.5rem;min-height:100%;padding-top:0;padding-right:0;padding-bottom:2rem;padding-left:0">

					<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"has-custom-border","style":{"border":{"radius":{"top":"0.5rem","right":"0.5rem"}}}} -->
					<figure class="wp-block-image size-large has-custom-border"><img src="http://void-raider.local/wp-content/uploads/2025/12/the_void-1024x559.png" alt="" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.5rem","fontWeight":"600"},"spacing":{"margin":{"top":"1.5rem","bottom":"0"},"padding":{"left":"1.5rem","right":"1.5rem"}}},"textColor":"accent","fontFamily":"headline"} -->
					<h3 class="wp-block-heading has-accent-color has-text-color has-headline-font-family" style="margin-top:1.5rem;margin-bottom:0;padding-right:1.5rem;padding-left:1.5rem;font-size:1.5rem;font-weight:600">The Void</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"1rem"},"padding":{"left":"1.5rem","right":"1.5rem"}},"typography":{"fontSize":"1rem","lineHeight":"1.6"}},"textColor":"muted-foreground"} -->
					<p class="has-muted-foreground-color has-text-color" style="margin-top:1rem;padding-right:1.5rem;padding-left:1.5rem;font-size:1rem;line-height:1.6">A reality fracture of shifting corridors, corrupted physics, and impossible anomalies. Every dive reshapes the world—and the raiders who enter it.</p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"2rem","left":"0","right":"0"}},"border":{"radius":"0.5rem"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-card-background-color has-background" style="border-radius:0.5rem;min-height:100%;padding-top:0;padding-right:0;padding-bottom:2rem;padding-left:0">

					<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"has-custom-border","style":{"border":{"radius":{"top":"0.5rem","right":"0.5rem"}}}} -->
					<figure class="wp-block-image size-large has-custom-border"><img src="http://void-raider.local/wp-content/uploads/2025/12/neon-syndicate-1024x559.png" alt="" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.5rem","fontWeight":"600"},"spacing":{"margin":{"top":"1.5rem","bottom":"0"},"padding":{"left":"1.5rem","right":"1.5rem"}}},"textColor":"accent","fontFamily":"headline"} -->
					<h3 class="wp-block-heading has-accent-color has-text-color has-headline-font-family" style="margin-top:1.5rem;margin-bottom:0;padding-right:1.5rem;padding-left:1.5rem;font-size:1.5rem;font-weight:600">The Raiders</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"1rem"},"padding":{"left":"1.5rem","right":"1.5rem"}},"typography":{"fontSize":"1rem","lineHeight":"1.6"}},"textColor":"muted-foreground"} -->
					<p class="has-muted-foreground-color has-text-color" style="margin-top:1rem;padding-right:1.5rem;padding-left:1.5rem;font-size:1rem;line-height:1.6">Outcasts, hustlers, and syndicate crews risking everything for salvage, reputation, and survival. They brave the Void when no one else will.</p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"2rem","left":"0","right":"0"}},"border":{"radius":"0.5rem"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"card","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-card-background-color has-background" style="border-radius:0.5rem;min-height:100%;padding-top:0;padding-right:0;padding-bottom:2rem;padding-left:0">

					<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"has-custom-border","style":{"border":{"radius":{"top":"0.5rem","right":"0.5rem"}}}} -->
					<figure class="wp-block-image size-large has-custom-border"><img src="http://void-raider.local/wp-content/uploads/2025/12/the_threats-1024x559.png" alt="" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.5rem","fontWeight":"600"},"spacing":{"margin":{"top":"1.5rem","bottom":"0"},"padding":{"left":"1.5rem","right":"1.5rem"}}},"textColor":"accent","fontFamily":"headline"} -->
					<h3 class="wp-block-heading has-accent-color has-text-color has-headline-font-family" style="margin-top:1.5rem;margin-bottom:0;padding-right:1.5rem;padding-left:1.5rem;font-size:1.5rem;font-weight:600">The Threats</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"1rem"},"padding":{"left":"1.5rem","right":"1.5rem"}},"typography":{"fontSize":"1rem","lineHeight":"1.6"}},"textColor":"muted-foreground"} -->
					<p class="has-muted-foreground-color has-text-color" style="margin-top:1rem;padding-right:1.5rem;padding-left:1.5rem;font-size:1rem;line-height:1.6">Warped creatures, corrupted tech, hostile gangs, and corporate hunters. The Void spawns horrors—but the streets are just as deadly.</p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
