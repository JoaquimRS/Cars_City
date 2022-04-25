<div>
    <h3>MODIFICAR COCHE</h3>
    <form autocomplete="on" method="post" name="form_car" id="form_car">
        <div class="form">
                <?php 
                foreach ($res_dao_car_info as $row) {
                    $img = $row['IMG'];
                    $bastidor = $row['bastidor'];
                    $matricula = $row['matricula'];
                    $idmodelo = $row['id_modelo'];
                    $kms = $row['kms'];
                    $color = $row['color'];
                    $puertas = $row['puertas'];
                    $plazas = $row['plazas'];
                    $motor = $row['motor'];
                    $combustible = $row['combustible'];
                    $fmatri = $row['fecha'];
                    $categoria = $row['categoria'];
                    $cambio = $row['cambio'];
                    $precio = $row['precio'];
                    $ciudad = $row['ciudad'];
                    $descripcion = $row['descripcion'];
                }
                ?>
            <label for="matricula">Matricula:</label>
            <input type="text" id="matricula" name="matricula" maxlength="7" value="<?php echo $matricula ?>">

            <label for="bastidor">Nº Bastidor:</label>
            <input type="text" id="bastidor" name="bastidor" maxlength="17" value="<?php echo $bastidor ?>">

            <label for="modelo">Modelo:</label>
            <select id="modelo" name="modelo">
            <option value="" selected></option>
            <?php
                
               foreach ($res_dao_models as $row) {
                    
                    if ($row['id_modelo'] == $idmodelo ) {
                        echo "<option value='".$row['id_modelo']."' selected>".$row['nombre_marca']." ".$row['nombre_modelo']."</option>";
                    }
                    else {
                        echo "<option value='".$row['id_modelo']."'>".$row['nombre_marca']." ".$row['nombre_modelo']."</option>";
                    }
               }
            ?>
            </select>
            <br>
            
            <span id="error_matricula" class="error"></span>
            <span id="error_bastidor" class="error"></span>
            <span id="error_modelo" class="error"></span>
            <br>
            
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="<?php echo $color ?>">
            
            
            <label for="puertas">Puertas:</label>
            <input type="number" id="puertas" name="puertas" value="<?php echo $puertas ?>">
            
            <label for="plazas">Plazas:</label>
            <input type="number" id="plazas" name="plazas" value="<?php echo $plazas ?>">
            
            <label for="motor">Motor:</label>
            <input type="text" id="motor" name="motor" value="<?php echo $motor ?>">
            
            <br>
            
            <span id="error_color" class="error"></span>
            <span id="error_puertas" class="error"></span>
            <span id="error_plazas" class="error"></span>
            <span id="error_motor" class="error"></span>
            
            <br>
            <label for="kms">Kilemetros:</label>
            <input type="number" id="kms" name="kms" value="<?php echo $kms ?>">
            

            <label for="combustible">Combustible:</label>
            <select id="combustible" name="combustible">
                <option value="<?php echo $combustible ?>" selected><?php echo $combustible ?></option>
                <option value="Gasolina">Gasolina</option>
                <option value="Diesel">Diesel</option>
                <option value="Etanol">Etanol</option>
                <option value="Hidrogeno">Hidrogeno</option>
                <option value="Electricidad">Electricidad</option>
            </select>
            <label for="fmatri">Fecha matriculacion:</label>
            <input type="text" id="fmatri" name="fmatri" value="<?php echo $fmatri ?>">

            <br>
            <span id="error_kms" class="error"></span>
            <span id="error_combustible" class="error"></span>
            <span id="error_fmatri" class="error"></span>
            <br>
            <div class="cambio">
                <label>Cambio:</label>
                
                <br>
                <input type="radio" id="automatico" name="cambio" value="Automatico">
                <label for="automatico">Automatico</label>
                <br>
                <input type="radio" id="manual" name="cambio" value="Manual">
                <label for="manual">Manual</label>
                <br>
                
            </div>
            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" value="<?php echo $ciudad ?>">
            <div class="categoria">
                <label>Categoria:</label>
                
                <br>
                <input type="checkbox" id="familiar" name="categoria" value="familiar">
                <label for="familiar">Familiar</label>
                <input type="checkbox" id="deportivo" name="categoria" value="deportivo">
                <label for="deportivo">Deportivo</label>
                <br>
                <input type="checkbox" id="urbano" name="categoria" value="urbano">
                <label for="urbano">Urbano</label>
                <input type="checkbox" id="todoterreno" name="categoria" value="todoterreno">
                <label for="todoterreno">Todoterreno</label>
            </div>
            <br>
            <span id="error_ciudad" class="error"></span>
            <br>
            <br>
            <span id="error_cambio" class="error"></span>
            <span id="error_categoria" class="error"></span>
            <br>
            <label for="precio">Precio: </label><output id="price"><?php echo $precio ?></output><label>€</label>
            <br>
            <input type="range" id="precio" name="precio" min="0" max="200000" value="<?php echo $precio ?>" oninput="document.getElementById('price').innerHTML = this.value">
            <br>
            <span id="error_precio" class="error"></span>
            <br>
            <label for="descripcion">Descripcion del coche:</label>
            <br>
            <textarea id="descripcion" name="descripcion" rows="4" cols="50"><?php echo $descripcion ?></textarea>
            <br>
            <br>
            <input type="button" id="submit" name="submit_car" value="Actualizar" onclick="validate_car();">
        </div>
    </form>
</div>