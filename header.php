<?php
    global $redux_demo;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />

    <!--Redux Framework-->
    <?php
    $fullwidth = $redux_demo['layout-list'];
     $boxwidth = $redux_demo['layout-list'];
     ?>

    <?php if ($fullwidth == 'fullwidth'):?>
        <style>
            .container{
                max-width: 100% !important;
            }
        </style>
    <?php else: ?>
        <style>
            .container{
                min-width: 90% !important;
            }
        </style>
    <?php endif;?>
    <!--Redux Framework End-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site container">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>

		<header id="masthead" class="<?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">

<!--Redux Framework-->
            <?php if ($redux_demo['logo-link']['url'] != ''):?>
            <img width="200px" height="150px" src="<?php echo $redux_demo['logo-link']['url']?>" alt="no image">
            <?php else:?>
            <h3><?php echo $redux_demo['logo-text-link'];?></h3>
            <?php endif;?>
            <!--Redux Framework End-->

			<div class="site-branding-container">
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
			</div><!-- .site-branding-container -->

			<?php if ( is_singular() && twentynineteen_can_show_post_thumbnail() ) : ?>
				<div class="site-featured-image">
					<?php
						twentynineteen_post_thumbnail();
						the_post();
						$discussion = ! is_page() && twentynineteen_can_show_post_thumbnail() ? twentynineteen_get_discussion_data() : null;

						$classes = 'entry-header';
					if ( ! empty( $discussion ) && absint( $discussion->responses ) > 0 ) {
						$classes = 'entry-header has-discussion';
					}
					?>
					<div class="<?php echo $classes; ?>">
						<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
					</div><!-- .entry-header -->
					<?php rewind_posts(); ?>
				</div>
			<?php endif; ?>
		</header><!-- #masthead -->

	<div id="content" class="site-content">
