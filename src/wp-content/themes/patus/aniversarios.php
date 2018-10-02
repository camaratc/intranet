<?php 

/* 
Template Name: Aniversarios
*/ 

function aniversariosDoMes($mes){
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
                        ORDER BY day(data_nascimento) ASC
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
                <?php aniversariosDoMes($jan) ?>
                
                <h2>Fevereiro</h2>
                <?php aniversariosDoMes($fev) ?>

                <h2>Março</h2>
                <?php aniversariosDoMes($mar) ?>

                <h2>Abril</h2>
                <?php aniversariosDoMes($abr) ?>

                <h2>Maio</h2>
                <?php aniversariosDoMes($mai) ?>

                <h2>Junho</h2>
                <?php aniversariosDoMes($jun) ?>

                <h2>Julho</h2>
                <?php aniversariosDoMes($jul) ?>

                <h2>Agosto</h2>
                <?php aniversariosDoMes($ago) ?>

                <h2>Setembro</h2>
                <?php aniversariosDoMes($set) ?>

                <h2>Outubro</h2>
                <?php aniversariosDoMes($out) ?>

                <h2>Novembro</h2>
                <?php aniversariosDoMes($nov) ?>

                <h2>Dezembro</h2>
                <?php aniversariosDoMes($dez) ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

?>