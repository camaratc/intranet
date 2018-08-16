<?php 

/* 
Template Name: Ramal
*/ 


if(is_user_logged_in()){
	header('Location: '.get_site_url().'/index.php/gerenciar-pessoas');
}

get_header(); 
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					$sql = "SELECT nome, ramal FROM pessoa WHERE ativo = 'A' ORDER BY nome";
				 	$db->query($sql);
				 	$result = $db->resultSet();

					 // print_r($result);
				?>

				<table>
					<tr>
						<th width="80%">Nome</th>
						<th width="20%">Ramal</th>
					</tr>
					<?php 
						foreach($result as $item){ 
							echo "
								<tr>
									<td>".$item['nome']."</td>
									<td>".$item['ramal']."</td>
								</tr>
							";
						}
					?>
				</table>
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

?>