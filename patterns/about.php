<?php
/**
 * Title: About Section
 * Slug: voidraider/about
 * Categories: voidraider
 * Description: About the game section with description
 *
 * Refactoring improvements:
 * - Removed redundant metadata attributes (duplicates PHP header)
 * - Removed redundant margin: 0 declarations
 * - Removed fontStyle: normal (default value)
 * - Removed unnecessary wrapper group around heading
 * - Removed redundant link color declarations (handled by theme)
 * - Cleaned up border radius shorthand notation
 * - Normalized indentation and spacing
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem","left":"1.5rem","right":"1.5rem"}}},"backgroundColor":"muted","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-muted-background-color has-background" style="padding-top:6rem;padding-right:1.5rem;padding-bottom:6rem;padding-left:1.5rem">

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
	<div class="wp-block-group">

		<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"3rem","fontWeight":"700"}},"textColor":"accent","fontFamily":"headline"} -->
		<h3 class="wp-block-heading has-text-align-center has-accent-color has-text-color has-headline-font-family" style="font-size:3rem;font-weight:700">About Void Raider</h3>
		<!-- /wp:heading -->

		<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"4rem"},"margin":{"top":"3rem"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-center" style="margin-top:3rem">

			<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"1.5rem"}},"typography":{"fontSize":"1rem","lineHeight":"1.7"}},"textColor":"muted-foreground"} -->
				<p class="has-muted-foreground-color has-text-color" style="margin-bottom:1.5rem;font-size:1rem;line-height:1.7">Void Raider is a street-level cyberpunk world where desperate crews dive into unstable dimensional rifts—known as the Void—to salvage forbidden tech, lost data, and artifacts warped by impossible physics.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"1.5rem"}},"typography":{"fontSize":"1rem","lineHeight":"1.7"}},"textColor":"muted-foreground"} -->
				<p class="has-muted-foreground-color has-text-color" style="margin-bottom:1.5rem;font-size:1rem;line-height:1.7">The megacorps claim the Void as their domain, but the streets know better. Raiders—drifters, outcasts, mercs, and thrill-hungry misfits—risk everything for a chance at a payout big enough to change their lives… or end them.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem","lineHeight":"1.7"}},"textColor":"muted-foreground"} -->
				<p class="has-muted-foreground-color has-text-color" style="font-size:1rem;line-height:1.7">Every run is a gamble. The Void shifts. It corrupts. It consumes. The question isn't whether you'll make it out unchanged—it's whether you'll make it out at all.</p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"border":{"radius":"12px","width":"2px"}},"backgroundColor":"input-background","borderColor":"accent","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-border-color has-accent-border-color has-input-background-background-color has-background" style="border-width:2px;border-radius:12px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem">

					<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"secondary","fontSize":"large"} -->
					<h4 class="wp-block-heading has-secondary-color has-text-color has-large-font-size" style="margin-bottom:1rem">World Highlights</h4>
					<!-- /wp:heading -->

					<!-- wp:list {"style":{"spacing":{"margin":{"top":"0"}}},"textColor":"muted-foreground"} -->
					<ul class="wp-block-list has-muted-foreground-color has-text-color" style="margin-top:0">

						<!-- wp:list-item -->
						<li>Gritty, neon-drenched cyberpunk setting driven by survival and risk</li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li>Factions, street crews, and syndicates fighting for control of Void salvage</li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li>Unstable Void zones filled with anomalies, corrupted tech, and shifting geometry</li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li>High-stakes runs where one haul could buy freedom—or erase you from existence</li>
						<!-- /wp:list-item -->

					</ul>
					<!-- /wp:list -->

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
