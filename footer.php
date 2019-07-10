<?php
/**
 * The template for displaying the footer
 *

 */

?>

    <footer>
        <div class="container">
            <div class="Footer">
                <div class=" Footer__logo">
                    <span><img src="<?php bloginfo('template_url');?>/images/FooterLogo.png" alt="FooterLogo"></span>
                </div>
                <?php
                if(is_active_sidebar('footer-sidebar')){
                dynamic_sidebar('footer-sidebar');
                }
                ?>
                <!-- <div class=" Footer__FAQ">
                    <span><i class="fa fa-bookmark-o"></i> Terms of Use</span>
                    <span><i class="fa fa-question"></i>FAQs</span>
                    <span><i id="sun" class="fa fa-sun-o"></i>Privacy Policy</span>
                </div> -->
            </div>
        </div>
    </footer>
    <div class="Footer__copyright">
        <div>
            <div class="Footer__copyright__media">
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('facebook')) ?>"><i class="fa fa-facebook"></i></a>    
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('twitter')) ?>"><i class="fa fa-twitter"></i></a>
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('googleplus')) ?>"><i class="fa fa-google-plus "></i></a>
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('pinterest')) ?>"><i class="fa fa-pinterest-p"></i></a>
            </div>
            <span><?php echo get_theme_mod('copyright'); ?> <i class="fa fa-heart-o"></i> by leehari</span>
        </div>
    </div>

    <?php wp_footer(); ?>
    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jsCalendar.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/isotope.pkgd.min.js"></script>    
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.js"></script>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/custom.js"></script>
    <script type= "text/javascript" src="<?php bloginfo('template_url');?>/js/slick.min.js"></script> 
    
</body>
</html>
