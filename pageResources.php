<?php
/* Template Name: Resources */

/**
 * The resources page template.
 *
 * Used when we want to show the resources
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
        <?php the_content();?>
    </div>
</div>
<?php }?>
<!-- PAUSE THE LOOP -->
<?php endwhile;endif;?>
</div>

<!-- DISPLAY ALL THE RESOURCE LINKS -->
<div class="main-content main-content--plain">
    <div class="inner--wide">
        <!-- START THE LOOP -->
        <?php if (have_posts()): while (have_posts()): the_post();?>

        <!-- DISPLAY THE PDFS -->
        <h3>PDFs</h3>
        <div class="resources--wrapper pdf">

            <?php
        $args = [
            'post_type' => 'resources',
            'meta_key' => 'resource_type',
            'meta_value' => 'pdf',
        ];
        $loop = new WP_Query($args);
        while ($loop->have_posts()) {
            $loop->the_post();
            ?>
            <a class="resource--button pdf" target="_blank"
                href="<?php the_field('resource_file');?>"><?php the_title();?></a>

            <?php }?>
        </div>
        <!-- PAUSE THE LOOP -->
        <?php endwhile;endif;?>

        <!-- DISPLAY THE FORMS -->
        <!-- START THE LOOP -->
        <?php if (have_posts()): while (have_posts()): the_post();?>

        <h3>Forms</h3>
        <div class="resources--wrapper forms">

            <?php
        $args = [
            'post_type' => 'resources',
            'meta_key' => 'resource_type',
            'meta_value' => 'form',
        ];
        $loop = new WP_Query($args);
        while ($loop->have_posts()) {
            $loop->the_post();
            ?>


            <a class="resource--button form" target="_blank"
                href="<?php the_field('resource_file');?>"><?php the_title();?></a>

            <?php }?>
        </div>
        <!-- PAUSE THE LOOP -->
        <?php endwhile;endif;?>

        <!-- DISPLAY THE LINKS -->
        <!-- START THE LOOP -->
        <?php if (have_posts()): while (have_posts()): the_post();?>

        <h3>Helpful Links</h3>
        <div class="resources--wrapper links">

            <?php
        $args = [
            'post_type' => 'resources',
            'meta_key' => 'resource_type',
            'meta_value' => 'helpful link',
        ];
        $loop = new WP_Query($args);
        while ($loop->have_posts()) {
            $loop->the_post();
            ?>
            <a class="resource--button link" target="_blank"
                href="<?php the_field('link_url');?>"><?php the_title();?></a>

            <?php }?>
        </div>

        <!-- PAUSE THE LOOP -->
        <?php endwhile;endif;?>
    </div>
</div>


<!-- DISPLAY ALL THE RESOURCE MEDIA -->
<ul class="resources-media media-carousel">

    <?php $args = [
    'post_type' => 'resources',
    'meta_key' => 'resource_type',
    'meta_value' => 'media',
];
$loop = new WP_Query($args);
while ($loop->have_posts()) {
    $loop->the_post();

    // vars
    $caption = get_field('caption');
    $image = get_field('image');
    $galleryLink = get_field('image_collection_url');
    $video = get_field('video');
    $vimeo_id = get_field('vimeo_id');
    $poster_image = get_field('poster_image');
    $size = 'media-carousel-thumb'; // (thumbnail, medium, large, full or custom size)

    ?>

    <li class="slide">
        <?php if ($image): ?>
        <div class="image"><?php echo wp_get_attachment_image($image, $size); ?></div>
        <div class="media__wrapper">
            <?php echo wp_get_attachment_image($image, 'media-carousel-full'); ?>
            <div class="caption"><?php echo $caption; ?></div>
        </div>
        <?php elseif ($galleryLink): ?>
        <div class="image"><?php echo wp_get_attachment_image($poster_image, $size); ?></div>
        <div class="media__wrapper link" data-link="<?php echo $galleryLink ?>"></div>
        <?php elseif ($video): ?>
        <div class="image image--poster"><?php echo wp_get_attachment_image($poster_image, $size); ?></div>
        <div class="media__wrapper">
            <video width="800" src="<?php echo $video; ?>" controls></video>
            <div class="caption"><?php echo $caption; ?></div>
        </div>
        <?php elseif ($vimeo_id): ?>
        <div class="image image--poster"><?php echo wp_get_attachment_image($poster_image, $size); ?></div>
        <div class="media__wrapper">
            <div class="iframe">
                <iframe src="https://player.vimeo.com/video/<?php echo $vimeo_id; ?>" frameborder="0"
                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <div class="caption"><?php echo $caption; ?></div>
        </div>
        <?php endif;?>
        <?php if ($caption): ?>
        <div class="caption"><?php echo $caption; ?></div>
        <?php endif;?>
    </li>
    <?php }?>
</ul>

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