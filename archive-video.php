<?php get_header(); ?>
<?php 

$dynamic_terms = get_terms('categorias');  
foreach($dynamic_terms as $dynamic_term): 
wp_reset_query();
$category_link = get_category_link( $dynamic_term );  

?>

    <section class="video-list <?php echo $dynamic_term->name; ?>">
        <div class="container">
            <h2><a href="<?php echo esc_url( $category_link );?>"><?php echo $dynamic_term->name; ?></a></h2>
        </div>
            <div class="owl-carousel videos-list-carousel">
                <?php
                    $args = array(
                        'post_type' => 'video',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'categorias',
                                'field'    => 'slug',
                                'terms' => $dynamic_term->slug,
                            ),
                        ),
                    );
                    ?>
                    <?php $loop = new WP_Query( $args );
                        if ( $loop->have_posts() ) :
                        while ( $loop->have_posts() ) : $loop->the_post();?>
                            <?php get_template_part('part/loop'); ?>
                    <?php
                        endwhile;
                        endif;
                        wp_reset_postdata();
                    ?>
            </div>
    </section>
<?php endforeach;?>
<?php get_footer();
