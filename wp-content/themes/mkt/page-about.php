<?php
/*
 * Template Name: About Page
 */
get_header();
$page_meta = get_post_meta($post->ID);
//pr($page_meta);
?>
<?php if (have_posts()) : the_post(); ?>
    <div class="col-md-12">
        <div class="section-top">
            <h2><?php the_title(); ?></h2>
        </div>
    </div>
<?php endif; ?>
<div id="section-about" class="center page-section">
    <div class="container clearfix">
        <?php
        $heading_abt_pg = $page_meta['heading_abt_pg'][0];
        $content_abt_pg = $page_meta['content_abt_pg'][0];
        ?>
        <?php if ($heading_abt_pg != '') { ?>
            <h2 class="divcenter bottommargin font-body"><?php echo $heading_abt_pg; ?></h2>
<?php } ?>
            <?php if($content_abt_pg !=''){ ?>
            <p class="lead divcenter bottommargin"><?php echo $content_abt_pg; ?></p><?php } ?>
            <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>