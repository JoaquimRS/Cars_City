<div>
    	<div>
    			<h3>LISTA DE COCHES</h3>
    	</div>
    	<div>
        <p><a href="index.php?module=controller_car&op=create"><img class="img_car_action" src="view/img/add_coche.png" alt="Añadir nuevo coche" ></a></p>
            
        <table class="datatable display" id="datatable">
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Nº Bastidor</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>KMS</th>
                    <th>Color</th>
                    <th>Puertas</th>
                    <th>Plazas</th>
                    <th>Motor</th>
                    <th>Combustible</th>
                    <th>Fecha</th>
                    <th>Categoria</th>
                    <th>Cambio</th>
                    <th>Precio</th>
                    <th>Ciudad</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                    if ($res_dao->num_rows === 0){
                        echo '<tr>';
                        echo '<td align="center"  colspan= "3">EL COCHE NO EXISTE</td>';
                        echo '</tr>';
                    }else{
                        foreach ($res_dao as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['matricula'] . '</td>';
                            echo '<td>'. $row['bastidor'] . '</td>';
                            echo '<td>'. $row['nombre_marca'] . '</td>';
                            echo '<td>'. $row['nombre_modelo'] . '</td>';
                            echo '<td>'. $row['kms'] . '</td>';
                            echo '<td>'. $row['color'] . '</td>';
                            echo '<td>'. $row['puertas'] . '</td>';
                            echo '<td>'. $row['plazas'] . '</td>';
                            echo '<td>'. $row['motor'] . '</td>';
                            echo '<td>'. $row['combustible'] . '</td>';
                            echo '<td>'. $row['fecha'] . '</td>';
                            echo '<td>'. $row['categoria'] . '</td>';
                            echo '<td>'. $row['cambio'] . '</td>';
                            echo '<td>'. $row['precio'] . '</td>';
                            echo '<td>'. $row['ciudad'] . '</td>';
                            echo '</tr>';
                     }
                    }
                ?>
            </tbody>    
            </table>
    		
    	</div>
    </div>