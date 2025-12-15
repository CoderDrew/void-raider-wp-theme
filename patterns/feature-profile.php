<?php
/**
 * Title: Feature Profile Section
 * Slug: voidraider/feature-profile
 * Categories: voidraider
 * Description: Feature profile section highlighting content and an image.
 *
 * Refactoring improvements:
 * - Removed redundant metadata attributes (duplicates PHP header)
 * - Removed redundant link color declarations (handled by theme)
 * - Simplified border radius notation
 * - Cleaned up indentation and spacing
 * - Normalized padding structure
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">

	<!-- wp:columns -->
	<div class="wp-block-columns">

		<!-- wp:column {"width":"66.66%"} -->
		<div class="wp-block-column" style="flex-basis:66.66%">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"border":{"radius":"12px","width":"1px"}},"backgroundColor":"input-background","borderColor":"secondary","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-secondary-border-color has-input-background-background-color has-background" style="border-width:1px;border-radius:12px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem">

				<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"1rem"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group" style="margin-bottom:1rem">

					<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"layout":{"selfStretch":"fixed","flexSize":"30px"}}} -->
					<figure class="wp-block-image size-full"><img src="http://void-raider.local/wp-content/uploads/2025/12/enforcer-icon.svg" alt="" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"textColor":"primary"} -->
					<h2 class="wp-block-heading has-primary-color has-text-color">Enforcer</h2>
					<!-- /wp:heading -->

				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"primary","fontFamily":"mono"} -->
				<p class="has-primary-color has-text-color has-mono-font-family" style="margin-bottom:1rem">You hold the line when reality fails.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"muted-foreground"} -->
				<p class="has-muted-foreground-color has-text-color" style="margin-bottom:1rem">Street-bred and battle-hardened, Enforcers anchor a crew when the Void turns violent. They push forward through corrupted zones, absorb punishment meant for others, and break open paths no one else can.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"muted-foreground"} -->
				<p class="has-muted-foreground-color has-text-color" style="margin-bottom:1rem">Armor cracked. Knuckles scarred.<br>Still standing.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"muted-foreground"} -->
				<p class="has-muted-foreground-color has-text-color" style="margin-bottom:1rem">Enforcers don't ask what's on the other side — they make sure the crew reaches it.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0.5rem"}}},"textColor":"muted-foreground"} -->
				<p class="has-muted-foreground-color has-text-color" style="margin-bottom:0.5rem"><strong>You excel at:</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"colored-bullets","textColor":"muted-foreground"} -->
				<ul class="wp-block-list colored-bullets has-muted-foreground-color has-text-color">

					<!-- wp:list-item -->
					<li>Frontline combat and area control</li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li>Withstanding environmental and Void-based damage</li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li>Clearing unstable zones through force and presence</li>
					<!-- /wp:list-item -->

				</ul>
				<!-- /wp:list -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"1rem"}}},"textColor":"muted-foreground"} -->
				<p class="has-muted-foreground-color has-text-color" style="margin-top:1rem"><strong>Playstyle:</strong><br>Absorb hits, control space, and keep the crew alive when the Void turns violent.</p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"33.33%"} -->
		<div class="wp-block-column" style="flex-basis:33.33%">

			<!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"width":"2px","color":"#00D4FF","radius":"12px"}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img src="http://void-raider.local/wp-content/uploads/2025/12/Enforcer-1024x687.png" alt="" class="has-border-color" style="border-color:#00D4FF;border-width:2px;border-radius:12px" /></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"1rem"}},"typography":{"fontSize":"0.75rem"}},"fontFamily":"mono"} -->
			<p class="has-mono-font-family" style="margin-top:1rem;font-size:0.75rem"><strong>Role Focus:</strong> Frontline / Damage Absorption<br><strong>Primary Attribute:</strong> Strength<br><strong>Secondary Attribute:</strong> Agility or Empathy (player choice)</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"1rem"}},"typography":{"fontSize":"0.75rem"}},"fontFamily":"mono"} -->
			<p class="has-mono-font-family" style="margin-top:1rem;font-size:0.75rem"><strong>Starting Edge:</strong><br>• Gain bonus dice when resisting physical harm or environmental effects<br>• Once per scene, reduce incoming damage by sheer grit or positioning</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"1rem"}},"typography":{"fontSize":"0.75rem"}},"fontFamily":"mono"} -->
			<p class="has-mono-font-family" style="margin-top:1rem;font-size:0.75rem"><strong>Typical Talents:</strong><br>• Hold the Line — Protect allies within reach<br>• Break Through — Ignore penalties from unstable terrain<br>• Pain Is Data — Convert stress into momentum</p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
