<?php

/**
 * Void Raider Theme Functions
 *
 * @package VoidRaider
 * @since 0.1
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function voidraider_setup()
{
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Add support for Block Styles.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for responsive embeds.
    add_theme_support('responsive-embeds');

    // Add support for editor styles.
    add_theme_support('editor-styles');

    // Enqueue editor styles.
    add_editor_style('assets/css/global.css');

    // Add support for HTML5 markup.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
}
add_action('after_setup_theme', 'voidraider_setup');

/**
 * Enqueue scripts and styles.
 */
function voidraider_scripts()
{
    // Enqueue global styles
    wp_enqueue_style(
        'voidraider-global',
        get_template_directory_uri() . '/assets/css/global.css',
        array(),
        wp_get_theme()->get('Version')
    );

    // Add inline script for dark mode toggle (if needed)
    wp_add_inline_script(
        'voidraider-scripts',
        "
        // Dark mode toggle functionality
        const toggleDarkMode = () => {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        };

        // Check for saved dark mode preference
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        }
        "
    );
}
add_action('wp_enqueue_scripts', 'voidraider_scripts');

/**
 * Register block patterns category.
 */
function voidraider_register_block_patterns_category()
{
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category(
            'voidraider',
            array('label' => __('Void Raider', 'voidraider'))
        );
    }
}
add_action('init', 'voidraider_register_block_patterns_category');

/**
 * Add custom block styles.
 */
function voidraider_register_block_styles()
{
    // Add custom button style
    register_block_style(
        'core/button',
        array(
            'name'  => 'cyberpunk',
            'label' => __('Cyberpunk', 'voidraider'),
        )
    );

    // Add custom heading style
    register_block_style(
        'core/heading',
        array(
            'name'  => 'glitch',
            'label' => __('Glitch Effect', 'voidraider'),
        )
    );
}
add_action('init', 'voidraider_register_block_styles');

/**
 * Customize the excerpt length.
 */
function voidraider_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'voidraider_excerpt_length');

/**
 * Customize the excerpt "more" string.
 */
function voidraider_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'voidraider_excerpt_more');

/**
 * Register custom post type: Raids
 */
