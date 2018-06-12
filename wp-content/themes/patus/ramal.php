<?php 

/* 
Template Name: Ramal
*/ 

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					$sql = "SELECT * FROM pessoa";
				 	$db->query($sql);
				 	$result = $db->resultSet();

					 // print_r($result);
				?>

				<table>
					<tr>
						<th>Nome</th>
						<th>Ramal</th>
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