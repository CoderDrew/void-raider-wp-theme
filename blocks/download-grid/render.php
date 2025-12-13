<?php
$posts_to_show = isset($attributes['postsToShow']) ? (int) $attributes['postsToShow'] : 4;
$show_notice   = !empty($attributes['showAlphaNotice']);

$query = new WP_Query([
    'post_type'      => 'download',
    'posts_per_page' => max(1, $posts_to_show),
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if (!$query->have_posts()) {
    return;
}

$wrapper_attributes = get_block_wrapper_attributes([
    'class' => 'vr-download-grid'
]);
?>

<div <?php echo $wrapper_attributes; ?>>
    <div class="vr-download-grid__header">
        <h2 class="vr-download-grid__title">Downloads</h2>

        <?php if ($show_notice): ?>
            <div class="vr-download-grid__notice">
                ⚠ ALPHA BUILD — Files may change without warning
            </div>
        <?php endif; ?>
    </div>

    <div class="vr-download-grid__cards">
        <?php while ($query->have_posts()): $query->the_post();

            $post_id   = get_the_ID();
            $file_id   = (int) get_post_meta($post_id, 'download_file_id', true);
            $version   = get_post_meta($post_id, 'download_version', true);
            $file_type = get_post_meta($post_id, 'download_file_type', true);
            $size_b    = (int) get_post_meta($post_id, 'download_filesize_bytes', true);

            // Debug: Check if version is empty
            if (empty($version)) {
                $version = 'v0.1 Alpha'; // Fallback for testing
            }

            $title     = get_the_title();
            $desc      = get_the_excerpt();
            $url       = $file_id ? wp_get_attachment_url($file_id) : '';

            if (!$url) continue;

            if ($size_b <= 0 && $file_id) {
                $path = get_attached_file($file_id);
                if ($path && file_exists($path)) {
                    $size_b = filesize($path);
                }
            }

            $size_text = $size_b > 0 ? size_format($size_b) : '';
            $badge     = $file_type ?: strtoupper(pathinfo($url, PATHINFO_EXTENSION));
        ?>

            <article class="vr-download-card">
                <div class="vr-download-card__top">
                    <span class="vr-download-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="12" y1="18" x2="12" y2="12"/>
                            <polyline points="9 15 12 18 15 15"/>
                        </svg>
                    </span>
                    <span class="vr-download-card__badge"><?php echo esc_html($badge); ?></span>
                </div>

                <h3 class="vr-download-card__title"><?php echo esc_html($title); ?></h3>

                <?php if ($desc): ?>
                    <p class="vr-download-card__desc"><?php echo esc_html($desc); ?></p>
                <?php endif; ?>

                <div class="vr-download-card__meta">
                    <?php if ($version): ?>
                        <span class="vr-download-card__version"><?php echo esc_html($version); ?></span>
                    <?php endif; ?>

                    <?php if ($size_text): ?>
                        <span class="vr-download-card__size"><?php echo esc_html($size_text); ?></span>
                    <?php endif; ?>
                </div>

                <a class="vr-download-card__link" href="<?php echo esc_url($url); ?>" download>
                    Download
                </a>
            </article>

        <?php endwhile;
        wp_reset_postdata(); ?>
    </div>
</div>