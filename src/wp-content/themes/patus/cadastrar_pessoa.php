<?php 

/* 
	Template Name: Cadastrar Pessoa
*/ 

$id = 0;
$nome = "";
$ramal = "";

if(isset($_GET['id'])){
	$name_submit = "editar";

	$db->query("SELECT * FROM pessoa WHERE id = ?");
	$db->bind(1, $_GET['id']);

	$item = $db->singleResult();

	$id = $item['id'];
	$nome = $item['nome'];
	$ramal = $item['ramal'];
}
else{
	$name_submit = "cadastrar_pessoa";
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1>Cadastrar Pessoa</h1>

				<form action="<?php echo get_template_directory_uri(); ?>/processar_pessoa.php" method="post">
					<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />

					<div>
						<label class="register-nome" for="pessoa_nome">Nome: </label>
						<input required type="text" name="pessoa_nome" id="pessoa_nome" value="<?php echo $nome ?>"/>
					</div>

					<div>
						<label class="register-ramal" for="pessoa_ramal">Ramal: </label>
						<input type="text" name="pessoa_ramal" id="pessoa_ramal" value="<?php echo $ramal ?>"/>
					</div>

					<div>
						<label for="pessoa_data_nasc">Data de Nascimento: </label>
						<input class="input-data" type="date" name="pessoa_data_nasc" id="pessoa_data_nasc" />
					</div>

					<input type="submit" value="Enviar" name="<?php echo $name_submit ?>" />
				</form>				
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

?>