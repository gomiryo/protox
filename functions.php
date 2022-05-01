<?php

// テーマのスクリプトを読み込む
function enqueue_scripts(){
    // css
    wp_enqueue_style("style", get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');


/* ---------- カスタム投稿タイプを追加 ---------- */
add_action( 'init', 'create_post_type');

function create_post_type(){
  $labels = array(
    'name'               => 'Events',
    'singular_name'      => 'Event',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Event',
    'edit_item'          => 'Edit Event',
    'new_item'           => 'New Event',
    'all_items'          => 'All Events',
    'view_item'          => 'View Event',
    'search_items'       => 'Search Events',
    'not_found'          => 'No events found',
    'not_found_in_trash' => 'No events found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Events'
  );
 
  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'event' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );

  register_post_type( 'event', $args );

  register_taxonomy(
    'event-cat',
    'event',
    array(
      'hierarchical' => true,
      'update_count_callback' => '_update_post_term_count',
      'label' => 'カテゴリー',
      'singular_label' => 'カテゴリー',
      'public' => true,
      'show_ui' => true
    )
  );

  register_taxonomy(
    'event-tag',
    'event',
    array(
      'label' => 'タグ',
      'hierarchical' => false,
      'public' => true,
    )
  );
}

// 出来事の日付を変換する
function cnv_the_year($str)
{
	if($str == "") return "(時期不明)";

  // 正の数 & 8桁の時
  if(intval($str) >= 0 && strlen($str) === 8) {	
	  $y = substr($str, 0, 4);
    $y = ltrim($y, '0');
	  $m = substr($str, 4, 2);
	  $d = substr($str, 6, 2);
	  if($m == "00") return $y."年頃";
	  if($d == "00") return $y."年".ltrim($m,"0")."月頃";
	  return $y. "年". ltrim($m,"0"). "月". ltrim($d,"0"). "日";
  }

  // 正の数 & 9桁以上の時
  if(intval($str) >= 0 && strlen($str) > 9) {
	  $y = substr($str, 0, 4);
    $y = ltrim($y, '0');
	  $m = substr($str, 4, 2);
	  $d = substr($str, 6, 2);
	  if($m == "00") return $y."年頃";
	  if($d == "00") return $y."年".ltrim($m,"0")."月頃";
	  return $y. "年". ltrim($m,"0"). "月". ltrim($d,"0"). "日";
  }

  // 負の数 & 8桁の時
  if(intval($str) < 0 && strlen($str) === 9) {	
	  $y = substr(abs($str), 0, 4);
    $y = ltrim($y, '0');
	  $m = substr(abs($str), 4, 2);
	  $d = substr(abs($str), 6, 2);
	  if($m == "00") return $y."年頃";
	  if($d == "00") return $y."年".ltrim($m,"0")."月頃";
	  return $y. "年". ltrim($m,"0"). "月". ltrim($d,"0"). "日";
  }

  // 負の数 & 9桁以上の時
  if(intval($str) < 0 && strlen($str) > 9) {
	  $y = substr(abs($str), 0, 5);
    $y = ltrim($y, '0');
	  $m = substr(abs($str), 4, 2);
	  $d = substr(abs($str), 6, 2);
	  if($m == "00") return "紀元前". $y."年頃";
	  if($d == "00") return "紀元前". $y."年".ltrim($m,"0")."月頃";
	  return "紀元前". $y. "年". ltrim($m,"0"). "月". ltrim($d,"0"). "日";
  }


}

?>
