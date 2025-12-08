<?php
/**
 * Title: Latest Void Runs Section
 * Slug: voidraider/latest-void-runs
 * Categories: voidraider
 * Description: Display latest blog posts or game sessions
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem","left":"1.5rem","right":"1.5rem"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"muted","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-muted-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:6rem;padding-right:1.5rem;padding-bottom:6rem;padding-left:1.5rem">
    <!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
    <div class="wp-block-group">
        <!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"3rem","fontWeight":"700"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"foreground","fontFamily":"headline"} -->
        <h2 class="wp-block-heading has-text-align-center has-foreground-color has-text-color has-headline-font-family" style="margin-bottom:1rem;font-size:3rem;font-weight:700">Latest Void Runs</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"3rem"}},"typography":{"fontSize":"1.125rem"}},"textColor":"muted-foreground"} -->
        <p class="has-text-align-center has-muted-foreground-color has-text-color" style="margin-bottom:3rem;font-size:1.125rem">Recent adventures from the community</p>
        <!-- /wp:paragraph -->

        <!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
        <div class="wp-block-query">
            <!-- wp:post-template {"style":{"spacing":{"blockGap":"2rem"}},"layout":{"type":"grid","columnCount":3}} -->
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"0.5rem"}},"backgroundColor":"card","layout":{"type":"constrained"}} -->
                <div class="wp-block-group has-card-background-color has-background" style="border-radius:0.5rem;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:post-featured-image {"style":{"border":{"radius":{"top":"0.5rem","left":"0.5rem","right":"0.5rem","bottom":"0rem"}}}} /-->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem">
                        <!-- wp:post-date {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"muted-foreground"} /-->

                        <!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0.5rem","bottom":"0.75rem"}},"typography":{"fontSize":"1.25rem","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontFamily":"headline"} /-->

                        <!-- wp:post-excerpt {"excerptLength":20,"style":{"typography":{"fontSize":"1rem","lineHeight":"1.6"}},"textColor":"muted-foreground"} /-->

                        <!-- wp:read-more {"content":"Read More →","style":{"spacing":{"margin":{"top":"1rem"}},"typography":{"fontSize":"0.875rem","fontWeight":"600"}},"textColor":"primary"} /-->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            <!-- /wp:post-template -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
