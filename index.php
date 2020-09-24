<?php get_header() ?>
  <div class="container-fluid">
    <div class="row linha-img-titulo-foto"><!--BEBIDAS -->
      <div class="col img-cardapio">
        <div class="cont-img-titulo-delivery" id="foto">
          
          <h1 class="comida-mexicana">Comida Mexicana no bairro do Limão - SP.</h1>
          <h2 class="h3-titulo-secao">Confira algumas fotos do nosso restaurante</h2>
        </div>
      </div>      
    </div> 

    <div class="row "><!--BANNER  -->
      <div class="col d-flex justify-content-center">
        <div id="carouselBSWP" class="carousel slide " data-ride="carousel">
            <div class="carousel-inner">
              <?php 
              // args
              $my_args_banner = array(
                'post_type' => 'banners',

              );
              // query
              $my_query_banner = new WP_Query ( $my_args_banner );

              ?>
              <?php if( $my_query_banner->have_posts()) : 
                $banner = $banners[0];
                $c = 0;
                while( $my_query_banner->have_posts() ) : 
                $my_query_banner->the_post(); 
              ?>
                <div class="carousel-item <?php $c++; if($c == 1) { echo ' active'; } ?>">
                  

                  <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid rounded lazy')) ?>
                  <div class="carousel-caption d-none d-md-block">
                    <h3>
                      <?php the_title(); ?>
                    </h3>
                  </div>
                </div>
              <?php endwhile; endif; ?>
              <?php wp_reset_query(); ?>
            </div>
            <a class="carousel-control-prev" href="#carouselBSWP" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselBSWP" role="button" data-slide="next">
              <span class="carousel-control-next-icon"></span>
              <span class="sr-only">Próximo</span>
            </a>
          </div>
      </div>
    </div>
    <div class="row linha-titulo-cardapio"><!--CARDAPIO -->
      <div class="col mt-5">
        <hr>
        <h3 id="cardapio" class="h3-titulo-secao" >CARDÁPIO</h3>
        <h4 > No EL CAQUÍTO você escolhe o nível de pimenta da sua comida</h4>
      </div>
    </div>
    <div class="row "><!--NIVEL PIMENTA  -->
      <div class="col linha-cont-cardapio">
        <div class="cont-desc ">
          <div class="titulo justify-content-center">
            <h6 class="desc-titulo">NÍVEL DE PIMENTA</h6>
          </div>
          <div class="pt-2 item d-flex justify-content-center">
            <table class="lista-pimenta">
              <tr>
                <td></td>
                <td></td>
                <td>
                  <div class="icone-pimenta">
                    <i class="icon-block" >
                    </i>
                    <img class="pimenta img-fluid lazy" src="https://elcaquito.com/wp-content/uploads/2020/06/PIMENTA_NÍVEIS-30-x-30.png">
                  </div>
                </td>
                <td><p>Sem Pimenta</p></td>
              </tr>
              <tr>
                <td></td>
                <td>
                </td>
                <td>
                  <div class="pimenta">
                    <img class="img-fluid lazy" src="https://elcaquito.com/wp-content/uploads/2020/06/PIMENTA_NÍVEIS-30-x-30.png">
                  </div>
                </td>
                <td><p>Nível Iniciante</p></td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <div class="pimenta">
                    <img class="img-fluid lazy" src="https://elcaquito.com/wp-content/uploads/2020/06/PIMENTA_NÍVEIS-30-x-30.png">
                  </div>
                </td>
                <td>
                  <div class="pimenta">
                    <img class="img-fluid lazy" src="https://elcaquito.com/wp-content/uploads/2020/06/PIMENTA_NÍVEIS-30-x-30.png">
                  </div>
                </td>
                <td><p>Nível Prudente</p></td>
              </tr>
              <tr>
                <td>
                  <div class="pimenta">
                    <img class="img-fluid lazy" src="https://elcaquito.com/wp-content/uploads/2020/06/PIMENTA_NÍVEIS-30-x-30.png">
                  </div>
                </td>
                <td>
                  <div class="pimenta">
                    <img class="img-fluid lazy" src="https://elcaquito.com/wp-content/uploads/2020/06/PIMENTA_NÍVEIS-30-x-30.png">
                  </div>
                </td>
                <td>
                  <div class="pimenta">
                    <img class="img-fluid lazy" src="https://elcaquito.com/wp-content/uploads/2020/06/PIMENTA_NÍVEIS-30-x-30.png">
                  </div>                  
                </td>
                <td><p>Nível Furioso</p></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>    
    <div class="row linha-img-titulo"><!--BURRITO  -->
      <div class="col img-cardapio">
        <div class="cont-img-titulo" data-aos="fade-right">
          <h3 class="h3-titulo" >BURRITO</h3>
          <img class="burrito img-fluid lazy" src="<?php bloginfo('template_url'); ?>/img/BURRITO_SALGADO-260x145.png" >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col linha-cont-cardapio">
      <?php 
        // args
        $my_args = array(
          'post_type' => 'post',          
          'category_name' => 'burrito'
        );
 
        // query
        $my_query = new WP_Query ( $my_args );
        ?> 


        <?php if( $my_query->have_posts()) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>   
          
          <?php get_template_part('template-parts/content'); ?>

        
        <?php endwhile; ?>

        <?php else : get_404_template();  endif; ?>
        <?php wp_reset_query(); ?>
        
      </div>
    </div>    
    <div class="row linha-img-titulo"><!-- QUESADILHA -->
      <div class="col img-cardapio">
        <div class="cont-img-titulo" data-aos="fade-right">
          <h3 class="h3-titulo" >QUESADILHA</h3>
          <img class="burrito img-fluid lazy" src="<?php bloginfo('template_url'); ?>/img/quesadilha-150-x-150.png" >
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col linha-cont-cardapio">
        <div class="cont-desc">
          <div class="titulo">
            <h6 class="desc-titulo">PORÇÃO PEQUENA (04 pedaços)</h6>
            <h6 class="preco" >R$ 15,90</h6>
          </div> 
          <div class="titulo mt-5">
            <h6 class="desc-titulo">PORÇÃO GRANDE (08 PEDAÇOS) </h6>
            <h6 class="preco" >R$ 19,90</h6>
          </div>           
        </div>
      <?php 
        // args
        $my_args = array(
          'post_type' => 'post',          
          'category_name' => 'quesadilha'
        );
        // query
        $my_query = new WP_Query ( $my_args );
        ?> 
        <?php if( $my_query->have_posts()) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>   
          <?php get_template_part('template-parts/content-quesadilha'); ?>

        <?php endwhile; ?>

        <?php else : get_404_template();  endif; ?>
        <?php wp_reset_query(); ?>
        
      </div>
    </div>
    <div class="row linha-img-titulo"><!-- NACHOS -->
      <div class="col img-cardapio">
        <div class="cont-img-titulo" data-aos="fade-right">
          <h3 class="h3-titulo" >NACHOS</h3>
          <img class="burrito img-fluid lazy" src="https://elcaquito.com/wp-content/uploads/2020/06/BURRITO_SALGADO-200x400-1.png" >
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col linha-cont-cardapio">
      <?php 
        // args
        $my_args = array(
          'post_type' => 'post',          
          'category_name' => 'nacho'
        );
        // query
        $my_query = new WP_Query ( $my_args );
        ?> 
        <?php if( $my_query->have_posts()) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>   
          <?php get_template_part('template-parts/content'); ?>

        <?php endwhile; ?>

        <?php else : get_404_template();  endif; ?>
        <?php wp_reset_query(); ?>
        
      </div>
    </div>
    <div class="row linha-img-titulo"><!--PORCOES-->
      <div class="col img-cardapio">
        <div class="cont-img-titulo" data-aos="fade-right">
          <h3 class="h3-titulo" >PORCOES</h3>
          <img class="burrito img-fluid lazy" src="https://elcaquito.com/wp-content/uploads/2020/06/BURRITO_SALGADO-200x400-1.png" >
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col linha-cont-cardapio">
      <?php 
        // args
        $my_args = array(
          'post_type' => 'post',          
          'category_name' => 'porcao'
        );
        // query
        $my_query = new WP_Query ( $my_args );
        ?> 
        <?php if( $my_query->have_posts()) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>   
          <?php get_template_part('template-parts/content'); ?>

        <?php endwhile; ?>

        <?php else : get_404_template();  endif; ?>
        <?php wp_reset_query(); ?>
        
      </div>
    </div>
    <div class="row linha-img-titulo"><!--sobremesas-->
      <div class="col img-cardapio">
        <div class="cont-img-titulo" data-aos="fade-right">
          <h3 class="h3-titulo" >SOBREMESAS</h3>
          <img class="burrito img-fluid lazy" src="https://elcaquito.com/wp-content/uploads/2020/06/BURRITO_SALGADO-200x400-1.png" >
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col linha-cont-cardapio">
      <?php 
        // args
        $my_args = array(
          'post_type' => 'post',          
          'category_name' => 'sobremesa'
        );
        // query
        $my_query = new WP_Query ( $my_args );
        ?> 
        <?php if( $my_query->have_posts()) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>   
          <?php get_template_part('template-parts/content'); ?>

        <?php endwhile; ?>

        <?php else : get_404_template();  endif; ?>
        <?php wp_reset_query(); ?>
        
      </div>
    </div>
    <div class="row linha-img-titulo"><!--MOLHOS -->
      <div class="col img-cardapio">
        <div id="molho">
           <hr>
           <div class="cont-img-titulo-molho" >
             <h3 class="h3-titulo-secao">SALSAS E MOLHOS ADICIONAIS</h3>
           </div>
        </div>
      </div>      
    </div>
    <div class="row linha-img-titulo">
      <div class="col img-cardapio">

        <div class="cont-img-titulo-molho2" data-aos="fade-right">
          <!--<h3 class="h3-titulo" >BURRITO</h3>-->
          <img class="burrito img-fluid lazy" src="<?php bloginfo('template_url'); ?>/img/MOLHO-310x310.png" >
        </div>
      </div>
    </div>
    <div class="row "><!-- MOLHO -->
      <div class="col linha-cont-cardapio">
        <div class="cont-desc-molho">
          <img class="img-molho img-fluid lazy" src="<?php bloginfo('template_url'); ?>/img/PIMENTA_NÍVEIS-220x220.png" >           
        </div>
        <?php 
        // args
        $my_args = array(
          'post_type' => 'post',          
          'category_name' => 'molho'
        );
 
        // query
        $my_query = new WP_Query ( $my_args );
        ?> 

        <?php if( $my_query->have_posts()) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>   
          <?php get_template_part('template-parts/content-molho'); ?>
        
        <?php endwhile; ?>

        <?php else : get_404_template();  endif; ?>
        <?php wp_reset_query(); ?>

      </div>
    </div>
    <div class="row linha-img-titulo"><!--BEBIDAS -->
      <div class="col img-cardapio">   
        <div  id="bebida">            
        <hr>
          <div class="cont-img-titulo-bebida">
            <h3 class="h3-titulo-secao">BEBIDA</h3>
          </div>
        </div>
      </div>      
    </div>
    <div class="row ">
      <div class="col linha-cont-cardapio">
        <!-- <div class="cont-desc img-bebida">
          <img class="bebida img-fluid" src="<?php bloginfo('template_url'); ?>/img/LATA-220x220.png" >           
        </div> -->
        <div class="cont-desc drink">
          <?php 
          // args
          $my_args = array(
            'post_type' => 'post',          
            'category_name' => 'bebida'
          );
   
          // query
          $my_query = new WP_Query ( $my_args );
          ?> 
          
          <?php if( $my_query->have_posts()) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>  
            <?php get_template_part('template-parts/content-bebidas'); ?>

          <?php endwhile; ?>
          <?php else : get_404_template();  endif; ?>
          <?php wp_reset_query(); ?>
        </div>
      </div>
    </div>
    <div class="row linha-img-titulo"><!--BEBIDAS -->
      <div class="col img-cardapio">
        <div class="" id="delivery">
          <hr>
            <h3 class="h3-titulo-secao">DELIVERY</h3>
          </div>
        </div>
      </div>      
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="content-delivery">
          <div class="delivery-desc">
            <h4 class="pedido">
            Faça seu pedido por WhatsApp, Telefone, Ifood ou retire no balcão*
            </h4>
          </div>
          <div class="horario-atendimento">
            <h5 class="horario-func pt-3">
              HORÁRIO DE FUNCIONAMENTO: 
            </h5>
            <h6 class="pt-2">Quarta à Domingo, das 17h as 23h</h6>
            <h6 class="tx-entrega">
              *Taxa de entrega para bairro do Limão, Freguesia, Casa Verde e Cachoeirinha: R$ 5,00
            </h6>
            <h6>
              Para outros bairros, consulte a taxa de entrega.
            </h6>
            <h6>
              Retirada no balcão (SEM TAXA DE ENTREGA):
            </h6>
            <h6 class="endereco pt-3">
              Rua Clemente Ferreira, 104 - Bairro do Limão - São Paulo - SP
            </h6>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <iframe class="conteudo-mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.9553117289734!2d-46.68061248520826!3d-23.498119065144557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef8250e1c80e5%3A0x42a949681b9c018a!2sRua%20Clemente%20Ferreira%2C%20104%20-%20Lim%C3%A3o%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2002723-040!5e0!3m2!1spt-BR!2sbr!4v1591795622110!5m2!1spt-BR!2sbr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
    <div class="row mb-5 linha-img-titulo"><!--CONTATO -->
      <div class="col-12">
        <hr>
        <div class="content-contato"> 
          <div class="cont-img-titulo" id="contato">
            <h3 class="h3-titulo-secao">CONTATO</h3>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="contato-conteudo">
          <div class="contato-zap">
            <div class="icone-zap">
              <i class="icon-whatsapp"></i>
            </div>
            <div class="texto">
              <h3>(11) 98653-4475</h3>
            </div>
          </div>
          <div class="contato-telefone">
            <div class="icone-zap">
              <i class="icon-mobile"></i>
            </div>
            <div class="texto">
              <h3>(11) 2985-8775</h3>
            </div>
          </div>
        </div>
      </div>      
    </div>
<?php get_footer() ?>