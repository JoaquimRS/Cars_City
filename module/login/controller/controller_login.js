function validateUserLog(user) {
    if (user.length > 0){
        var reg = /^[a-zA-Z0-9_\.]+$/;
        return reg.test(user);
    }
    return false;
};

function validatePasswordLog(password) {
    if (password.length > 0){
        var strongReg = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        var weakReg = /^[a-zA-Z0-9_\.]+$/;
        // return weakReg.test(password);
        return strongReg.test(password);
    }
    return false;
};

function validateLogin() {
    var check=true;

    var username = validateUserLog(document.getElementById("log_username").value)
    var password = validatePasswordLog(document.getElementById("log_password").value)

    if (!username) {
        str = "Usuario incorrecto"
        document.getElementById("error_log_username").innerHTML = str
        toastr.warning(str)
        check=false
    } else {
        document.getElementById("error_log_username").innerHTML = ""

    }
    if (!password) {
        str = "Contraseña incorrecta"
        document.getElementById("error_log_password").innerHTML = str
        toastr.warning(str)
        check=false
    } else {
        document.getElementById("error_log_password").innerHTML = ""
    }
    return check;
};

function loadLastLocation() {
    var ll = "?module=home"
    if (localStorage.getItem('ll')) {
        ll = localStorage.getItem('ll')
    }
    localStorage.removeItem("ll")
    window.location.href = ll
}

function submitLogin() {
    var inputs = document.getElementsByClassName("login");
    var forminfo = {}
    $.each(inputs, function (index, input) { 
        var key = input.id
        var value = input.value
        if (value.includes("1=1")){
            console.log("No intentes sql inyection, no funciona");
        }
        forminfo[key] = value         
    });
    ajaxPromise("POST","JSON","module/login/controller/controller_login.php?op=login",forminfo)
        .then(function(json){
            check=true
            try {
                document.getElementById(json.src).innerHTML=json.error
                check=false
            } catch (error) {
            }
            if (check){
                // toastr.success("Has iniciado sesion correctamente");
                localStorage.setItem('token',json)
                loadLastLocation();
            } else {
                toastr.error(json.error);
            }
        }).catch(function(){
            console.log("Error Login")
        });
    
};

function submitValidateLogin() {
    $("#login").on("click", () =>{
        var valjs = validateLogin();
        if (valjs) {
            submitLogin();
        }
    })

    $(document).on('keypress',function(key) {
        const querystring = window.location.search
        const params = new URLSearchParams(querystring)
        var formVar
        for (let form of params) {
            if (form[0]=="form"){
                formVar = form[1]

            }
        }
        if(key.which == 13 && formVar=="login") {
           var valjs = validateLogin();
           if (valjs) {
               submitLogin();
           }
        }
    });

}

function changeForm() {
    
    
    const querystring = window.location.search
    const params = new URLSearchParams(querystring)
    var formVar
    for (let form of params) {
        if (form[0]=="form"){
            formVar = form[1]

        }
    }
    if (formVar == "login") {
        window.history.replaceState({}, '', `${window.location.pathname}?${params}`)
    } else if (formVar == "register") {
        document.querySelector('.cont').classList.toggle('s--signup')
        window.history.replaceState({}, '', `${window.location.pathname}?${params}`)
    }

    $(document).on("click",".img__btn", function () {
        document.querySelector('.cont').classList.toggle('s--signup');
        if($('.s--signup').length){
            params.set("form","register")
        } else {
            params.set("form","login")
        }
        window.history.replaceState({}, '', `${window.location.pathname}?${params}`)
    });
    $(document).on("click","#password_image", ()=>{
        var images = document.querySelectorAll("[id='password_image']");
        var password_image = document.getElementById("password_image")
        var show = password_image.getAttribute("show")

        if (show=="true") {
            document.getElementById("reg_password_2").type = "password"
            document.getElementById("reg_password").type = "password"
            document.getElementById("log_password").type = "password"
            for(var i = 0; i < images.length; i++) 
            images[i].setAttribute("src","view/img/login/hide_password.png")
            
            password_image.setAttribute("show","false")
        } else {
            document.getElementById("reg_password_2").type = "text"
            document.getElementById("reg_password").type = "text"
            document.getElementById("log_password").type = "text"
            for(var i = 0; i < images.length; i++) 
            images[i].setAttribute("src","view/img/login/show_password.png")
            
            password_image.setAttribute("show","true")
        }
        
    })
    
    

};

$(document).ready(function () {
    changeForm();
    submitValidateLogin();

});