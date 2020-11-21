<?php get_header(); ?>
<section class="single-video">
    <div class="container">
        <div class="content-single-video">
        <?php
            while ( have_posts() ) : the_post();
        ?>

        <article>
            <div class="d-flex">
                <span class="category">
                <?php 
                $category = get_the_terms( $featured_post->ID, 'categorias');
                    foreach($category as $term){
                        echo $term->name . ', ' ;
                    } 
                ?>
                </span>
                <span class="video-time"><?php the_field('tempo_de_duracao');?></span>
            </div>
     
           <h1><?php the_title(); ?></h1>
           <img src="<?php the_field('destaque_home');?>" alt="<?php the_title(); ?>">
           <div class="description">  
                <?php the_field('descricao'); ?>
           </div>
           <div class="embed-container">
                <?php the_field('embed_de_video'); ?>
            </div>
        </article>

        <?php
            endwhile;
            the_posts_pagination();
        ?>
        </div>
    </div>
</section>

<?php get_footer();