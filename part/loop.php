  <a href="<?php the_permalink()?>">
    <div class="content-item"> 
      <img src="<?php the_field('imagem') ?>" alt="">
      <span class="video-time"><?php the_field('tempo_de_duracao');?></span>
      <h3><?php the_title(); ?></h3>
    </div>
  </a>