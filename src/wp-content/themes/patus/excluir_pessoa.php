<?php
/* 
	Template Name: Excluir Pessoa
*/ 

if(isset($_GET['id'])){
	$db->query("SELECT * FROM pessoa WHERE id = ?");
	$db->bind(1, $_GET['id']);
	$item = $db->singleResult();

	get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1>Excluir Pessoa</h1>
				<p>Deseja excluir o item <?php echo $item['nome'] ?>?</p>

				<form action="<?php echo get_template_directory_uri(); ?>/processar_pessoa.php" method="post">
					<input type="hidden" name="id_excluir" value="<?php echo $item['id']; ?>" />
					
					<input type="submit" name="excluir" value="Excluir" />
				</form>				
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
	get_sidebar();
	get_footer();

} // Fecha if
else{
	header('Location: '.get_site_url().'/index.php');
}

?>