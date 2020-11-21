<?php get_header(); ?>
    <section class="video-list <?php single_cat_title() ?>">
        <div class="container">
          
        <h2><?php single_cat_title(); ?></h2>
        </div>
          <div class="owl-carousel videos-list-carousel">
          <?php while ( have_posts() ) : the_post();  ?>

          <article>
            <?php get_template_part('part/loop'); ?>
          </article>

          <?php
            endwhile;
            the_posts_pagination();
          ?>
        </div>
            </div>
    </section>
<?php get_footer();
