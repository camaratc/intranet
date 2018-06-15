<?php 

/* 
	Template Name: Cadastrar Pessoa
*/ 

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1>Cadastrar Pessoa</h1>

				<form action="<?php echo get_template_directory_uri(); ?>/processar_pessoa.php" method="post">
					<div>
						<label for="pessoa_nome">Nome: </label>
						<input required type="text" name="pessoa_nome" id="pessoa_nome" />
					</div>

					<div>
						<label for="pessoa_ramal">Ramal: </label>
						<input required type="text" name="pessoa_ramal" id="pessoa_ramal" />
					</div>

					<div>
						<label for="pessoa_data_nasc">Data de Nascimento: </label>
						<input required type="date" name="pessoa_data_nasc" id="pessoa_data_nasc" />
					</div>

					<input type="submit" value="Enviar" name="cadastrar_pessoa" />
				</form>				
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

?>