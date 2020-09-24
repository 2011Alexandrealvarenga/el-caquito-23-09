<?php 
function load_scripts(){
  wp_enqueue_style('bootstrapmin', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0','all');
  wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array(), '1.0','all');
  wp_enqueue_style('style-root', get_template_directory_uri() . '/style.css', array(), '1.0','all');
  wp_enqueue_style('fontello', get_template_directory_uri() . '/css/fontello.css', array(), '1.0','all');
  wp_enqueue_style('aos', get_template_directory_uri() . '/css/aos.css', array(), '1.0','all');
  // wp_enqueue_icon('favicon', get_template_directory_uri() . '/img/favicon.png', array(), '1.0','all');
  
  // font-titulo
  wp_enqueue_style('fonte-titulo','https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap');
  wp_enqueue_style('num-tele','https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&display=swap');
  wp_enqueue_style('header','https://fonts.googleapis.com/css2?family=Rye&display=swap');
  wp_enqueue_style('titulo','https://fonts.googleapis.com/css2?family=Slackey&display=swap');

 wp_enqueue_script('lazy', get_template_directory_uri().'/js/lazy.js', array('jquery'),'4.0.0', true);
  wp_enqueue_script('aos', get_template_directory_uri().'/js/aos.js', array('jquery'),'4.0.0', true);
  wp_enqueue_script('aos2', get_template_directory_uri().'/js/aos2.js', array('jquery'),'4.0.0', true);
  wp_enqueue_script( 'kit-js', 'https://kit.fontawesome.com/a076d05399.js', array( 'jquery' ), '4.0.0', true );
  wp_enqueue_script('jquery', get_template_directory_uri().'/js/query-3.4.1.min.js', array('jquery'),'4.0.0', true);
  wp_enqueue_script('popper', get_template_directory_uri().'/js/popper.js', array('jquery'),'4.0.0', true);
  wp_enqueue_script('jmagnific', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array('jquery'),'4.0.0', true);
  wp_enqueue_script('jqpage', get_template_directory_uri().'/js/jqpage.js', array('jquery'),'4.0.0', true);
  wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array('jquery'),'4.0.0', true);

}

//chama a função load_scripts
add_action( 'wp_enqueue_scripts', 'load_scripts' );


//ARGS DO POST
function create_post_type(){
  register_post_type('banners',
    array(
      'labels' => array(
      'name' => __('Banners'),
      'singular_name'=> __('Banners')
      ),
      'supports' => array(
        'title', 'editor','thumbnail'
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-images-alt2',
      'rewrite' => array('slug'=>'banners'),
    ));
}
add_action('init','create_post_type');

// REGISTRA O CUSTOM NAVIGATION WALKER
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// REGISTRAR OS MENUS
register_nav_menus( array(
  'principal'=>__('Menu Principal','jamile')
));


// DEFINIR AS MINIATURAS DOS POSTS - ADICIONA A OPÇÃO NO WORDPRESS PARA INSERIR IMAGEM
add_theme_support('post-thumbnails');
set_post_thumbnail_size(1280,720,true);
//LIMITA O TAMANHO DO TEXTO NO POST PAGINA DE RESUMO
ADD_FILTER('excerpt_length',function($lenght){
  return 30;
});


function preenche_conteudo_informacoes_imovel($post){
  $imoveis_meta_data = get_post_meta($post->ID);

  ?>
<style>
    .maluras-metabox {display: flex; justify-content: space-between;  }
    .maluras-metabox-item {flex-basis: 30%; }
    .maluras-metabox-item label {font-weight: 700;display: block; margin: .5rem 0; }
    .input-addon-wrapper {height: 30px; display: flex;align-items: center;}
    .input-addon { display: block;border: 1px solid #CCC;border-bottom-left-radius: 5px;border-top-left-radius: 5px;height: 100%;width: 30px;text-align: center;line-height: 30px;
      box-sizing: border-box;background-color: #888;color: #FFF; }
    .maluras-metabox-input {height: 100%;border: 1px solid #CCC;border-left: none;margin: 0; }
  </style>
  <div class="maluras-metabox">
    <div class="maluras-metabox-item">
      <label for="maluras-preco-input">Preço:</label>
      <div class="input-addon-wrapper">
        <span class="input-addon">R$</span>
        <input id="maluras-preco-input" class="maluras-metabox-input" type="text" name="preco_id"
        value="<?= number_format($imoveis_meta_data['preco_id'][0], 2, ',', '.'); ?>">

      </div>
    </div>

    <div class="maluras-metabox-item">
      <label for="maluras-vagas-input">Molho:</label>
      <input id="maluras-vagas-input" class="maluras-metabox-input" type="text" name="vagas_id"
      value="<?= $imoveis_meta_data['vagas_id'][0]; ?>">
    </div>
  </div>
<?php } 
function registrar_meta_boxes(){
  add_meta_box(
      'informacoes-imoveis',
      'informacoes do imovel',
      'preenche_conteudo_informacoes_imovel',
      'post',
      'normal',
      'default'
    );  
}

//ADD_META_BOXES não inicia como 'init'
add_action('add_meta_boxes', 'registrar_meta_boxes');

function salvar_meta_info_imoveis( $post_id ) {
  if( isset($_POST['preco_id']) ) {
    update_post_meta( $post_id, 'preco_id', sanitize_text_field( $_POST['preco_id'] ) );
  }
  if( isset($_POST['vagas_id']) ) {
    update_post_meta( $post_id, 'vagas_id', sanitize_text_field( $_POST['vagas_id'] ) );
  }

}
add_action('save_post', 'salvar_meta_info_imoveis');
?>