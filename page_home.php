<?php
   /* Template name: Home */
   ?>
<?php get_header(); ?>

<?php
    $video_home = get_field('video_em_destaque');
    if ($video_home):
?>
    <?php foreach( $video_home as $featured_post ): 
        $category = get_the_terms( $featured_post->ID, 'categorias');
        $permalink = get_permalink( $featured_post->ID );
        $title = get_the_title( $featured_post->ID );
        $image = get_field( 'destaque_home', $featured_post->ID );
        $video_time = get_field( 'tempo_de_duracao', $featured_post->ID );
        ?>
        <section class="hero-home" style="background-image: url(<?php echo esc_html( $image ); ?>)">  
            <div class="container">
                <div class="content-hero">
                    <div class="d-flex">
                        <span class="category">
                        <?php 
                            foreach($category as $term){
                                echo $term->name . ', ' ;
                            } 
                        ?>
                        </span>
                        <span class="video-time">
                            <?php echo esc_html( $video_time ); ?>
                        </span>
                    </div>
                    <h1><?php echo esc_html( $title ); ?></h1>
                    <a class="btn btn-hero" href="<?php echo esc_html( $permalink) ?>">Mais informações</a>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
<?php endif; ?>
<?php 

$dynamic_terms = get_terms('categorias');    
foreach($dynamic_terms as $dynamic_term):  wp_reset_query();
$category_link = get_category_link( $dynamic_term );  ?>

    <section class="video-list <?php echo $dynamic_term->name; ?>">
        <div class="container">
            <h2><a href="<?php echo esc_url( $category_link );?>"><?php echo $dynamic_term->name; ?> </a></h2>
        </div>
            <div class="owl-carousel videos-list-carousel">
                <?php
                    $args = array(
                        'post_type' => 'video',
                        'posts_per_page' => 12,
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
