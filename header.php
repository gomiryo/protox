<!DOCTYPE html>
<html>
 <head>
  <title><?php trim(wp_title('', false)); ?><?php echo bloginfo('name'); ?></title>
  <?php wp_head(); ?>
 </head>
 <body>
<header>
	<h1><a href="/"><?php bloginfo( 'name' ); ?></a> <span class="desc"><?php bloginfo( 'description' ); ?></span></h1>
メニュー１｜メニュー２<br>
</header>