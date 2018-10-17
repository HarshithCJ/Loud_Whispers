<?php get_header() ?>
    <?php while(have_posts()): the_post()?>
        <?php the_content();?>
    <?php endwhile; ?>

    <?php if(is_front_page()): ?>
        <div class="header_title2">
            <h1>
            <?php 
            if ( is_active_sidebar( 'header_title' ) ) : ?>
            <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
            <?php dynamic_sidebar( 'header_title' ); ?>
            </div>
            <?php endif;  ?>
            </h1> 
        </div>
        <div class="headings">
            <div class="headertexts">
                <?php 
                    if ( is_active_sidebar( 'headertexts' ) ) : ?>
                    <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
                    <?php dynamic_sidebar( 'headertexts' ); ?>
                    </div>
                <?php endif;  ?>
            </div>
            <!-- TimeLine -->
            <div class="how_it_works_timeline">
                <?php 
                $args = array(
                    'post_type' => 'timeline',
                    'orderby'=> 'title', 
                    'order' => 'ASC'
                );  
                $your_loop = new WP_Query( $args );
                if( $your_loop->have_posts() ):
                while( $your_loop->have_posts() ): $your_loop->the_post(); ?>
                <?php $meta = get_post_meta( $post->ID, 'your_fields', true ); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="image_instruction">
                        <img src="<?php echo $meta['image']; ?>">
                    </div>
                    <div class="round_icon">
                        <div class="dot_leaders"></div>
                    </div>
                    <div class="text_instruction">
                        <?php echo $meta['text']; ?>
                    </div>
                </article>

                <?php endwhile;
            
                endif;
                
                ?>
            </div>
            <!-- End Timeline -->
        </div>
        
        <div class="header_title2 for_spacing1">
            <h1>
            <?php 
                if ( is_active_sidebar( 'category_title' ) ) : ?>
                <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
                    <?php dynamic_sidebar( 'category_title' ); ?>
                </div>
            <?php endif;  ?>
            </h1>
        </div>
                
        <div class="category">
        <?php echo do_shortcode('[product_categories limit="4" columns="2" taxonomies="product_cat"]'); 
        ?>
        <div class="category_desc"><?php echo do_shortcode('[wpb_categories]')?></div>
        </div>
        <script>
            $( ".category_desc .desc_cat_container1" ).insertAfter( $( ".first:nth-child(1) h2" ) );
            $( ".category_desc .desc_cat_container2" ).insertAfter( $( ".last:nth-child(2) h2" ) );
            $( ".category_desc .desc_cat_container3" ).insertAfter( $( ".first:nth-child(3) h2" ) );
            $( ".category_desc .desc_cat_container4" ).insertAfter( $( ".last:nth-child(4) h2" ) );
        </script>

        </div>
        <div class="container-fluid textimagonials">
        <!-- category after image -->
            <div class="category_after_image">
                <?php 
                if ( is_active_sidebar( 'image_after_category' ) ) : ?>
                <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
                <?php dynamic_sidebar( 'image_after_category' ); ?>
                </div>
                <?php endif;  ?>
            </div>

            <div class="category_after_text">
                <?php 
                if ( is_active_sidebar( 'text_after_category' ) ) : ?>
                <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
                <?php dynamic_sidebar( 'text_after_category' ); ?>
                </div>
                <?php endif;  ?>
            </div>
        </div>
        <div class="container">
    <?php endif; ?>
<?php get_footer() ?>
<?php get_sidebar() ?>
