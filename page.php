<?php
/**
 * The default page template.
 *
 * Used when a default template individual page is queried.
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
<?php if (!empty(get_the_content())) {?>
<div class="main-content">
    <div class="inner">
        <?php the_content();?>
    </div>
</div>
<?php }?>
<?php endwhile;endif;?>

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


<!-- START THE LOOP -->
<?php if (have_posts()): while (have_posts()): the_post();?>

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