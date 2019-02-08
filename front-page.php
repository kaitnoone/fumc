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

<div class="main-content">
    <div class="inner">
        <?php the_content();?>
    </div>
</div>

<!-- PAUSE THE LOOP -->
<?php endwhile;endif;?>

<!-- MINISTRIES -->
<div class="ministries-carousel-intro">
    <h3 class="title">Grow With Us</h3>
    <p>Connect with others through ministries that awaken us to the grace of God.</p>
</div>
<div class="ministries-carousel">
    <?php
$args = [
    'post_type' => 'ministry',
    'posts_per_page' => 10,
];
$loop = new WP_Query($args);
while ($loop->have_posts()) {
    $loop->the_post();
    $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
    $detail = get_field('show_full_detail_');?>
    <div class="ministry">
        <a class="ministry--link<?php if (!$detail) {?> popup<?php }?>"
            style="background-image: url(<?php echo $large_image_url[0] ?>)" href="<?php the_permalink();?>">
            <div class="overlay"></div>
            <div class="ministry--content">
                <div class="ministry--title"><?php the_title();?></div>
            </div>
            <div class="ministry--teaser">
                <?php the_field('teaser');?>
            </div>
        </a>
    </div>
    <?php }?>
</div>
<!-- END MINISTRIES -->


<!-- RESTART THE LOOP -->
<?php if (have_posts()): while (have_posts()): the_post();?>

<!-- IN-BODY CTAS -->
<?php 
$ctas = get_field('inbody_ctas');
if( $ctas ): ?>
<div class="cta--wrapper">
    <?php foreach($ctas as $post): ?>
        <?php $image = get_field('cta_block-image');?>
        <?php $texture = get_field('cta_block-textured_background');?>
        <div class="cta_block<?php if ($image) {?> cta_block--withimage<?php }?><?php if ($texture) {?> cta_block--textured<?php }?>">
            <?php if ($image) {?>
            <div class="cta_block--image">
                <img src="<?php the_field('cta_block-image');?>" alt="<?php the_title(); ?>" />
            </div>
            <?php }?>
            <div class="cta_block--content-wrap">
                <div class="cta_block--title"><?php the_title(); ?></div>
                <div class="cta_block--content">
                    <?php the_field('cta_block-content');?>
                </div>
                <div class="cta_block--link">
                    <a class="button--solid <?php the_field('cta_block-link_icon');?>"
                        href="<?php the_field('cta_block-link');?>"><?php the_field('cta_block-link_text');?></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>    
</div>
<?php endif;

?>
<?php endwhile;endif;?>

<!-- RESTART THE LOOP -->
<?php if (have_posts()): while (have_posts()): the_post();?>
<!-- RESOURCE LIBRARY CTA -->
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



<?php endwhile;endif;?>
<!-- PRE-FOOTER CTAS -->
<?php 
$fctas = get_field('prefooter_ctas');
if( $fctas ): ?>
<div class="cta--wrapper">
    <?php foreach($fctas as $post): ?>
        <?php $fimage = get_field('cta_block-image');?>
        <?php $texture = get_field('cta_block-textured_background');?>
        <div class="cta_block<?php if ($fimage) {?> cta_block--withimage<?php }?><?php if ($texture) {?> cta_block--textured<?php }?>">
            <?php if ($fimage) {?>
            <div class="cta_block--image">
                <img src="<?php the_field('cta_block-image');?>" alt="<?php the_title(); ?>" />
            </div>
            <?php }?>
            <div class="cta_block--content-wrap">
                <div class="cta_block--title"><?php the_title(); ?></div>
                <div class="cta_block--content">
                    <?php the_field('cta_block-content');?>
                </div>
                <div class="cta_block--link">
                    <a class="button--solid <?php the_field('cta_block-link_icon');?>"
                        href="<?php the_field('cta_block-link');?>"><?php the_field('cta_block-link_text');?></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>    
</div>
<?php endif;

?>



<?php get_footer();