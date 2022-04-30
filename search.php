<h2>「<?php the_search_query(); ?>」の検索結果は<?php echo $wp_query->found_posts;?>件です</h2>
<?php if(have_posts()): while(have_posts()) : the_post(); ?>

<!-- アーカイブページやトップページのループの中身を書く -->

<?php endwhile; ?>
<?php else : ?>
  <h3>「<?php the_search_query(); ?>」はありませんでした</h3>
  <p>Topページに戻る場合は<a href="<?php echo home_url(); ?>">こちら</a>から戻ることができます。</p>
<?php endif; ?>
