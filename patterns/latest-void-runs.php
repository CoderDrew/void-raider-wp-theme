<?php

/**
 * Title: Latest Void Runs Section
 * Slug: voidraider/latest-void-runs
 * Categories: voidraider
 * Description: Display the latest Void Raider run entries in a 3-card grid using a PHP template part.
 */
?>
<!-- wp:group {"metadata":{"categories":["voidraider"],"patternName":"voidraider/latest-void-runs","name":"Latest Void Runs Section"},"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem","left":"1.5rem","right":"1.5rem"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"muted","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-muted-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:6rem;padding-right:1.5rem;padding-bottom:6rem;padding-left:1.5rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"700","fontStyle":"normal"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"secondary","fontFamily":"headline"} -->
        <h2 class="wp-block-heading has-text-align-center has-secondary-color has-text-color has-headline-font-family" style="margin-bottom:1rem;font-size:3rem;font-style:normal;font-weight:700">
            Latest Void Runs
        </h2>
        <!-- /wp:heading -->

        <!-- wp:query {"queryId":1,"query":{"perPage":3,"postType":"run","order":"desc","orderBy":"date","inherit":false}} -->
        <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"2rem"}},"layout":{"type":"grid","columnCount":3}} -->
            <!-- wp:group {"className":"latest-runs","style":{"border":{"radius":"8px"},"spacing":{"padding":"1.5rem"}},"backgroundColor":"background"} -->
            <div class="wp-block-group latest-runs has-background-background-color has-background" style="border-radius:8px;padding:1.5rem"><!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"200px"} /-->

                <!-- wp:post-title {"textAlign":"left","isLink":true,"style":{"typography":{"fontSize":"1.5rem","fontWeight":"700","fontStyle":"normal"}},"textColor":"foreground","fontFamily":"headline"} /-->

                <!-- wp:post-excerpt {"moreText":"Read More","textColor":"muted-foreground","fontFamily":"body"} /-->
            </div>
            <!-- /wp:group -->
            <!-- /wp:post-template -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->