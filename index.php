<?php get_header(); ?>
<section id="page" class="single-blog">
    <div class="container">
        <div class="content-singleblog">
        <?php
            while ( have_posts() ) : the_post();
        ?>

        <article>
            <?php the_content(); ?>
        </article>

        <?php
            endwhile;
            the_posts_pagination();
        ?>
        </div>
    </div>
</section>

<?php get_footer();