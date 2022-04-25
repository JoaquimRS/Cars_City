
    <div>
    	<div>
    			<h3>LISTA DE COCHES</h3>
    	</div>
    	<div>
    		<p><a href="index.php?module=controller_car&op=create"><img class="img_car_action" src="view/img/add_coche.png" alt="Añadir nuevo coche" ></a></p>
            <p><a href="index.php?module=controller_car&op=list_datatable">List Data-table</a></p>
            <!-- <label for="group">Agrupar por:</label>
                <select name="group" id="group" onchange="location.href='index.php?module=controller_car&op=list&order=' + this.selectedIndex;">
                    <option value=""></option>
                    <option value="marcas.nombre_marca">Marca</option>
                    <option value="coches.kms">KMS</option>
                </select> -->
            <?php
                    if ($res_dao->num_rows === 0){
                        echo '<p>';
                        echo '<b align="center">NO HAY NINGUN COCHE</b>';
                        echo '</p>';
                    }else{
                        echo '<p>Numero de coches: '.$res_dao->num_rows.'</p>';
                        foreach ($res_dao as $row) {
                            ?>
                            <div class="car car_modal" id="<?php echo $row['id_coche']?>" style="cursor: pointer;">
                            
                            <div class="car_info">
                                <img class="car_img" src="view/img/error_img.jpg">
                            <div class="actions">
                            <a href="index.php?module=controller_car&op=update&id=<?php echo $row['id_coche']?>"><img class="img_car_action"src="view/img/edit_coche.png" alt="Editar coche"></a>
                                <hr>
                                <!-- <a href="index.php?module=controller_car&op=delete&id=<?php echo $row['id_coche']?>"><img class="img_car_action" src="view/img/delete_coche.png" alt="Borrar coche"></a> -->
                            </div>
                                <table>
                                    <tr>
                                        <th>Marca: </th>
                                        <th>Modelo: </th>
                                        
                                    </tr>
                                    <tr>
                            <?php
                            echo '<td><h2 class="marca">'. $row['nombre_marca'] . '<h2></td>';
                            echo '<td><h2 class="modelo">'. $row['nombre_modelo'] . '<h2></td>';
                            ?>
                                    </tr>
                                </table>
                                <table>
                                    <tr>
                                        <th>KMS</th>
                                        <th>Color</th>
                                        <th>Puertas</th>
                                        <th>Motor</th>
                                        <th>Combustible</th>
                                        <th>Cambio</th>
                                    </tr>
                                    <tr>
                            <?php
                            echo '<td><b>'. $row['kms'] . '</b></td>';
                            echo '<td><b>'. $row['color'] . '</b></td>';
                            echo '<td><b>'. $row['puertas'] . '</b></td>';
                            echo '<td><b>'. $row['motor'] . '</b></td>';
                            echo '<td><b>'. $row['combustible'] . '</b></td>';
                            echo '<td><b>'. $row['cambio'] . '</b></td>';
                            ?>
                                    </tr>
                            </table>
                            
                        </div>
                    </div>
                    <br>
                    <?php        
                        }
                    }
            ?>
    		
    	</div>
    </div>
<div id="carModal"></div>