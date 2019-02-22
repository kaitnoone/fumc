<?php
/* Template Name: Bare Bones */

/**
 * The bare bones page template.
 *
 * Used when we want to show only a paragraph or two of content.
 */
get_header('plain');
?>

<?php if (have_posts()): while (have_posts()): the_post();?>

<?php if (!empty(get_the_content())) {?>
<div class="main-content main-content--plain">
    <div class="inner">
        <?php the_content();?>
    </div>
</div>
<?php }?>

<?php endwhile;endif;?>


<?php get_footer();?>