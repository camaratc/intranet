<?php
/* 
	Template Name: Cadastrar Email
*/ 

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1>Cadastrar Pessoa</h1>

				<form action="<?php echo get_template_directory_uri(); ?>/adicionar_email.php" method="post">
					<div>
						<label for="nome_setor">Nome do Setor: </label>
						<input required type="text" name="nome_setor" id="nome_setor" />
					</div>

					<div>
						<label for="email_setor">E-mail: </label>
						<input required type="email" name="email_setor" id="email_setor" />
					</div>

					<input type="submit" value="Enviar" name="cadastrar_email" />
				</form>				
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

?>