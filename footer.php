<?php // Close main ?>
</main>

<footer class="footer">
    <div class="footer-info">
        <div class="footer-info__logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo2.png"
                alt="First Methodist Church" />
        </div>
        <!-- WIDGET ONE -->
        <div class="footer-info__address">
            <?php if (is_active_sidebar('footer-widget')) {
    dynamic_sidebar('footer-widget');
}?>
        </div>
        <div class="footer-info__buttons">
            <?php if (is_active_sidebar('footer-widget-2')) {
    dynamic_sidebar('footer-widget-2');
}?>
        </div>
    </div>
    <div class="footer-menu">
        <!-- FOOTER NAV WIDGET -->
        <?php wp_nav_menu(array('theme_location' => 'footer'));?>
    </div>
    <div class="footer-copyright">
        <p>
            Copyright © 2018 | <strong>Crafted with Care</strong> <em>by</em>
            <strong>Primitive Social</strong>
        </p>
    </div>
</footer>


<?php wp_footer();?>
</body>

</html>