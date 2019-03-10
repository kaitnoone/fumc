<?php
/* Template Name: Contact */

/**
 * The contact page template.
 *
 * Used when we want to show the map and contact form
 */
get_header('short');
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


<!-- START THE LOOP -->
<?php if (have_posts()): while (have_posts()): the_post();?>

<?php if (!empty(get_the_content())) {?>
<div class="main-content">
    <div class="inner">
        <?php the_content()?>
    </div>
</div>
<?php }?>

<div class="main-content main-content--plain">
    <div class="inner--wide">
        <div class="map">
            <div class="map--pane"></div>
            <div class="map--details">
                <div class="address"><?php the_field('address');?></div>
                <?php
        $phone = get_field('phone');
        $phone_fmt = preg_replace('/[^0-9]/', '', $phone);
        ?>
                <div class="phone">
                    <a href="tel:<?php echo $phone_fmt ?>">
                        <?php echo $phone ?>
                    </a>
                </div>
                <div class="fax">
                    <?php
        $fax = get_field('fax');
        $fax_fmt = preg_replace('/[^0-9]/', '', $fax);
        ?>
                    <a href="tel:<?php echo $fax_fmt ?>">
                        <?php echo $fax ?>
                    </a>
                </div>
                <div class="email"><a href="mailto:<?php the_field('email')?>"><?php the_field('email')?>
                    </a></div>
            </div>
        </div>
        <div class="contact-info--wrapper">
            <div class="contact-form">
                <div class="form">
                    <?php the_field('form-shortcode');?>
                </div>
            </div>
            <div class="contact-cta">
                <div class="cta_block">
                    <div class="cta_block--content-wrap">
                        <div class="cta_block--title"><?php the_field('cta_block-title');?></div>
                        <div class="cta_block--content">
                            <?php the_field('cta_block-content');?>
                        </div>
                        <?php
        $link = get_field('cta_block-link');

        if ($link):
            // $link_url = $link['url'];
            // $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                        <div class="cta_block--link">
                            <a target="_blank" class="button--solid <?php the_field('cta_block-link_icon');?>"
                                href="<?php echo $link ?>"><?php the_field('cta_block-link_text');?></a>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- PAUSE THE LOOP -->
<?php endwhile;endif;?>
</div>



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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4LKhSlZdBpl_MC2denAjBmdjTl6vHZww&libraries=places" async
    defer></script>

<?php get_footer();?>