<?php
/**
 * The default page template.
 *
 * Used when a default template individual page is queried.
 */
get_header();
?>

<?php if (have_posts()): while (have_posts()): the_post();?>

<!-- SERVICE TIMES -->
<div class="service-times">
    <div class="service-times__title">Service Times</div>
    <div class="service-times__wrapper">
        <div class="service-time">
            <div class="time">
                <span class="time-detail"><?php the_field('traditional_worship');?></span>
                <!-- <span class="ampm">AM</span> -->
            </div>
            <div class="title">traditional worship</div>
        </div>
        <div class="service-time">
            <div class="time">
                <span class="time-detail"><?php the_field('sunday_school');?></span>
                <!-- <span class="ampm">AM</span> -->
            </div>
            <div class="title">Sunday School</div>
        </div>
        <div class="service-time">
            <div class="time">
                <span class="time-detail"><?php the_field('modern_worship');?></span>
                <!-- <span class="ampm">AM</span> -->
            </div>
            <div class="title">modern worship</div>
        </div>
    </div>
</div>

<?php the_content();?>


<?php endwhile;endif;?>

<div class="ministries carousel">
    <?php
$args = [
    'post_type' => 'ministry',
    'posts_per_page' => 10,
];
$loop = new WP_Query($args);
while ($loop->have_posts()) {
    $loop->the_post();
    ?>
    <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');?>
    <?php $detail = get_field('show_full_detail_');?>
    <a class="ministry<?php if (!$detail) {?> popup<?php }?>"
        style="background-image: url(<?php echo $large_image_url[0] ?>)" href="<?php the_permalink();?>">
        <?php the_title();?>
        <div class="teaser">
            <?php the_content()?>
        </div>
    </a>
    <?php
}?>
</div>



<div class="resource_library_cta">
    <div class="resource_library_cta--teaser">
        <div class="resource_library_cta--title">Resource Library</div>
        <div class="resource_library_cta--text">
            <?php the_field('resource_library_teaser');?>
        </div>
    </div>
    <div class="resource_library_cta--button">
        <a href="<?php the_field('resource_library_link');?>"><?php the_field('resource_library_button_text');?></a>
    </div>
</div>




<?php get_footer();