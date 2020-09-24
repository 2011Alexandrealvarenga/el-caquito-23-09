<div class="titulo">
              
    <?php $imoveis_meta_data = get_post_meta($post->ID); ?>
      <h6 class="desc-titulo"><?php the_title(); ?></h6>
      <h6 class="preco" >R$ <?= $imoveis_meta_data['preco_id'][0]; ?></h6>
</div>          
  <p>
  	<?php the_content(); ?> 
  </p>