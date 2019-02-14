<?php
/**
 * The single post template.
 *
 * Used when a single post is queried.
 */
get_header('post');

if (have_posts()):

    while (have_posts()): the_post();

        ?>
<div class="main--content">
    <?php the_content()?>
</div>
<?php
        // check if the repeater field has rows of data
        if (have_rows('slides')):
        ?> <div
    class="gallery">
    <?php
        // loop through the rows of data
        while (have_rows('slides')): the_row();

            // display a sub field value
            the_sub_field('caption');

        endwhile;

    else:

        // no rows found
        ?>
</div><?php
    endif;
    ?>

<?php endwhile;

endif;?>

<?php get_footer();