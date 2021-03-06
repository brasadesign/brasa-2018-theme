<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coletivo
 */

get_header(); ?>

	<div id="content" class="site-content">
		<nav class="col-md-2 menu-portfolio" id="menu-portfolio-scroll">
			<h3>
				<?php _e( 'Menu', 'brasa2018' );?>
			</h3>
			<ul id="menu-portfolio-container">
				<li>
					<a href="#slider">
						<?php _e( 'Imagens', 'brasa2018' );?>
					</a>
				</li>
				<li>
					<a href="#desafio">
						<?php _e( 'Desafio', 'brasa2018' );?>
					</a>
				</li>
				<li>
					<a href="#solucao">
						<?php _e( 'Solução', 'brasa2018' );?>
					</a>
				</li>
				<li>
					<a href="#impacto">
						<?php _e( 'Impacto', 'brasa2018' );?>
					</a>
				</li>
				<li>
					<a href="#video">
						<?php _e( 'Vídeo', 'brasa2018' );?>
					</a>
				</li>
				<li>
					<a href="#depoimentos">
						<?php _e( 'Depoimentos', 'brasa2018' );?>
					</a>
				</li>

			</ul>
		</nav><!-- .col-md-4 menu-portfolio -->
      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <section class="secao secao-full row" id="slider">
          <?php
          $slider = get_field( "slider" );
          echo do_shortcode(' [brasa_slider id="'.$slider->ID.'"]') ?>
          </section>
          <section class="secao secao-margin" id="conteudo">
            <?php $desafio = get_field( "desafio" );
            $solucao = get_field( "solucao_projeto" );
            $impacto = get_field( "impacto" );
            $impacto = get_field( "impacto" );
            $thumbnail_do_video = get_field( "thumbnail_do_video" );
            $link_do_video = get_field( "link_do_video" );


            if( $desafio ) {
                ?>
                <h3>Desafio</h3>
                <div class="conteudo-interno" id="desafio" >
                  <?php echo $desafio; ?>
                </div>
                <?php
            }
            if( $solucao ) {
                ?>
                <h3>Solução</h3>
                <div class="conteudo-interno" id="solucao" >
                  <?php echo $solucao; ?>
                </div>
                <?php
            }

            if( $impacto ) {
                ?>
                <h3>Impacto</h3>
                <div class="conteudo-interno" id="impacto" >
                  <?php echo $impacto; ?>
                </div>
                <?php
            }
          ?>
          </section>
          <?php
          if( $thumbnail_do_video && $link_do_video ) {
              ?>
            <section style="background-image: url(<?php echo $thumbnail_do_video['url']; ?>);"class="secao secao-full section-videolightbox row" id="video">

              <div class="videolightbox__icon videolightbox-popup">
                 <a href="<?php echo $link_do_video; ?>" data-scr="<?php echo $link_do_video; ?>" class="popup-video">
                   <span class="video_icon"><i class="fa fa-play"></i></span>
                 </a>
              </div>
            </section>
          <?php
          } ?>
          <?php /*
          <section class="secao secao-margin row" id="depoimentos">
            <h3>Depoimentos</h3>
          </section>
          */?>
          <section class="secao secao-margin row" id="mais">
            <h2>Veja mais trabalhos</h2>
            <?php
              $prev_post = get_previous_post();
              // print_r($prev_post);
              if (!empty( $prev_post )):?>
                <div class="col-md-6" id="anteriores">
                  <div class="col-md-8">
                    <a href="<?php echo $prev_post->guid ?>">
                      <?php
                      echo "<h4>".$prev_post->post_title.'</h4>';
                      echo "<p>".wp_strip_all_tags($prev_post->post_content)."</p>";
                       ?>
                    </a>
                  </div>
                  <div class="col-md-4">
                    <a href="<?php echo $prev_post->guid ?>">
                      <?php
                      echo get_the_post_thumbnail($prev_post);
                      ?>
                    </a>
                  </div>
                </div>
              <?php
              endif
              ?>
              <?php
                $next_post = get_next_post();
                // print_r($prev_post);
                if (!empty( $next_post )):?>
                  <div class="col-md-6" id="proximos">
                    <div class="col-md-4">
                      <a href="<?php echo $next_post->guid ?>">
                        <?php
                        echo get_the_post_thumbnail($next_post);
                        ?>
                      </a>
                    </div>
                    <div class="col-md-8">
                      <a href="<?php echo $next_post->guid ?>">
                        <?php
                        echo "<h4>".$next_post->post_title."</h4>";
                        echo "<p>".wp_strip_all_tags($next_post->post_content)."</p>";
                         ?>
                      </a>
                    </div>
                  </div>
                <?php
                endif
                ?>
          </section>
          <!-- <div class="secao secao-full section-social row" id="social">
            <div class="footer-connect">
              <div class="container">
                <div class="row">
                  <div class="col-asm-8">
                    <div class="footer-social">
                      <h5 class="follow-heading">Redes Sociais</h5>
                      <div class="footer-social-icons">
                        <a target="_blank" href="#" title="Facebook"><i class="fa fa fa-facebook-official"></i></a>
                        <a target="_blank" href="http://twitter.com/brasadesign" title="Twitter"><i class="fa fa fa-twitter"></i></a>
                        <a target="_blank" href="http://instagram.com/brasadesign" title="Instagram"><i class="fa fa fa-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <?php
            include_once(get_template_directory()."/section-parts/section-social.php");
          ?>
        </article><!-- #post-## -->
      <?php endwhile; // End of the loop. ?>
	</div><!-- #content -->

<?php get_footer(); ?>
