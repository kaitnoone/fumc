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
<div class="main-content main-content--plain">
    <div class="inner">
        <?php the_content()?>
    </div>
</div>
<?php
        // check if the repeater field has rows of data
        if (have_rows('slides')):
        ?>

<ul class="ministry-media">

    <?php while (have_rows('slides')): the_row();

            // vars
            $caption = get_sub_field('caption');
            $image = get_sub_field('image');
            $video = get_sub_field('video');
            $vimeo_id = get_sub_field('vimeo_id');
            $poster_image = get_sub_field('poster_image');
            $size = 'media-carousel-thumb'; // (thumbnail, medium, large, full or custom size)

            ?>

    <li class="slide">
        <?php if ($image): ?>
        <div class="image"><?php echo wp_get_attachment_image($image, $size); ?></div>
        <div class="media__wrapper">
            <?php echo wp_get_attachment_image($image, 'media-carousel-full'); ?>
            <div class="caption"><?php echo $caption; ?></div>
        </div>
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

    <?php endwhile;?>

</ul>

<?php
endif;
?>

<?php endwhile;

endif;?>

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
            <div class="cta_block--link">
                <a class="button--solid <?php the_field('cta_block-link_icon');?>"
                    href="<?php the_field('cta_block-link');?>"><?php the_field('cta_block-link_text');?></a>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>
<?php endif;

?>

<?php get_footer();