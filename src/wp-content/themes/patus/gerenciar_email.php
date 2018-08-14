<?php
/* 
	Template Name: Gerenciar Email
*/ 

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					$sql = "SELECT id, nome_setor, email FROM email WHERE ativo = 'A' ORDER BY nome_setor";
				 	$db->query($sql);
				 	$result = $db->resultSet();

					 // print_r($result);
				?>

				<table>
					<tr>
						<th width="45%">Nome do Departamento</th>
						<th width="35%">Email</th>
						<th width="10%">Editar</th>
						<th width="10%">Excluir</th>
					</tr>
					<?php 
						foreach($result as $item){ 
							echo "
								<tr>
									<td>".$item['nome_setor']."</td>
									<td>".$item['email']."</td>
									<td>
										<a href='".get_site_url()."/index.php/cadastro-emails?id=".$item['id']."'>
											<img width='16px' height='16px' src='".get_template_directory_uri()."/assets/images/edit.png' />
										</a>
									</td>
									<td>
										<a href='".get_site_url()."/index.php/excluir-email?id=".$item['id']."'>
											<img width='16px' height='16px' src='".get_template_directory_uri()."/assets/images/delete.png' />
										</a>
									</td>
								</tr>
							";
						}
					?>
				</table>

				<?php
						echo "
						<a href='".get_site_url()."/index.php/cadastro-emails'>
							<button>Novo Cadastro</button>
						</a>
					";
				?>

			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


?>