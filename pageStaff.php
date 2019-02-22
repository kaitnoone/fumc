<?php
/* Template Name: Staff */

/**
 * The staff page template.
 *
 * Used when we want to list the staff custom post type.
 */
get_header('internal');
?>

<!-- START THE LOOP -->
<?php if (have_posts()): while (have_posts()): the_post();?>

<?php
        $servicetime = get_field('service_times');
        if ($servicetime):

            $post = $servicetime;
            setup_postdata($post);

            ?>
<!-- SERVICE TIMES -->
<div class="service-times">
    <div class="service-times__title"><?php the_title();?></div>
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
            <div class="title">Modern Worship</div>
        </div>
    </div>
</div>

<?php endif;?>

<!-- PAUSE THE LOOP -->
<?php endwhile;endif;?>

<?php if (have_posts()): while (have_posts()): the_post();?>

<a name="about"></a>
<?php if (!empty(get_the_content())) {?>
<div class="main-content">
    <div class="inner">
        <?php the_content();?>
    </div>
</div>
<?php }?>

<?php endwhile;endif;?>

<a name="leadership"></a>
<div class="main-content main-content--plain">
    <div class="inner--wide">
        <!-- STAFF -->
        <h3>Meet the FUMC Staff</h3>
        <div class="staff">
            <?php
$args = [
    'post_type' => 'staff',
    'posts_per_page' => 30,
];
$loop = new WP_Query($args);
while ($loop->have_posts()) {
    $loop->the_post();
    $headshot_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'staff-headshot');
    $facebook = get_field('facebook_link');
    $twitter = get_field('twitter_link');

    ?>

            <div class="staff--member">
                <div class="staff--member__headshot">
                    <img src="<?php echo $headshot_url[0] ?>" alt="<?php the_title()?>" />
                </div>
                <div class="staff--member__info">
                    <div class="staff--member__name"><?php the_title()?></div>
                    <div class="staff--member__title"><?php the_field('title');?></div>
                    <div class="staff--member__phones">
                        <div class="staff--member__phone mobile"><?php the_field('mobile_phone');?></div>
                        <div class="staff--member__phone office"><?php the_field('phone');?></div>
                    </div>
                    <div class="staff--member__email">
                        <a href="mailto:<?php the_field('email');?>"><?php the_field('email');?></a>
                    </div>
                    <div class="staff--member__social">
                        <?php if ($facebook || $twitter): ?>
                        <div class="staff--member__social-label">Connect with on</div>
                        <?php if ($facebook): ?>
                        <a href="<?php the_field('facebook_link');?>" target="_blank"
                            class="staff--member__social-facebook">Facebook</a>
                        <?php endif;?>
                        <?php if ($twitter): ?>
                        <a href="<?php the_field('twitter_link');?>" target="_blank"
                            class="staff--member__social-twitter">Twitter</a>
                        <?php endif;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <!-- END STAFF -->
    </div>
</div>


<!-- START THE LOOP -->
<?php if (have_posts()): while (have_posts()): the_post();?>

<!-- IN-BODY CTAS -->
<?php
        $ctas = get_field('inbody_ctas');
        if ($ctas): ?>
<div class="cta--wrapper">
    <?php foreach ($ctas as $post): ?>
    <?php $image = get_field('cta_block-image');?>
    <?php $texture = get_field('cta_block-textured_background');?>
    <div
        class="cta_block<?php if ($image) {?> cta_block--withimage<?php }?><?php if ($texture) {?> cta_block--textured<?php }?>">
        <?php if ($image) {?>
        <div class="cta_block--image">
            <img src="<?php the_field('cta_block-image');?>" alt="<?php the_title();?>" />
        </div>
        <?php }?>
        <div class="cta_block--content-wrap">
            <div class="cta_block--title"><?php the_title();?></div>
            <div class="cta_block--content">
                <?php the_field('cta_block-content');?>
            </div>
            <?php
        $link = get_field('cta_block-link');

        if ($link):
            $link_url = $link['url'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="cta_block--link">
                <a target="<?php echo $link_target ?>" class="button--solid <?php the_field('cta_block-link_icon');?>"
                    href="<?php echo $link_url ?>"><?php the_field('cta_block-link_text');?></a>
            </div>
            <?php endif;?>
        </div>
    </div>
    <?php endforeach;?>
</div>
<?php endif;?>


<!-- PAUSE THE LOOP -->
<?php endwhile;endif;?>
<div class="main-content main-content--plain">
    <div class="inner-wide">
        <!-- START THE LOOP -->
        <?php if (have_posts()): while (have_posts()): the_post();?>

        <!-- BOTTOM MEMBERSHIP CTA -->
        <div class="membership_cta">
            <div class="membership_cta--title"><?php the_field('membership_title');?></div>
            <div class="membership_cta--content"><?php the_field('membership_content')?></div>
            <div class="link">
                <a class="button--solid"
                    href="<?php the_field('membership_link');?>"><?php the_field('membership_link_text');?></a>
            </div>
        </div>

        <!-- PAUSE THE LOOP -->
        <?php endwhile;endif;?>
    </div>
</div>

<!-- START THE LOOP -->
<?php if (have_posts()): while (have_posts()): the_post();?>
<!-- RESOURCE LIBRARY CTA -->

<?php
        $fullwidthcta = get_field('feature_cta');
        if ($fullwidthcta):

            $post = $fullwidthcta;
            setup_postdata($post);

            ?>


<div class="resource_library_cta">
    <div class="resource_library_cta--teaser">
        <div class="resource_library_cta--title"><?php the_title();?></div>
        <div class="resource_library_cta--text">
            <?php the_field('teaser_text');?>
        </div>
    </div>
    <div class="resource_library_cta--button">
        <a href="<?php the_field('link');?>"><?php the_field('link_text');?></a>
    </div>
</div>

<?php endif;?>

<!-- PAUSE THE LOOP -->
<?php endwhile;endif;?>

<!-- START THE LOOP -->
<?php if (have_posts()): while (have_posts()): the_post();?>


<!-- PRE-FOOTER CTAS -->
<?php
        $fctas = get_field('prefooter_ctas');
        if ($fctas): ?>
<div class="cta--wrapper">
    <?php foreach ($fctas as $post): ?>
    <?php $fimage = get_field('cta_block-image');?>
    <?php $texture = get_field('cta_block-textured_background');?>
    <div
        class="cta_block<?php if ($fimage) {?> cta_block--withimage<?php }?><?php if ($texture) {?> cta_block--textured<?php }?>">
        <?php if ($fimage) {?>
        <div class="cta_block--image">
            <img src="<?php the_field('cta_block-image');?>" alt="<?php the_title();?>" />
        </div>
        <?php }?>
        <div class="cta_block--content-wrap">
            <div class="cta_block--title"><?php the_title();?></div>
            <div class="cta_block--content">
                <?php the_field('cta_block-content');?>
            </div>
            <?php
        $link = get_field('cta_block-link');

        if ($link):
            $link_url = $link['url'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="cta_block--link">
                <a target="<?php echo $link_target ?>" class="button--solid <?php the_field('cta_block-link_icon');?>"
                    href="<?php echo $link_url ?>"><?php the_field('cta_block-link_text');?></a>
            </div>
            <?php endif;?>
        </div>
    </div>
    <?php endforeach;?>
</div>
<?php endif;

?>

<!-- PAUSE THE LOOP -->
<?php endwhile;endif;?>



<?php get_footer();?>