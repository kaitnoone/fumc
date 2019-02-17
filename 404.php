<?php
/**
 * The 404 Not Found template.
 *
 * Used when WordPress encounters an unknown URL.
 */
get_header('plain');
?>
<div class="main-content main-content--plain">
    <div class="inner">
        <section class="error-404">
            <div class="error--title">404</div>
            <div class="oops">Oops, sorry we can’t find that page!</div>
            <div class="error--message">
                <p>Either something went wrong or the page doesn’t exist anymore.</p>
            </div>
            <a class="button--solid" href="/">Return to Homepage</a>
        </section>
    </div>

    <?php
get_footer();