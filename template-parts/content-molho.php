<div class="cont-desc">
	<?php $imoveis_meta_data = get_post_meta($post->ID); ?>
  <div class="titulo">
    <h6 class="desc-titulo"><?php the_title(); ?></h6>
    <h6 class="preco" ><?= $imoveis_meta_data['preco_id'][0]; ?></h6>
  </div>          
  <p><?php the_content(); ?></p>
  <div class="molho">
    <?= $imoveis_meta_data['vagas_id'] [0]; ?>
  </div> 
</div>

