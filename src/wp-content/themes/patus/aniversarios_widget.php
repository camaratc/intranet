<?php

function aniversariosMes($aniversariantes){
    if(!empty($aniversariantes)){
        echo "
            <table>
                <tr>
                    <th width='20%'>Dia</th>
                    <th width='80%'>Nome</th>
                </tr>
        ";
        foreach($aniversariantes as $item){

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
        echo "Nenhum aniversário encontrado para o mes atual.";
    }   

    echo "<br /><hr />";
}

class Aniversarios extends WP_Widget {
 
	function __construct() {
		parent::__construct(
			'aniversarios_widget', 
			__('Aniversários', 'aniversarios'),
			array( 'description' => __( 'Lista de aniversariantes do mês.', 'aniversarios' ), ) 
		);
	}
	
	// Creating widget front-end	
	public function widget( $args, $instance ) {
		$db = new DB(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo $args['before_widget'];
		
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		


		$dataM = date('m');
		// $dataM = 1;
		$aniversariantes = [];

		$sql = "
            SELECT nome, data_nascimento FROM pessoa 
        	WHERE ativo = 'A'
            ORDER BY MONTH(data_nascimento), DAYOFMONTH(data_nascimento)
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

			if($mes == $dataM){
				$aniversariantes[] = $item;
			}
		}
        
		aniversariosMes($aniversariantes);
	}
			
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'wpb_widget_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}

?>