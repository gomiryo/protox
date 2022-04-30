<?php get_header(); ?>
  <!-- 記事タイトル -->
  <h2><?php the_title(); ?></h2>

  <!-- タグの取得 -->
  <?php $posttags = get_the_tags(); ?>
  
  <!-- 本文の取得 -->
  <?php $content = apply_filters('the_content',get_the_content()); ?>

  <!-- タグを置き換える -->
  <?php if($posttags):
    foreach ( $posttags as $tag ):
      $content = str_ireplace(
         $tag->name
        ,'<a href="'. get_home_url(null, $tag->name). '">'. $tag->name. '</a>'
        ,$content);
    endforeach;
  endif; ?>

  <div>
	<?php echo $content ?>
	<!-- google link -->
	[<a href="https://www.google.co.jp/search?q=<?php echo urlencode(get_the_title()); ?>" target="_blank">Google検索</a>]
	[<a href="https://www.google.co.jp/search?q=<?php echo urlencode(get_the_title()); ?>&tbm=isch" target="_blank">Google画像</a>]
	[<a href="https://ejje.weblio.jp/content/<?php echo urlencode(get_the_title()); ?>">weblio</a>]
    [<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>]
	[<a href="https://ja.wikipedia.org/wiki/<?php echo urlencode(get_the_title()); ?>">wikipedia</a>]
  </div>

<?php get_footer(); ?>
