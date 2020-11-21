<?php


function cptui_register_my_cpts_video() {

	/**
	 * Post Type: Vídeos.
	 */

	$labels = [
		"name" => __( "Vídeos", "custom-post-type-ui" ),
		"singular_name" => __( "Vídeo", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Vídeos", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "video", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "video", $args );
}

add_action( 'init', 'cptui_register_my_cpts_video' );

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Categorias.
	 */

	$labels = [
		"name" => __( "Categorias", "custom-post-type-ui" ),
		"singular_name" => __( "Categoria", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Categorias", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'categorias', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "categorias",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "categorias", [ "video" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );


if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_5fb85fa4c14e7',
    'title' => 'Detalhes do vídeo',
    'fields' => array(
      array(
        'key' => 'field_5fb8614c70ae3',
        'label' => 'Descrição',
        'name' => 'descricao',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 0,
      ),
      array(
        'key' => 'field_5fb860eeb0d9d',
        'label' => 'Sinopse',
        'name' => 'sinopse',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => '',
        'new_lines' => '',
      ),
      array(
        'key' => 'field_5fb860dab0d9c',
        'label' => 'Tempo de duração',
        'name' => 'tempo_de_duracao',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_5fb860f6b0d9e',
        'label' => 'Embed de vídeo',
        'name' => 'embed_de_video',
        'type' => 'oembed',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'width' => '',
        'height' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'video',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'the_content',
    ),
    'active' => true,
    'description' => '',
  ));
  
  acf_add_local_field_group(array(
    'key' => 'group_5fb8626c21def',
    'title' => 'Homepage',
    'fields' => array(
      array(
        'key' => 'field_5fb8626f2cfe4',
        'label' => 'Vídeo em destaque',
        'name' => 'video_em_destaque',
        'type' => 'relationship',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'post_type' => array(
          0 => 'video',
        ),
        'taxonomy' => '',
        'filters' => array(
          0 => 'search',
          1 => 'post_type',
          2 => 'taxonomy',
        ),
        'elements' => '',
        'min' => '',
        'max' => 1,
        'return_format' => 'object',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'page_home.php',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'the_content',
    ),
    'active' => true,
    'description' => '',
  ));
  
  acf_add_local_field_group(array(
    'key' => 'group_5fb86175a67cd',
    'title' => 'Imagem de capa',
    'fields' => array(
      array(
        'key' => 'field_5fb8617cc325a',
        'label' => 'Imagem',
        'name' => 'imagem',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'url',
        'preview_size' => 'medium',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
      array(
        'key' => 'field_5fb8688605f5a',
        'label' => 'Imagem para destaque da home',
        'name' => 'destaque_home',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'url',
        'preview_size' => 'medium',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'video',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));
  
  endif;