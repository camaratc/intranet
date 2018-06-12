<?php 

/* 
Template Name: Email
*/ 

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					$sql = "SELECT * FROM email";
				 	$db->query($sql);
				 	$result = $db->resultSet();

					 // print_r($result);
				?>

				<table>
					<tr>
						<th>Nome do Departamento</th>
						<th>Email</th>
					</tr>
					<?php 
						foreach($result as $item){ 
							echo "
								<tr>
									<td>".$item['nome_setor']."</td>
									<td>".$item['email']."</td>
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