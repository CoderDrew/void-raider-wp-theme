<?php
/**
 * Title: Latest Void Runs Section
 * Slug: voidraider/latest-void-runs
 * Categories: voidraider
 * Description: Display the latest Void Raider run entries in a 3-card grid using a PHP template part.
 *
 * Refactoring improvements:
 * - Removed redundant metadata attributes (already in PHP header)
 * - Removed redundant margin: 0 declarations (default behavior)
 * - Removed unnecessary style wrappers and normalized spacing
 * - Removed redundant fontStyle and textAlign declarations
 * - Cleaned up indentation and block comment structure
 * - Used block spacing controls instead of inline styles where possible
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem","left":"1.5rem","right":"1.5rem"}}},"backgroundColor":"muted","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-muted-background-color has-background" style="padding-top:6rem;padding-right:1.5rem;padding-bottom:6rem;padding-left:1.5rem">

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
	<div class="wp-block-group">

		<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"700"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"secondary","fontFamily":"headline"} -->
		<h2 class="wp-block-heading has-text-align-center has-secondary-color has-text-color has-headline-font-family" style="margin-bottom:1rem;font-size:3rem;font-weight:700">Latest Void Runs</h2>
		<!-- /wp:heading -->

		<!-- wp:query {"queryId":1,"query":{"perPage":3,"postType":"run","order":"desc","orderBy":"date","inherit":false}} -->
		<div class="wp-block-query">

			<!-- wp:post-template {"style":{"spacing":{"blockGap":"2rem"}},"layout":{"type":"grid","columnCount":3}} -->

				<!-- wp:group {"className":"latest-runs","style":{"border":{"radius":"8px"},"spacing":{"padding":"1.5rem"}},"backgroundColor":"background"} -->
				<div class="wp-block-group latest-runs has-background-background-color has-background" style="border-radius:8px;padding:1.5rem">

					<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"200px"} /-->

					<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"1.5rem","fontWeight":"700"}},"textColor":"foreground","fontFamily":"headline"} /-->

					<!-- wp:post-excerpt {"textColor":"muted-foreground","fontFamily":"body"} /-->

				</div>
				<!-- /wp:group -->

			<!-- /wp:post-template -->

		</div>
		<!-- /wp:query -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
