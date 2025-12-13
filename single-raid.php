<?php

/**
 * Single Raid Template
 *
 * @package VoidRaider
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php block_template_part('header'); ?>

    <?php
    // Start the Loop
    while (have_posts()) :
        the_post();

        // Get custom meta fields
        $raid_duration = get_post_meta(get_the_ID(), 'raid_duration', true) ?: '6-8 hours';
        $raid_crew_size = get_post_meta(get_the_ID(), 'raid_crew_size', true) ?: '1-5 Raiders';
        $raid_success_rate = get_post_meta(get_the_ID(), 'raid_success_rate', true) ?: '50%';
        $raid_rewards = get_post_meta(get_the_ID(), 'raid_rewards', true);
        $raid_void_warning = get_post_meta(get_the_ID(), 'raid_void_warning', true) ?: 'This run involves reality distortion and temporal anomalies. Psychological screening required.';

        // Get difficulty taxonomy
        $difficulty_terms = get_the_terms(get_the_ID(), 'difficulty');
        $difficulty = $difficulty_terms && !is_wp_error($difficulty_terms) ? $difficulty_terms[0]->name : 'MEDIUM';

        // Get raid faction taxonomy
        $faction_terms = get_the_terms(get_the_ID(), 'raid_faction');
        $faction_name = $faction_terms && !is_wp_error($faction_terms) ? $faction_terms[0]->name : 'Unknown';

        // Parse rewards into array (newline or comma separated)
        $rewards_array = [];
        if ($raid_rewards) {
            $rewards_array = preg_split('/[\r\n,]+/', $raid_rewards, -1, PREG_SPLIT_NO_EMPTY);
            $rewards_array = array_map('trim', $rewards_array);
        }
    ?>

        <main class="wp-block-group alignfull has-background-background-color has-background" style="padding-top:2rem;padding-bottom:4rem">
            <div class="wp-block-group" style="max-width:1200px;margin-left:auto;margin-right:auto;padding-left:2rem;padding-right:2rem">

                <!-- Back to Home Link -->
                <p class="back-to-home" style="margin-bottom:2rem">
                    <a href="<?php echo esc_url(home_url('/')); ?>">← Back to Home</a>
                </p>

                <div class="wp-block-columns" style="display:flex;gap:3rem;flex-wrap:nowrap;align-items:flex-start">

                    <!-- Main Content Column -->
                    <div class="wp-block-column" style="flex:1 1 66.66%;min-width:0;max-width:66.66%">

                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()): ?>
                            <div style="margin-bottom:2rem;border-radius:10px;overflow:hidden;height:400px">
                                <?php the_post_thumbnail('large', ['style' => 'width:100%;height:100%;object-fit:cover']); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Category Badge + Title -->
                        <div style="margin-top:2rem;margin-bottom:1rem">
                            <?php
                            $categories = get_the_category();
                            if ($categories): ?>
                                <span class="raid-category-badge">
                                    <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </a>
                                </span>
                            <?php endif; ?>
                        </div>

                        <!-- Post Title -->
                        <h1 class="raid-title" style="font-size:3rem;line-height:1.2;margin-bottom:1rem;font-family:var(--font-headline)">
                            <?php the_title(); ?>
                        </h1>

                        <!-- Excerpt -->
                        <?php if (has_excerpt()): ?>
                            <div class="raid-excerpt" style="font-size:1.25rem;color:var(--muted-foreground);line-height:1.6;margin-bottom:2rem;font-family:var(--font-body)">
                                <?php the_excerpt(); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Mission Metadata -->
                        <div class="mission-metadata" style="border-top:1px solid var(--border);border-bottom:1px solid var(--border);padding-top:1.5rem;padding-bottom:1.5rem;margin-bottom:3rem">

                            <div>
                                <p class="meta-label" style="font-size:0.75rem;color:var(--muted-foreground);font-family:var(--font-mono);text-transform:uppercase;letter-spacing:0.1em;margin-bottom:0.25rem;display:flex;align-items:center;gap:0.5rem">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                    DURATION
                                </p>
                                <p class="meta-value raid-duration" style="font-family:var(--font-mono);font-size:1rem;font-weight:600;color:var(--foreground)">
                                    <?php echo esc_html($raid_duration); ?>
                                </p>
                            </div>

                            <div>
                                <p class="meta-label" style="font-size:0.75rem;color:var(--muted-foreground);font-family:var(--font-mono);text-transform:uppercase;letter-spacing:0.1em;margin-bottom:0.25rem;display:flex;align-items:center;gap:0.5rem">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                    CREW SIZE
                                </p>
                                <p class="meta-value raid-crew-size" style="font-family:var(--font-mono);font-size:1rem;font-weight:600;color:var(--foreground)">
                                    <?php echo esc_html($raid_crew_size); ?>
                                </p>
                            </div>

                        </div>

                        <!-- Post Content -->
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <!-- Tags -->
                        <?php
                        $tags = get_the_tags();
                        if ($tags): ?>
                            <div class="raid-tags" style="margin-top:3rem">
                                <?php foreach ($tags as $tag): ?>
                                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                                        <?php echo esc_html($tag->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>

                    <!-- Sidebar Column -->
                    <div class="wp-block-column" style="flex:0 0 33.33%;min-width:280px;max-width:33.33%">

                        <!-- Run Statistics Box -->
                        <div class="run-statistics" style="background-color:var(--card);border:1px solid var(--border);border-radius:8px;padding:1.5rem;position:sticky;top:2rem">
                            <h3 class="stats-title" style="font-size:1rem;margin-bottom:1.5rem;color:var(--primary);font-family:var(--font-headline)">
                                Run Statistics
                            </h3>

                            <!-- Difficulty Stat -->
                            <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:1rem;padding-bottom:0.75rem;border-bottom:1px solid var(--border)">
                                <p class="stat-label" style="font-size:0.75rem;color:var(--muted-foreground);font-family:var(--font-mono);text-transform:uppercase;letter-spacing:0.05em;margin:0">Difficulty</p>
                                <p class="stat-value" style="font-size:1rem;color:var(--accent);font-family:var(--font-mono);margin:0">
                                    <?php echo esc_html(strtoupper($difficulty)); ?>
                                </p>
                            </div>

                            <!-- Est. Duration Stat -->
                            <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:1rem;padding-bottom:0.75rem;border-bottom:1px solid var(--border)">
                                <p class="stat-label" style="font-size:0.75rem;color:var(--muted-foreground);font-family:var(--font-mono);text-transform:uppercase;letter-spacing:0.05em;margin:0">Est. Duration</p>
                                <p class="stat-value" style="font-size:1rem;font-family:var(--font-mono);color:var(--foreground);margin:0">
                                    <?php echo esc_html($raid_duration); ?>
                                </p>
                            </div>

                            <!-- Crew Size Stat -->
                            <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:1rem;padding-bottom:0.75rem;border-bottom:1px solid var(--border)">
                                <p class="stat-label" style="font-size:0.75rem;color:var(--muted-foreground);font-family:var(--font-mono);text-transform:uppercase;letter-spacing:0.05em;margin:0">Crew Size</p>
                                <p class="stat-value" style="font-family:var(--font-mono);color:var(--foreground);margin:0">
                                    <?php echo esc_html($raid_crew_size); ?>
                                </p>
                            </div>

                            <!-- Raid Type Stat -->
                            <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:1rem;padding-bottom:0.75rem;border-bottom:1px solid var(--border)">
                                <p class="stat-label" style="font-size:0.75rem;color:var(--muted-foreground);font-family:var(--font-mono);text-transform:uppercase;letter-spacing:0.05em;margin:0">Raid Type</p>
                                <p class="stat-value" style="color:var(--secondary);font-family:var(--font-mono);margin:0">
                                    <?php echo esc_html($faction_name); ?>
                                </p>
                            </div>

                            <!-- Success Rate Stat -->
                            <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:1rem">
                                <p class="stat-label" style="font-size:0.75rem;color:var(--muted-foreground);font-family:var(--font-mono);text-transform:uppercase;letter-spacing:0.05em;margin:0">Success Rate</p>
                                <p class="stat-value" style="color:var(--primary);font-family:var(--font-mono);margin:0">
                                    <?php echo esc_html($raid_success_rate); ?>
                                </p>
                            </div>

                            <!-- Divider -->
                            <hr style="border:none;border-top:1px solid var(--border);margin:1.5rem 0" />

                            <!-- Potential Rewards -->
                            <?php if (!empty($rewards_array)): ?>
                                <h4 class="rewards-title" style="font-size:0.875rem;margin-top:1.5rem;margin-bottom:1rem;color:var(--primary);font-family:var(--font-headline)">
                                    Potential Rewards
                                </h4>
                                <ul class="colored-bullets rewards-list" style="font-size:0.875rem;padding-left:1.25rem">
                                    <?php foreach ($rewards_array as $reward): ?>
                                        <li style="margin-bottom:0.5rem"><?php echo esc_html($reward); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <hr style="border:none;border-top:1px solid var(--border);margin:1.5rem 0" />
                            <?php endif; ?>

                            <!-- Void Warning -->
                            <div class="void-warning" style="margin-top:1.5rem;background-color:var(--destructive);padding:1rem;border-radius:6px;text-align:center">
                                <p class="warning-text" style="font-size:0.875rem;font-weight:600;margin-bottom:0.5rem;font-family:var(--font-mono);color:var(--foreground)">
                                    ⚠️ VOID WARNING
                                </p>
                                <p style="font-size:0.75rem;color:var(--foreground)">
                                    <?php echo esc_html($raid_void_warning); ?>
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Related Runs Section -->
                <h2 class="related-runs-title" style="text-align:center;font-size:2rem;margin-top:4rem;margin-bottom:2rem;color:var(--secondary);font-family:var(--font-headline)">
                    Related Runs
                </h2>

                <?php
                // Query for related posts
                $related_args = array(
                    'post_type' => 'raid',
                    'posts_per_page' => 2,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand'
                );

                // Try to get posts from same category
                $categories = get_the_category();
                if ($categories) {
                    $related_args['category__in'] = array($categories[0]->term_id);
                }

                $related_query = new WP_Query($related_args);

                if ($related_query->have_posts()): ?>
                    <div class="related-runs-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:2rem;margin-bottom:3rem">
                        <?php while ($related_query->have_posts()): $related_query->the_post(); ?>
                            <div class="related-run-card" style="background-color:var(--card);border:1px solid var(--border);border-radius:8px;padding:1.5rem;transition:transform 0.2s ease, box-shadow 0.2s ease">
                                <?php if (has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', ['style' => 'width:100%;height:200px;object-fit:cover;border-radius:6px']); ?>
                                    </a>
                                <?php endif; ?>

                                <?php
                                $post_categories = get_the_category();
                                if ($post_categories): ?>
                                    <div style="margin-top:1rem">
                                        <span class="related-run-badge">
                                            <a href="<?php echo esc_url(get_category_link($post_categories[0]->term_id)); ?>" style="background-color:rgba(200,255,0,0.1);color:var(--primary);padding:0.25rem 0.5rem;border-radius:3px;text-decoration:none;font-size:0.625rem;text-transform:uppercase;font-weight:700">
                                                <?php echo esc_html($post_categories[0]->name); ?>
                                            </a>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <h3 style="font-size:1.25rem;margin-top:0.5rem;margin-bottom:0.75rem;font-family:var(--font-headline)">
                                    <a href="<?php the_permalink(); ?>" style="color:var(--foreground);text-decoration:none">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <div class="entry-excerpt" style="color:var(--muted-foreground)">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                    <a href="<?php the_permalink(); ?>" style="display:block;margin-top:0.5rem;color:var(--secondary);text-decoration:none;font-family:var(--font-mono);font-size:0.875rem">
                                        View Run →
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif;
                wp_reset_postdata();
                ?>

            </div>
        </main>

    <?php
    endwhile; // End of the loop.
    ?>

    <?php block_template_part('footer'); ?>

    <?php wp_footer(); ?>
</body>

</html>