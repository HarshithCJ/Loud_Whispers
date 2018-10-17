<?php  
//post thumbnails
function custom_theme_setup() {
    add_theme_support( 'post-thumbnails' );
    }
add_action( 'after_setup_theme', 'custom_theme_setup' );

function wpb_widgets_init(){
    register_sidebar(array(
     'name' =>  'Top header',
     'id'   =>  'header_contact',
     'before_widget' => '<div class="chw-widget">',
     'after_widget'  => '</div>',
     'before_title'  => '<h2 class="chw-title">',
     'after_title'   => '</h2>',

    ));
}
add_action('widgets_init', 'wpb_widgets_init');

function your_theme_enqueue_scripts() {
    // all styles
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), 20141119 );
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap-theme.css', array(), 20141119 );
    // all scripts
    // wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20120206', true );
    // wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '20120206', true );
}
add_action( 'wp_enqueue_scripts', 'your_theme_enqueue_scripts' );

//Menu Widget
function wpb_menu_init(){
    register_sidebar(array(
     'name' =>  'Top Menu',
     'id'   =>  'header_menu',
     'before_widget' => '<div class="chw-widget">',
     'after_widget'  => '</div>',
     'before_title'  => '<h2 class="chw-title">',
     'after_title'   => '</h2>',

    ));
}
add_action('widgets_init', 'wpb_menu_init');

//header image
function wpb_headertexts_init(){
    register_sidebar(array(
     'name' =>  'headertexts',
     'id'   =>  'headertexts',
     'before_widget' => '<div class="chw-widget">',
     'after_widget'  => '</div>',
     'before_title'  => '<h2 class="chw-title">',
     'after_title'   => '</h2>',

    ));
}
add_action('widgets_init', 'wpb_headertexts_init');

//header text
function wpb_headtitle_init(){
    register_sidebar(array(
     'name' =>  'Top Header Title',
     'id'   =>  'header_title',
     'before_widget' => '<div class="chw-widget">',
     'after_widget'  => '</div>',
     'before_title'  => '<h2 class="chw-title">',
     'after_title'   => '</h2>',

    ));
}
add_action('widgets_init', 'wpb_headtitle_init');

//header text2
function wpb_categorytitle_init(){
    register_sidebar(array(
     'name' =>  'Category Title',
     'id'   =>  'category_title',
     'before_widget' => '<div class="chw-widget">',
     'after_widget'  => '</div>',
     'before_title'  => '<h2 class="chw-title">',
     'after_title'   => '</h2>',

    ));
}
add_action('widgets_init', 'wpb_categorytitle_init');

//custom post type
function timeline_custom_post_type(){
    $labels = array(
        'name' => 'How It Works Timeline',
        'singular_name' => 'Timeline',
        'add_new' => 'Add Item',
        'all_items' => 'All Items',
        'add_new_item' => 'Add Item',
        'edit_item' => 'Edit Item',
        'new_item' => 'New Item',
        'view_item' => 'View Item',
        'search_item' => 'Search Portfolio',
        'not_found' => 'No Items Found',
        'not_found_in_trash' => 'No Items in the trash',
        'parent_item_colon' => 'Parent Item',
        
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'input' => 'text',
        'supports' => array(
            'title',
            'excerpt',
            'thumbnail',
            'revisions',
            'custom-fields',
        ),
        'taxonomies' => array('category','post_tag'),
        'menu_position' => 5,
        'exclude_from_search' => false
    );
    register_post_type('timeline',$args);
    register_taxonomy_for_object_type( 'category', 'timeline' );
	register_taxonomy_for_object_type( 'post_tag', 'timeline' );

}
add_action('init','timeline_custom_post_type');

