<?php
/* 
	Template Name: Gerenciar
*/ 

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<div>
                    <!-- Input e não button para aproveitar o estilo padrão do tema -->
                    <a href="<?php echo get_site_url(); ?>/index.php/gerenciar-pessoas"><input type="submit" value="Gerenciar Pessoas"/></a>
                    <a href="<?php echo get_site_url(); ?>/index.php/gerenciar-emails"><input type="submit" value="Gerenciar Emails"/></a>
                </div>
				
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


?>