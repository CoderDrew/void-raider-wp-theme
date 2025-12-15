<?php
/**
 * Void Raider Theme Functions
 *
 * A cyberpunk-themed WordPress Full Site Editing (FSE) block theme
 *
 * @package VoidRaider
 * @since 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/* ============================================================================
   THEME SETUP & SUPPORTS
   ============================================================================ */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since 0.1
 */
function voidraider_setup() {
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add support for Block Styles
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds
	add_theme_support( 'responsive-embeds' );

	// Add support for editor styles
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles
	add_editor_style( 'assets/css/global.css' );

	// Add support for HTML5 markup
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
add_action( 'after_setup_theme', 'voidraider_setup' );


/* ============================================================================
   ASSET ENQUEUING
   ============================================================================ */

/**
 * Enqueue front-end scripts and styles.
 *
 * @since 0.1
 */
function voidraider_enqueue_scripts() {
	// Enqueue global styles
	wp_enqueue_style(
		'voidraider-global',
		get_template_directory_uri() . '/assets/css/global.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'voidraider_enqueue_scripts' );

/**
 * Enqueue admin/editor scripts and styles.
 *
 * @since 0.1
 * @param string $hook The current admin page hook.
 */
function voidraider_enqueue_admin_scripts( $hook ) {
	// Only load on post edit screens
	if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		return;
	}

	// Enqueue WordPress media library
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'voidraider_enqueue_admin_scripts' );


/* ============================================================================
   BLOCK STYLES, PATTERNS & REGISTRATION
   ============================================================================ */

/**
 * Register block patterns category.
 *
 * @since 0.1
 */
function voidraider_register_block_patterns_category() {
	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category(
			'voidraider',
			array( 'label' => __( 'Void Raider', 'voidraider' ) )
		);
	}
}
add_action( 'init', 'voidraider_register_block_patterns_category' );

/**
 * Register custom block styles.
 *
 * @since 0.1
 */
function voidraider_register_block_styles() {
	// Cyberpunk button style
	register_block_style(
		'core/button',
		array(
			'name'  => 'cyberpunk',
			'label' => __( 'Cyberpunk', 'voidraider' ),
		)
	);

	// Glitch effect heading style
	register_block_style(
		'core/heading',
		array(
			'name'  => 'glitch',
			'label' => __( 'Glitch Effect', 'voidraider' ),
		)
	);
}
add_action( 'init', 'voidraider_register_block_styles' );

/**
 * Register custom blocks.
 *
 * @since 0.1
 */
function voidraider_register_blocks() {
	$block_path = get_template_directory() . '/blocks/download-grid';

	// Only register if block files exist
	if ( ! is_dir( $block_path ) ) {
		return;
	}

	// Register block script
	wp_register_script(
		'voidraider-download-grid-editor',
		get_template_directory_uri() . '/blocks/download-grid/index.js',
		array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-server-side-render', 'wp-block-editor' ),
		filemtime( $block_path . '/index.js' ),
		false
	);

	// Register block style
	wp_register_style(
		'voidraider-download-grid-style',
		get_template_directory_uri() . '/blocks/download-grid/style.css',
		array(),
		filemtime( $block_path . '/style.css' )
	);

	// Register block type
	register_block_type(
		'voidraider/download-grid',
		array(
			'editor_script'   => 'voidraider-download-grid-editor',
			'style'           => 'voidraider-download-grid-style',
			'render_callback' => 'voidraider_render_download_grid',
			'attributes'      => array(
				'postsToShow'     => array(
					'type'    => 'number',
					'default' => 4,
				),
				'showAlphaNotice' => array(
					'type'    => 'boolean',
					'default' => true,
				),
			),
		)
	);
}
add_action( 'init', 'voidraider_register_blocks' );

/**
 * Render callback for download grid block.
 *
 * @since 0.1
 * @param array $attributes Block attributes.
 * @return string Rendered block HTML.
 */
function voidraider_render_download_grid( $attributes ) {
	ob_start();
	include get_template_directory() . '/blocks/download-grid/render.php';
	return ob_get_clean();
}


/* ============================================================================
   CUSTOM POST TYPES & TAXONOMIES
   ============================================================================ */

/**
 * Register Raids custom post type.
 *
 * @since 0.1
 */
function voidraider_register_raids_post_type() {
	$labels = array(
		'name'                  => _x( 'Raids', 'Post type general name', 'voidraider' ),
		'singular_name'         => _x( 'Raid', 'Post type singular name', 'voidraider' ),
		'menu_name'             => _x( 'Raids', 'Admin Menu text', 'voidraider' ),
		'name_admin_bar'        => _x( 'Raid', 'Add New on Toolbar', 'voidraider' ),
		'add_new'               => __( 'Add New', 'voidraider' ),
		'add_new_item'          => __( 'Add New Raid', 'voidraider' ),
		'new_item'              => __( 'New Raid', 'voidraider' ),
		'edit_item'             => __( 'Edit Raid', 'voidraider' ),
		'view_item'             => __( 'View Raid', 'voidraider' ),
		'all_items'             => __( 'All Raids', 'voidraider' ),
		'search_items'          => __( 'Search Raids', 'voidraider' ),
		'not_found'             => __( 'No raids found.', 'voidraider' ),
		'not_found_in_trash'    => __( 'No raids found in Trash.', 'voidraider' ),
		'featured_image'        => _x( 'Raid Cover Image', 'Featured image label', 'voidraider' ),
		'set_featured_image'    => _x( 'Set cover image', 'Set featured image label', 'voidraider' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Remove featured image label', 'voidraider' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Use featured image label', 'voidraider' ),
		'archives'              => _x( 'Raid archives', 'Archive label', 'voidraider' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'raids' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-games',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'show_in_rest'       => true,
		'taxonomies'         => array( 'category', 'post_tag' ),
	);

	register_post_type( 'raid', $args );
}
add_action( 'init', 'voidraider_register_raids_post_type' );

/**
 * Register Factions custom post type.
 *
 * @since 0.1
 */
function voidraider_register_factions_post_type() {
	$labels = array(
		'name'                  => _x( 'Factions', 'Post type general name', 'voidraider' ),
		'singular_name'         => _x( 'Faction', 'Post type singular name', 'voidraider' ),
		'menu_name'             => _x( 'Factions', 'Admin Menu text', 'voidraider' ),
		'name_admin_bar'        => _x( 'Faction', 'Add New on Toolbar', 'voidraider' ),
		'add_new'               => __( 'Add New', 'voidraider' ),
		'add_new_item'          => __( 'Add New Faction', 'voidraider' ),
		'edit_item'             => __( 'Edit Faction', 'voidraider' ),
		'view_item'             => __( 'View Faction', 'voidraider' ),
		'all_items'             => __( 'All Factions', 'voidraider' ),
		'search_items'          => __( 'Search Factions', 'voidraider' ),
		'not_found'             => __( 'No factions found.', 'voidraider' ),
		'not_found_in_trash'    => __( 'No factions found in Trash.', 'voidraider' ),
		'featured_image'        => _x( 'Faction Image', 'Featured image label', 'voidraider' ),
		'set_featured_image'    => _x( 'Set faction image', 'Set featured image label', 'voidraider' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'factions' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon'          => 'dashicons-groups',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'faction', $args );
}
add_action( 'init', 'voidraider_register_factions_post_type' );

/**
 * Register Downloads custom post type.
 *
 * @since 0.1
 */
function voidraider_register_downloads_post_type() {
	$labels = array(
		'name'               => _x( 'Downloads', 'Post type general name', 'voidraider' ),
		'singular_name'      => _x( 'Download', 'Post type singular name', 'voidraider' ),
		'menu_name'          => _x( 'Downloads', 'Admin Menu text', 'voidraider' ),
		'add_new_item'       => __( 'Add New Download', 'voidraider' ),
		'edit_item'          => __( 'Edit Download', 'voidraider' ),
		'view_item'          => __( 'View Download', 'voidraider' ),
		'all_items'          => __( 'All Downloads', 'voidraider' ),
		'search_items'       => __( 'Search Downloads', 'voidraider' ),
		'not_found'          => __( 'No downloads found.', 'voidraider' ),
		'not_found_in_trash' => __( 'No downloads found in Trash.', 'voidraider' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'downloads' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 7,
		'menu_icon'          => 'dashicons-download',
		'supports'           => array( 'title', 'excerpt', 'thumbnail' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'download', $args );
}
add_action( 'init', 'voidraider_register_downloads_post_type' );

/**
 * Register custom taxonomies for Raids.
 *
 * @since 0.1
 */
function voidraider_register_raid_taxonomies() {
	// Difficulty taxonomy
	register_taxonomy(
		'difficulty',
		'raid',
		array(
			'labels'            => array(
				'name'          => __( 'Difficulties', 'voidraider' ),
				'singular_name' => __( 'Difficulty', 'voidraider' ),
				'search_items'  => __( 'Search Difficulties', 'voidraider' ),
				'all_items'     => __( 'All Difficulties', 'voidraider' ),
				'edit_item'     => __( 'Edit Difficulty', 'voidraider' ),
				'update_item'   => __( 'Update Difficulty', 'voidraider' ),
				'add_new_item'  => __( 'Add New Difficulty', 'voidraider' ),
				'menu_name'     => __( 'Difficulty', 'voidraider' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'difficulty' ),
			'show_in_rest'      => true,
		)
	);

	// Raid Type taxonomy
	register_taxonomy(
		'raid_faction',
		'raid',
		array(
			'labels'            => array(
				'name'          => __( 'Raid Types', 'voidraider' ),
				'singular_name' => __( 'Raid Type', 'voidraider' ),
				'search_items'  => __( 'Search Raid Types', 'voidraider' ),
				'all_items'     => __( 'All Raid Types', 'voidraider' ),
				'edit_item'     => __( 'Edit Raid Type', 'voidraider' ),
				'update_item'   => __( 'Update Raid Type', 'voidraider' ),
				'add_new_item'  => __( 'Add New Raid Type', 'voidraider' ),
				'menu_name'     => __( 'Raid Types', 'voidraider' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'raid-type' ),
			'show_in_rest'      => true,
		)
	);
}
add_action( 'init', 'voidraider_register_raid_taxonomies' );


/* ============================================================================
   POST META REGISTRATION
   ============================================================================ */

/**
 * Register custom meta fields for Raids.
 *
 * @since 0.1
 */
function voidraider_register_raid_meta() {
	$common_args = array(
		'single'        => true,
		'show_in_rest'  => true,
		'auth_callback' => function () {
			return current_user_can( 'edit_posts' );
		},
	);

	register_post_meta(
		'raid',
		'raid_duration',
		array_merge(
			$common_args,
			array(
				'type'    => 'string',
				'default' => '6-8 hours',
			)
		)
	);

	register_post_meta(
		'raid',
		'raid_crew_size',
		array_merge(
			$common_args,
			array(
				'type'    => 'string',
				'default' => '1-5 Raiders',
			)
		)
	);

	register_post_meta(
		'raid',
		'raid_success_rate',
		array_merge(
			$common_args,
			array(
				'type'    => 'string',
				'default' => '50%',
			)
		)
	);

	register_post_meta(
		'raid',
		'raid_rewards',
		array_merge(
			$common_args,
			array(
				'type'    => 'string',
				'default' => '',
			)
		)
	);

	register_post_meta(
		'raid',
		'raid_void_warning',
		array_merge(
			$common_args,
			array(
				'type'    => 'string',
				'default' => 'This run involves reality distortion and temporal anomalies. Psychological screening required.',
			)
		)
	);
}
add_action( 'init', 'voidraider_register_raid_meta' );

/**
 * Register custom meta fields for Downloads.
 *
 * @since 0.1
 */
function voidraider_register_download_meta() {
	$common_args = array(
		'single'        => true,
		'show_in_rest'  => true,
		'auth_callback' => function () {
			return current_user_can( 'edit_posts' );
		},
	);

	register_post_meta(
		'download',
		'download_file_id',
		array_merge(
			$common_args,
			array( 'type' => 'integer' )
		)
	);

	register_post_meta(
		'download',
		'download_version',
		array_merge(
			$common_args,
			array(
				'type'    => 'string',
				'default' => '',
			)
		)
	);

	register_post_meta(
		'download',
		'download_file_type',
		array_merge(
			$common_args,
			array(
				'type'    => 'string',
				'default' => 'PDF',
			)
		)
	);

	register_post_meta(
		'download',
		'download_filesize_bytes',
		array_merge(
			$common_args,
			array(
				'type'    => 'integer',
				'default' => 0,
			)
		)
	);
}
add_action( 'init', 'voidraider_register_download_meta' );


/* ============================================================================
   META BOXES
   ============================================================================ */

/**
 * Register Raid Details meta box.
 *
 * @since 0.1
 */
function voidraider_add_raid_meta_box() {
	add_meta_box(
		'voidraider_raid_details',
		__( 'Raid Details', 'voidraider' ),
		'voidraider_render_raid_metabox',
		'raid',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'voidraider_add_raid_meta_box' );

/**
 * Render Raid Details meta box.
 *
 * @since 0.1
 * @param WP_Post $post Current post object.
 */
function voidraider_render_raid_metabox( $post ) {
	wp_nonce_field( 'voidraider_raid_save', 'voidraider_raid_nonce' );

	$raid_duration     = get_post_meta( $post->ID, 'raid_duration', true ) ?: '6-8 hours';
	$raid_crew_size    = get_post_meta( $post->ID, 'raid_crew_size', true ) ?: '1-5 Raiders';
	$raid_success_rate = get_post_meta( $post->ID, 'raid_success_rate', true ) ?: '50%';
	$raid_rewards      = get_post_meta( $post->ID, 'raid_rewards', true );
	$raid_void_warning = get_post_meta( $post->ID, 'raid_void_warning', true ) ?: 'This run involves reality distortion and temporal anomalies. Psychological screening required.';
	?>

	<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
		<div>
			<p>
				<label for="raid_duration"><strong><?php esc_html_e( 'Duration', 'voidraider' ); ?></strong></label><br />
				<input type="text" id="raid_duration" name="raid_duration" value="<?php echo esc_attr( $raid_duration ); ?>" placeholder="e.g., 6-8 hours" style="width:100%;" />
				<small style="color:#666;"><?php esc_html_e( 'How long the raid takes', 'voidraider' ); ?></small>
			</p>
		</div>

		<div>
			<p>
				<label for="raid_crew_size"><strong><?php esc_html_e( 'Crew Size', 'voidraider' ); ?></strong></label><br />
				<input type="text" id="raid_crew_size" name="raid_crew_size" value="<?php echo esc_attr( $raid_crew_size ); ?>" placeholder="e.g., 1-5 Raiders" style="width:100%;" />
				<small style="color:#666;"><?php esc_html_e( 'Recommended crew size', 'voidraider' ); ?></small>
			</p>
		</div>
	</div>

	<p>
		<label for="raid_success_rate"><strong><?php esc_html_e( 'Success Rate', 'voidraider' ); ?></strong></label><br />
		<input type="text" id="raid_success_rate" name="raid_success_rate" value="<?php echo esc_attr( $raid_success_rate ); ?>" placeholder="e.g., 50%" style="width:300px;" />
		<small style="color:#666;"><?php esc_html_e( 'Percentage of successful raids', 'voidraider' ); ?></small>
	</p>

	<p>
		<label for="raid_rewards"><strong><?php esc_html_e( 'Potential Rewards', 'voidraider' ); ?></strong></label><br />
		<textarea id="raid_rewards" name="raid_rewards" rows="5" style="width:100%;" placeholder="Enter one reward per line"><?php echo esc_textarea( $raid_rewards ); ?></textarea>
		<small style="color:#666;"><?php esc_html_e( 'Enter one reward per line', 'voidraider' ); ?></small>
	</p>

	<p>
		<label for="raid_void_warning"><strong><?php esc_html_e( 'Void Warning Text', 'voidraider' ); ?></strong></label><br />
		<textarea id="raid_void_warning" name="raid_void_warning" rows="3" style="width:100%;"><?php echo esc_textarea( $raid_void_warning ); ?></textarea>
		<small style="color:#666;"><?php esc_html_e( 'Warning message about the raid dangers', 'voidraider' ); ?></small>
	</p>

	<?php
}

/**
 * Save Raid Details meta box data.
 *
 * @since 0.1
 * @param int $post_id Post ID.
 */
function voidraider_save_raid_meta( $post_id ) {
	// Verify nonce
	if ( ! isset( $_POST['voidraider_raid_nonce'] ) || ! wp_verify_nonce( $_POST['voidraider_raid_nonce'], 'voidraider_raid_save' ) ) {
		return;
	}

	// Check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check permissions
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Sanitize and save meta fields
	$fields = array(
		'raid_duration'     => 'sanitize_text_field',
		'raid_crew_size'    => 'sanitize_text_field',
		'raid_success_rate' => 'sanitize_text_field',
		'raid_rewards'      => 'sanitize_textarea_field',
		'raid_void_warning' => 'sanitize_textarea_field',
	);

	foreach ( $fields as $field => $sanitize_callback ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, $field, $sanitize_callback( $_POST[ $field ] ) );
		}
	}
}
add_action( 'save_post_raid', 'voidraider_save_raid_meta' );

/**
 * Register Download Details meta box.
 *
 * @since 0.1
 */
function voidraider_add_download_meta_box() {
	add_meta_box(
		'voidraider_download_details',
		__( 'Download Details', 'voidraider' ),
		'voidraider_render_download_metabox',
		'download',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'voidraider_add_download_meta_box' );

/**
 * Render Download Details meta box.
 *
 * @since 0.1
 * @param WP_Post $post Current post object.
 */
function voidraider_render_download_metabox( $post ) {
	wp_nonce_field( 'voidraider_download_save', 'voidraider_download_nonce' );

	$file_id   = (int) get_post_meta( $post->ID, 'download_file_id', true );
	$version   = (string) get_post_meta( $post->ID, 'download_version', true );
	$file_type = (string) get_post_meta( $post->ID, 'download_file_type', true );
	$file_url  = $file_id ? wp_get_attachment_url( $file_id ) : '';
	?>

	<p>
		<label for="download_version"><strong><?php esc_html_e( 'Version', 'voidraider' ); ?></strong></label><br />
		<input type="text" id="download_version" name="download_version" value="<?php echo esc_attr( $version ); ?>" placeholder="v0.3 Alpha" style="width:100%;" />
	</p>

	<p>
		<label for="download_file_type"><strong><?php esc_html_e( 'File Type Badge', 'voidraider' ); ?></strong></label><br />
		<input type="text" id="download_file_type" name="download_file_type" value="<?php echo esc_attr( $file_type ?: 'PDF' ); ?>" placeholder="PDF" style="width:100%;" />
	</p>

	<p>
		<strong><?php esc_html_e( 'File', 'voidraider' ); ?></strong><br />
		<input type="hidden" id="download_file_id" name="download_file_id" value="<?php echo esc_attr( $file_id ); ?>" />
		<button type="button" class="button" id="download_file_pick">
			<?php esc_html_e( 'Select File', 'voidraider' ); ?>
		</button>

		<?php if ( $file_url ) : ?>
			<div style="margin-top:6px;">
				<a href="<?php echo esc_url( $file_url ); ?>" target="_blank" rel="noreferrer">
					<?php esc_html_e( 'View selected file', 'voidraider' ); ?>
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
				title: '<?php esc_html_e( 'Select download file', 'voidraider' ); ?>',
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

/**
 * Save Download Details meta box data.
 *
 * @since 0.1
 * @param int $post_id Post ID.
 */
function voidraider_save_download_meta( $post_id ) {
	// Verify nonce
	if ( ! isset( $_POST['voidraider_download_nonce'] ) || ! wp_verify_nonce( $_POST['voidraider_download_nonce'], 'voidraider_download_save' ) ) {
		return;
	}

	// Check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check permissions
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Sanitize and save fields
	$version   = isset( $_POST['download_version'] ) ? sanitize_text_field( $_POST['download_version'] ) : '';
	$file_type = isset( $_POST['download_file_type'] ) ? sanitize_text_field( $_POST['download_file_type'] ) : 'PDF';
	$file_id   = isset( $_POST['download_file_id'] ) ? (int) $_POST['download_file_id'] : 0;

	update_post_meta( $post_id, 'download_version', $version );
	update_post_meta( $post_id, 'download_file_type', $file_type );
	update_post_meta( $post_id, 'download_file_id', $file_id );

	// Cache file size for fast rendering
	if ( $file_id ) {
		$path = get_attached_file( $file_id );
		if ( $path && file_exists( $path ) ) {
			update_post_meta( $post_id, 'download_filesize_bytes', (int) filesize( $path ) );
		}
	}
}
add_action( 'save_post_download', 'voidraider_save_download_meta' );


/* ============================================================================
   FILTERS & CUSTOMIZATION
   ============================================================================ */

/**
 * Customize the excerpt length.
 *
 * @since 0.1
 * @param int $length Excerpt length.
 * @return int Modified excerpt length.
 */
function voidraider_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'voidraider_excerpt_length' );

/**
 * Customize the excerpt "more" string.
 *
 * @since 0.1
 * @param string $more The "more" string.
 * @return string Modified "more" string.
 */
function voidraider_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'voidraider_excerpt_more' );

/**
 * Force use of PHP template for raid post type.
 *
 * This overrides the FSE template to use the custom PHP template for raids,
 * which provides more control over the layout and metadata display.
 *
 * @since 0.1
 * @param string $template The path of the template to include.
 * @return string Modified template path.
 */
function voidraider_use_raid_php_template( $template ) {
	if ( is_singular( 'raid' ) ) {
		$php_template = get_template_directory() . '/single-raid.php';
		if ( file_exists( $php_template ) ) {
			return $php_template;
		}
	}
	return $template;
}
add_filter( 'template_include', 'voidraider_use_raid_php_template', 99 );

/**
 * Allow SVG uploads.
 *
 * Security note: Only enable this if you trust all users who can upload files.
 * SVG files can contain executable code and pose security risks.
 *
 * @since 0.1
 * @param array $mimes Allowed mime types.
 * @return array Modified mime types.
 */
function voidraider_allow_svg_uploads( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'voidraider_allow_svg_uploads' );


/* ============================================================================
   REFACTORING NOTES
   ============================================================================

   Changes made during refactoring:

   1. STRUCTURE & ORGANIZATION
      - Reorganized into clear sections with comment headers
      - Grouped related functions together logically
      - Separated concerns (setup, assets, blocks, CPTs, meta, etc.)

   2. NAMING CONSISTENCY
      - All functions use consistent voidraider_ prefix
      - Named functions instead of anonymous callbacks
      - Descriptive function names following WordPress conventions

   3. CODE CLEANUP
      - Removed unused dark mode inline script (not referenced anywhere)
      - Removed debug error_log statements (lines 648-655, 810-818)
      - Removed redundant admin JS enqueue (download-metabox.js doesn't exist)
      - Consolidated meta registration using array_merge for DRY code
      - Removed duplicate/excessive label definitions in CPT registration

   4. SECURITY & BEST PRACTICES
      - Normalized nonce verification and capability checks
      - Consistent sanitization patterns for meta save functions
      - Proper escaping in metabox outputs
      - Added JSDoc-style function documentation

   5. PERFORMANCE
      - Removed unnecessary init hooks for debug logging
      - Block registration checks if files exist before registering
      - Scoped admin scripts to only load on edit screens

   6. WORDPRESS STANDARDS
      - Consistent spacing (tabs for indentation)
      - WordPress Coding Standards compliant
      - Proper use of WordPress APIs
      - Translation-ready with text domain

   7. BACKWARD COMPATIBILITY
      - All public APIs preserved
      - No breaking changes to post types, taxonomies, or meta keys
      - Template override logic maintained
      - All functionality preserved

   ============================================================================ */
