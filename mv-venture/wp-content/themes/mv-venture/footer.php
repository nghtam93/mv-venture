<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$logo_img = get_field('logo_footer', 'option');
?>
  <footer class="footer">
    <div class="container position-relative">

      <div class="footer__header d-md-flex">
        <div class="footer__support ms-auto order-md-2">
          <span>Bạn cần trợ giúp?</span>
          <a href="<?php echo site_url('lien-he') ?>" class="btn -primary">LIÊN HỆ VỚI CHÚNG TÔI</a>
        </div>

        <div class="footer__logo">
          <a href="<?php echo site_url(); ?>">
              <?php echo wp_get_attachment_image( $logo_img, 'full' ); ?>
          </a>
        </div>

      </div>
      <div class="row">

        <div class="col-lg-8 offset-lg-1 col-md-12 order-md-2">
          <h3 class="footer__list__title"><?php echo dntheme_get_nav_name('footer'); ?></h3>
          <?php
            wp_nav_menu(
            array(
               'theme_location'  => 'footer',
               'container'       => 'ul',
               'container_class' => '',
               'menu_id'         => '',
               'menu_class'      => 'footer__list',
            ));
          ?>
        </div>

        <div class="col-lg-3 col-md-12">
          <div class="footer__item">

            <div class="footer__newsletter">
              <p>Đăng ký nhận tin mới nhất</p>
              <form method="post" action="<?php echo site_url('?na=s') ?>">
                <input type="hidden" name="nlang" value="">
                <div>
                  <input type="email" name="ne" class="form-control input-text" placeholder="Email address">
                  <button type="submit" class="input-submit"><span class="icon-arrow-right"></span></button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-12 col-lg-9">
          <div class="footer__text"><?php the_field('footer_content', 'option') ?></div>
        </div>
        <div class="col-md-12 col-lg-3">

          <div class="text-start text-md-center">
            <ul class="footer__socical">
              <li><a href="<?php the_field('fb', 'option') ?>" target="_blank"><span class="icon-facebook"></span></a></li>
              <li><a href="<?php the_field('twitter', 'option') ?>" target="_blank"><span class="icon-twitter"></span></a></li>
              <li><a href="<?php the_field('instagram', 'option') ?>" target="_blank"><span class="icon-instagram"></span></a></li>
            </ul>
            <div class="copyright">
              <p><?php the_field('copyright', 'option'); ?></p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </footer>
  <nav id="menu__mobile" class="nav__mobile">
      <div class="nav__mobile__content">
        <?php
            wp_nav_menu(
            array(
               'theme_location'  => 'primary',
               'container'       => 'ul',
               'container_class' => '',
               'menu_id'         => '',
               'menu_class'      => 'nav__mobile--ul',
            ));
          ?>
      </div>
  </nav>
</div> <!-- end .wrapper -->
<?php wp_footer(); ?>
</body>
</html>
