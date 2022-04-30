<?php get_header(); ?>
  <?php get_search_form(); ?><br>
  <h2>最近、追加されたキーワード</h2>
  <?php
  $arg = array(
  'posts_per_page' => 100, // 表示件数
  'orderby' => 'date', // 日付ソート
  'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
  'category__not_in' => array(68, 69, 70) // array(34) // 表示しないカテゴリーのIDを指定 IT=34
  );
    query_posts($arg);
  ?>
  <?php if(have_posts()): while (have_posts()):the_post(); ?>
  <span class="slink"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
  <?php endwhile; endif; ?> 
  <?php the_posts_pagination(
      array(
          'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
          'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
          'prev_text'     => __( '前へ'), // 「前へ」リンクのテキスト
          'next_text'     => __( '次へ'), // 「次へ」リンクのテキスト
          'type'          => 'list', // 戻り値の指定 (plain/list)
      )
  ); ?>

  <br>
  <h2>最近、追加された出来事</h2>
  <?php
  $arg = array(
  'posts_per_page' => 100, // 表示件数
  'orderby' => 'date', // 日付ソート
  'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
  'category__in' => array(68, 69, 70) // array(34) // 表示しないカテゴリーのIDを指定 IT=34
  );
  query_posts($arg);
  ?>
  <?php if(have_posts()): while (have_posts()): the_post(); ?>
    <?php $pdate = cnv_the_year(get_field('the_year')); ?><span class="slink"><?php echo $pdate; ?> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span><br>
  <?php endwhile; endif; ?>
  <?php the_posts_pagination(
      array(
          'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
          'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
          'prev_text'     => __( '前へ'), // 「前へ」リンクのテキスト
          'next_text'     => __( '次へ'), // 「次へ」リンクのテキスト
          'type'          => 'list', // 戻り値の指定 (plain/list)
      )
  ); ?>

<?php get_footer(); ?>