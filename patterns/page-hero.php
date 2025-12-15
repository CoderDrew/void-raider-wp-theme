<?php
/**
 * Title: Page Hero Section
 * Slug: voidraider/page-hero
 * Categories: voidraider
 * Description: Page hero section with title and underline
 *
 * Refactoring improvements:
 * - Removed redundant link color declarations (handled by theme)
 * - Normalized spacing using theme spacing scale
 * - Cleaned up indentation
 */
?>
<!-- wp:group {"className":"vr-section-title","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group vr-section-title" style="padding-bottom:var(--wp--preset--spacing--lg)">

	<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"80px","lineHeight":"1"}},"textColor":"accent"} -->
	<h2 class="wp-block-heading has-text-align-center has-accent-color has-text-color" style="font-size:80px;line-height:1">THE WORLD OF <br>VOID RAIDER</h2>
	<!-- /wp:heading -->

</div>
<!-- /wp:group -->