//custom field
function add_your_fields_meta_box() {
	add_meta_box(
		'your_fields_meta_box', // $id
		'Your Fields', // $title
		'show_your_fields_meta_box', // $callback
		'timeline', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );

function show_your_fields_meta_box() {
	global $post;  
        $meta = get_post_meta( $post->ID, 'your_fields', true ); 
        ?>

    
	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
    
    
    <p>
	<label for="your_fields[text]">Input Text</label>
	<br>
	<input type="text" name="your_fields[text]" id="your_fields[text]" class="regular-text" value="<?php if($meta){ echo $meta['text']; } ?>">
    </p>

    <?php /*
    <p>
	<label for="your_fields[textarea]">Textarea</label>
	<br>
	<textarea name="your_fields[textarea]" id="your_fields[textarea]" rows="5" cols="30" style="width:500px;"><?php if($meta){ echo $meta['textarea']; } ?></textarea>
    </p>


    <p>
	<label for="your_fields[checkbox]">Checkbox
		<input type="checkbox" name="your_fields[checkbox]" value="checkbox" <?php if($meta){ if ( $meta['checkbox'] === 'checkbox' ) echo 'checked'; } ?>>
	</label>
    </p>


    <p>
	<label for="your_fields[select]">Select Menu</label>
	<br>
	<select name="your_fields[select]" id="your_fields[select]">
			<option value="option-one" <?php if($meta){ selected( $meta['select'], 'option-one' ); } ?>>Option One</option>
			<option value="option-two" <?php if($meta){ selected( $meta['select'], 'option-two' ); } ?>>Option Two</option>
	</select>
    </p>

    */ ?>
    <p>
	<label for="your_fields[image]">Image Upload</label><br>
	<input type="text" name="your_fields[image]" id="your_fields[image]" class="meta-image regular-text" value="<?php if($meta){ echo $meta['image']; } ?>">
	<input type="button" class="button image-upload" value="Browse">
    </p>
    <div class="image-preview"><img src="<?php if($meta){ echo $meta['image']; } ?>" style="max-width: 250px;"></div>


    <script>
    jQuery(document).ready(function ($) {
      // Instantiates the variable that holds the media library frame.
      var meta_image_frame;
      // Runs when the image button is clicked.
      $('.image-upload').click(function (e) {
        // Get preview pane
        var meta_image_preview = $(this).parent().parent().children('.image-preview');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $(this).parent().children('.meta-image');
        // If the frame already exists, re-open it.
        if (meta_image_frame) {
          meta_image_frame.open();
          return;
        }
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
          title: meta_image.title,
          multiple:true,
          button: {
            text: meta_image.button
          }
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.url);
          meta_image_preview.children('img').attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_image_frame.open();
      });
    });
  </script>
    <!-- All fields will go here -->

    <?php }
    
    //saving custom fields data
function save_your_fields_meta( $post_id ) {   
        // verify nonce
        if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
            return $post_id; 
        }
        // check autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
        // check permissions
        if ( 'page' === $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }  
        }
        
        $old = get_post_meta( $post_id, 'your_fields', true );
        $new = $_POST['your_fields'];
    
        if ( $new && $new !== $old ) {
            update_post_meta( $post_id, 'your_fields', $new );
        } elseif ( '' === $new && $old ) {
            delete_post_meta( $post_id, 'your_fields', $old );
        }
    }
    add_action( 'save_post', 'save_your_fields_meta' );

    //Hide category product count 
    add_filter( 'woocommerce_subcategory_count_html', '__return_false' );

    //product desc
    function wpb_catlist_desc() { 
        $string = '<ul class="cat_desc">';
        $catlist = get_terms( 'product_cat' );
        if ( ! empty( $catlist ) ) {
          foreach ( $catlist as $key => $item ) {
            $string .= '<div class="desc_cat_container'.$key.'"><li class="description_category'.$key.'">'. $item->description . '</li></div>';
          }
        }
        $string .= '</ul>';
         
        return $string; 
        }
        add_shortcode('wpb_categories', 'wpb_catlist_desc');

        //image after categories
    function wpb_categoryafter_image_init(){
        register_sidebar(array(
        'name' =>  'Image After Category',
        'id'   =>  'image_after_category',
        'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="chw-title">',
        'after_title'   => '</h2>',

        ));
    }
    add_action('widgets_init', 'wpb_categoryafter_image_init');

        //Text after categories
        function wpb_categoryafter_text_init(){
            register_sidebar(array(
            'name' =>  'Text After Category',
            'id'   =>  'text_after_category',
            'before_widget' => '<div class="chw-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="chw-title">',
            'after_title'   => '</h2>',
    
            ));
        }
        add_action('widgets_init', 'wpb_categoryafter_text_init');
?>