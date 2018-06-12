<?php 

/* 
Template Name: Aniversarios
*/ 

function aniversariosMes($mes){
    if(!empty($mes['aniversarios'])){
        echo "
            <table>
                <tr>
                    <th width='20%'>Dia</th>
                    <th width='80%'>Nome</th>
                </tr>
        ";
        foreach($mes['aniversarios'] as $item){

            echo "
                <tr>
                    <td>".$item['dia']."</td>
                    <td>".$item['nome']."</td>
                </tr>
            ";
        }

        echo "</table>";
    }
    else{
        echo "Nenhum aniversário encontrado no mes de ".$mes['nome_mes'].".";
    }   
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

                <?php
                    $jan['nome_mes'] = "Janeiro";
                    $jan['aniversarios'] = array();

                    $fev['nome_mes'] = "Fevereiro";
                    $fev['aniversarios'] = array();

                    $mar['nome_mes'] = "Março";
                    $mar['aniversarios'] = array();

                    $abr['nome_mes'] = "Abril";
                    $abr['aniversarios'] = array();

                    $mai['nome_mes'] = "Maio";   
                    $mai['aniversarios'] = array();
                                     
                    $jun['nome_mes'] = "Junho";
                    $jun['aniversarios'] = array();

                    $jul['nome_mes'] = "Julho";
                    $jul['aniversarios'] = array();

                    $ago['nome_mes'] = "Agosto";
                    $ago['aniversarios'] = array();

                    $set['nome_mes'] = "Setembro";
                    $set['aniversarios'] = array();

                    $out['nome_mes'] = "Outubro";
                    $out['aniversarios'] = array();

                    $nov['nome_mes'] = "Novembro";
                    $nov['aniversarios'] = array();

                    $dez['nome_mes'] = "Dezembro";
                    $dez['aniversarios'] = array();

					$sql = "
                        SELECT nome, data_nascimento FROM pessoa 
                        WHERE ativo = 'A'                        
                        ORDER BY data_nascimento DESC
                    ";
				 	$db->query($sql);
                    $result = $db->resultSet();
                     
                    foreach ($result as $item) {
                        $data = explode("-", $item['data_nascimento']);
                        $ano = $data[0];
                        $mes = $data[1];
                        $dia = $data[2];

                        $item['mes'] = $mes;
                        $item['dia'] = $dia;

                        switch($mes){
                            case 1:
                                $jan['aniversarios'][] = $item;
                                break; 
                            case 2:
                                $fev['aniversarios'][] = $item;
                                break; 
                            case 3:
                                $mar['aniversarios'][] = $item;
                                break; 
                            case 4:
                                $abr['aniversarios'][] = $item;
                                break; 
                            case 5:
                                $mai['aniversarios'][] = $item;
                                break; 
                            case 6:
                                $jun['aniversarios'][] = $item;
                                break; 
                            case 7:
                                $jul['aniversarios'][] = $item;
                                break; 
                            case 8:
                                $ago['aniversarios'][] = $item;
                                break; 
                            case 9:
                                $set['aniversarios'][] = $item;
                                break; 
                            case 10:
                                $out['aniversarios'][] = $item;
                                break; 
                            case 11:
                                $nov['aniversarios'][] = $item;
                                break; 
                            case 12:
                                $dez['aniversarios'][] = $item;
                                break; 
                        }
                    }
				?>

                <h2>Janeiro</h2>
                <?php aniversariosMes($jan) ?>
                
                <h2>Fevereiro</h2>
                <?php aniversariosMes($fev) ?>

                <h2>Março</h2>
                <?php aniversariosMes($mar) ?>

                <h2>Abril</h2>
                <?php aniversariosMes($abr) ?>

                <h2>Maio</h2>
                <?php aniversariosMes($mai) ?>

                <h2>Junho</h2>
                <?php aniversariosMes($jun) ?>

                <h2>Julho</h2>
                <?php aniversariosMes($jul) ?>

                <h2>Agosto</h2>
                <?php aniversariosMes($ago) ?>

                <h2>Setembro</h2>
                <?php aniversariosMes($set) ?>

                <h2>Outubro</h2>
                <?php aniversariosMes($out) ?>

                <h2>Novembro</h2>
                <?php aniversariosMes($nov) ?>

                <h2>Dezembro</h2>
                <?php aniversariosMes($dez) ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

?>