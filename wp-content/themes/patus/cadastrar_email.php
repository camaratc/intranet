<?php
/* 
	Template Name: Cadastrar Email
*/ 

if($_GET['id']){
	$name_submit = "editar";

	$db->query("SELECT * FROM email WHERE id = ?");
	$db->bind(1, $_GET['id']);
	$item = $db->singleResult();
}
else{
	$name_submit = "cadastrar_email";
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1>Cadastrar Pessoa</h1>

				<form action="<?php echo get_template_directory_uri(); ?>/processar_email.php" method="post">
					<input type="hidden" name="id" value="<?php echo $item['id'] ?>" />

					<div>
						<label for="nome_setor">Nome do Setor: </label>
						<input required type="text" name="nome_setor" id="nome_setor" value="<?php echo $item['nome_setor'] ?>" />
					</div>

					<div>
						<label for="email_setor">E-mail: </label>
						<input required type="email" name="email_setor" id="email_setor" value="<?php echo $item['email'] ?>" />
					</div>

					<input type="submit" value="Enviar" name="<?php echo $name_submit; ?>" />
				</form>				
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

?>