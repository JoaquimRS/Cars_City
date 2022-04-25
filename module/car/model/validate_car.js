function validate_matricula(matricula){
    if (matricula.length > 0){
        var reg=/^[0-9]{4}[A-Z]{3}$/;
        return reg.test(matricula);
    }
    return false;
}
function validate_bastidor(bastidor){
    if (bastidor.length === 17){
        return true;
    }
    return false;
}
function validate_modelo(modelo){
    if (modelo != ""){
        return true;
    }   
    return false;
}
function validate_kms(kms){
    if (kms != ""){
        return true;
    }   
    return false;
}
function validate_color(color){
    if (color.length > 0){
        var reg=/^[a-zA-Z]*$/;
        return reg.test(color);
    }
    return false;
}
function validate_puertas(puertas){
    if (puertas > 2){
        return true;
    }   
    return false;
}
function validate_plazas(plazas){
    if (plazas > 1){
        return true;
    }   
    return false;
}
function validate_motor(motor){
    if (motor.length > 0){
        var reg=/^[a-zA-Z0-9]*$/;
        return reg.test(motor);
    }
    return false;
}
function validate_combustible(combustible){
    if (combustible != ""){
        return true;
    }   
    return false;
}
function validate_fmatri(fmatri){
    if (fmatri != ""){
        return true;
    }   
    return false;
}
function validate_ciudad(ciudad){
    if (ciudad.length > 0){
        return true;
    }
    return false;
}
function validate_precio(precio){
    if (precio > 200){
        return true;
    }   
    return false;
}
function validate_cambio(cambio){
    for(i = 0; i < cambio.length; i++) {
        if (cambio[i].checked){
            return true;
        }
    }
    return false;
    
}
function validate_categoria(categoria){
    var cond=false;
    for(i=0; i < categoria.length; i++) {
        if(categoria[i].checked==true){
            cond=true;
        }
    }
    if (cond==true){
        return true;
    }
    return false;
}


function validate_car(){
    var check=true;

    var matricula=validate_matricula(document.getElementById('matricula').value);
    var bastidor=validate_bastidor(document.getElementById('bastidor').value);
    var modelo=validate_modelo(document.getElementById('modelo').value);
    var color=validate_color(document.getElementById('color').value);
    var puertas=validate_puertas(document.getElementById('puertas').value);
    var plazas=validate_plazas(document.getElementById('plazas').value);
    var motor=validate_motor(document.getElementById('motor').value);
    var kms=validate_kms(document.getElementById('kms').value);
    var combustible=validate_combustible(document.getElementById('combustible').value);
    var fmatri=validate_fmatri(document.getElementById('fmatri').value);
    var ciudad=validate_ciudad(document.getElementById('ciudad').value);
    var cambio=validate_cambio(document.getElementsByName('cambio'));
    var categoria=validate_categoria(document.getElementsByName('categoria'));
    var precio=validate_precio(document.getElementById('precio').value);
    

    if(!matricula){
        document.getElementById('error_matricula').innerHTML = "* Matricula no es valida";
        check=false;     
    }else{
        document.getElementById('error_matricula').innerHTML = "";
    }
    if(!bastidor){
        document.getElementById('error_bastidor').innerHTML = "* Bastidor no es valido";
        check=false;     
    }else{
        document.getElementById('error_bastidor').innerHTML = "";
    }
    if (!modelo){
        document.getElementById('error_modelo').innerHTML = "* Elige un modelo";
        check=false;
    }else{
        document.getElementById('error_modelo').innerHTML = "";
    }
    if (!kms){
        document.getElementById('error_kms').innerHTML = "* Introduce kilemetros";
        check=false;
    }else{
        document.getElementById('error_kms').innerHTML = "";
    }
    if (!color){
        document.getElementById('error_color').innerHTML = "* El color no es valido";
        check=false;
    }else{
        document.getElementById('error_color').innerHTML = "";
    }
    if (!puertas){
        document.getElementById('error_puertas').innerHTML = " * Nº Puertas";
        check=false;
    }else{
        document.getElementById('error_puertas').innerHTML = "";
    }
    if (!plazas){
        document.getElementById('error_plazas').innerHTML = "* Nº Plazas";
        check=false;
    }else{
        document.getElementById('error_plazas').innerHTML = "";
    }
    if (!motor){
        document.getElementById('error_motor').innerHTML = "* Introduce el motor";
        check=false;
    }else{
        document.getElementById('error_motor').innerHTML = "";
    }
    if (!combustible){
        document.getElementById('error_combustible').innerHTML = "* Elige el combustible";
        check=false;
    }else{
        document.getElementById('error_combustible').innerHTML = "";
    }
    if (!fmatri){
        document.getElementById('error_fmatri').innerHTML = "* Seleccionar la fecha de matriculacion";
        check=false;
    }else{
        document.getElementById('error_fmatri').innerHTML = "";
    }
    if (!ciudad){
        document.getElementById('error_ciudad').innerHTML = "* Introduce la ciudad";
        check=false;
    }else{
        document.getElementById('error_ciudad').innerHTML = "";
    }
    if (!precio){
        document.getElementById('error_precio').innerHTML = "* Selecciona el precio, minimo 200€";
        check=false;
    }else{
        document.getElementById('error_precio').innerHTML = "";
    }
    if (!cambio){
        document.getElementById('error_cambio').innerHTML = "* Selecciona el cambio";
        check=false;
    }else{
        document.getElementById('error_cambio').innerHTML = "";
    }
    if (!categoria){
        document.getElementById('error_categoria').innerHTML = "* Minimo una categoria";
        check=false;
    }else{
        document.getElementById('error_categoria').innerHTML = "";
    }
    
    if (check==false){       
        return 0;
    }
    
    if (check==true){
        if (document.getElementById('submit').value === "Crear"){
            document.getElementById('submit').setAttribute('type', 'submit');
            document.getElementById('form_car').action="index.php?module=controller_car&op=create";
            document.getElementById("form_car").submit();
        }
        if (document.getElementById('submit').value === "Actualizar"){
            document.getElementById('submit').setAttribute('type', 'submit');
            document.getElementById('form_car').action="index.php?module=controller_car&op=update";
            document.getElementById("form_car").submit();
        }
        
        
    }
}
function showModal(carTitle, id_coche) {
    let op = {  
        title: carTitle,
        width : 500,
        height: 500,
        resizable: false,
        dialogClass: "no-close",
        
    }

    $("#detailsCars").show();
    $("#carModal").dialog(op);
}
function localContentModal() {
    $('.car_modal').on("click", function() {
        var id_car = this.getAttribute('id');
        
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: 'module/car/controller/controller_car.php?op=read_modal&id=' + id_car,
        }).done(function(jsoncar) {
            
            $('<div></div>').attr('id', 'detailsCars', 'type', 'hidden').appendTo('#carModal');
            $('<div></div>').attr('id', 'containerCars').appendTo('#detailsCars');
            $('#containerCars').empty();
            $('<div></div>').attr('id', 'Div1').appendTo('#containerCars');
            $('#Div1').html(function() {
                var content = "";
                for (row in jsoncar) {
                    content += '<br><span>' + row + ': <span id =' + row + '>' + jsoncar[row] + '</span></span>';
                }
                return content;
                });
                
                showModal(carTitle = jsoncar.matricula, jsoncar.id_coche);

        }).fail(function() {
            console.log("Fail");
        });



    });

}

$(document).ready(function() {
    currentMenu("menu-car");
    localContentModal();
});