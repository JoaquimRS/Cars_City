<div>
    <div>
    	<div>
    			<h3>COCHE</h3>
    	</div>
    	<div>    		
    		<table>
                <tr>
                    <td width="150"><b>Matricula</b></td>
                    <td width="150"><b>Marca</b></td>
                    <td width="150"><b>Modelo</b></td>
                    <td width="150"><b>KMS</b></td>
                    <td width="150"><b>Color</b></td>
                    <td width="150"><b>Puertas</b></td>
                    <td width="150"><b>Motor</b></td>
                    <td width="150"><b>Combustible</b></td>
                    <td width="150"><b>Cambio</b></td>
                    <th><b>Accion</b></th>
                </tr>
                <?php
                    if ($res_dao->num_rows === 0){
                        echo '<tr>';
                        echo '<td align="center"  colspan= "3">EL COCHE NO EXISTE</td>';
                        echo '</tr>';
                    }else{
                        foreach ($res_dao as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['matricula'] . '</td>';
                            echo '<td>'. $row['nombre_marca'] . '</td>';
                            echo '<td>'. $row['nombre_modelo'] . '</td>';
                            echo '<td>'. $row['kms'] . '</td>';
                            echo '<td>'. $row['color'] . '</td>';
                            echo '<td>'. $row['puertas'] . '</td>';
                            echo '<td>'. $row['motor'] . '</td>';
                            echo '<td>'. $row['combustible'] . '</td>';
                            echo '<td>'. $row['cambio'] . '</td>';
                               echo '<td>';
                            echo '&nbsp;';
                            echo '<a class="" href="">Update</a>';
                            echo '&nbsp;';
                            echo '<a class="" href="">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                     }
                    }
                ?>
            </table>
    	</div>
    </div>
</div>