function voidraider_register_raids_post_type()
{
    $labels = array(
        'name'                  => _x('Raids', 'Post type general name', 'voidraider'),
        'singular_name'         => _x('Raid', 'Post type singular name', 'voidraider'),
        'menu_name'             => _x('Raids', 'Admin Menu text', 'voidraider'),
        'name_admin_bar'        => _x('Raid', 'Add New on Toolbar', 'voidraider'),
        'add_new'               => __('Add New', 'voidraider'),
        'add_new_item'          => __('Add New Raid', 'voidraider'),
        'new_item'              => __('New Raid', 'voidraider'),
        'edit_item'             => __('Edit Raid', 'voidraider'),
        'view_item'             => __('View Raid', 'voidraider'),
        'all_items'             => __('All Raids', 'voidraider'),
        'search_items'          => __('Search Raids', 'voidraider'),
        'parent_item_colon'     => __('Parent Raids:', 'voidraider'),
        'not_found'             => __('No raids found.', 'voidraider'),
        'not_found_in_trash'    => __('No raids found in Trash.', 'voidraider'),
        'featured_image'        => _x('Raid Cover Image', 'Overrides the "Featured Image" phrase', 'voidraider'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the "Set featured image" phrase', 'voidraider'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the "Remove featured image" phrase', 'voidraider'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the "Use as featured image" phrase', 'voidraider'),
        'archives'              => _x('Raid archives', 'The post type archive label used in nav menus', 'voidraider'),
        'insert_into_item'      => _x('Insert into raid', 'Overrides the "Insert into post" phrase', 'voidraider'),
        'uploaded_to_this_item' => _x('Uploaded to this raid', 'Overrides the "Uploaded to this post" phrase', 'voidraider'),
        'filter_items_list'     => _x('Filter raids list', 'Screen reader text for the filter links', 'voidraider'),
        'items_list_navigation' => _x('Raids list navigation', 'Screen reader text for the pagination', 'voidraider'),
        'items_list'            => _x('Raids list', 'Screen reader text for the items list', 'voidraider'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'raids'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-games',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
    );

    register_post_type('raid', $args);
}
add_action('init', 'voidraider_register_raids_post_type');

/**
 * Register custom post type: Factions
 */
function voidraider_register_factions_post_type()
{
    $labels = array(
        'name'                  => _x('Factions', 'Post type general name', 'voidraider'),
        'singular_name'         => _x('Faction', 'Post type singular name', 'voidraider'),
        'menu_name'             => _x('Factions', 'Admin Menu text', 'voidraider'),
        'name_admin_bar'        => _x('Faction', 'Add New on Toolbar', 'voidraider'),
        'add_new'               => __('Add New', 'voidraider'),
        'add_new_item'          => __('Add New Faction', 'voidraider'),
        'new_item'              => __('New Faction', 'voidraider'),
        'edit_item'             => __('Edit Faction', 'voidraider'),
        'view_item'             => __('View Faction', 'voidraider'),
        'all_items'             => __('All Factions', 'voidraider'),
        'search_items'          => __('Search Factions', 'voidraider'),
        'parent_item_colon'     => __('Parent Factions:', 'voidraider'),
        'not_found'             => __('No factions found.', 'voidraider'),
        'not_found_in_trash'    => __('No factions found in Trash.', 'voidraider'),
        'featured_image'        => _x('Faction Image', 'Overrides the "Featured Image" phrase', 'voidraider'),
        'set_featured_image'    => _x('Set faction image', 'Overrides the "Set featured image" phrase', 'voidraider'),
        'remove_featured_image' => _x('Remove faction image', 'Overrides the "Remove featured image" phrase', 'voidraider'),
        'use_featured_image'    => _x('Use as faction image', 'Overrides the "Use as featured image" phrase', 'voidraider'),
        'archives'              => _x('Faction archives', 'The post type archive label used in nav menus', 'voidraider'),
        'insert_into_item'      => _x('Insert into faction', 'Overrides the "Insert into post" phrase', 'voidraider'),
        'uploaded_to_this_item' => _x('Uploaded to this faction', 'Overrides the "Uploaded to this post" phrase', 'voidraider'),
        'filter_items_list'     => _x('Filter factions list', 'Screen reader text for the filter links', 'voidraider'),
        'items_list_navigation' => _x('Factions list navigation', 'Screen reader text for the pagination', 'voidraider'),
        'items_list'            => _x('Factions list', 'Screen reader text for the items list', 'voidraider'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'factions'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
    );

    register_post_type('faction', $args);
}
add_action('init', 'voidraider_register_factions_post_type');

/**
 * Register custom post type: Downloads
 */
function voidraider_register_downloads_post_type()
{
    $labels = array(
        'name'                  => _x('Downloads', 'Post type general name', 'voidraider'),
        'singular_name'         => _x('Download', 'Post type singular name', 'voidraider'),
        'menu_name'             => _x('Downloads', 'Admin Menu text', 'voidraider'),
        'name_admin_bar'        => _x('Download', 'Add New on Toolbar', 'voidraider'),
        'add_new'               => __('Add New', 'voidraider'),
        'add_new_item'          => __('Add New Download', 'voidraider'),
        'new_item'              => __('New Download', 'voidraider'),
        'edit_item'             => __('Edit Download', 'voidraider'),
        'view_item'             => __('View Download', 'voidraider'),
        'all_items'             => __('All Downloads', 'voidraider'),
        'search_items'          => __('Search Downloads', 'voidraider'),
        'parent_item_colon'     => __('Parent Downloads:', 'voidraider'),
        'not_found'             => __('No downloads found.', 'voidraider'),
        'not_found_in_trash'    => __('No downloads found in Trash.', 'voidraider'),
        'featured_image'        => _x('Download Image', 'Overrides the "Featured Image" phrase', 'voidraider'),
        'set_featured_image'    => _x('Set download image', 'Overrides the "Set featured image" phrase', 'voidraider'),
        'remove_featured_image' => _x('Remove download image', 'Overrides the "Remove featured image" phrase', 'voidraider'),
        'use_featured_image'    => _x('Use as download image', 'Overrides the "Use as featured image" phrase', 'voidraider'),
        'archives'              => _x('Download archives', 'The post type archive label used in nav menus', 'voidraider'),
        'insert_into_item'      => _x('Insert into download', 'Overrides the "Insert into post" phrase', 'voidraider'),
        'uploaded_to_this_item' => _x('Uploaded to this download', 'Overrides the \"Uploaded to this post\" phrase', 'voidraider'),
        'filter_items_list'     => _x('Filter downloads list', 'Screen reader text for the filter links', 'voidraider'),
        'items_list_navigation' => _x('Downloads list navigation', 'Screen reader text for the pagination', 'voidraider'),
        'items_list'            => _x('Downloads list', 'Screen reader text for the items list', 'voidraider'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'downloads'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-download',
        'supports' => array('title', 'excerpt', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('download', $args);
}
add_action('init', 'voidraider_register_downloads_post_type');

/**
 * Register structured meta for Download post type
 */
add_action('init', function () {

    $common_args = [
        'single'        => true,
        'show_in_rest'  => true,
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
    ];

    register_post_meta('download', 'download_file_id', [
        ...$common_args,
        'type' => 'integer',
    ]);

    register_post_meta('download', 'download_version', [
        ...$common_args,
        'type'    => 'string',
        'default' => '',
    ]);

    register_post_meta('download', 'download_file_type', [
        ...$common_args,
        'type'    => 'string',
        'default' => 'PDF',
    ]);

    register_post_meta('download', 'download_filesize_bytes', [
        ...$common_args,
        'type'    => 'integer',
        'default' => 0,
    ]);
});


/**
 * Allow SVG uploads
 */

function voidraider_allow_svg_uploads($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'voidraider_allow_svg_uploads');

/**
 * Register custom blocks
 */
function voidraider_register_blocks()
{
    // Register the block script with proper dependencies
    wp_register_script(
        'voidraider-download-grid-editor',
        get_template_directory_uri() . '/blocks/download-grid/index.js',
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-server-side-render', 'wp-block-editor'),
        filemtime(get_template_directory() . '/blocks/download-grid/index.js')
    );

    // Register the block style
    wp_register_style(
        'voidraider-download-grid-style',
        get_template_directory_uri() . '/blocks/download-grid/style.css',
        array(),
        filemtime(get_template_directory() . '/blocks/download-grid/style.css')
    );

    // Register the block type
    register_block_type('voidraider/download-grid', array(
        'editor_script' => 'voidraider-download-grid-editor',
        'style' => 'voidraider-download-grid-style',
        'render_callback' => function ($attributes) {
            ob_start();
            include get_template_directory() . '/blocks/download-grid/render.php';
            return ob_get_clean();
        },
        'attributes' => array(
            'postsToShow' => array(
                'type' => 'number',
                'default' => 4
            ),
            'showAlphaNotice' => array(
                'type' => 'boolean',
                'default' => true
            )
        )
    ));
}
add_action('init', 'voidraider_register_blocks');


add_action('init', function () {
    if (!current_user_can('administrator')) return;

    $dir = get_template_directory() . '/blocks/download-grid';
    error_log('Download Grid dir: ' . $dir);
    error_log('Dir exists: ' . (is_dir($dir) ? 'YES' : 'NO'));
    error_log('block.json exists: ' . (file_exists($dir . '/block.json') ? 'YES' : 'NO'));
});



/**
 * Add Download Details meta box
 */
add_action('add_meta_boxes', function () {
    add_meta_box(
        'voidraider_download_details',
        __('Download Details', 'voidraider'),
        'voidraider_render_download_metabox',
        'download',
        'side',
        'high'
    );
});

function voidraider_render_download_metabox($post)
{
    wp_nonce_field('voidraider_download_save', 'voidraider_download_nonce');

    $file_id   = (int) get_post_meta($post->ID, 'download_file_id', true);
    $version   = (string) get_post_meta($post->ID, 'download_version', true);
    $file_type = (string) get_post_meta($post->ID, 'download_file_type', true);

    $file_url  = $file_id ? wp_get_attachment_url($file_id) : '';
?>

    <p>
        <label for="download_version"><strong><?php esc_html_e('Version', 'voidraider'); ?></strong></label><br />
        <input
            type="text"
            id="download_version"
            name="download_version"
            value="<?php echo esc_attr($version); ?>"
            placeholder="v0.3 Alpha"
            style="width:100%;" />
    </p>

    <p>
        <label for="download_file_type"><strong><?php esc_html_e('File Type Badge', 'voidraider'); ?></strong></label><br />
        <input
            type="text"
            id="download_file_type"
            name="download_file_type"
            value="<?php echo esc_attr($file_type ?: 'PDF'); ?>"
            placeholder="PDF"
            style="width:100%;" />
    </p>

    <p>
        <strong><?php esc_html_e('File', 'voidraider'); ?></strong><br />
        <input type="hidden" id="download_file_id" name="download_file_id" value="<?php echo esc_attr($file_id); ?>" />
        <button type="button" class="button" id="download_file_pick">
            <?php esc_html_e('Select File', 'voidraider'); ?>
        </button>

        <?php if ($file_url): ?>
    <div style="margin-top:6px;">
        <a href="<?php echo esc_url($file_url); ?>" target="_blank" rel="noreferrer">
            <?php esc_html_e('View selected file', 'voidraider'); ?>
        </a>
    </div>
<?php endif; ?>
</p>

<script>
    (function() {
        const btn = document.getElementById('download_file_pick');
        const input = document.getElementById('download_file_id');

        if (!btn || !input || !wp || !wp.media) return;

        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const frame = wp.media({
                title: 'Select download file',
                multiple: false
            });

            frame.on('select', function() {
                const att = frame.state().get('selection').first().toJSON();
                input.value = att.id;
            });

            frame.open();
        });
    })();
</script>

<?php
}

add_action('save_post_download', function ($post_id) {

    if (
        !isset($_POST['voidraider_download_nonce']) ||
        !wp_verify_nonce($_POST['voidraider_download_nonce'], 'voidraider_download_save')
    ) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $version   = isset($_POST['download_version'])
        ? sanitize_text_field($_POST['download_version'])
        : '';

    $file_type = isset($_POST['download_file_type'])
        ? sanitize_text_field($_POST['download_file_type'])
        : 'PDF';

    $file_id   = isset($_POST['download_file_id'])
        ? (int) $_POST['download_file_id']
        : 0;

    update_post_meta($post_id, 'download_version', $version);
    update_post_meta($post_id, 'download_file_type', $file_type);
    update_post_meta($post_id, 'download_file_id', $file_id);

    // Cache file size for fast rendering
    if ($file_id) {
        $path = get_attached_file($file_id);
        if ($path && file_exists($path)) {
            update_post_meta(
                $post_id,
                'download_filesize_bytes',
                (int) filesize($path)
            );
        }
    }
});

add_action('admin_enqueue_scripts', function ($hook) {

    // Only load on post edit screens
    if (!in_array($hook, ['post.php', 'post-new.php'], true)) {
        return;
    }

    // Load media library
    wp_enqueue_media();

    // Load our metabox JS
    wp_enqueue_script(
        'voidraider-download-metabox',
        get_template_directory_uri() . '/assets/js/download-metabox.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );
});

add_action('init', function () {
    if (!function_exists('get_block_types')) return;

    $blocks = array_keys(get_block_types());

    if (current_user_can('administrator')) {
        error_log('Registered blocks: ' . print_r($blocks, true));
    }
});
