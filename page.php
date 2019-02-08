<?php
  /**
   * The default page template.
   *
   * Used when a default template individual page is queried.
   */
  get_header('internal');
?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="main-content">
    <div class="inner">
      <?php the_content(); ?>
    </div>
</div>

    <?php endwhile; endif;?>

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


    

  <?php get_footer(); ?>
