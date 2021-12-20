<?php
/**
 * Template Name: Page Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
global $dn_options;
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

  <section class="home-banner">
    <div class="home-banner__wrap">
      <div class="container">
        <div class="row">

          <div class="col-sm-7 col-lg-6">
            <div class="el__meta wow fadeInUp">
              <div>
                <h2 class="el__title"><?php the_field('header_title') ?></h2>
                <div class="el__excerpt"><?php the_field('header_sub') ?></div>
                <a href="<?php the_field('header_link') ?>" class="el__readmore">HỢP TÁC VỚI CHÚNG TÔI</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php $intro_image = get_field('intro_image'); ?>
  <section id="home-about" class="home-about">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-lg-5 wow fadeInLeft">
          <div class="el__thumb">
            <div class="dnfix__thumb">
              <?php echo wp_get_attachment_image( $intro_image, 'large' ); ?>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-lg-6 offset-lg-1 wow fadeInRight">
          <div class="el__meta">
            <p class="sc__header__sub"><?php the_field('intro_sub') ?></p>
            <h2 class="sc__header__title"><?php the_field('intro_title') ?></h2>
            <div class="sc__header__excerpt"><?php the_field('intro_excerpt') ?></div>
            <a href="<?php the_field('intro_link') ?>" class="el__readmore">XEM THÊM <span class="icon-caret-right"></span></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php $mission_image = get_field('mission_image'); ?>
  <section id="home-mission" class="home-mission">
    <div class="el__box">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-7">
            <header class="sc__header -white">
              <div class="sc__header__sub wow fadeInLeft"><?php the_field('mission_sub') ?></div>
              <h2 class="sc__header__title wow fadeInUp"><?php the_field('mission_title') ?></h2>
            </header>
          </div>
        </div>
      </div>
    </div>

    <div class="home-mission__tab">
      <div class="container">
        <div class="row gx-lg-5">
          <div class="col-md-7 wow fadeInUp">

            <?php
            if( have_rows('mission_items') ): $i=0; ?>
              <ul class="nav nav-tabs" id="missionTab" role="tablist">
                  <?php while( have_rows('mission_items') ) : the_row(); $i++;
                    $box_image = get_sub_field('image');
                    $sub_title = get_sub_field('title');
                    ?>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link <?php echo ($i==1) ? 'active' :'' ?>" id="mission<?php echo $i; ?>-tab" data-bs-toggle="tab" data-bs-target="#mission<?php echo $i; ?>" type="button" role="tab" aria-controls="mission<?php echo $i; ?>" aria-selected="<?php echo ($i==1) ? 'true' :'false' ?>">
                        <div class="nav-link__wrap">
                          <?php echo wp_get_attachment_image( $box_image, 'small' ); ?>
                          <p><?php echo $sub_title; ?></p>
                        </div>
                      </button>
                    </li>
                  <?php endwhile; ?>
              </ul>

              <?php  $i=0; ?>
              <div class="tab-content" id="missionTabContent">
                  <?php while( have_rows('mission_items') ) : the_row(); $i++;
                    $sub_content = get_sub_field('content');
                    ?>
                    <div class="tab-pane fade <?php echo ($i==1) ? 'show active' :'' ?>" id="mission<?php echo $i; ?>" role="tabpanel" aria-labelledby="mission<?php echo $i; ?>-tab"><?php echo $sub_content ?></div>

                  <?php endwhile; ?>
              </div>
            <?php else :
              get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>

          </div>
          <div class="col-md-5 wow fadeInRight">
            <div class="el__thumb">
              <?php echo wp_get_attachment_image( $mission_image, 'large' ); ?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="home-team" class="home-team">
    <div class="sc__wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-7">
            <header class="sc__header -primary  wow fadeInLeft">
              <div class="sc__header__sub"><?php the_field('team_sub') ?></div>
              <h2 class="sc__header__title"><?php the_field('team_title') ?></h2>
            </header>

            <?php
            if( have_rows('team_items') ): $i=0; ?>
              <ul class="nav nav-tabs" id="teamTab" role="tablist">
                  <?php while( have_rows('team_items') ) : the_row(); $i++;
                    $box_image = get_sub_field('image');
                    ?>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link <?php echo ($i==1) ? 'active' :'' ?>" id="team<?php echo $i; ?>-tab" data-bs-toggle="tab" data-bs-target="#team<?php echo $i; ?>" type="button" role="tab" aria-controls="team<?php echo $i; ?>" aria-selected="<?php echo ($i==1) ? 'true' :'false' ?>">
                        <div class="el__thumb">
                          <div class="dnfix__thumb">
                            <?php echo wp_get_attachment_image( $box_image, 'small' ); ?>
                          </div>
                        </div>
                      </button>
                    </li>
                  <?php endwhile; ?>
              </ul>
            <?php else :
              get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
          </div>
          <div class="col-md-12 col-lg-5  wow fadeInRight">
            <?php
            if( have_rows('team_items') ): $i=0; ?>
              <div class="tab-content" id="teamTabContent">
                  <?php while( have_rows('team_items') ) : the_row(); $i++;
                    $box_image = get_sub_field('image');
                    $sub_title = get_sub_field('title');
                    $sub_content = get_sub_field('content');

                    $position = get_sub_field('position');
                    $facebook = get_sub_field('facebook');
                    $twitter = get_sub_field('twitter');
                    $instagram = get_sub_field('instagram');
                    $youtube = get_sub_field('youtube');
                    ?>
                    <div class="tab-pane fade <?php echo ($i==1) ? 'show active' :'' ?>" id="team<?php echo $i; ?>" role="tabpanel" aria-labelledby="team<?php echo $i; ?>-tab">
                      <div class="el__item ef--zoomin">
                        <div class="el__item__thumb">
                          <div class="dnfix__thumb">
                            <?php echo wp_get_attachment_image( $box_image, 'small' ); ?>
                          </div>
                        </div>
                        <div class="el__item__meta">
                          <div class="el__item__title"><?php echo $sub_title; ?></div>
                          <div class="el__item__sub"><?php echo $position ?></div>
                          <ul class="el__item__socical">
                            <li><a href="<?php echo $facebook ?>" target="_blank"><span class="icon-facebook-circle"></span></a></li>
                            <li><a href="<?php echo $twitter ?>" target="_blank"><span class="icon-twitter"></span></a></li>
                            <li><a href="<?php echo $instagram ?>" target="_blank"><span class="icon-instagram"></span></a></li>
                            <li><a href="<?php echo $youtube ?>" target="_blank"><span class="icon-youtube"></span></a></li>
                          </ul>
                          <div class="el__item__excerpt"><?php echo $sub_content; ?></div>
                        </div>
                      </div>

                    </div>
                  <?php endwhile; ?>
              </div>
            <?php else :
              get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="home-news">
    <div class="container">
      <header class="sc__header text-center -s2">
        <div class="sc__header__sub wow fadeInLeft"><?php the_field('new_sub') ?></div>
        <h2 class="sc__header__title wow fadeInRight"><?php the_field('new_title') ?></h2>
      </header>
      <div class="el__box wow fadeInUp">

        <?php
          $new_cat = get_field('new_cat');
          $args = array(
            'taxonomy' => 'category',
            'hide_empty' => false,
            'include' =>$new_cat,
            'orderby'    => 'include',
          );
          $terms = get_terms($args);
          if ( $terms && !is_wp_error( $terms ) ) : $i=0; ?>
            <ul class="nav nav-tabs" id="newsTab" role="tablist">
              <?php foreach ( $terms as $term ) { $i++;?>
                <li class="nav-item" role="presentation">
                  <button class="nav-link <?php echo ($i==1) ? 'active' : '' ?>" id="news<?php echo $i ?>-tab" data-bs-toggle="tab" data-bs-target="#news<?php echo $i ?>" type="button" role="tab" aria-controls="news<?php echo $i ?>" aria-selected="true"><?php echo $term->name; ?></button>
                </li>
              <?php } ?>
            </ul>
          <?php
        endif;
        ?>

        <div class="tab-content" id="newsTabContent">
          <?php
            $new_cat = get_field('new_cat');
            $args = array(
              'taxonomy' => 'category',
              'hide_empty' => false,
              'include' =>$new_cat,
              'orderby'    => 'include',
            );
            $terms = get_terms($args);
            if ( $terms && !is_wp_error( $terms ) ) : $i=0; ?>
              <?php foreach ( $terms as $term ) { $i++;?>
                <div class="tab-pane fade <?php echo ($i==1) ? 'show active' : '' ?>" id="news<?php echo $i ?>" role="tabpanel" aria-labelledby="news<?php echo $i ?>-tab">
                    <?php
                    $args = array(
                      'post_type' => 'post',
                      'posts_per_page' => 8,
                      'cat' => $term->term_id,
                    );
                    $the_query = new WP_Query( $args ); ?>
                      <?php if ( $the_query->have_posts() ) : ?>
                        <div class="news__slider js-slick">
                          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="item__wrap">
                              <div class="el__item ef--zoomin">
                                <a href="<?php the_permalink(); ?>">
                                  <div class="el__item__thumb">
                                    <div class="dnfix__thumb">
                                      <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                                    </div>
                                  </div>
                                  <div class="el__item__meta">
                                    <h3 class="el__item__title text__truncate -n2"><?php the_title(); ?></h3>
                                  </div>
                                </a>
                              </div>
                            </div>
                          <?php endwhile;?>
                        </div>
                        <?php
                        wp_reset_postdata();
                      else :
                        get_template_part( 'template-parts/content', 'none' );
                      endif; ?>
                </div>
              <?php } ?>
            <?php
          endif;
          ?>
        </div>
      </div>
      <div class="el__box wow fadeInUp">
        <header class="sc__header -s2 d-flex align-items-end">
          <div>
            <div class="sc__header__sub"><?php the_field('new2_sub') ?></div>
            <h2 class="sc__header__title"><?php the_field('new2_title') ?></h2>
          </div>
          <a href="<?php echo get_category_link(get_field('new2_link')) ?>" class="el__readmore ms-auto mb-2">Xem tất cả</a>
        </header>

        <?php
          $new2_cat = get_field('new2_cat');
          $args = array(
            'taxonomy' => 'category',
            'hide_empty' => false,
            'include' =>$new2_cat,
            'orderby'    => 'include',
          );
          $terms = get_terms($args);
          if ( $terms && !is_wp_error( $terms ) ) : $i=0; ?>
            <ul class="nav nav-tabs -s2" id="newsTab1" role="tablist">
              <?php foreach ( $terms as $term ) { $i++;?>
                <li class="nav-item" role="presentation">
                  <button class="nav-link <?php echo ($i==1) ? 'active' : '' ?>" id="newz<?php echo $i ?>-tab" data-bs-toggle="tab" data-bs-target="#newz<?php echo $i ?>" type="button" role="tab" aria-controls="newz<?php echo $i ?>" aria-selected="true"><?php echo $term->name; ?></button>
                </li>
              <?php } ?>
            </ul>
          <?php
        endif;
        ?>

        <div class="tab-content" id="newsTab1Content">
          <?php
            $new2_cat = get_field('new2_cat');
            $args = array(
              'taxonomy' => 'category',
              'hide_empty' => false,
              'include' =>$new2_cat,
              'orderby'    => 'include',
            );
            $terms = get_terms($args);
            if ( $terms && !is_wp_error( $terms ) ) : $i=0; ?>
              <?php foreach ( $terms as $term ) { $i++;?>
                <div class="tab-pane fade <?php echo ($i==1) ? 'show active' : '' ?>" id="newz<?php echo $i ?>" role="tabpanel" aria-labelledby="newz<?php echo $i ?>-tab">
                    <?php
                    $args = array(
                      'post_type' => 'post',
                      'posts_per_page' => 6,
                      'cat' => $term->term_id,
                    );
                    $the_query = new WP_Query( $args ); ?>
                      <?php if ( $the_query->have_posts() ) : $j=0; ?>
                        <div class="row">
                          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $j++; ?>

                            <?php if($j==1): ?>
                            <div class="col-md-6 d-none d-md-block order-md-2">
                              <div class="el__item ef--zoomin">
                                <a href="<?php the_permalink(); ?>">
                                  <div class="el__item__thumb">
                                    <div class="dnfix__thumb">
                                      <?php the_post_thumbnail('large',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                                    </div>
                                  </div>
                                  <div class="el__item__meta">
                                    <h3 class="el__item__title text__truncate -n2"><?php the_title(); ?></h3>
                                  </div>
                                </a>
                              </div>
                            </div>
                            <div class="col-md-6">
                            <?php else: ?>
                              <div class="el__item -small ef--zoomin">
                                <a href="<?php the_permalink(); ?>">
                                  <div class="el__item__thumb">
                                    <div class="dnfix__thumb">
                                      <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                                    </div>
                                  </div>
                                  <div class="el__item__meta">
                                    <h3 class="el__item__title text__truncate -n2"><?php the_title(); ?></h3>
                                  </div>
                                </a>
                              </div>
                            <?php endif ?>

                          <?php endwhile;?>
                          </div> <!-- end close col-6 -->
                        </div>
                        <?php
                        wp_reset_postdata();
                      else :
                        get_template_part( 'template-parts/content', 'none' );
                      endif; ?>
                </div>
              <?php } ?>
            <?php
          endif;
          ?>
        </div>
      </div>

    </div>
  </section>

  <section id="home-partners" class="home-partner">
    <div class="container">
      <header class="sc__header text-center -s2">
        <div class="sc__header__sub wow fadeInLeft"><?php the_field('partners_sub') ?></div>
        <h2 class="sc__header__title wow fadeInRight"><?php the_field('partners_title') ?></h2>
      </header>

      <?php
      $images = get_field('partners');
      if( $images ): ?>
          <div class="el__box js-loadmore__wrap wow fadeInUp">
            <div class="row el js-content-loadmore">
              <?php foreach( $images as $image_id ): ?>
                <div class="col-6 col-md-3 col-lg-2">
                  <div class="el__item">
                    <div class="el__item__thumb -contain">
                      <?php echo wp_get_attachment_image( $image_id, 'small' ); ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="js-btn-loadmore d-md-none">Xem thêm</div>
          </div>
      <?php endif; ?>

    </div>
  </section>

  <?php
  $gallery = get_field('gallery');
  if( $gallery ): $i=0; ?>
      <section id="home-gallery" class="home-gallery">
        <div class="row gx-0 wow fadeInUp">
          <?php foreach( $gallery as $image_id ): $i++; ?>

            <?php if($i<=10): ?>
              <div class="el__col col-4 col-lg-20">
                <div class="el__item ef--zoomin" >
                  <a href="<?php echo wp_get_attachment_image_url( $image_id, 'full' ); ?>" data-fancybox="gallery">
                    <div class="el__item__thumb dnfix__thumb">
                      <?php echo wp_get_attachment_image( $image_id, 'small' ); ?>
                    </div>
                  </a>
                </div>
              </div>
            <?php else: ?>
              <a href="<?php echo wp_get_attachment_image_url( $image_id, 'full' ); ?>" data-fancybox="gallery" class="d-none"></a>
            <?php endif; ?>

          <?php endforeach; ?>
        </div>
      </section>
  <?php endif; ?>

<?php endwhile; ?>
<?php get_footer();